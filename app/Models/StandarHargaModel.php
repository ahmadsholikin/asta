<?php

namespace App\Models;

use CodeIgniter\Model;

class StandarHargaModel extends Model
{
    protected $table            = 'standar_harga';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "kode",
        "nama",
        "keterangan",
        "nominal",
        "dasar",
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
    protected $validationRules      = [
        'nominal' => 'required|numeric|min_length[4]',
        'nama'    => 'required|alpha_numeric_space'
    ];
    protected $validationMessages   = [
        'nominal' => [
            'required'      => 'Upss. Wajib diisikan',
            'numeric'       => 'Entrian hanya berupa angka saja',
            'min_length'    => 'Karakter terlalu pendek',
        ],

        'nama' => [
            'required'              => 'Upss. Wajib diisikan',
            'alpha_numeric_space'   => 'Entrian hanya berupa angka, huruf dan spasi saja',
        ],
    ];
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
}
