<?php

namespace App\Models\Perjalanan_Dinas;

use CodeIgniter\Model;

class PerjalananDinasLokasiModel extends Model
{
    protected $table            = 'perjalanan_dinas_lokasi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "referensi_agenda",
        "lokasi",
        "alamat",
        "wilayah",
        "radius",
        "longitude",
        "latitude",
        "tanggal",
        "id_proyek",
        "kbli",
        "deskripsi_kbli",
        "risiko",
        "sektor_usaha",
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
