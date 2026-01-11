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
        function chatSantri() {
            return {
                input: '',
                messages: [],
                id: 0,
                mode: null, // null | 'add-santri' | 'add-tag'
                step: 0,

                form: {
                    nama: '',
                    asal_sekolah: '',
                    tempat_lahir: '',
                    tanggal_lahir: '',
                    alamat: '',
                    wali: '',
                    nomor_hp: ''
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
                    this.messages.push({
                        id: ++this.id,
                        from: 'user',
                        text
                    });
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
                },

                checkSantri(nama = null) {
                    const text = nama ?? this.input.trim();
                    if (!text) return;

                    // tampilkan pesan user
                    this.messages.push({
                        id: ++this.id,
                        from: 'user',
                        text
                    });
                    this.input = '';
                    this.suggestions = [];
                    this.scrollToBottom();

                    // fetch ke backend
                    fetch('/api/santri/check', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                nama: text
                            })
                        })
                        .then(res => res.json())
                        .then(res => {
                            if (res.valid) {
                                this.reply(`✅ Santri ditemukan: ${res.data.nama}`);
                            } else {
                                this.reply('❌ Nama santri tidak ditemukan');
                            }
                            this.scrollToBottom();
                        })
                        .catch(err => {
                            console.error(err);
                            this.reply('❌ Terjadi kesalahan saat memeriksa santri');
                            this.scrollToBottom();
                        });
                },

                reply(text) {
                    this.messages.push({
                        id: ++this.id,
                        from: 'bot',
                        text
                    });
                },

                reset() {
                    this.mode = null;
                    this.step = 0;
                    this.form = {
                        nama: '',
                        asal_sekolah: '',
                        tempat_lahir: '',
                        tanggal_lahir: '',
                        alamat: '',
                        wali: '',
                        nomor_hp: ''
                    };
                    this.tagForm = {
                        name: ''
                    };
                },

                // ================= ADD SANTRI =================
                startAddSantri() {
                    this.mode = 'add-santri';
                    this.step = 1;
                    this.reply('Baik, kita tambah santri baru. Siapa nama santrinya?');
                    this.scrollToBottom();
                },

                handleAddSantri(text) {
                    switch (this.step) {
                        case 1:
                            this.form.nama = text;
                            this.step++;
                            this.reply('Asal sekolah santri?');
                            break;
                        case 2:
                            this.form.asal_sekolah = text;
                            this.step++;
                            this.reply('Tempat lahir santri?');
                            break;
                        case 3:
                            this.form.tempat_lahir = text;
                            this.step++;
                            this.reply('Tanggal lahir santri? (YYYY-MM-DD)');
                            break;
                        case 4:
                            this.form.tanggal_lahir = text;
                            this.step++;
                            this.reply('Alamat santri?');
                            break;
                        case 5:
                            this.form.alamat = text;
                            this.step++;
                            this.reply('Nama wali santri?');
                            break;
                        case 6:
                            this.form.wali = text;
                            this.step++;
                            this.reply('Nomor HP wali?');
                            break;
                        case 7:
                            this.form.nomor_hp = text;
                            this.submitSantri();
                            break;
                    }
                    this.scrollToBottom();
                },

                submitSantri() {
                    fetch('/api/santri/store', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(this.form)
                        })
                        .then(r => r.json())
                        .then(r => {
                            this.reply(
                                r.success ?
                                `✅ Santri berhasil ditambahkan\n🆔 NIS: ${r.nis}` :
                                '❌ Gagal menambahkan santri'
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

                    fetch('/api/tag/store', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                name: this.tagForm.name
                            })
                        })
                        .then(r => r.json())
                        .then(r => {
                            this.reply(
                                r.success ?
                                `🏷️ Tag "${this.tagForm.name}" berhasil ditambahkan` :
                                `❌ Gagal menambahkan tag`
                            );
                            this.reset();
                            this.scrollToBottom();
                        });
                },

                // suggestions
                fetchSuggest() {
                    if (this.input.length < 1) {
                        this.suggestions = [];
                        return;
                    }
                    fetch('/api/santri/suggest?q=' + encodeURIComponent(this.input))
                        .then(res => res.json())
                        .then(data => {
                            this.suggestions = Array.isArray(data) ? data : [];
                        });
                },

                selectSuggest(nama) {
                    this.suggestions = [];
                    this.checkSantri(nama);
                }
            }
        }
    </script>

</body>

</html>