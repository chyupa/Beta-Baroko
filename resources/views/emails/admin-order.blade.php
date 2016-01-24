<h1>New customer order</h1>

<p>Name: {{ $orderInfo->name }}</p>
<p>Email: {{ $orderInfo->email }}</p>
<p>Phone: {{ $orderInfo->phone }}</p>
<p>Street: {{ $orderInfo->street }}</p>
<p>Number: {{ $orderInfo->number }}</p>
<p>Bloc: {{ $orderInfo->bloc }}</p>
<p>Apartment: {{ $orderInfo->apartment }}</p>
<p>Floor: {{ $orderInfo->floor }}</p>
<p>Inteprhone: {{ $orderInfo->interphone }}</p>
<p>City: {{ $orderInfo->city }}</p>
<p>County: {{ $orderInfo->county }}</p>
<p>Country: {{ $orderInfo->country }}</p>
<p>City: {{ $orderInfo->city }}</p>

<p>Message: {{ $orderInfo->message }}</p>

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