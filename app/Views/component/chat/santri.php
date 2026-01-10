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
    <div
        id="chat-body"
        class="flex-1 p-4 overflow-y-auto space-y-4 bg-gray-50">

        <!-- PESAN AWAL (BOT) -->
        <div class="flex gap-2">
            <div class="bg-white px-4 py-2 rounded-lg shadow max-w-md">
                <p class="text-sm text-gray-800">
                    <?= $santri
                        ? 'Belum ada data. Tambahkan data santri terlebih dahulu'
                        : 'Mau apa hari ini?'
                    ?>
                </p>

            </div>
        </div>

        <!-- CHAT LOOP -->
        <template x-for="msg in messages" :key="msg.id">
            <div
                :class="msg.from === 'user'
                    ? 'flex justify-end gap-2'
                    : 'flex gap-2'">

                <div
                    :class="msg.from === 'user'
                        ? 'bg-blue-500 text-white px-4 py-2 rounded-lg shadow max-w-md'
                        : 'bg-white text-gray-800 px-4 py-2 rounded-lg shadow max-w-md'">

                    <span x-text="msg.text"></span>
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
            class="absolute bottom-16 left-4 right-4 bg-white shadow rounded-lg divide-y z-40">
            <template x-for="item in suggestions" :key="item.nama">
                <button
                    @click="selectSuggest(item.nama)"
                    class="w-full text-left px-4 py-2 hover:bg-gray-100"
                    x-text="item.nama"></button>
            </template>
        </div>

        <button
            @click="sendMessage"
            class="bg-blue-500 text-white px-4 py-2 rounded-lg">
            Kirim
        </button>

        <!-- POPUP ATTACH -->
        <div
            x-show="attachOpen"
            @click.outside="attachOpen=false"
            class="absolute z-50 bottom-16 left-4 bg-white shadow-lg rounded-xl p-3 w-52 space-y-2">

            <button
                @click="startAddSantri"
                class="w-full flex items-center gap-2 px-3 py-2 hover:bg-gray-100 rounded">
                ➕ Tambah Santri
            </button>

            <button
                class="w-full flex items-center gap-2 px-3 py-2 hover:bg-gray-100 rounded text-indigo-600">
                🏷️ Tambah Tag
            </button>
        </div>

    </div>

</div>

<?= $this->endSection() ?>