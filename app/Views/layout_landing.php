<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Ma\'had Tahfidz Putri'; ?></title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- AOS Animate on Scroll -->
    <link href="https://unpkg.com/aos@next/dist/aos.css" rel="stylesheet">
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- HEADER -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto flex items-center justify-between p-4">
            <!-- Logo -->
            <a href="<?= base_url(); ?>" class="text-2xl font-serif text-emerald-600 font-bold">Ma'had Tahfidz</a>

            <!-- Navbar Desktop -->
            <nav class="hidden md:flex space-x-6">
                <a href="<?= base_url(); ?>" class="hover:text-emerald-600 transition">Profil</a>
                <a href="<?= base_url('dq/pengembangan'); ?>" class="hover:text-emerald-600 transition">Pengembangan</a>
                <a href="<?= base_url('dq/psb'); ?>" class="hover:text-emerald-600 transition">PSB</a>
            </nav>

            <!-- Mobile menu toggle -->
            <div x-data="{ open: false }" class="md:hidden">
                <button @click="open = !open" class="p-2 border rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <nav x-show="open" x-transition class="absolute left-0 right-0 bg-white shadow-md mt-2 rounded-md py-2 flex flex-col space-y-2">
                    <a href="<?= base_url(); ?>" class="px-4 py-2 hover:bg-gray-100 transition">Profil</a>
                    <a href="<?= base_url('pengembangan'); ?>" class="px-4 py-2 hover:bg-gray-100 transition">Pengembangan</a>
                    <a href="<?= base_url('psb'); ?>" class="px-4 py-2 hover:bg-gray-100 transition">PSB</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="container mx-auto my-8 px-4">
        <?= $this->renderSection('konten'); ?>
    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t mt-12">
        <div class="container mx-auto py-6 text-center text-gray-600">
            <p>© <?= date('Y'); ?> Ma'had Tahfidz Putri. All Rights Reserved.</p>
            <div class="flex justify-center space-x-4 mt-2">
                <a href="#" class="hover:text-emerald-600 transition">Instagram</a>
                <a href="#" class="hover:text-emerald-600 transition">Facebook</a>
                <a href="#" class="hover:text-emerald-600 transition">TikTok</a>
            </div>
        </div>
    </footer>

    <!-- Alpine -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>

    <!-- Custom JS (ABSOLUTE PATH) -->
    <script src="/assets/js/main.js"></script>

</body>

</html>