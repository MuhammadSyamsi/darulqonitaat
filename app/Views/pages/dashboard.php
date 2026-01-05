<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div x-data="{ navOpen:false, menu:'santri', tab:'chat' }" class="h-screen flex flex-col lg:hidden">

    <!-- Header -->
    <header class="bg-teal-700 px-4 py-3 flex items-center justify-between">
        <button @click="navOpen=true">☰</button>
        <h1 class="font-semibold capitalize" x-text="menu"></h1>
        <span></span>
    </header>

    <!-- Content -->
    <main class="flex-1 overflow-y-auto pb-16">
        <template x-if="menu==='santri'">
            <?= view('santri') ?>
        </template>
    </main>

    <!-- Bottom Navigation -->
    <nav class="fixed bottom-0 inset-x-0 bg-slate-900 border-t border-white/10 flex">
        <button class="flex-1 py-2 text-xs" @click="tab='chat'">💬<br>Chat</button>
        <button class="flex-1 py-2 text-xs" @click="tab='group'">📊<br>Laporan</button>
        <button class="flex-1 py-2 text-xs" @click="tab='detail'">📑<br>Detail</button>
    </nav>

    <!-- Drawer Nav -->
    <aside x-show="navOpen" x-transition class="fixed inset-y-0 left-0 w-64 bg-slate-900 z-50">
        <div class="p-4 font-semibold">Menu</div>
        <ul class="px-2 space-y-1">
            <li><button @click="menu='santri';navOpen=false" class="w-full text-left px-3 py-2 rounded hover:bg-white/10">Santri</button></li>
            <li><button class="w-full text-left px-3 py-2 rounded hover:bg-white/10">Akademik</button></li>
            <li><button class="w-full text-left px-3 py-2 rounded hover:bg-white/10">Keuangan</button></li>
            <li><button class="w-full text-left px-3 py-2 rounded hover:bg-white/10">Tahfidz</button></li>
            <li><button class="w-full text-left px-3 py-2 rounded hover:bg-white/10">Asrama</button></li>
        </ul>
    </aside>
</div>

<?= $this->endSection() ?>