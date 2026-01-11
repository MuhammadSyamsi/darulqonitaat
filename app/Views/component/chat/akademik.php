<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>

<div
    x-data="chatAkademik()"
    class="flex flex-col h-full bg-gray-100">

    <!-- ================= CHAT HEADER ================= -->
    <div class="bg-white border-b px-4 py-3">
        <h2 class="font-semibold text-gray-800 text-sm sm:text-base">
            Ruang Data Akademik
        </h2>
        <p class="text-xs text-gray-500">
            Tambah, cek, dan kelola data akademik santri
        </p>
    </div>

    <!-- ================= CHAT BODY ================= -->
    <div
        x-ref="chatBody"
        class="flex-1 overflow-y-auto px-3 sm:px-4 md:px-6 py-4 space-y-3">

        <!-- EMPTY STATE -->
        <template x-if="messages.length === 0">
            <div class="text-center text-gray-400 text-sm mt-10">
                Ketik perintah seperti
                <span class="font-medium text-gray-600">tambah nilai</span>
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

                    <!-- OPTIONAL: badge untuk jenis data akademik -->
                    <template x-if="msg.type">
                        <span
                            class="ml-2 inline-block px-2 py-0.5 text-xs rounded-full
                                   bg-gray-200 text-gray-700"
                            x-text="msg.type">
                        </span>
                    </template>

                </div>
            </div>
        </template>

    </div>

<!-- ================= CHAT INPUT + FOOTER ================= -->
<div class="bg-gray-50 border-t px-3 sm:px-4 py-3">
    <form
        @submit.prevent="sendMessage"
        class="flex items-center gap-2 relative"
        x-data="{ open: false }">

        <!-- ADD BUTTON -->
        <div class="relative">
            <button
                type="button"
                @click="open = !open"
                class="w-10 h-10 sm:w-11 sm:h-11
                       rounded-full border flex items-center justify-center
                       text-lg hover:bg-gray-200 transition"
                title="Menu Tambah">
                ➕
            </button>

            <!-- DROPDOWN -->
            <div
                x-show="open"
                @click.outside="open = false"
                x-transition
                class="absolute bottom-full mb-2 left-0
                       bg-white border rounded-xl shadow-lg
                       w-48 text-sm overflow-hidden z-10">

                <button
                    type="button"
                    @click="startAddNilai(); open = false"
                    class="w-full text-left px-4 py-2 hover:bg-gray-100">
                    ➕ Tambah Nilai
                </button>

                <button
                    type="button"
                    @click="startAddMapel(); open = false"
                    class="w-full text-left px-4 py-2 hover:bg-gray-100">
                    📚 Tambah Mata Pelajaran
                </button>

                <button
                    type="button"
                    @click="startAddKelas(); open = false"
                    class="w-full text-left px-4 py-2 hover:bg-gray-100">
                    🏫 Tambah Kelas
                </button>
            </div>
        </div>

        <!-- INPUT CHAT ala ChatGPT -->
        <input
            x-model="input"
            type="text"
            placeholder="Ketik perintah akademik..."
            class="flex-1 rounded-full border border-gray-300
                   bg-gray-100 text-gray-800 px-4 py-3
                   shadow-sm focus:outline-none focus:ring-2
                   focus:ring-blue-300 placeholder-gray-400
                   transition duration-150">

        <!-- SEND BUTTON -->
        <button
            type="submit"
            class="bg-blue-400 text-white rounded-full
                   px-4 py-3 text-sm sm:text-base
                   active:scale-95 transition">
            Kirim
        </button>
    </form>

    <!-- FOOTER -->
    <div class="mt-2 mb-5 text-center text-[10px] sm:text-xs text-gray-500 select-none">
        desain by Muhammad Syamsi @2025
    </div>
</div>

</div>

<?= $this->endSection() ?>