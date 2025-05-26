<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!-- Konten utama -->
        <div>
                <div class="container text-center font-extrabold">
                    <h1>DAFTAR PRODUK</h1>
                </div>
                <div class="p-4 flex flex-row">
         {{-- Cart Section --}}
        <div style="height: 550px;" class="cart basis-128 bg-gray-900 p-4">
            <h2 class="text-lg text-center font-extrabold mb-4">Cart</h2>
            <table class="w-full text-left text-sm text-gray-900">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2">Name Product</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Quantity</th>
                            <th class="px-4 py-2">Total</th>
                        </tr>
                    </thead>
                </table>
            @if(session('cart'))
                <div class="overflow-y-auto bg-gray-100" style="height: 340px; ">
                <table>
                    <tbody>
                        @php $grandTotal = 0; @endphp
                        @foreach(session('cart') as $id => $item)
                            <tr class="bg-white border-b">
                                <td class="px-4 py-2">{{ $item['name'] }}</td>
                                <td class="px-4 py-2">Rp{{ number_format($item['price']) }}</td>
                                <td class="px-4 py-2">{{ $item['quantity'] }}</td>
                                <td class="px-4 py-2">Rp{{ number_format($item['price'] * $item['quantity']) }}</td>
                            </tr>
                            @php $grandTotal += $item['price'] * $item['quantity']; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="total bg-gray-100 grid grid-cols-1">
                <table>
                    <tbody class="text-left">
                        <tr class="font-bold bg-gray-100">
                            <td colspan="3" class="px-4 py-2 text-right">Grand Total</td>
                            <td class="px-4 py-2">Rp{{ number_format($grandTotal) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @else
                <p class="text-center bg-gray-100 text-black" style="height: 380px;">Cart kosong</p>
            @endif
            <div class="clear">
                <form action="{{ route('cart.clear') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-clear-cart focus:outline-none text-black bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-bold rounded-lg text-sm mt-2 px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">Clear Cart</button>
                </form>
            </div>
        </div>
            {{--END Cart Section --}}

            {{-- Product Section --}}
            <div class="grid grid-cols-5 gap-6 ml-5 bg-black p-5 max-h-[550px] overflow-y-auto">
                @foreach($produks as $product)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden p-5 max-h-50">
                        <form action="{{ route('cart.add') }}" method="POST" class="flex flex-col items-center">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="flex flex-col items-center gap-2">
                                <img class="w-24 h-24 object-cover rounded-md" src="{{ asset('storage/'.$product->photo) }}" alt="{{ $product->name_product }}" />
                                <span class="mt-2 font-semibold text-lg text-center">{{ $product->name_product }}</span>
                                <span class="text-gray-700">Rp{{ number_format($product->sell_price, 0, ',', '.') }}</span>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            {{-- END Product Section --}}
        </div>
    </div>
</x-layout>