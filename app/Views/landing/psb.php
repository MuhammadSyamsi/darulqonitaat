<?= $this->extend('layout_landing'); ?>

<?= $this->section('konten'); ?>

<!-- HERO PSB -->
<section class="bg-emerald-100 rounded-lg p-6 mb-8 text-center" data-aos="fade-up">
    <h1 class="text-3xl md:text-4xl font-bold mb-2 font-serif text-emerald-900">
        Penerimaan Santri Baru
    </h1>
    <p class="text-gray-700 md:max-w-xl mx-auto">
        Bergabunglah bersama Ma'had Tahfidz Putri untuk menempuh pendidikan Al-Qur’an yang terarah dan berakhlak.
    </p>
</section>

<!-- CARD PENDAFTARAN -->
<section class="mb-10">
    <div class="grid md:grid-cols-2 gap-6">
        <!-- Informasi PSB -->
        <div class="bg-white p-6 rounded-lg shadow-md card-hover" data-aos="fade-right">
            <h2 class="text-xl font-semibold mb-3">Informasi Pendaftaran</h2>
            <ul class="list-disc pl-5 space-y-2">
                <li>Santri Putri</li>
                <li>Usia 10 – 18 tahun</li>
                <li>Sehat jasmani & rohani</li>
                <li>Siap mengikuti peraturan ma'had</li>
            </ul>
        </div>

        <!-- CTA Daftar -->
        <div class="bg-emerald-600 text-white p-6 rounded-lg shadow-md text-center" data-aos="fade-left">
            <h2 class="text-xl font-semibold mb-3">Daftar Sekarang</h2>
            <p class="mb-4">
                Klik tombol di bawah ini untuk melakukan pendaftaran santri baru.
            </p>
            <a
                href="https://forms.gle/xxxxxxxxxx"
                target="_blank"
                class="inline-block bg-white text-emerald-700 font-semibold px-6 py-3 rounded-md transition transform hover:scale-105">
                Form Pendaftaran Online
            </a>
        </div>
    </div>
</section>

<!-- ALUR PENDAFTARAN -->
<section class="mb-10">
    <h2 class="text-2xl font-semibold mb-4 text-center">Alur Pendaftaran</h2>

    <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-6 text-center">
        <div class="bg-white p-5 rounded-lg shadow-md card-hover" data-aos="fade-up">
            <span class="text-3xl font-bold text-emerald-600">1</span>
            <h3 class="font-semibold mt-2">Daftar Online</h3>
            <p class="text-sm text-gray-600">Mengisi formulir pendaftaran</p>
        </div>

        <div class="bg-white p-5 rounded-lg shadow-md card-hover" data-aos="fade-up" data-aos-delay="100">
            <span class="text-3xl font-bold text-emerald-600">2</span>
            <h3 class="font-semibold mt-2">Seleksi</h3>
            <p class="text-sm text-gray-600">Tes bacaan & hafalan</p>
        </div>

        <div class="bg-white p-5 rounded-lg shadow-md card-hover" data-aos="fade-up" data-aos-delay="200">
            <span class="text-3xl font-bold text-emerald-600">3</span>
            <h3 class="font-semibold mt-2">Pengumuman</h3>
            <p class="text-sm text-gray-600">Informasi hasil seleksi</p>
        </div>

        <div class="bg-white p-5 rounded-lg shadow-md card-hover" data-aos="fade-up" data-aos-delay="300">
            <span class="text-3xl font-bold text-emerald-600">4</span>
            <h3 class="font-semibold mt-2">Daftar Ulang</h3>
            <p class="text-sm text-gray-600">Pembayaran & kelengkapan</p>
        </div>
    </div>
</section>

<!-- STATUS CALON SANTRI -->
<section class="mb-10">
    <h2 class="text-2xl font-semibold mb-4 text-center">Status Calon Santri</h2>

    <div class="bg-white rounded-lg shadow-md overflow-x-auto" data-aos="fade-up">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-emerald-100">
                <tr>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-left">Asal Sekolah</th>
                    <th class="px-4 py-2 text-center">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr>
                    <td class="px-4 py-2">Aisyah Rahma</td>
                    <td class="px-4 py-2">SD Islam Al-Falah</td>
                    <td class="px-4 py-2 text-center">
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                            Proses
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="px-4 py-2">Fatimah Zahra</td>
                    <td class="px-4 py-2">MI Nurul Huda</td>
                    <td class="px-4 py-2 text-center">
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                            Diterima
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="px-4 py-2">Khadijah Aulia</td>
                    <td class="px-4 py-2">SDIT Bina Insani</td>
                    <td class="px-4 py-2 text-center">
                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                            Tidak Lulus
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <p class="text-sm text-gray-500 mt-3 text-center">
        * Status diperbarui secara berkala oleh panitia PSB
    </p>
</section>

<!-- KONTAK PSB -->
<section class="mb-12">
    <h2 class="text-2xl font-semibold mb-4 text-center">Kontak Panitia PSB</h2>

    <div class="grid md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md card-hover" data-aos="fade-right">
            <h3 class="font-semibold mb-2">Admin PSB</h3>
            <p>WhatsApp: +62 812 3456 7890</p>
            <p>Email: psb@mahadputri.id</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md card-hover" data-aos="fade-left">
            <h3 class="font-semibold mb-2">Alamat Ma'had</h3>
            <p>Jl. Pendidikan No. 12, Kota, Provinsi, Indonesia</p>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>