<?php

namespace App\Controllers\Backend\Laporan;
use App\Controllers\BaseController;

use App\Models\Perjalanan_Dinas\PerjalananDinasAgendaModel;
use App\Models\Perjalanan_Dinas\PerjalananDinasKategoriModel;
use App\Models\Perjalanan_Dinas\PerjalananDinasOrangModel;
use App\Models\Perjalanan_Dinas\PerjalananDinasLokasiModel;

use \Hermawan\DataTables\DataTable;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Penerimaan_DD extends BaseController
{
    public $path_view	= 'backend/laporan/penerimaan_dd/';
    public $theme       = "theme/template";

    public function __construct()
    {
        $this->PerjalananDinasAgendaModel   = new PerjalananDinasAgendaModel();
        $this->PerjalananDinasOrangModel    = new PerjalananDinasOrangModel();
        $this->PerjalananDinasLokasiModel   = new PerjalananDinasLokasiModel();
    }

    public function index()
    {
        $data['path']       = $this->path_view;
        $data['preload']    = null;
        $data['data']       = $this->tampilData('"4","5","6"');
        $param['page']      = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
    }
    
    private function tampilData($in)
    {
        $agenda = $this->PerjalananDinasAgendaModel->where('id IN ('.$in.')')->get()->getResultArray();
        $data   = array();
        foreach ($agenda as $row)
        {
            $dump               = array();
            $dump['agenda']     = $row;
            $dump['orang']      = $this->PerjalananDinasOrangModel->where('referensi_agenda',$row['id'])->get()->getResultArray();
            $dump['jml_orang']  = count($dump['orang']);
            $dump['lokasi']     = $this->PerjalananDinasLokasiModel->where('referensi_agenda',$row['id'])->get()->getResultArray();
            $dump['jml_lokasi'] = count($dump['lokasi']);
            array_push($data,$dump);
        }
        return $data;
    }
    
    public function eksport()
    {
        $in     = "";
        $cek    = $this->request->getPost('cek');
        
        if(empty($cek)){
            echo "Pilih dulu salah satu agenda kegiatan";
            die;
        }

        for ($i=0; $i < count($cek); $i++) { 
            $in .= '"'.$cek[$i].'",';
        }
        
        $in = rtrim($in, ",");
        
        $data = $this->PerjalananDinasAgendaModel->join($in);
        
        //export excel
        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0)->setTitle("Summary");

        $spreadsheet->setActiveSheetIndex(0)->mergeCells('A1:L1');
        $spreadsheet->setActiveSheetIndex(0)->mergeCells('A2:L2');
        $spreadsheet->setActiveSheetIndex(0)->mergeCells('A3:L3');
        $spreadsheet->setActiveSheetIndex(0)->mergeCells('A4:L4');
        $spreadsheet->setActiveSheetIndex(0)->mergeCells('A5:L5');
        
        $spreadsheet->setActiveSheetIndex(0)->mergeCells('A6:L6');
        $spreadsheet->setActiveSheetIndex(0)->mergeCells('A7:L7');
        $spreadsheet->setActiveSheetIndex(0)->mergeCells('A8:L8');
        $spreadsheet->setActiveSheetIndex(0)->mergeCells('A9:L9');
        $spreadsheet->setActiveSheetIndex(0)->mergeCells('A10:L10');
        //style title
        $styleHeaderTitle = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ]
        ];
        
        $spreadsheet->setActiveSheetIndex(0)->getStyle('A6:L9')->applyFromArray($styleHeaderTitle);
        //style header table
        $styleHeader = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ]
            ]
        ];
        
        $spreadsheet->setActiveSheetIndex(0)->getStyle('A11:L12')->applyFromArray($styleHeader);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension('A')->setWidth(1, 'cm');
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension('B')->setWidth(8, 'cm');
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension('C')->setWidth(3, 'cm');
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension('D')->setWidth(4, 'cm');
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension('G')->setAutoSize(true);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension('H')->setAutoSize(true);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension('I')->setAutoSize(true);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension('J')->setAutoSize(true);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension('K')->setAutoSize(true);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension('L')->setAutoSize(true);
        
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', "PEMERINTAH KABUPATEN MAGELANG");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A2', "DINAS PENANAMAN MODAL DAN ");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A3', "PELAYANAN TERPADU SATU PINTU");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A4', "Jl. Soekarno Hatta No. 20 Telp. 788249 Kota Mungkid");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A6', "TANDA TERIMA PERJALANAN DINAS DALAM DAERAH");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A7', "KEGIATAN PENGENDALIAN PELAKSANAAN PENANAMAN MODAL YANG MENJADI KEWENANGAN DAERAH KABUPATEN TAHUN 2025");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A8', "SUB KEGIATAN PENGENDALIAN PELAKSANAAN PENANAMAN MODAL YANG MENJADI KEWENANGAN DAERAH");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A9', "BULAN XXXXXXXXXXXXXXX TAHUN 2025");
        
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A11', "NO");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('B11', "NAMA");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('C11', "ESELON/GOL");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('D11', "TGL SPPD");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('E11', "TUJUAN");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('F11', "DALAM RANGKA");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('G11', "NOMINAL");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('H11', "PAJAK");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('I11', "JUMLAH PENERIMAAN");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('J11', "BANK");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('K11', "REKENING");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('L11', "TANDA TANGAN");
        
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A12', "1");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('B12', "2");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('C12', "3");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('D12', "4");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('E12', "5");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('F12', "6");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('G12', "7");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('H12', "8");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('I12', "9");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('J12', "10");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('K12', "11");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('L12', "12");
        
        //isi
        $column     = 13;
        $urutan     = 1;
        foreach($data as $row):
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $urutan)
                        ->setCellValue('B' . $column, $row['nama_gelar'])
                        ->setCellValue('C' . $column, $row['golru'])
                        ->setCellValue('D' . $column, "terlampir")
                        ->setCellValue('E' . $column, "terlampir")
                        ->setCellValue('F' . $column, "terlampir")
                        ->setCellValueExplicit('G' . $column, $row['nominal'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_NUMERIC)
                        ->setCellValueExplicit('H' . $column, $row['potongan'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_NUMERIC)
                        ->setCellValueExplicit('I' . $column, $row['penerimaan'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_NUMERIC)
                        ->setCellValue('J' . $column, $row['bank'])
                        ->setCellValue('K' . $column, $row['rekening'])
                        ->setCellValue('L' . $column, $row['ttd']);
            $urutan++;
            $column++;
        endforeach;
        
        //style konten : khusus nomer
        $spreadsheet->setActiveSheetIndex(0)->getStyle('A')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->setActiveSheetIndex(0)->getStyle('G13:I'.$column)->getNumberFormat()->setFormatCode('#,##0');
        
        //jumlah
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('G'.$column, "=SUM(G13:G".($column-1).")");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('H'.$column, "=SUM(H13:H".($column-1).")");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('I'.$column, "=SUM(I13:I".($column-1).")");
        
        $spreadsheet->setActiveSheetIndex(0)->getStyle('G'.$column)->getNumberFormat()->setFormatCode('#,##0');
        $spreadsheet->setActiveSheetIndex(0)->getStyle('H'.$column)->getNumberFormat()->setFormatCode('#,##0');
        $spreadsheet->setActiveSheetIndex(0)->getStyle('I'.$column)->getNumberFormat()->setFormatCode('#,##0');
        //style title
        $styleHeaderLampiran = [
            'font' => [
                'bold' => false,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ]
        ];
        
        $spreadsheet->setActiveSheetIndex(0)->getStyle('A1:L5')->applyFromArray($styleHeaderLampiran);
        
        $styleKonten = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ]
            ]
        ];
        $spreadsheet->setActiveSheetIndex(0)->getStyle('A13:L'.($column-1))->applyFromArray($styleKonten);
        
        //tanda tangan
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('K'.($column+1), "Kota Mungkid,                    2025");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('B'.($column+2), "Pengguna Anggaran");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('F'.($column+2), "Pejabat Pelaksana Teknis Kegiatan");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('K'.($column+2), "Bendahara Pengeluaran");
        
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('B'.($column+7), "DIDIK KRISTIA,S.Kom., M.Sc");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('F'.($column+7), "IPNU PANGESTI AJI, S.Kom.");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('K'.($column+7), "AGUSTINA DWI KRISMAYANTI, S.A.P.");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('B'.($column+8), "NIP. 197611262005011004");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('F'.($column+8), "NIP. 198612192010011009");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('K'.($column+8), "NIP. 197903152010012015");
        
        //sheet lampiran
        $lampiran = $spreadsheet->createSheet();
        $lampiran->setTitle("Rincian");
        
        $lampiran->mergeCells('A1:I1');
        $lampiran->mergeCells('A2:I2');
        $lampiran->mergeCells('A3:I3');
        
        $lampiran->setCellValue('A1', "");
        $lampiran->setCellValue('A2', "LAMPIRAN TANDA TERIMA PERJALANAN DINAS DALAM DAERAH");
        $lampiran->setCellValue('A3', "SUB KEGIATAN PENGENDALIAN PELAKSANAAN PENANAMAN MODAL YANG MENJADI KEWENANGAN DAERAH KABUPATEN TAHUN 2025");
        $lampiran->setCellValue('A4', "BULAN XXXXXXXXXXXXXXX TAHUN 2025");
         //style header table
        $styleHeaderLampiran1 = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];
        
        $lampiran->getStyle('A1:I4')->applyFromArray($styleHeaderLampiran1);
        
        $lampiran->getColumnDimension('A')->setWidth(1, 'cm');
        $lampiran->getColumnDimension('B')->setWidth(4, 'cm');
        $lampiran->getColumnDimension('C')->setWidth(4, 'cm');
        $lampiran->getColumnDimension('D')->setWidth(12, 'cm');
        $lampiran->getColumnDimension('E')->setWidth(8, 'cm');
        $lampiran->getColumnDimension('F')->setWidth(4, 'cm');
        $lampiran->getColumnDimension('G')->setWidth(6, 'cm');
        $lampiran->getColumnDimension('H')->setAutoSize(true);
        $lampiran->getColumnDimension('I')->setWidth(3, 'cm');
        
        //header sheet 2
        $lampiran->setCellValue('A7', "NO");
        $lampiran->setCellValue('B7', "NO SURAT");
        $lampiran->setCellValue('C7', "TANGGAL SPT");
        $lampiran->setCellValue('D7', "DALAM RANGKA");
        $lampiran->setCellValue('E7', "TUJUAN");
        $lampiran->setCellValue('F7', "TANGGAL PELAKSANAAN");
        $lampiran->setCellValue('G7', "NOMOR SPPD");
        $lampiran->setCellValue('H7', "PELAKSANA");
        $lampiran->setCellValue('I7', "NOMINAL");
        //style header table
        $styleHeader1 = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ]
            ]
        ];
        
        $lampiran->getStyle('A7:I7')->applyFromArray($styleHeader1);
        
        $data_lampiran      = $this->tampilData($in);
        $column_lampiran    = 8;
        $urutan_lampiran    = 1;
        foreach ($data_lampiran as $row)
        {
            $no_orang =  $column_lampiran;
            foreach ($row['orang'] as $row_orang):
                $lampiran->setCellValue('G'.$no_orang,"");
                $lampiran->setCellValue('H'.$no_orang, $row_orang['nama_gelar']);
                $lampiran->setCellValueExplicit('I'.$no_orang, $row_orang['nominal'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_NUMERIC);
                $no_orang++;
            endforeach;
            
            $lokasi = "";
            foreach ($row['lokasi'] as $row_lokasi):
                $lokasi.=$row_lokasi["lokasi"]." (Kec. ".$row_lokasi['wilayah'].")"." dan ";
            endforeach;
            
            $lokasi = rtrim($lokasi," dan ");
            
            $lampiran->setCellValue('A'.$column_lampiran, $urutan_lampiran);
            $lampiran->mergeCells('A'.$column_lampiran.':A'.($column_lampiran+$row['jml_orang']-1));
            
            $lampiran->setCellValue('B'.$column_lampiran, $row['agenda']['nomor_surat']);
            $lampiran->mergeCells('B'.$column_lampiran.':B'.($column_lampiran+$row['jml_orang']-1));
            
            $lampiran->setCellValue('C'.$column_lampiran, tanggal_indo($row['agenda']['tanggal_surat']));
            $lampiran->mergeCells('C'.$column_lampiran.':C'.($column_lampiran+$row['jml_orang']-1));
            
            $lampiran->setCellValue('D'.$column_lampiran, $row['agenda']['kegiatan']);
            $lampiran->mergeCells('D'.$column_lampiran.':D'.($column_lampiran+$row['jml_orang']-1));
            
            $lampiran->setCellValue('E'.$column_lampiran, $lokasi);
            $lampiran->mergeCells('E'.$column_lampiran.':E'.($column_lampiran+$row['jml_orang']-1));
            
            $lampiran->setCellValue('F'.$column_lampiran, tanggal_indo($row['agenda']['tanggal_berangkat']));
            $lampiran->mergeCells('F'.$column_lampiran.':F'.($column_lampiran+$row['jml_orang']-1));
            
            $urutan_lampiran++;
            $column_lampiran += $row['jml_orang'] + 1;
        }
        
        //style konten
        $styleKonten1 = [
                'alignment' => [
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
        ];
        $lampiran->getStyle('A8:F'.($column_lampiran-1))->applyFromArray($styleKonten1);
        $lampiran->getStyle('C')->getAlignment()->setWrapText(true);
        $lampiran->getStyle('D')->getAlignment()->setWrapText(true);
        $lampiran->getStyle('E')->getAlignment()->setWrapText(true);
        $lampiran->getStyle('F')->getAlignment()->setWrapText(true);
        
        $styleKonten2 = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ]
            ]
        ];
        
        $lampiran->getStyle('A8:I'.($column_lampiran-1))->applyFromArray($styleKonten2);
        $lampiran->getStyle('I8:I'.($column_lampiran))->getNumberFormat()->setFormatCode('#,##0');
        
        //export
        $writer     = new Xlsx($spreadsheet);
        $filename   = "Tanda-terima-".date('Y-m-d-H-i-s').'-'.rand(1,99999);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        

    }
    
}