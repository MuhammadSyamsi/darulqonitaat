<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Muhammad Syamsi - Freelancer IT & Web Developer</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            poppins: ['Poppins', 'sans-serif'],
          },
          colors: {
            primary: '#667eea',
            secondary: '#764ba2',
          }
        }
      }
    }
  </script>
</head>

<body class="font-poppins bg-gray-100 text-gray-800 scroll-smooth">

<!-- ================= NAVBAR ================= -->
<nav class="fixed top-0 inset-x-0 z-50 bg-white/90 backdrop-blur shadow">
  <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
    <div class="text-2xl font-bold text-primary">MS</div>

    <!-- Desktop Menu -->
    <ul class="hidden md:flex gap-6 font-medium">
      <li><a href="#home" class="hover:text-primary">Home</a></li>
      <li><a href="#about" class="hover:text-primary">About</a></li>
      <li><a href="#skills" class="hover:text-primary">Skills</a></li>
      <li><a href="#portfolio" class="hover:text-primary">Portfolio</a></li>
      <li><a href="#experience" class="hover:text-primary">Experience</a></li>
      <li><a href="#contact" class="hover:text-primary">Contact</a></li>
    </ul>

    <!-- Mobile Button -->
    <button id="menuBtn" class="md:hidden text-2xl">☰</button>
  </div>

  <!-- Mobile Menu -->
  <div id="mobileMenu" class="hidden md:hidden bg-white border-t">
    <ul class="flex flex-col px-6 py-4 gap-3 font-medium">
      <li><a href="#home" class="block">Home</a></li>
      <li><a href="#about" class="block">About</a></li>
      <li><a href="#skills" class="block">Skills</a></li>
      <li><a href="#portfolio" class="block">Portfolio</a></li>
      <li><a href="#experience" class="block">Experience</a></li>
      <li><a href="#contact" class="block">Contact</a></li>
    </ul>
  </div>
</nav>

<!-- ================= HERO ================= -->
<section id="home" class="min-h-screen flex items-center bg-gradient-to-br from-primary to-secondary pt-24">
  <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 px-6 items-center">
    <div class="text-white">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">Muhammad Syamsi</h1>
      <h2 class="text-xl mb-4 text-indigo-100">Freelancer IT & Web Developer</h2>
      <p class="mb-8 text-indigo-100 leading-relaxed">
        Fokus pada pengembangan website dan sistem informasi menggunakan CodeIgniter 4.
      </p>
      <div class="flex gap-4 flex-wrap">
        <a href="#contact" class="bg-white text-primary px-6 py-3 rounded-lg font-semibold">Contact Me</a>
        <a href="#portfolio" class="border border-white px-6 py-3 rounded-lg font-semibold">Portfolio</a>
      </div>
    </div>

    <div class="flex justify-center">
      <img src="<?= base_url('assets/img/illustrasi.png'); ?>"
           class="max-w-md w-full rounded-2xl shadow-lg">
    </div>
  </div>
</section>

<!-- ================= ABOUT ================= -->
<section id="about" class="bg-white py-20">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-center mb-12">Tentang Saya</h2>

    <div class="grid md:grid-cols-[300px_1fr] gap-10 items-center">
      <div class="bg-gradient-to-br from-primary to-secondary rounded-2xl h-72 flex items-center justify-center text-white text-6xl font-bold">
        MS
      </div>
      <div>
        <h3 class="text-2xl font-semibold mb-4">Profile</h3>
        <p class="leading-relaxed text-gray-600 whitespace-pre-line">
Saya Muhammad Syamsi, seorang Freelance IT dengan fokus pengembangan web menggunakan CodeIgniter 4.

• Guru TKJ & Multimedia (media pembelajaran PC & Android)
• Admin support perusahaan (administrasi & office)
• Developer sistem informasi Pondok Darul Hijrah Pandaan
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ================= SKILLS ================= -->
<section id="skills" class="py-20 bg-gray-100">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-center mb-12">Keahlian</h2>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

      <div class="bg-white p-6 rounded-xl shadow text-center">
        <div class="text-4xl mb-3">💻</div>
        <h3 class="font-semibold text-lg">Web Programming</h3>
        <p class="text-sm text-gray-500">PHP, HTML, CSS, JavaScript</p>
      </div>

      <div class="bg-white p-6 rounded-xl shadow text-center">
        <div class="text-4xl mb-3">🔥</div>
        <h3 class="font-semibold text-lg">CodeIgniter 4</h3>
        <p class="text-sm text-gray-500">Framework utama</p>
      </div>

      <div class="bg-white p-6 rounded-xl shadow text-center">
        <div class="text-4xl mb-3">🗄️</div>
        <h3 class="font-semibold text-lg">Database</h3>
        <p class="text-sm text-gray-500">MySQL</p>
      </div>

      <div class="bg-white p-6 rounded-xl shadow text-center">
        <div class="text-4xl mb-3">🔧</div>
        <h3 class="font-semibold text-lg">Git</h3>
        <p class="text-sm text-gray-500">Version Control</p>
      </div>

      <div class="bg-white p-6 rounded-xl shadow text-center">
        <div class="text-4xl mb-3">📊</div>
        <h3 class="font-semibold text-lg">MS Office</h3>
        <p class="text-sm text-gray-500">Excel, Word, PowerPoint</p>
      </div>

      <div class="bg-white p-6 rounded-xl shadow text-center">
        <div class="text-4xl mb-3">🗂️</div>
        <h3 class="font-semibold text-lg">Administrasi</h3>
        <p class="text-sm text-gray-500">Manajemen Data & Sistem</p>
      </div>

    </div>
  </div>
</section>

<!-- ================= PORTFOLIO ================= -->
<section id="portfolio" class="bg-white py-20">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-center mb-12">Portfolio</h2>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php for ($i = 1; $i <= 6; $i++): ?>
      <div class="bg-gray-100 rounded-xl overflow-hidden shadow">
        <img src="<?= base_url('assets/img/portfolio'.$i.'.png'); ?>"
             class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="font-semibold">Project <?= $i ?></h3>
          <p class="text-sm text-gray-500">Sistem Informasi</p>
        </div>
      </div>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- ================= EXPERIENCE ================= -->
<section id="experience" class="py-20 bg-gray-100">
  <div class="max-w-5xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-center mb-12">Pengalaman</h2>

    <div class="space-y-6">
      <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="font-semibold text-lg">Guru TKJ & Multimedia</h3>
        <p class="text-sm text-gray-600">Media pembelajaran PC & Android</p>
      </div>
      <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="font-semibold text-lg">Admin Support Perusahaan</h3>
        <p class="text-sm text-gray-600">Administrasi & manajemen data</p>
      </div>
      <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="font-semibold text-lg">Developer Sistem Informasi</h3>
        <p class="text-sm text-gray-600">Pondok Darul Hijrah Pandaan (CI4)</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= CONTACT ================= -->
<section id="contact" class="py-20 bg-white">
  <div class="max-w-xl mx-auto text-center px-6">
    <h2 class="text-3xl font-bold mb-4">Hubungi Saya</h2>
    <p class="mb-8 text-gray-600">Siap berkolaborasi untuk project web Anda</p>

    <div class="flex justify-center gap-4 flex-wrap">
      <a href="https://wa.me/6289520821215" class="px-6 py-3 bg-primary text-white rounded-lg shadow hover:opacity-90">
        WhatsApp
      </a>
      <a href="https://instagram.com/m_syamsi" class="px-6 py-3 bg-pink-500 text-white rounded-lg shadow">
        Instagram
      </a>
      <a href="https://tiktok.com/@syamsproject.id" class="px-6 py-3 bg-black text-white rounded-lg shadow">
        TikTok
      </a>
    </div>
  </div>
</section>

<!-- ================= FOOTER ================= -->
<footer class="bg-gray-800 text-gray-300 py-8 text-center">
  <h3 class="text-lg font-semibold text-white">Muhammad Syamsi</h3>
  <p class="text-sm">Freelance IT – Web Developer (CI4)</p>
  <p class="text-xs mt-4">© 2024 Muhammad Syamsi</p>
</footer>

<!-- ================= JS NAVBAR ================= -->
<script>
  const btn = document.getElementById('menuBtn');
  const menu = document.getElementById('mobileMenu');

  btn.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });
</script>

</body>
</html>
