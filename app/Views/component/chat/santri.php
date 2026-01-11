<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>

<div
    x-data="chatSantri()"
    class="flex flex-col h-full bg-gray-100">

    <!-- ================= CHAT HEADER ================= -->
    <div class="bg-white border-b px-4 py-3">
        <h2 class="font-semibold text-gray-800 text-sm sm:text-base">
            Ruang Data Santri
        </h2>
        <p class="text-xs text-gray-500">
            Tambah, cek, dan kelola data santri
        </p>
    </div>

    <!-- ================= CHAT BODY ================= -->
    <div
        x-ref="chatBody"
        class="flex-1 overflow-y-auto px-3 sm:px-4 md:px-6 py-4 space-y-3">

        <!-- EMPTY STATE -->
        <template x-if="messages.length === 0">
            <div class="text-center text-gray-400 text-sm mt-10">
                Ketik nama santri atau perintah seperti
                <span class="font-medium text-gray-600">tambah santri</span>
            </div>
        </template>

        <!-- CHAT LOOP -->
        <template x-for="msg in messages" :key="msg.id">
            <div
                class="flex"
                :class="msg.from === 'user' ? 'justify-end' : 'justify-start'">

                <div
                    class="rounded-2xl px-4 py-2 text-sm sm:text-base leading-relaxed shadow
                           max-w-[85%] sm:max-w-[75%] md:max-w-[65%]"
                    :class="msg.from === 'user'
                        ? 'bg-blue-600 text-white rounded-br-md'
                        : 'bg-white text-gray-800 rounded-bl-md'">

                    <span x-text="msg.text"></span>
                </div>
            </div>
        </template>

    </div>

    <!-- ================= CHAT INPUT ================= -->
    <div class="bg-white border-t px-3 sm:px-4 py-3">
        <form
            @submit.prevent="sendMessage"
            class="flex items-end gap-2">

            <!-- QUICK ACTION -->
            <button
                type="button"
                @click="startAddSantri"
                class="text-xl px-2"
                title="Tambah Santri">
                ➕
            </button>

            <!-- INPUT -->
            <input
                x-model="input"
                type="text"
                placeholder="Ketik pesan..."
                class="flex-1 rounded-full border px-4 py-3 text-sm sm:text-base
                       focus:outline-none focus:ring-2 focus:ring-blue-500">

            <!-- SEND -->
            <button
                type="submit"
                class="bg-blue-600 text-white rounded-full px-4 py-3
                       text-sm sm:text-base active:scale-95 transition">
                Kirim
            </button>
        </form>
    </div>

</div>

<?= $this->endSection() ?>