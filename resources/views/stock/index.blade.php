<x-layout>
        <x-slot:title>{{ $title }}</x-slot:title>

        @section('content')
            <div class="max-w-xl mx-auto px-4 py-6" x-data="{ info: false }">
                <h1 class="text-2xl font-bold mb-4">Tambah Stok Masuk</h1>

                <form method="POST" action="{{ route('stock-in.store') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label for="product_id" class="block font-medium">Pilih Produk</label>
                        <select name="product_id" class="w-full border px-3 py-2 rounded">
                          @foreach($produks as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach 
                       </select>
                    </div>

                    <div>
                        <label for="quantity" class="block font-medium">Jumlah</label>
                        <input type="number" name="quantity" min="1" class="w-full border px-3 py-2 rounded">
                    </div>

                    <div>
                        <label for="notes" class="block font-medium">Catatan (opsional)</label>
                        <input type="text" name="notes" class="w-full border px-3 py-2 rounded">
                    </div>

                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Simpan
                    </button>
                </form> 
                <h1>Tes</h1>
            </div>
        @endsection

</x-layout>