<?php

namespace App\Http\Controllers\Back;

use App\Baroko\ContactInfo\Repository\ContactInfoRepository;
use App\Baroko\SessionCart\Repository\SessionCartRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

/**
 * TODO: structure the code better
 * 
 * Class NotificationsController
 * @package App\Http\Controllers\Back
 */
class NotificationsController extends Controller
{
    /**
     * @var SessionCartRepository
     */
    protected $sessionCartRepo;

    /**
     * @var ContactInfoRepository
     */
    protected $contactInfoRepo;

    /**
     * @var string
     */
    private $admin_email = 'razvan.toader@gdm.ro';

    /**
     * NotificationsController constructor.
     * @param SessionCartRepository $sessionCartRepository
     * @param ContactInfoRepository $contactInfoRepository
     */
    public function __construct(
      SessionCartRepository $sessionCartRepository,
      ContactInfoRepository $contactInfoRepository
    ) {
        $this->sessionCartRepo = $sessionCartRepository;
        $this->contactInfoRepo = $contactInfoRepository;
    }

    /**
     * Send order email to customer
     *
     * @param $order
     * @param $cartTotals
     * @return bool
     */
    public function sendOrderEmailToCustomer($order, $cartTotals) {
        //get cart contents by session id
        $cartContents = $this->sessionCartRepo->getCartBySessionId($order->session_id);

        //get emails from order info
        $email = $order->info->email;

        //create mail object
        Mail::send(
          'emails.customer-order', [
          'cartContents' => $cartContents,
          'cartTotals' => $cartTotals
        ], function ($message) use ($email) {
            $message->from($this->admin_email);
            $message->to($email);
        });

        //just return true here
        return true;
    }

    /**
     * Send order email to admin
     *
     * @param $order
     * @param $cartTotals
     * @return bool
     */
    public function sendOrderEmailToAdmin($order, $cartTotals) {
        //get cart contents
        $cartContents = $this->sessionCartRepo->getCartBySessionId($order->session_id);

        //send email
        Mail::send('emails.admin-order', [
          'cartContents' => $cartContents,
          'cartTotals' => $cartTotals,
          'orderInfo' => $order->info
        ], function ($message) {
            $message->from($this->admin_email);
            $message->to($this->admin_email);
        });

        //just return true here
        return true;
    }

    /**
     * Send contact info email to user
     * @param $contactInfo
     * @return bool
     */
    public function sendContactInfoToUser($contactInfo) {

        //send mail
        Mail::send('emails.contact-info', [
          'link' => route('front.get.conversation', $contactInfo->uuid)
        ], function ($message) use ($contactInfo) {
            $message->from($this->admin_email);
            $message->to($contactInfo->email);
        });

        //just return true here
        return true;
    }
}