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
                replies: [],
                suggestions: [],
                attachOpen: false,
                id: 0,

                fetchSuggest() {
                    if (this.input.length < 2) {
                        this.suggestions = [];
                        return;
                    }

                    fetch(`/api/santri/suggest?q=${this.input}`)
                        .then(res => res.json())
                        .then(data => this.suggestions = data);
                },

                selectSuggest(nama) {
                    this.input = nama;
                    this.suggestions = [];
                    this.sendMessage();
                },

                sendMessage() {
                    if (!this.input.trim()) return;

                    const text = this.input.trim();

                    // tampilkan pesan user
                    this.messages.push({
                        id: ++this.id,
                        text: text
                    });

                    // cek nama santri via backend (simple rule)
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
                            if (!res.valid) {
                                this.replies.push({
                                    id: ++this.id,
                                    text: 'Masukkan nama lengkap santri'
                                });
                            }
                        });

                    this.input = '';
                    this.suggestions = [];
                }
            }
        }
    </script>

</body>

</html>