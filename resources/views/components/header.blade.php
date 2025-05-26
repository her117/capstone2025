<header class="bg-red-500">
            <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                <a href="/" class="-m-1.5 p-1.5">
                    <img class="h-8 w-auto" src="https://w7.pngwing.com/pngs/663/423/png-transparent-indonesia-open-university-logo-thumbnail-universities-indonesia-thumbnail.png" alt="">
                </a>
             </div>
            
            {{-- Kolom tengah: Teks di tengah navbar --}}
                <div class="flex-1 flex justify-center">
                <h1 class="text-2xl font-bold">{{ $slot }}</h1>
             </div>

                {{-- Kolom kanan: Kosong agar bisa center --}}
                <div class="flex lg:flex-1 justify-end">
                <!-- Kosong atau bisa tambahkan menu nanti -->
                <button type="button" onclick="history.back()" class="focus:outline-none text-black bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-bold rounded-lg text-sm mt-2 px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">Kembali</button>
                </div>
            </nav>
</header>