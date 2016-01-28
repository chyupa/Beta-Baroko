<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title text-center">Cart</h3>
    </div>
    <div class="panel-body">
        @if($cart_items_number > 0)
            <p>In cart: {{ $cart_items_number }} product(s)</p>
            <p>Transport Fee: {{ $cart_items_transport_fee }}</p>
            <p>Total: {{ $cart_items_total }}</p>
            <a class="btn btn-info" href="{{ route('front.get.cart') }}">See cart</a>
        @else
            <p>Your cart is empty</p>
        @endif
    </div>
</div>