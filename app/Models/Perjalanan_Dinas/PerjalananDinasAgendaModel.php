<?php

namespace App\Models\Perjalanan_Dinas;

use CodeIgniter\Model;

class PerjalananDinasAgendaModel extends Model
{
    protected $table            = 'perjalanan_dinas_agenda';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "kategori_id",
        "tanggal_berangkat",
        "tanggal_pulang",
        "jam_mulai",
        "jam_selesai",
        "tanggal_surat",
        "nomor_surat",
        "kegiatan",
        "pptk_id",
        "pptk_nama",
        "pptk_jabatan",
        "pptk_gol",
        "pptk_pangkat",
        "progress",
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
    
    public function join($in)
    {
        $query = "SELECT
                        orang.nama_gelar,
                        orang.pangkat,
                        orang.golru,
                        count(agenda.id) as jml_kegiatan,
                        SUM(orang.nominal) as nominal,
                        '0' as potongan,
                        SUM(orang.nominal) as penerimaan,
                        '' as rekening,
                        '' as bank,
                        '' as ttd
                    FROM 
                            perjalanan_dinas_agenda agenda
                    INNER JOIN
                            perjalanan_dinas_orang orang
                    ON agenda.id = orang.referensi_agenda
                    WHERE agenda.id IN (".$in.") GROUP BY orang.nama;";
        return $this->query($query)->getResultArray();
    }
}
