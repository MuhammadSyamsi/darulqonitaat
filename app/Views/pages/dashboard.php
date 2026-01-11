<!-- ================= DASHBOARD WRAPPER ================= -->
<div class="flex flex-col h-full">

    <!-- ================= HEADER ================= -->
    <div class="p-4 border-b">
        <h1 class="text-lg font-bold text-gray-800 leading-tight">
            Sistem Informasi
        </h1>
        <p class="text-sm text-gray-500">
            Darul Qonnitaat
        </p>
    </div>

    <!-- ================= MENU ================= -->
<div class="flex-1 overflow-y-auto p-3 space-y-2">

    <!-- MENU ITEM: Ruang Data Santri -->
    <a href="/darulqonitaat/santri"
       class="block w-full flex items-center gap-3 p-3 rounded-xl
              bg-gray-50 hover:bg-gray-100 active:scale-[0.98] transition">
        <div class="w-10 h-10 flex items-center justify-center bg-blue-100 text-blue-600 rounded-full">
            <!-- Icon user -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5.121 17.804A8.966 8.966 0 0012 21a8.966 8.966 0 006.879-3.196M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </div>
        <div class="flex-1 text-left">
            <p class="font-semibold text-sm text-gray-800">Ruang Data Santri</p>
            <p class="text-xs text-gray-500">Data induk & biodata santri</p>
        </div>
    </a>

    <!-- MENU ITEM: Ruang Data Akademik -->
    <a href="/darulqonitaat/akademik"
       class="block w-full flex items-center gap-3 p-3 rounded-xl
              bg-gray-50 hover:bg-gray-100 active:scale-[0.98] transition">
        <div class="w-10 h-10 flex items-center justify-center bg-green-100 text-green-600 rounded-full">
            <!-- Icon book -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 20h9M12 4h9m-9 0H3a2 2 0 00-2 2v16a2 2 0 002 2h9a2 2 0 002-2V6a2 2 0 00-2-2z"/>
            </svg>
        </div>
        <div class="flex-1 text-left">
            <p class="font-semibold text-sm text-gray-800">Ruang Data Akademik</p>
            <p class="text-xs text-gray-500">Nilai, absensi, tahfidz</p>
        </div>
    </a>

    <!-- MENU ITEM: Ruang Data Keuangan -->
    <a href="/darulqonitaat/keuangan"
       class="block w-full flex items-center gap-3 p-3 rounded-xl
              bg-gray-50 hover:bg-gray-100 active:scale-[0.98] transition">
        <div class="w-10 h-10 flex items-center justify-center bg-yellow-100 text-yellow-600 rounded-full">
            <!-- Icon wallet -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 9V7a4 4 0 00-4-4H5a4 4 0 00-4 4v10a4 4 0 004 4h8a4 4 0 004-4v-2"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 13h.01"/>
            </svg>
        </div>
        <div class="flex-1 text-left">
            <p class="font-semibold text-sm text-gray-800">Ruang Data Keuangan</p>
            <p class="text-xs text-gray-500">SPP, pembayaran & laporan</p>
        </div>
    </a>

    <!-- MENU ITEM: Ruang Super Admin -->
    <a href="/darulqonitaat/super-admin"
       class="block w-full flex items-center gap-3 p-3 rounded-xl
              bg-gray-50 hover:bg-gray-100 active:scale-[0.98] transition">
        <div class="w-10 h-10 flex items-center justify-center bg-red-100 text-red-600 rounded-full">
            <!-- Icon shield -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 11c0-1.5 1.5-3 3-3s3 1.5 3 3-1.5 3-3 3-3-1.5-3-3z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 2l9 4v6c0 5-3.5 9-9 11S3 17 3 12V6l9-4z"/>
            </svg>
        </div>
        <div class="flex-1 text-left">
            <p class="font-semibold text-sm text-gray-800">Ruang Super Admin</p>
            <p class="text-xs text-gray-500">Hak akses penuh & pengaturan sistem</p>
        </div>
    </a>

</div>

    <!-- ================= FOOTER ================= -->
    <div class="border-t p-4 bg-white">
        <div class="text-xs text-gray-500">
            Login sebagai
        </div>
        <div class="font-semibold text-gray-800 text-sm">
            <? //= esc(user()->username ?? 'Admin') ?>
        </div>
    </div>

</div>