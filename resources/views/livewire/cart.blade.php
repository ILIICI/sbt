<div class="space-y-1">
    <h2 class="text-sm font-semibold tracking-widest uppercase text-coolGray-600">Shopping Cart</h2>
    <div class="flex flex-col space-y-1">
        <x-flash::message/>
        @if (!Session::has('shopingCart'))
             <p class="text-red-600">Shopping cart is empty</p>
        @else                  
             <p>Items </p>
        <table class="table-fixed">
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td class="text-left text-xs">{{ $product['item']['product_title'] }}</td>
                    <td class="text-xs">{{ $product['qty'] }}</td>
                    <td class="text-xs">{{ $product['price']}}</td>
                    <td class="text-lg text-green-500">
                        <button wire:click="increment('{{ $product['item']['id'] }}')">+</button>
                    </td>
                    <td class="text-lg text-yellow-500">
                        <button wire:click="decrement('{{ $product['item']['id'] }}')">-</button>
                    </td>
                    <td class="text-lg text-red-500">
                        <button wire:click="remove('{{ $product['item']['id'] }}')">x</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p>Total Price :{{ $totalPrice }}</p>
        @endif
    </div>
</div>