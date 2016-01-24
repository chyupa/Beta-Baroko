<h1>Your order</h1>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Quantity</th>
        <th>Product Total</th>
    </tr>
    </thead>
    <tbody>
        @foreach($cartContents as $key=>$item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->price * $item->quantity }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<p>Transport Fee: {{ $cartTotals['transportFee'] }}</p>
<p>Subtotal: {{ $cartTotals['total'] }}</p>
<p>Total: {{ $cartTotals['total'] + $cartTotals['transportFee'] }}</p>