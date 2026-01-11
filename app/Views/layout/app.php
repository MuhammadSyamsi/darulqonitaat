<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Chat Santri') ?></title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100 h-screen overflow-hidden">

<div
    x-data="{
        mobileMenu: null // null | 'dashboard' | 'laporan'
    }"
    class="flex h-full">

    <!-- ================= SIDEBAR DESKTOP ================= -->
    <aside class="hidden lg:flex w-64 bg-white border-r flex-col">
        <?= $this->include('pages/dashboard') ?>
    </aside>

    <!-- ================= MAIN CHAT ================= -->
    <main class="flex-1 flex flex-col relative">

        <!-- HEADER -->
        <header class="bg-white border-b px-4 py-3 flex items-center justify-between lg:hidden">
            <button @click="mobileMenu='dashboard'" class="text-xl">📂</button>
            <h1 class="font-semibold text-gray-800 text-sm">
                Ruang Data Santri
            </h1>
            <button @click="mobileMenu='laporan'" class="text-xl">📊</button>
        </header>

        <!-- CONTENT -->
        <section class="flex-1 overflow-y-auto">
            <?= $this->renderSection('content') ?>
        </section>

        <!-- BOTTOM NAV (MOBILE + TABLET) -->
        <nav class="lg:hidden border-t bg-white">
            <div class="flex text-center text-xs font-medium">
                <button
                    @click="mobileMenu='dashboard'"
                    class="flex-1 py-4"
                    :class="mobileMenu==='dashboard' ? 'text-blue-600' : 'text-gray-500'">
                    📂
                    <div>Dashboard</div>
                </button>
                <button
                    @click="mobileMenu=null"
                    class="flex-1 py-4 text-blue-600">
                    💬
                    <div>Chat</div>
                </button>
                <button
                    @click="mobileMenu='laporan'"
                    class="flex-1 py-4"
                    :class="mobileMenu==='laporan' ? 'text-blue-600' : 'text-gray-500'">
                    📊
                    <div>Laporan</div>
                </button>
            </div>
        </nav>

    </main>

    <!-- ================= LAPORAN DESKTOP ================= -->
    <aside class="hidden lg:block w-80 bg-white border-l overflow-y-auto">
        <?= $this->include('pages/laporan') ?>
    </aside>

    <!-- ================= DRAWER DASHBOARD (MOBILE/TABLET) ================= -->
    <div
        x-show="mobileMenu==='dashboard'"
        x-transition
        @click.self="mobileMenu=null"
        class="fixed inset-0 bg-black/40 z-40 lg:hidden">
        <aside class="bg-white w-72 sm:w-80 h-full">
            <?= $this->include('pages/dashboard') ?>
        </aside>
    </div>

    <!-- ================= DRAWER LAPORAN (MOBILE/TABLET) ================= -->
    <div
        x-show="mobileMenu==='laporan'"
        x-transition
        @click.self="mobileMenu=null"
        class="fixed inset-0 bg-black/40 z-40 lg:hidden">
        <aside class="bg-white w-80 h-full ml-auto">
            <?= $this->include('pages/laporan') ?>
        </aside>
    </div>

</div>

<!-- ================= CHAT LOGIC ================= -->
<script>
    const baseUrl = "<?= base_url() ?>";

    function chatSantri() {
        return {
            // ===== STATE =====
            input: '',
            messages: [],
            id: 0,

            // mode: null | 'add-santri' | 'add-tag'
            mode: null,
            step: 0,

            // form data
            form: {
                nama: '',
                asal_sekolah: '',
                wali: '',
                hp: ''
            },

            tagForm: {
                name: ''
            },

            // ===== AUTO SCROLL =====
            scrollToBottom() {
                this.$nextTick(() => {
                    const el = this.$refs.chatBody;
                    if (el) el.scrollTop = el.scrollHeight;
                });
            },

            // ===== SEND MESSAGE =====
            sendMessage() {
                if (!this.input.trim()) return;

                const text = this.input.trim();
                this.messages.push({ id: ++this.id, from: 'user', text });
                this.input = '';
                this.scrollToBottom();

                // MODE TAMBAH SANTRI
                if (this.mode === 'add-santri') {
                    this.handleAddSantri(text);
                    return;
                }

                // MODE TAMBAH TAG
                if (this.mode === 'add-tag') {
                    this.handleAddTag(text);
                    return;
                }

                // NORMAL CHECK SANTRI
                fetch('${baseUrl}/api/santri/check', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ nama: text })
                })
                .then(r => r.json())
                .then(r => {
                    this.reply(
                        r.valid
                            ? 'Santri ditemukan. Mau diedit?'
                            : 'Nama santri tidak ditemukan'
                    );
                    this.scrollToBottom();
                });
            },

            // ===== REPLY BOT =====
            reply(text) {
                this.messages.push({ id: ++this.id, from: 'bot', text });
            },

            // ===== RESET STATE =====
            reset() {
                this.mode = null;
                this.step = 0;
                this.form = { nama:'', asal_sekolah:'', wali:'', hp:'' };
                this.tagForm = { name: '' };
            },

            // ================= ADD SANTRI =================
            startAddSantri() {
                this.mode = 'add-santri';
                this.step = 1;
                this.reply('Baik, kita tambah santri baru. Siapa nama santrinya?');
                this.scrollToBottom();
            },

            handleAddSantri(text) {
                if (this.step === 1) {
                    this.form.nama = text;
                    this.step++;
                    this.reply('Asal sekolah santri?');
                } else if (this.step === 2) {
                    this.form.asal_sekolah = text;
                    this.step++;
                    this.reply('Nama wali santri?');
                } else if (this.step === 3) {
                    this.form.wali = text;
                    this.step++;
                    this.reply('Nomor HP wali?');
                } else if (this.step === 4) {
                    this.form.hp = text;
                    this.submitSantri();
                }
                this.scrollToBottom();
            },

            submitSantri() {
                fetch('${baseUrl}/api/santri/store', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(this.form)
                })
                .then(r => r.json())
                .then(r => {
                    this.reply(
                        r.success
                            ? `✅ Santri berhasil ditambahkan\n🆔 NIS: ${r.nis}`
                            : '❌ Gagal menambahkan santri'
                    );
                    this.reset();
                    this.scrollToBottom();
                });
            },

            // ================= ADD TAG =================
            startAddTag() {
                this.mode = 'add-tag';
                this.step = 1;
                this.reply('Silakan ketik nama tag yang ingin ditambahkan.');
                this.scrollToBottom();
            },

            handleAddTag(text) {
                this.tagForm.name = text;

                fetch('${baseUrl}/api/tag/store', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ name: this.tagForm.name })
                })
                .then(r => r.json())
                .then(r => {
                    this.reply(
                        r.success
                            ? `🏷️ Tag "${this.tagForm.name}" berhasil ditambahkan`
                            : `❌ Gagal menambahkan tag`
                    );
                    this.reset();
                    this.scrollToBottom();
                });
            }
        }
    }
</script>

</body>
</html>