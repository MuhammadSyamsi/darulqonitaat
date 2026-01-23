<?php

namespace App\Models;

use CodeIgniter\Model;

class SantriTagModel extends Model
{
    protected $table            = 'santri_tag';
        protected $primaryKey       = 'id';

            protected $useAutoIncrement = true;
                protected $returnType       = 'array';

                    protected $allowedFields = [
                            'santri_id',
                                    'tag_id',
                                        ];

                                            protected $useTimestamps = true;
                                                protected $createdField  = 'created_at';
                                                    protected $updatedField  = null;

                                                        /* =========================
                                                             * CEK TAG SUDAH TERPASANG
                                                                  * ========================= */
                                                                      public function exists($santriId, $tagId)
                                                                          {
                                                                                  return $this->where([
                                                                                              'santri_id' => $santriId,
                                                                                                          'tag_id'    => $tagId
                                                                                                                  ])->countAllResults() > 0;
                                                                                                                      }

                                                                                                                          /* =========================
                                                                                                                               * AMBIL TAG MILIK SANTRI
                                                                                                                                    * ========================= */
                                                                                                                                        public function getTagsBySantri($santriId)
                                                                                                                                            {
                                                                                                                                                    return $this->select('tags.id, tags.name')
                                                                                                                                                                ->join('tags', 'tags.id = santri_tag.tag_id')
                                                                                                                                                                            ->where('santri_tag.santri_id', $santriId)
                                                                                                                                                                                        ->findAll();
                                                                                                                                                                                            }

                                                                                                                                                                                                /* =========================
                                                                                                                                                                                                     * PASANG TAG (AMAN DUPLIKASI)
                                                                                                                                                                                                          * ========================= */
                                                                                                                                                                                                              public function attach($santriId, $tagId)
                                                                                                                                                                                                                  {
                                                                                                                                                                                                                          if ($this->exists($santriId, $tagId)) {
                                                                                                                                                                                                                                      return false;
                                                                                                                                                                                                                                              }

                                                                                                                                                                                                                                                      return $this->insert([
                                                                                                                                                                                                                                                                  'santri_id' => $santriId,
                                                                                                                                                                                                                                                                              'tag_id'    => $tagId
                                                                                                                                                                                                                                                                                      ]);
                                                                                                                                                                                                                                                                                          }

                                                                                                                                                                                                                                                                                              /* =========================
                                                                                                                                                                                                                                                                                                   * LEPAS TAG DARI SANTRI
                                                                                                                                                                                                                                                                                                        * ========================= */
                                                                                                                                                                                                                                                                                                            public function detach($santriId, $tagId)
                                                                                                                                                                                                                                                                                                                {
                                                                                                                                                                                                                                                                                                                        return $this->where([
                                                                                                                                                                                                                                                                                                                                    'santri_id' => $santriId,
                                                                                                                                                                                                                                                                                                                                                'tag_id'    => $tagId
                                                                                                                                                                                                                                                                                                                                                        ])->delete();
                                                                                                                                                                                                                                                                                                                                                            }

                                                                                                                                                                                                                                                                                                                                                                /* =========================
                                                                                                                                                                                                                                                                                                                                                                     * HAPUS SEMUA TAG SANTRI
                                                                                                                                                                                                                                                                                                                                                                          * ========================= */
                                                                                                                                                                                                                                                                                                                                                                              public function clearBySantri($santriId)
                                                                                                                                                                                                                                                                                                                                                                                  {
                                                                                                                                                                                                                                                                                                                                                                                          return $this->where('santri_id', $santriId)->delete();
                                                                                                                                                                                                                                                                                                                                                                                              }
                                                                                                                                                                                                                                                                                                                                                                                              }
                                                                                                                                                                                                                                                                                                                                                                                              