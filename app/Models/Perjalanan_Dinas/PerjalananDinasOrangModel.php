<?php

namespace App\Models\Perjalanan_Dinas;

use CodeIgniter\Model;

class PerjalananDinasOrangModel extends Model
{
    protected $table            = 'perjalanan_dinas_orang';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "id",
        "referensi_agenda",
        "nip",
        "nama",
        "nama_gelar",
        "jabatan",
        "golru",
        "pangkat",
        "opd",
        "eselon",
        "urutan",
        "nominal",
        "tingkat",
        "nomor_sppd",
        "bank",
        "rekening",
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
        return $this->where('id', $id)->delete($id);
    }
    
    public function groupOPD($id)
    {
        $query = "SELECT opd FROM perjalanan_dinas_orang WHERE referensi_agenda='".$id."' GROUP BY opd ORDER BY opd ASC";
        return $this->query($query)->getResultArray();
    }
}