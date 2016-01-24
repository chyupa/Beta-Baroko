<?php

namespace App\Http\Controllers\Back;

use App\Baroko\SessionCart\Repository\SessionCartRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class NotificationsController extends Controller
{
    protected $sessionCartRepo;
    private $admin_email = 'razvan.toader@gdm.ro';

    public function __construct(SessionCartRepository $sessionCartRepository)
    {
        $this->sessionCartRepo = $sessionCartRepository;
    }

    public function sendOrderEmailToCustomer($order, $cartTotals)
    {
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

    public function sendOrderEmailToAdmin($order, $cartTotals)
    {
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
}