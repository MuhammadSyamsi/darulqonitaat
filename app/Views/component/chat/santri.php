<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>

<div
    x-data="chatSantri()"
    class="flex flex-col h-full pb-16 md:pb-0">

    <!-- HEADER -->
    <div class="bg-white p-4 border-b">
        <h2 class="font-semibold text-gray-800">
            Ruang Data Santri
        </h2>
    </div>

    <!-- CHAT AREA -->
    <div class="flex-1 p-4 overflow-y-auto space-y-4 bg-gray-50">

        <div class="flex gap-2">
            <div class="bg-white px-4 py-2 rounded-lg shadow max-w-md">

                <p class="text-sm text-gray-800">
                    <?= $santri
                        ? 'Belum ada data. Tambahkan data santri terlebih dahulu'
                        : 'Mau apa hari ini?'
                    ?>
                </p>

                <!-- PILL MENU -->
                <div class="flex gap-2 mt-3 text-xs">
                    <button class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full">
                        ➕ Add
                    </button>
                    <button class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full">
                        ✏️ Change
                    </button>
                    <button class="px-3 py-1 bg-red-100 text-red-700 rounded-full">
                        🗑 Delete
                    </button>
                </div>

            </div>
        </div>

        <template x-for="msg in messages" :key="msg.id">
            <div class="flex justify-end gap-2">
                <div class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow max-w-md">
                    <span x-text="msg.text"></span>
                </div>
            </div>
        </template>

        <template x-for="reply in replies" :key="reply.id">
            <div class="flex gap-2">
                <div class="bg-white px-4 py-2 rounded-lg shadow max-w-md">
                    <span x-text="reply.text"></span>
                </div>
            </div>
        </template>

    </div>

    <!-- INPUT -->
    <div class="bg-white p-4 border-t flex items-center gap-2 relative">

        <!-- ATTACH ICON -->
        <button
            @click="attachOpen = !attachOpen"
            class="text-gray-600 text-xl">
            📎
        </button>

        <input
            type="text"
            x-model="input"
            @input.debounce.300ms="fetchSuggest"
            @keydown.enter.prevent="sendMessage"
            placeholder="Ketik nama santri..."
            class="w-full border rounded-lg px-4 py-2 focus:ring focus:outline-none">

        <!-- SUGGEST -->
        <div
            x-show="suggestions.length"
            class="absolute bottom-16 left-4 right-4 bg-white shadow rounded-lg divide-y">
            <template x-for="item in suggestions" :key="item.nama">
                <button
                    @click="selectSuggest(item.nama)"
                    class="w-full text-left px-4 py-2 hover:bg-gray-100"
                    x-text="item.nama"></button>
            </template>
        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg">
            Kirim
        </button>

        <!-- POPUP ATTACH -->
        <div
            x-show="attachOpen"
            @click.outside="attachOpen=false"
            class="absolute bottom-16 left-4 bg-white shadow-lg rounded-xl p-3 w-48 space-y-2">
            <button class="w-full flex items-center gap-2 px-3 py-2 hover:bg-gray-100 rounded">
                ➕ Tambah Santri
            </button>

            <button class="w-full flex items-center gap-2 px-3 py-2 hover:bg-gray-100 rounded">
                ✏️ Edit Santri
            </button>

            <button class="w-full flex items-center gap-2 px-3 py-2 hover:bg-gray-100 rounded text-red-600">
                🗑 Hapus Santri
            </button>
        </div>

    </div>

</div>

<?= $this->endSection() ?>