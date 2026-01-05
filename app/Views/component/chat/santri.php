<div x-data="{ step:0 }" class="p-4 space-y-4">

    <!-- Chat Bubble System -->
    <div class="bg-slate-800 rounded-xl p-3 w-fit max-w-[80%]">
        Assalamu’alaikum, pilih layanan santri
    </div>

    <div class="flex gap-2">
        <button @click="step=1" class="px-3 py-2 bg-teal-600 rounded">Tambah Santri</button>
        <button @click="step=10" class="px-3 py-2 bg-indigo-600 rounded">Validasi Santri</button>
    </div>

    <!-- Step Tambah Santri -->
    <template x-if="step===1">
        <div class="space-y-3">
            <div class="bg-slate-800 rounded-xl p-3">Masukkan nama santri</div>
            <input type="text" class="w-full rounded bg-slate-900 p-2" placeholder="Nama santri">
            <button @click="step=2" class="bg-teal-700 px-4 py-2 rounded">Lanjut</button>
        </div>
    </template>

    <template x-if="step===2">
        <div class="space-y-3">
            <div class="bg-slate-800 rounded-xl p-3">Pilih kelas</div>
            <div class="flex gap-2">
                <button class="px-3 py-2 bg-slate-700 rounded">VII</button>
                <button class="px-3 py-2 bg-slate-700 rounded">VIII</button>
                <button class="px-3 py-2 bg-slate-700 rounded">IX</button>
            </div>
            <button class="bg-teal-700 px-4 py-2 rounded">Simpan</button>
        </div>
    </template>

</div>