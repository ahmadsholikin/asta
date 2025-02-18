<?php

namespace App\Models;

use CodeIgniter\Model;

class PelakuUsahaModel extends Model
{
    protected $table            = 'pelaku_usaha';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "id_proyek",
        "uraian_jenis_proyek",
        "nib",
        "nama_perusahaan",
        "tanggal_terbit_oss",
        "uraian_status_penanaman_modal",
        "uraia_jenis_perusahaan",
        "uraian_risiko_proyek",
        "nama_proyek",
        "uraian_skala_usaha",
        "alamat_usaha",
        "kabkota",
        "kecamatan",
        "kelurahan",
        "longitude",
        "latitude",
        "tanggal_pengajuan_proyek",
        "kbli",
        "judul_kbli",
        "sektor_pembina",
        "nama_user",
        "email",
        "nomor_telp",
        "luas_tanah",
        "satuan_tanah",
        "jumlah_investasi",
        "nominal_investasi",
        "tki",
        "tahun_rilis",
        "created_at",
        "created_by",
        "updated_at",
        "updated_by",
        "deleted_at",
        "deleted_by"
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    
    public function tampilkanSemua()
    {
        return $this->findAll();
    }

    public function tampilkanBerdasarkanId($id=false)
    {
        return $this->find($id);
    }

    public function simpan($data)
    {
        return $this->save($data);
    }

    public function hapus($id)
    {
        return $this->delete($id);
    }
}
