<?= $this->extend('layout_landing'); ?>

<?= $this->section('konten'); ?>

<!-- HERO SECTION -->
<section class="bg-emerald-100 rounded-lg p-6 mb-8 text-center relative overflow-hidden" data-aos="fade-up">
    <img src="<?= base_url('assets/images/hero.webp'); ?>" alt="Ma'had Tahfidz" class="absolute inset-0 w-full h-full object-cover opacity-20">
    <div class="relative z-10">
        <h1 class="text-3xl md:text-4xl font-bold mb-2 font-serif text-emerald-900">Selamat Datang di Ma'had Tahfidz Putri</h1>
        <p class="text-gray-700 mb-4 md:max-w-xl mx-auto">Mencetak generasi tahfidz yang cerdas, berakhlak mulia, dan mandiri</p>
        <a href="<?= base_url('daraulqonitaat/psb'); ?>" class="btn-primary">Daftar Sekarang</a>
    </div>
</section>

<!-- VISI & MISI -->
<section class="grid md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white p-6 rounded-lg shadow-md card-hover animate-fadeIn" data-aos="fade-right">
        <h2 class="text-xl font-semibold mb-2">Visi</h2>
        <p>Mencetak generasi tahfidz yang unggul di dunia dan akhirat.</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md card-hover animate-fadeIn" data-aos="fade-left">
        <h2 class="text-xl font-semibold mb-2">Misi</h2>
        <ul class="list-disc pl-5">
            <li>Menghafal Al-Quran dengan metode terbaik</li>
            <li>Mendidik akhlak mulia</li>
            <li>Membekali hardskill dan softskill</li>
        </ul>
    </div>
</section>

<!-- STRUKTUR ORGANISASI -->
<section class="mb-8">
    <h2 class="text-2xl font-semibold mb-4 text-center">Struktur Organisasi</h2>
    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded-lg shadow-md card-hover text-center animate-fadeIn" data-aos="fade-up">
            <img src="<?= base_url('assets/images/struktur.jpg'); ?>" alt="Ketua" class="w-24 h-24 mx-auto rounded-full mb-2 object-cover">
            <h3 class="font-semibold">Ustadzah Aisyah</h3>
            <p class="text-gray-500">Ketua Ma'had</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md card-hover text-center animate-fadeIn" data-aos="fade-up" data-aos-delay="100">
            <img src="<?= base_url('assets/images/struktur.jpg'); ?>" alt="Wakil" class="w-24 h-24 mx-auto rounded-full mb-2 object-cover">
            <h3 class="font-semibold">Ustadzah Fatimah</h3>
            <p class="text-gray-500">Wakil Ketua</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md card-hover text-center animate-fadeIn" data-aos="fade-up" data-aos-delay="200">
            <img src="<?= base_url('assets/images/struktur.jpg'); ?>" alt="Bendahara" class="w-24 h-24 mx-auto rounded-full mb-2 object-cover">
            <h3 class="font-semibold">Ustadzah Khadijah</h3>
            <p class="text-gray-500">Bendahara</p>
        </div>
    </div>
</section>

<!-- FASILITAS -->
<section class="mb-8">
    <h2 class="text-2xl font-semibold mb-4 text-center">Fasilitas</h2>
    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded-lg shadow-md card-hover animate-fadeIn" data-aos="fade-up">
            <img src="<?= base_url('assets/images/sarpras.jpg'); ?>" alt="Ruang Kelas" class="w-full h-40 object-cover rounded-md mb-2">
            <h3 class="font-semibold text-center">Ruang Kelas</h3>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md card-hover animate-fadeIn" data-aos="fade-up" data-aos-delay="100">
            <img src="<?= base_url('assets/images/sarpras.jpg'); ?>" alt="Perpustakaan" class="w-full h-40 object-cover rounded-md mb-2">
            <h3 class="font-semibold text-center">Perpustakaan</h3>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md card-hover animate-fadeIn" data-aos="fade-up" data-aos-delay="200">
            <img src="<?= base_url('assets/images/sarpras.jpg'); ?>" alt="Asrama" class="w-full h-40 object-cover rounded-md mb-2">
            <h3 class="font-semibold text-center">Asrama Putri</h3>
        </div>
    </div>
</section>

<!-- AKADEMIK & HARDSKILL -->
<section class="mb-8">
    <h2 class="text-2xl font-semibold mb-4 text-center">Akademik & Hardskill</h2>
    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded-lg shadow-md card-hover animate-fadeIn" data-aos="fade-up">
            <h3 class="font-semibold mb-2">Tahfidz Al-Quran</h3>
            <p>Program hafalan mulai Juz 1 hingga Juz 30, metode mundur.</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md card-hover animate-fadeIn" data-aos="fade-up" data-aos-delay="100">
            <h3 class="font-semibold mb-2">Bahasa Arab & Inggris</h3>
            <p>Pengajaran bahasa untuk menunjang literasi dan komunikasi.</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md card-hover animate-fadeIn" data-aos="fade-up" data-aos-delay="200">
            <h3 class="font-semibold mb-2">Keterampilan</h3>
            <p>Memasak, menjahit, komputer, dan hardskill lainnya.</p>
        </div>
    </div>
</section>

<!-- JADWAL HARIAN -->
<section class="mb-8">
    <h2 class="text-2xl font-semibold mb-4 text-center">Jadwal Harian Santri</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow-md divide-y divide-gray-200 animate-fadeIn" data-aos="fade-up">
            <thead class="bg-emerald-100">
                <tr>
                    <th class="px-4 py-2 text-left">Jam</th>
                    <th class="px-4 py-2 text-left">Kegiatan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr>
                    <td class="px-4 py-2">05:00 - 06:00</td>
                    <td class="px-4 py-2">Tahajud & Shalat Subuh</td>
                </tr>
                <tr>
                    <td class="px-4 py-2">06:00 - 07:00</td>
                    <td class="px-4 py-2">Sarapan & Persiapan</td>
                </tr>
                <tr>
                    <td class="px-4 py-2">07:00 - 12:00</td>
                    <td class="px-4 py-2">Belajar Tahfidz & Akademik</td>
                </tr>
                <tr>
                    <td class="px-4 py-2">12:00 - 13:00</td>
                    <td class="px-4 py-2">Shalat Dzuhur & Istirahat</td>
                </tr>
                <tr>
                    <td class="px-4 py-2">13:00 - 16:00</td>
                    <td class="px-4 py-2">Belajar Hardskill / Kegiatan Ekstra</td>
                </tr>
                <tr>
                    <td class="px-4 py-2">16:00 - 18:00</td>
                    <td class="px-4 py-2">Shalat Ashar & Hafalan Mandiri</td>
                </tr>
                <tr>
                    <td class="px-4 py-2">18:00 - 19:00</td>
                    <td class="px-4 py-2">Shalat Maghrib & Makan Malam</td>
                </tr>
                <tr>
                    <td class="px-4 py-2">19:00 - 21:00</td>
                    <td class="px-4 py-2">Tadarus & Kajian</td>
                </tr>
                <tr>
                    <td class="px-4 py-2">21:00 - 22:00</td>
                    <td class="px-4 py-2">Persiapan Tidur & Shalat Isya</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<!-- BIAYA PENDIDIKAN -->
<section class="mb-8">
    <h2 class="text-2xl font-semibold mb-4 text-center">Biaya Pendidikan Tahun Ajaran Baru</h2>
    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded-lg shadow-md card-hover animate-fadeIn" data-aos="fade-up">
            <h3 class="font-semibold mb-2">Uang Pangkal</h3>
            <p>Rp 1.500.000,-</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md card-hover animate-fadeIn" data-aos="fade-up" data-aos-delay="100">
            <h3 class="font-semibold mb-2">SPP Bulanan</h3>
            <p>Rp 300.000,- / bulan</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md card-hover animate-fadeIn" data-aos="fade-up" data-aos-delay="200">
            <h3 class="font-semibold mb-2">Seragam & Kit</h3>
            <p>Rp 500.000,- (sekali)</p>
        </div>
    </div>
</section>

<!-- KONTak & ALAMAT -->
<section class="mb-12">
    <h2 class="text-2xl font-semibold mb-4 text-center">Kontak & Alamat</h2>
    <div class="grid md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md card-hover animate-fadeIn" data-aos="fade-right">
            <h3 class="font-semibold mb-2">Alamat</h3>
            <p>Jl. Pendidikan No. 12, Kota, Provinsi, Indonesia</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md card-hover animate-fadeIn" data-aos="fade-left">
            <h3 class="font-semibold mb-2">Kontak</h3>
            <p>WA: +62 812 3456 7890</p>
            <p>Email: info@mahadputri.id</p>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>