<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Perusahaan extends ResourceController
{
    protected $format    = 'json';

    public function index($keyword=null)
    {
        $db             = db_connect();
        $pelaku_usaha   = $db->table('pelaku_usaha');
        $pelaku_usaha->like('nama_perusahaan', $keyword);
        $pelaku_usaha->orLike('nama_proyek', $keyword);
        $pelaku_usaha->limit(20);
        $result = $pelaku_usaha->get()->getResultArray();
        
        $data = array();
        if(count($result)>=1)
        {
            foreach ($result as $row) {
                $dump['hasil'] = strtoupper($row['nama_perusahaan'])." - [".$row['kbli']."] ".strtoupper($row['nama_proyek'])." - ".$row['id'];
                array_push($data,$dump);
            }
        }

        return $this->respond($data);
    }
}