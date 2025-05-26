<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="relative overflow-x-auto">
        <table>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th>
                        <div class="add-product mt-5">
                            <a href="{{ route('produks.create') }}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                <span>Add Product</span>
                            </a>
                        </div>
                    </th>
                    <th>
                        <div class="add-category mt-5">
                            <a href="{{ route('category.index') }}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                <span>Category</span>
                            </a>
                        </div>
                    </th>
                </tr>
            </thead>
        </table>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-10">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product Photo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stock
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Buy Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Sell Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span> Action </span>
                    </th>
                </tr>
            </thead>
            @foreach ($produks as $produk)
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th class="px-6 py-2">
                        @if ($produk->photo)
                            <img src="{{ asset('storage/'.$produk->photo) }}" alt="" width="100">
                        @endif
                    </th>
                    <th scope="row" class="px-6 py-2 font-bold text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="/produks/{{ $produk['id'] }}" class="hover:underline">{{ $produk['name_product'] }}</a>
                    </th>
                    <td class="px-6 py-2">
                        {{ $produk->category->name ?? '-' }}
                    </td>
                    <td class="px-6 py-2">
                        {{ $produk->stock ?? '-'}}
                    </td>
                    <td class="px-6 py-2">
                        {{ 'Rp ' . number_format($produk->buy_price, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-2">
                        {{ 'Rp ' . number_format($produk->sell_price, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-2">
                        <form action="{{ route('produks.destroy', $produk->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="focus:outline-none text-white bg-red-600 hover:bg-red-900 focus:ring-4 focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-red-900">Hapus</button>
                        </form>
                    </td>
                </tr>
            </tbody>     
            @endforeach
        </table>
    </div>
</x-layout>