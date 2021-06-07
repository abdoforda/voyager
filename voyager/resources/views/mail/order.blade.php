@component('mail::message')
# Thank you for your order

Thank you for your order in {{ config('app.name') }}.

# Products Order



@php
    
    $order = App\Order::find($id);
    $carts = unserialize($order->carts);
@endphp
<table class="table table-bordered">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Product</th>
        <th scope="col">Price</th>
        <th scope="col">Count</th>
        <th scope="col">Total Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($carts as $index => $cart)
        <tr>
            <th scope="row">{{ $index+1 }}</th>
            <td>
                <a href="/product/{{ $cart->product->name }}" style="text-decoration: none" target="new">{{ $cart->product->name }}</a>
            </td>
            <td>{{ $cart->product->priceCurrency($cart->user->state) }}</td>
            <td>{{ $cart->count }}</td>
            <td>{{ $cart->priceTotalAdmin() }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            }
            td{
                text-align: center;
            }
    </style>

<br>
<br>
Thanks<br>
{{ config('app.name') }}
@endcomponent
