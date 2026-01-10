<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Chat App') ?></title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine JS -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100 h-screen overflow-hidden">

    <div class="flex h-full" x-data="{ mobileMenu: null }">

        <!-- DASHBOARD (DESKTOP ONLY) -->
        <aside class="hidden md:block w-64 bg-white border-r">
            <?= $this->include('pages/dashboard') ?>
        </aside>

        <!-- CHAT (ALWAYS VISIBLE) -->
        <main class="flex-1 flex flex-col">
            <?= $this->renderSection('content') ?>
        </main>

        <!-- LAPORAN (DESKTOP ONLY) -->
        <aside class="hidden md:block w-80 bg-white border-l overflow-y-auto">
            <?= $this->include('pages/laporan') ?>
        </aside>

        <!-- MOBILE NAVIGATION -->
        <nav class="fixed bottom-0 left-0 right-0 bg-white border-t md:hidden">
            <div class="flex justify-around text-center">
                <button
                    @click="mobileMenu='dashboard'"
                    class="flex-1 py-3 text-sm">
                    📂
                    <div>Dashboard</div>
                </button>

                <button
                    @click="mobileMenu='chat'"
                    class="flex-1 py-3 text-sm">
                    💬
                    <div>Chat</div>
                </button>

                <button
                    @click="mobileMenu='laporan'"
                    class="flex-1 py-3 text-sm">
                    📊
                    <div>Laporan</div>
                </button>
            </div>
        </nav>

        <!-- MOBILE DRAWER DASHBOARD -->
        <div
            x-show="mobileMenu === 'dashboard'"
            @click.self="mobileMenu=null"
            class="fixed inset-0 bg-black/40 md:hidden">
            <aside class="bg-white w-64 h-full">
                <?= $this->include('pages/dashboard') ?>
            </aside>
        </div>

        <!-- MOBILE DRAWER LAPORAN -->
        <div
            x-show="mobileMenu === 'laporan'"
            @click.self="mobileMenu=null"
            class="fixed inset-0 bg-black/40 md:hidden">
            <aside class="bg-white w-80 h-full ml-auto">
                <?= $this->include('pages/laporan') ?>
            </aside>
        </div>

    </div>

    <script>
        function chatSantri() {
            return {
                input: '',
                messages: [],
                suggestions: [],
                attachOpen: false,
                id: 0,

                mode: null, // null | 'add-santri'
                step: 0,
                form: {
                    nama: '',
                    nis: '',
                    asal_sekolah: '',
                    wali: '',
                    hp: ''
                },

                startAddSantri() {
                    this.attachOpen = false;
                    this.mode = 'add-santri';
                    this.step = 1;

                    this.messages.push({
                        id: ++this.id,
                        from: 'bot',
                        text: 'Baik, kita tambah santri baru. Siapa nama santrinya?'
                    });
                },

                sendMessage() {
                    if (!this.input.trim()) return;
                    const text = this.input.trim();

                    this.messages.push({
                        id: ++this.id,
                        from: 'user',
                        text
                    });

                    this.input = '';

                    // MODE TAMBAH SANTRI
                    if (this.mode === 'add-santri') {
                        this.handleAddSantri(text);
                        return;
                    }

                    // MODE NORMAL (cek santri)
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
                            this.messages.push({
                                id: ++this.id,
                                from: 'bot',
                                text: res.valid ?
                                    'Santri ditemukan. Mau diedit?' : 'Nama santri tidak ditemukan'
                            });
                        });
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
                },

                reply(text) {
                    this.messages.push({
                        id: ++this.id,
                        from: 'bot',
                        text
                    });
                },

                submitSantri() {
                    fetch('/api/santri/store', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(this.form)
                        })
                        .then(res => res.json())
                        .then(res => {
                            this.reply(
                                res.success ?
                                '✅ Santri berhasil ditambahkan' :
                                '❌ Gagal menambahkan santri'
                            );

                            // reset
                            this.mode = null;
                            this.step = 0;
                            this.form = {
                                nama: '',
                                nis: '',
                                asal_sekolah: '',
                                wali: '',
                                hp: ''
                            };
                        });
                }
            }
        }
    </script>

</body>

</html>