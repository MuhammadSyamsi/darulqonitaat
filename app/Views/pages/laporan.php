<div class="p-4">

    <!-- HEADER -->
    <h2 class="text-lg font-bold text-gray-800 mb-4">
        Laporan
    </h2>

    <div class="bg-white rounded-xl border shadow-sm">

        <!-- ================= HEADER ================= -->
        <div class="flex items-center justify-between px-4 py-3 border-b">

            <!-- LEFT -->
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-blue-100 text-blue-600">
                    <!-- ICON USER -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a4 4 0 00-4-4h-1m-4 6H2v-2a4 4 0 014-4h1m5-4a4 4 0 100-8 4 4 0 000 8z" />
                    </svg>
                </div>
                <h3 class="font-semibold text-sm text-gray-800">
                    Santri
                </h3>
            </div>

            <!-- RIGHT -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                    class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-600">
                    <!-- MENU ICON -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <div x-show="open" @click.outside="open=false" x-transition
                    class="absolute right-0 mt-2 w-36 bg-white border rounded-lg shadow text-sm z-50">
                    <button class="w-full text-left px-3 py-2 hover:bg-gray-50">
                        Update
                    </button>
                    <button class="w-full text-left px-3 py-2 hover:bg-gray-50">
                        Lihat Detail
                    </button>
                </div>
            </div>
        </div>

        <!-- ================= CONTENT ================= -->
        <div class="px-4 py-4 space-y-3">

            <!-- TOTAL -->
            <div>
                <p class="text-xs text-gray-500">Total Santri</p>
                <p class="text-xl font-bold text-gray-800">
                    205 <span class="text-sm font-medium text-gray-500">Santri</span>
                </p>
            </div>

            <!-- STACKED PROGRESS BAR -->
            <div>
                <div class="w-full h-3 bg-gray-200 rounded-full overflow-hidden flex">
                    <!-- MTs -->
                    <div class="bg-blue-500 h-full" style="width:58%"></div>
                    <!-- MA -->
                    <div class="bg-green-500 h-full" style="width:42%"></div>
                </div>

                <!-- LEGEND -->
                <div class="flex justify-between text-xs text-gray-600 mt-2">
                    <span class="flex items-center gap-1">
                        <span class="w-2.5 h-2.5 bg-blue-500 rounded-sm"></span>
                        MTs (120)
                    </span>
                    <span class="flex items-center gap-1">
                        <span class="w-2.5 h-2.5 bg-green-500 rounded-sm"></span>
                        MA (85)
                    </span>
                </div>
            </div>

        </div>
    </div>

</div>