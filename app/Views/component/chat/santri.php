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
        <template x-for="(msg, index) in messages" :key="msg.id">
            <div class="space-y-2">

                <!-- CHAT BUBBLE -->
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

                <!-- ================= ACTION PILLS ================= -->
                <template
                    x-if="
                        msg.from === 'bot'
                        && showActionPills
                        && activeSantri
                        && index === messages.length - 1
                    ">
                    <div class="flex gap-2 ml-2 flex-wrap text-xs">

                        <!-- LIHAT -->
                        <button
                            @click="lihatSantri()"
                            class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 hover:bg-blue-200 transition">
                            👁️ Lihat
                        </button>

                        <!-- HAPUS -->
                        <button
                            @click="konfirmasiHapus()"
                            class="px-3 py-1 rounded-full bg-red-100 text-red-700 hover:bg-red-200 transition">
                            🗑️ Hapus
                        </button>

                        <!-- TAMBAH TAG -->
                        <button
                            @click="startAddTagToSantri()"
                            class="px-3 py-1 rounded-full bg-green-100 text-green-700 hover:bg-green-200 transition">
                            ➕
                        </button>

                        <!-- TAG (jika ada) -->
                        <template x-if="activeSantri.tags?.length">
                            <button
                                class="px-3 py-1 rounded-full bg-gray-100 text-gray-600">
                                🏷️ Tag
                            </button>
                        </template>
                    </div>
                </template>

                <!-- ================= TAG PILLS ================= -->
                <template
                    x-if="
                        tagMode
                        && availableTags.length
                        && msg.from === 'bot'
                        && index === messages.length - 1
                    ">
                    <div class="flex gap-2 ml-2 flex-wrap text-xs">
                        <template x-for="tag in availableTags" :key="tag.id">
                            <button
                                @click="pilihTag(tag)"
                                class="px-3 py-1 rounded-full
                                    bg-emerald-100 text-emerald-700
                                    hover:bg-emerald-200 transition">
                                🏷️ <span x-text="tag.name"></span>
                            </button>
                        </template>
                    </div>
                </template>                

                <!-- ================= SELESAI TAG ================= -->
                <template
                    x-if="
                        showFinishPill
                        && msg.from === 'bot'
                        && index === messages.length - 1
                    ">
                    <div class="flex gap-2 ml-2 text-xs">
                        <button
                            @click="selesaiTambahTag()"
                            class="px-3 py-1 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 transition">
                            ✅ Selesai
                        </button>
                    </div>
                </template>

            </div>
        </template>
    </div>

    <!-- ================= CHAT INPUT + FOOTER ================= -->
    <div class="bg-gray-50 border-t px-3 sm:px-4 py-3 mb-20">

    <!-- SUGGESTION PILLS -->
            <div
                x-show="suggestions.length"
                class="flex flex-wrap gap-2 mb-2 px-1">

                <template x-for="item in suggestions" :key="item.id">
                    <button
                        type="button"
                        @click="sendFromSuggestion(item.nama)"
                        class="px-3 py-1 text-xs rounded-full
                            bg-blue-100 text-blue-700
                            hover:bg-blue-200
                            transition">
                        <span x-text="item.nama"></span>
                    </button>
                </template>
            </div>

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
                       w-44 text-sm overflow-hidden z-10">

                    <button
                        type="button"
                        @click="startAddSantri(); open = false"
                        class="w-full text-left px-4 py-2 hover:bg-gray-100">
                        ➕ Tambah Santri
                    </button>

                    <button
                        type="button"
                        @click="startAddTag(); open = false"
                        class="w-full text-left px-4 py-2 hover:bg-gray-100">
                        🏷️ Tambah Tag
                    </button>
                </div>
            </div>

            <!-- INPUT CHAT ala ChatGPT syar’i -->
            <input
                x-model="input"
                type="text"
                @input.debounce.300ms="fetchSuggest"
                @keydown.enter.prevent="sendMessage()"
                placeholder="Ketik pesan..."
                class="flex-1 rounded-full border border-gray-300
                   bg-gray-100 text-gray-800 px-4 py-3
                   shadow-sm focus:outline-none focus:ring-2
                   focus:ring-blue-300 placeholder-gray-400
                   transition duration-150">

            <!-- SEND BUTTON -->
            <button
                type="button"
                class="bg-green-900 text-white rounded-full
                   px-4 py-3 text-sm sm:text-base
                   active:scale-95 transition"
                @click="sendMessage()">
                Kirim
            </button>
        </form>

        <!-- FOOTER -->
        <div class="mt-2 mb-5 text-center text-[10px] sm:text-xs text-gray-500 select-none">
            desain by Muhammad Syamsi @2025
        </div>
    </div>

</div>

<script>
function chatSantri() {
    return {
        /* ================= STATE UTAMA ================= */
        input: '',
        messages: [],
        suggestions: [],
        availableTags: [],
        id: 0,

        mode: null,          // null | add-santri
        step: 0,

        activeSantri: null,  // santri terpilih
        showActionPills: false,

        tagMode: false,
        showFinishPill: false,

        /* ================= FORM ================= */
        form: {
            nama: '',
            asal_sekolah: '',
            tempat_lahir: '',
            tanggal_lahir: '',
            alamat: '',
            wali: '',
            nomor_hp: ''
        },

        resetTagMode() {
            this.tagMode = false;
            this.showFinishPill = false;
            this.availableTags = [];
            this.showActionPills = true;
        },

        /* ================= UTIL ================= */
        scrollToBottom() {
            this.$nextTick(() => {
                const el = this.$refs.chatBody;
                if (el) el.scrollTop = el.scrollHeight;
            });
        },

        pushUser(text) {
            this.messages.push({
                id: ++this.id,
                from: 'user',
                text
            });
            this.scrollToBottom();
        },

        reply(text) {
            this.messages.push({
                id: ++this.id,
                from: 'bot',
                text
            });
            this.scrollToBottom();
        },

        resetContext() {
            this.mode = null;
            this.step = 0;
            this.tagMode = false;
            this.showFinishPill = false;
            this.showActionPills = false;
        },

        /* ================= SEND MESSAGE ================= */
        sendMessage(text = null) {
            const msg = (text ?? this.input).trim();
            if (!msg) return;

            this.pushUser(msg);
            this.input = '';
            this.suggestions = [];

            if (this.tagMode) {
                this.addTagToSantri(msg);
                return;
            }

            if (this.mode === 'add-santri') {
                this.handleAddSantri(msg);
                return;
            }

            this.checkSantri(msg);
        },

        /* ================= SUGGESTION ================= */
        fetchSuggest() {
            if (this.mode || this.tagMode || this.input.length < 1) {
                this.suggestions = [];
                return;
            }

            fetch('/api/santri/suggest?q=' + encodeURIComponent(this.input))
                .then(r => r.json())
                .then(d => this.suggestions = Array.isArray(d) ? d : []);
        },

        sendFromSuggestion(nama) {
            this.suggestions = [];
            this.sendMessage(nama);
        },

        /* ================= CEK SANTRI ================= */
        checkSantri(nama) {
            fetch('/api/santri/check', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ nama })
            })
            .then(r => r.json())
            .then(r => {
                if (r.valid) {
                    this.activeSantri = r.data;
                    this.reply(`✅ Santri ditemukan: ${r.data.nama}`);
                    this.showActionPills = true;
                } else {
                    this.reply('❌ Nama santri tidak ditemukan');
                }
            })
            .catch(() => this.reply('❌ Terjadi kesalahan'));
        },

        /* ================= ACTION PILLS ================= */
        lihatSantri() {
            const s = this.activeSantri;
            if (!s) return;

            let t = `📄 Lihat detail data santri:\n\n`;
            t += `Nama: ${s.nama}\n`;
            t += `Alamat: ${s.alamat}\n`;
            t += `Asal Sekolah: ${s.asal_sekolah}\n`;
            t += `TTL: ${s.tempat_lahir}, ${s.tanggal_lahir}\n`;
            t += `Wali: ${s.wali}\n`;
            t += `No HP: ${s.nomor_hp}\n`;

            if (s.tags?.length) {
                t += `\n🏷️ Tag:\n- ` + s.tags.map(t => t.name).join('\n- ');
            } else {
                t += `\n🏷️ Tag: (belum ada)`;
            }

            this.reply(t);
        },

        konfirmasiHapus() {
            if (!this.activeSantri) return;

            if (!confirm(`Apakah yakin akan menghapus data ${this.activeSantri.nama}?`)) {
                return;
            }

            fetch('/api/santri/delete', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: this.activeSantri.id })
            })
            .then(r => r.json())
            .then(r => {
                this.reply(
                    r.success
                        ? `🗑️ Data ${this.activeSantri.nama} berhasil dihapus`
                        : `❌ Gagal menghapus data`
                );
                this.activeSantri = null;
                this.showActionPills = false;
            });
        },

        addTagToSantri(tag) {
            fetch('/api/santri/tag/add', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    santri_id: this.activeSantri.id,
                    tag
                })
            })
            .then(r => r.json())
            .then(r => {
                if (r.success) {
                    this.reply(`🏷️ Tag "${tag}" ditambahkan`);
                    this.reply('Masukkan tag baru atau selesai');
                    this.showFinishPill = true;
                } else {
                    this.reply('❌ Gagal menambahkan tag');
                    this.resetTagMode(); // ⬅️ KEMBALI KE AWAL
                }
            })
            .catch(() => {
                this.reply('❌ Gagal menambahkan tag');
                this.resetTagMode(); // ⬅️ KEMBALI KE AWAL
            });
        },

        addTagToSantri(tag) {
            fetch('/api/santri/tag/add', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    santri_id: this.activeSantri.id,
                    tag
                })
            })
            .then(r => r.json())
            .then(r => {
                if (r.success) {
                    this.reply(`🏷️ Tag "${tag}" ditambahkan`);
                    this.reply('Masukkan tag baru atau selesai');
                    this.showFinishPill = true;
                } else {
                    this.reply('❌ Gagal menambahkan tag');
                }
            });
        },

        pilihTag(tag) {
            fetch('/api/santri/tag/attach', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    santri_id: this.activeSantri.id,
                    tag_id: tag.id
                })
            })
            .then(r => r.json())
            .then(r => {
                if (r.success) {
                    this.reply(`🏷️ Tag "${tag.name}" ditambahkan`);
                    this.showFinishPill = true;
                } else {
                    this.reply('❌ Gagal menambahkan tag');
                    this.resetTagMode(); // ⬅️ KEMBALI KE AWAL
                }
            })
            .catch(() => {
                this.reply('❌ Gagal menambahkan tag');
                this.resetTagMode(); // ⬅️ KEMBALI KE AWAL
            });
        },

        selesaiTambahTag() {
            this.tagMode = false;
            this.showFinishPill = false;
            this.showActionPills = true;
            this.availableTags = [];
            this.reply('✅ Penambahan tag selesai');
        },

        /* ================= TAMBAH SANTRI ================= */
        startAddSantri() {
            this.resetContext();
            this.mode = 'add-santri';
            this.step = 1;
            this.reply('Baik, kita tambah santri baru. Siapa nama santrinya?');
        },

        handleAddSantri(text) {
            const f = this.form;

            const steps = {
                1: () => { f.nama = text; this.reply('Asal sekolah?'); },
                2: () => { f.asal_sekolah = text; this.reply('Tempat lahir?'); },
                3: () => { f.tempat_lahir = text; this.reply('Tanggal lahir (YYYY-MM-DD)?'); },
                4: () => { f.tanggal_lahir = text; this.reply('Alamat?'); },
                5: () => { f.alamat = text; this.reply('Nama wali?'); },
                6: () => { f.wali = text; this.reply('Nomor HP wali?'); },
                7: () => { f.nomor_hp = text; this.submitSantri(); }
            };

            steps[this.step]?.();
            this.step++;
        },

        submitSantri() {
            fetch('/api/santri/store', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(this.form)
            })
            .then(r => r.json())
            .then(r => {
                this.reply(
                    r.success
                        ? `✅ Santri berhasil ditambahkan\n🆔 NIS: ${r.nis}`
                        : `❌ Gagal menambahkan santri`
                );
                this.resetContext();
            });
        }
    }
}
</script>

<?= $this->endSection() ?>