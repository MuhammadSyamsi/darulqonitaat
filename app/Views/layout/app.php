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
function chatSantri() {
    return {
        input: '',
        messages: [],
        id: 0,

        mode: null,
        step: 0,

        form: {
            nama: '',
            asal_sekolah: '',
            wali: '',
            hp: ''
        },

        sendMessage() {
            if (!this.input.trim()) return

            const text = this.input.trim()
            this.messages.push({ id: ++this.id, from: 'user', text })
            this.input = ''

            if (this.mode === 'add-santri') {
                this.handleAddSantri(text)
                return
            }

            fetch('/api/santri/check', {
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
                )
            })
        },

        startAddSantri() {
            this.mode = 'add-santri'
            this.step = 1
            this.reply('Baik, siapa nama santrinya?')
        },

        handleAddSantri(text) {
            if (this.step === 1) {
                this.form.nama = text
                this.step++
                this.reply('Asal sekolah santri?')
            } else if (this.step === 2) {
                this.form.asal_sekolah = text
                this.step++
                this.reply('Nama wali santri?')
            } else if (this.step === 3) {
                this.form.wali = text
                this.step++
                this.reply('Nomor HP wali?')
            } else if (this.step === 4) {
                this.form.hp = text
                this.submitSantri()
            }
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
                        ? '✅ Santri berhasil ditambahkan'
                        : '❌ Gagal menambahkan santri'
                )
                this.reset()
            })
        },

        reply(text) {
            this.messages.push({ id: ++this.id, from: 'bot', text })
        },

        reset() {
            this.mode = null
            this.step = 0
            this.form = { nama:'', asal_sekolah:'', wali:'', hp:'' }
        }
    }
}
</script>

</body>
</html>