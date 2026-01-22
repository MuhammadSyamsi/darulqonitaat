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

</body>

</html>