<?= $this->extend('layout_landing'); ?>

<?= $this->section('konten'); ?>

<!-- HERO PENGEMBANGAN -->
<section class="bg-emerald-100 rounded-lg p-6 mb-8 text-center relative overflow-hidden" data-aos="fade-up">
    <div class="relative z-10">
        <h1 class="text-3xl md:text-4xl font-bold mb-2 font-serif text-emerald-900">
            Dukung Pengembangan Ma'had
        </h1>
        <p class="text-gray-700 md:max-w-xl mx-auto">
            Mari bersama-sama berkontribusi dalam mencetak generasi penghafal Al-Qur’an yang berakhlak dan mandiri.
        </p>
    </div>
</section>

<!-- INFAQ & DONASI -->
<section class="mb-10">
    <h2 class="text-2xl font-semibold mb-4 text-center">Infaq & Donasi</h2>

    <div class="grid md:grid-cols-2 gap-6">
        <!-- Rekening -->
        <div class="bg-white p-6 rounded-lg shadow-md card-hover" data-aos="fade-right">
            <h3 class="font-semibold mb-3">Rekening Infaq</h3>
            <ul class="space-y-2">
                <li><strong>Bank Syariah Indonesia (BSI)</strong></li>
                <li>No. Rekening: <span class="font-mono">1234567890</span></li>
                <li>a.n. Ma'had Tahfidz Putri</li>
            </ul>
            <p class="text-sm text-gray-500 mt-3">
                Konfirmasi infaq dapat dilakukan melalui WhatsApp admin.
            </p>
        </div>

        <!-- QRIS -->
        <div class="bg-white p-6 rounded-lg shadow-md card-hover text-center" data-aos="fade-left">
            <h3 class="font-semibold mb-3">QRIS Infaq</h3>
            <img
                src="<?= base_url('assets/images/qris.webp'); ?>"
                alt="QRIS Infaq"
                class="w-48 h-48 mx-auto object-contain mb-3"
                loading="lazy">
            <p class="text-sm text-gray-600">
                Scan QRIS untuk infaq cepat dan mudah
            </p>
        </div>
    </div>
</section>

<!-- KEBUTUHAN OPERASIONAL -->
<section class="mb-10">
    <h2 class="text-2xl font-semibold mb-4 text-center">Kebutuhan Operasional Bulanan</h2>

    <div class="grid md:grid-cols-3 gap-6">
        <div class="bg-white p-5 rounded-lg shadow-md card-hover" data-aos="fade-up">
            <h3 class="font-semibold mb-2">Konsumsi Santri</h3>
            <p class="text-gray-600 mb-2">Rp 6.000.000 / bulan</p>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-emerald-600 h-2 rounded-full" style="width:70%"></div>
            </div>
        </div>

        <div class="bg-white p-5 rounded-lg shadow-md card-hover" data-aos="fade-up" data-aos-delay="100">
            <h3 class="font-semibold mb-2">Honor Pengajar</h3>
            <p class="text-gray-600 mb-2">Rp 4.000.000 / bulan</p>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-emerald-600 h-2 rounded-full" style="width:55%"></div>
            </div>
        </div>

        <div class="bg-white p-5 rounded-lg shadow-md card-hover" data-aos="fade-up" data-aos-delay="200">
            <h3 class="font-semibold mb-2">Listrik & Air</h3>
            <p class="text-gray-600 mb-2">Rp 1.500.000 / bulan</p>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-emerald-600 h-2 rounded-full" style="width:80%"></div>
            </div>
        </div>
    </div>
</section>

<!-- SARANA & PRASARANA -->
<section class="mb-10">
    <h2 class="text-2xl font-semibold mb-4 text-center">Sarana & Prasarana</h2>

    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded-lg shadow-md card-hover" data-aos="fade-up">
            <img
                src="<?= base_url('assets/images/sarpras.jpg'); ?>"
                alt="Renovasi Asrama"
                class="w-full h-40 object-cover rounded-md mb-2"
                loading="lazy">
            <h3 class="font-semibold text-center">Renovasi Asrama</h3>
        </div>

        <div class="bg-white p-4 rounded-lg shadow-md card-hover" data-aos="fade-up" data-aos-delay="100">
            <img
                src="<?= base_url('assets/images/sarpras.jpg'); ?>"
                alt="Penambahan Ruang Kelas"
                class="w-full h-40 object-cover rounded-md mb-2"
                loading="lazy">
            <h3 class="font-semibold text-center">Penambahan Ruang Kelas</h3>
        </div>

        <div class="bg-white p-4 rounded-lg shadow-md card-hover" data-aos="fade-up" data-aos-delay="200">
            <img
                src="<?= base_url('assets/images/sarpras.jpg'); ?>"
                alt="Perlengkapan Belajar"
                class="w-full h-40 object-cover rounded-md mb-2"
                loading="lazy">
            <h3 class="font-semibold text-center">Perlengkapan Belajar</h3>
        </div>
    </div>
</section>

<!-- CTA DONASI -->
<section class="bg-emerald-600 text-white rounded-lg p-6 text-center mb-10" data-aos="zoom-in">
    <h2 class="text-2xl font-semibold mb-2">Mari Ambil Bagian dalam Amal Jariyah</h2>
    <p class="mb-4">
        Setiap infaq Anda menjadi pahala yang terus mengalir bagi pendidikan para penghafal Al-Qur’an.
    </p>
    <a
        href="https://wa.me/6281234567890"
        target="_blank"
        class="inline-block bg-white text-emerald-700 font-semibold px-6 py-3 rounded-md transition transform hover:scale-105">
        Konfirmasi Infaq via WhatsApp
    </a>
</section>

<!-- KONTAK & ALAMAT -->
<section class="mb-12">
    <h2 class="text-2xl font-semibold mb-4 text-center">Kontak & Alamat</h2>

    <div class="grid md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md card-hover" data-aos="fade-right">
            <h3 class="font-semibold mb-2">Alamat</h3>
            <p>Jl. Pendidikan No. 12, Kota, Provinsi, Indonesia</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md card-hover" data-aos="fade-left">
            <h3 class="font-semibold mb-2">Kontak Donasi</h3>
            <p>WhatsApp: +62 812 3456 7890</p>
            <p>Email: donasi@mahadputri.id</p>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>