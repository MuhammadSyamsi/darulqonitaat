<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\SantriModel;
use App\Models\TagModel;
use App\Models\SantriTagModel;

class Santri extends BaseController
{
    protected $santri;
    protected $tag;
    protected $santriTag;

    public function __construct()
    {
        $this->santri     = new SantriModel();
        $this->tag        = new TagModel();
        $this->santriTag  = new SantriTagModel();
    }

    //  * SUGGEST NAMA SANTRI
    public function suggest()
    {
        $keyword = $this->request->getGet('q');

        if (!$keyword || strlen($keyword) < 2) {
            return $this->response->setJSON([]);
        }

        $model = new SantriModel();

        return $this->response->setJSON(
            $model->searchByName($keyword)
        );
    }

    //  * CEK SANTRI
    public function check()
    {
        $nama = trim($this->request->getJSON(true)['nama'] ?? $this->request->getPost('nama') ?? '');

        if (!$nama) {
            return $this->response->setJSON(['valid' => false, 'message' => 'Nama kosong']);
        }

        $santri = $this->santri
            ->where('nama', $nama)
            ->orderBy('id', 'ASC')
            ->first();

        if (!$santri) {
            return $this->response->setJSON(['valid' => false]);
        }

        // Ambil tag santri
        $tags = $this->tag
            ->select('tags.id, tags.name')
            ->join('santri_tag', 'santri_tag.tag_id = tags.id')
            ->where('santri_tag.santri_id', $santri['id'])
            ->findAll();

        $santri['tags'] = $tags;

        return $this->response->setJSON([
            'valid' => !empty($santri),
            'data'  => $santri
        ]);
    }

    //  * SIMPAN SANTRI BARU
    public function store()
    {
        $data = $this->request->getJSON(true);

        if (empty($data['nama'])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Nama wajib diisi'
            ]);
        }

        $today = date('Y-m-d');
        $prefix = date('Ym'); // YYYYMM

        // Hitung santri yang dibuat hari ini
        $countToday = $this->santri
            ->where('DATE(created_at)', $today)
            ->countAllResults();

        $urutan = str_pad($countToday + 1, 4, '0', STR_PAD_LEFT);
        $nis = $prefix . $urutan; // 10 digit

        $this->santri->insert([
            'nis'           => $nis,
            'nama'          => $data['nama'],
            'asal_sekolah'  => $data['asal_sekolah'] ?? null,
            'tempat_lahir'  => $data['tempat_lahir'] ?? null,
            'tanggal_lahir' => $data['tanggal_lahir'] ?? null,
            'alamat'        => $data['alamat'] ?? null,
            'wali'          => $data['wali'] ?? null,
            'nomor_hp'      => $data['hp'] ?? null,
        ]);

        return $this->response->setJSON([
            'success' => true,
            'nis'     => $nis
        ]);
    }

    //  * HAPUS SANTRI
    public function delete()
    {
        $id = $this->request->getJSON()->id ?? null;

        if (!$id) {
            return $this->response->setJSON(['success' => false]);
        }

        $this->santri->delete($id);
        $this->santriTag->where('santri_id', $id)->delete();

        return $this->response->setJSON(['success' => true]);
    }

    //  * TAMBAH TAG BARU + PASANG
    public function addTag()
    {
        $json = $this->request->getJSON();

        if (!$json->santri_id || !$json->tag) {
            return $this->response->setJSON(['success' => false]);
        }

        // buat tag jika belum ada
        $tag = $this->tag->where('name', $json->tag)->first();

        if (!$tag) {
            $tagId = $this->tag->insert(['name' => $json->tag]);
        } else {
            $tagId = $tag['id'];
        }

        $this->santriTag->insert([
            'santri_id' => $json->santri_id,
            'tag_id'    => $tagId
        ]);

        return $this->response->setJSON(['success' => true]);
    }

    //  * PASANG TAG EXISTING
    public function attachTag()
    {
        $json = $this->request->getJSON();

        if (!$json->santri_id || !$json->tag_id) {
            return $this->response->setJSON(['success' => false]);
        }

        $this->santriTag->insert([
            'santri_id' => $json->santri_id,
            'tag_id'    => $json->tag_id
        ]);

        return $this->response->setJSON(['success' => true]);
    }
}