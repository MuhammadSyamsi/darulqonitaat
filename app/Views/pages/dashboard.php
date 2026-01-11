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

        <!-- MENU ITEM -->
        <button
            class="w-full flex items-center gap-3 p-3 rounded-xl
                   bg-gray-50 hover:bg-gray-100 active:scale-[0.98] transition">
            <img
                src="https://i.pravatar.cc/50?img=5"
                class="w-9 h-9 sm:w-10 sm:h-10 rounded-full object-cover">
            <div class="text-left flex-1">
                <p class="font-semibold text-sm text-gray-800">
                    Ruang Data Santri
                </p>
                <p class="text-xs text-gray-500">
                    Data induk & biodata santri
                </p>
            </div>
        </button>

        <!-- MENU ITEM -->
        <button
            class="w-full flex items-center gap-3 p-3 rounded-xl
                   bg-gray-50 hover:bg-gray-100 active:scale-[0.98] transition">
            <img
                src="https://i.pravatar.cc/50?img=8"
                class="w-9 h-9 sm:w-10 sm:h-10 rounded-full object-cover">
            <div class="text-left flex-1">
                <p class="font-semibold text-sm text-gray-800">
                    Ruang Data Akademik
                </p>
                <p class="text-xs text-gray-500">
                    Nilai, absensi, tahfidz
                </p>
            </div>
        </button>

        <!-- MENU ITEM -->
        <button
            class="w-full flex items-center gap-3 p-3 rounded-xl
                   bg-gray-50 hover:bg-gray-100 active:scale-[0.98] transition">
            <img
                src="https://i.pravatar.cc/50?img=12"
                class="w-9 h-9 sm:w-10 sm:h-10 rounded-full object-cover">
            <div class="text-left flex-1">
                <p class="font-semibold text-sm text-gray-800">
                    Ruang Data Keuangan
                </p>
                <p class="text-xs text-gray-500">
                    SPP, pembayaran & laporan
                </p>
            </div>
        </button>

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