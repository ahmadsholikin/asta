<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- template -->
    <style type="text/css">
        @page { margin:  45px 35px 55px 55px; font-family: Arial, Helvetica, sans-serif; font-size: 13px; }
        body { margin: 0px; }
        /** Define the footer rules **/
        footer {
            position: fixed; 
            bottom: 0px; 
            left: 0px; 
            right: 0px;
            height: 28px;
            border-top:0.5px solid #BEBEBE;
            color: #949494;
        }

        footer p {
            font-size: 10px;
        }

        p{
            font-family: Arial, sans-serif;
        }

        .tg {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .tg td {
            font-family: Arial, sans-serif;
            overflow: hidden;
            padding: 0;
            margin: 0;
            word-break: normal;
        }

        .tg .tg-logo {
            text-align: center;
            vertical-align: middle;
        }

        .tg .tg-logo img{
            height:95px;
            width:auto;
        }

        .tg .tg-kab {
            font-weight: 400;
            text-align: center;
            font-size: 17px;
            line-height: 17px;
            margin: 0;
            padding-left:15px;
        }

        .tg .tg-instansi {
            font-weight: 400;
            text-align: center;
            font-size: 22px;
            padding-left: 15px;
        }

        .tg .tg-alamat {
            text-align: center;
            font-size: 13px;
            padding-left: 15px;
        }

        .line-2{
            border: 1.2px solid #000;
            margin-top: 5px;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .line-1{
            margin-top: 2px;
            border: 0.5px solid #000;
        }
        
        .page_break { 
            page-break-before: always; 
        }
    </style>
    <?php $jml = count($pengikut); $iterasi=1; foreach ($pengikut as $key) :?>
    <table class="tg" style="width: 100%;border:none">
        <thead>
            <tr>
                <td class="tg-logo" rowspan="3">
                    <img src="<?=base_url().'public/assets/image/magelangkab.png';?>">
                </td>
                <td class="tg-kab">PEMERINTAH KABUPATEN MAGELANG</td>
            </tr>
            <tr>
                <td class="tg-instansi">DINAS PENANAMAN MODAL<br>DAN PELAYANAN SATU PINTU TERPADU</td>
            </tr>
            <tr>
                <td class="tg-alamat">Jl. Soekarno Hatta No. 20 Kota Mungkid Telp. (0293) 788249 Fax. (0293) 789549 Kota Mungkid Kode Pos : 56511 website : www.dpmptsp.magelangkab.go.id <br>email : dpmptspkabupatenmagelang@gmail.com </td>
            </tr>
        </thead>
    </table>
    <div class="line-2"></div>
    <div class="line-1"></div>
    <style>
        .title{
            font-size: 17px; 
            line-height: 19px; 
            text-align: center;
            text-decoration: underline;
            padding: 0;
            margin: 10px 0;
        }

        .ta-left{
            text-align: left;
        }

        .ta-justify{
            text-align: justify;
        }

        .tb-konten{
            font-family: Arial, sans-serif;
            overflow: hidden;
            padding: 0;
            margin: 0;
            word-break: normal;
            font-size: 13px; 
            line-height: 15px; 
            text-align: left;
        }
        
        .tb-konten td{
            padding: 3px 5px;
            vertical-align:top;
        }

        .tg .tg-hf2e{
            font-family:Arial, Helvetica, sans-serif !important;
            text-align:left;
            font-size: 13px; 
            line-height: 15px; 
        }

        .tg .tg-f5bs{
            font-family:Arial, Helvetica, sans-serif !important;
            text-align:center;
            font-size: 13px; 
            line-height: 15px;
        }
        
        .fit-1{
            width: 60%;
            border: none;
            font-size: 13px;
            line-height: 15px;
            padding: 0;
            margin: 0;
        }
        
        .fit-2{
            width: 17%;
            border: none;
            font-size: 13px;
            line-height: 15px;
            padding: 0;
            margin: 0;
        }
        
        .fit-3{
            width: 3%;
            border: none;
            font-size: 13px;
            line-height: 15px;
            padding: 0;
            margin: 0;
        }
        
        .fit-4{
            width: 20%;
            border: none;
            font-size: 13px;
            line-height: 15px;
            padding: 0;
            margin: 0;
        }
        
        .box-1{
            width: 5%;
        }
        
        .box-2{
            width: 35%;
        }
        
        .box-3{
            width: 30%;
        }
        
        .box-4{
            width: 30%;
        }
    </style>
    <table style="width: 100%;border:none;margin-top:10px" class="tb-konten">
        <tbody>
            <tr>
                <td class="fit-1" style="border: none;"></td>
                <td class="fit-2" style="border: none;">Lembar ke</td>
                <td class="fit-3" style="border: none;">:</td>
                <td class="fit-4" style="border: none;"></td>
            </tr>
            <tr>
                <td class="fit-1" style="border: none;"></td>
                <td class="fit-2" style="border: none;">Kode No</td>
                <td class="fit-3" style="border: none;">:</td>
                <td class="fit-4" style="border: none;">094</td>
            </tr>
            <tr>
                <td class="fit-1" style="border: none;"></td>
                <td class="fit-2" style="border: none;">Nomor</td>
                <td class="fit-3" style="border: none;">:</td>
                <td class="fit-4" style="border: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/16/DD/2025</td>
            </tr>
        </tbody>
    </table>
    <h5 class="title">SURAT PERJALANAN DINAS (SPD)</h5>
    <style>
        .tb-konten{
            border-collapse:collapse;
            border-spacing:0;
            font-size: 13px;
        }
        
        .tb-konten td{
            border-color:black;
            border-style:solid;
            border-width:1px;
        }
        
        ol{
            margin-top: 0;
            margin-left: 0;
            margin-bottom: 5px;
            padding-left: 20px;
        }
    </style>
    <table style="width: 100%" class="tb-konten">
        <tbody>
            <tr>
                <td class="box-1">1.</td>
                <td class="box-2">Pengguna Anggaran / Kuasa Pengguna Anggaran</td>
                <td class="box-3" colspan="2">DIDIK KRISTIA SOFIAN, S.Kom., M.Sc</td>
            </tr>
            <tr>
                <td class="box-1">2.</td>
                <td class="box-2">Nama / NIP Pegawai yang melaksanakan perjalanan dinas</td>
                <td class="box-3" colspan="2"><?=$key['nama_gelar'];?> <br>NIP. <?=$key['nip'];?></td>
            </tr>
            <tr>
                <td class="box-1">3.</td>
                <td class="box-2">
                    <ol type="a">
                        <li>Pangkat dan Golongan</li>
                        <li>Jabatan / Instansi</li>
                        <li>Tingkat Biaya Perjalanan Dinas</li>
                    </ol>
                </td>
                <td class="box-3" colspan="2">
                    <ol type="a">
                        <li><?=$key['pangkat'];?>, <?=$key['golru'];?></li>
                        <li><?=$key['jabatan'];?> pada <?=$key['opd'];?></li>
                        <li><?=$key['tingkat'];?></li>
                    </ol>
                </td>
            </tr>
            <tr>
                <td class="box-1">4.</td>
                <td class="box-2">Maksud Perjalanan Dinas</td>
                <td class="box-3" colspan="2" style="text-align: justify;"><?=$kegiatan;?> pada <?=$tujuan;?></td>
            </tr>
            <tr>
                <td class="box-1">5.</td>
                <td class="box-2">Alat angkut yang dipergunakan</td>
                <td class="box-3" colspan="2">Kendaraan Dinas / Umum</td>
            </tr>
            <tr>
                <td class="box-1">6.</td>
                <td class="box-2">
                    <ol type="a">
                        <li>Tempat Berangkat</li>
                        <li>Tempat tujuan</li>
                    </ol>
                </td>
                <td class="box-3" colspan="2">
                    <ol type="a">
                        <li>DPMPTSP Kabupaten Magelang</li>
                        <li><?=$tujuan;?></li>
                    </ol>
                </td>
            </tr>
            <tr>
                <td class="box-1">7.</td>
                <td class="box-2">
                    <ol type="a">
                        <li>Lamanya perjalanan dinas</li>
                        <li>Tanggal berangkat</li>
                        <li>Tanggal harus kembali / tiba di tempat baru *)</li>
                    </ol>
                </td>
                <td class="box-3" colspan="2">
                    <ol type="a">
                        <li>1 ( Satu) Hari</li>
                        <li><?=$tanggal_berangkat;?></li>
                        <li><?=$tanggal_pulang;?></li>
                    </ol>
                </td>
            </tr>
            <tr>
                <td class="box-1">8.</td>
                <td class="box-2">Pengikut : Nama</td>
                <td class="box-3">Tanggal Lahir</td>
                <td class="box-4">Keterangan</td>
            </tr>
            <tr>
                <td class="box-1"></td>
                <td class="box-2">
                    <ol type="1">
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                    </ol>
                </td>
                <td class="box-3" colspan="2"></td>
            </tr>
            <tr>
                <td class="box-1">9.</td>
                <td class="box-2">
                    Pembebanan Anggaran<br>
                    <ol type="a">
                        <li>SKPD</li>
                        <li>Kode Rekening</li>
                    </ol>
                </td>
                <td class="box-3" colspan="2">
                    <br>
                    <ol type="a">
                        <li>DPMPTSP Kabupaten Magelang</li>
                        <li>5.1.02.04.01.0003</li>
                    </ol>
                </td>
            </tr>
            <tr>
                <td class="box-1">10.</td>
                <td class="box-2">Keterangan lain-lain</td>
                <td class="box-3" colspan="2">Setelah selesai laporan</td>
            </tr>
        </tbody>
    </table>
    <p style="font-size: 14px;">&nbsp;&nbsp;&nbsp;*) coret yang tidak perlu</p>
    <table class="tg" style="width: 100%;border:none">
        <thead>
            <tr>
                <td class="tg-hf2e" style="width:45%"></td>
                <td class="tg-hf2e" style="width:2%"></td>
                <td class="tg-hf2e" style="width:25%;padding-left :75px">Dikeluarkan di</td>
                <td class="tg-hf2e" style="width:2%">:</td>
                <td class="tg-hf2e" style="width:24%">Kota Mungkid</td>
                <td class="tg-hf2e" style="width:2%"></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tg-hf2e"></td>
                <td class="tg-hf2e"></td>
                <td class="tg-hf2e" style="padding-left :75px; padding-bottom:10px">Pada Tanggal</td>
                <td class="tg-hf2e">:</td>
                <td class="tg-hf2e">${tanggal_naskah}</td>
                <td class="tg-hf2e"></td>
            </tr>
            <tr>
                <td class="tg-hf2e"></td>
                <td class="tg-f5bs" colspan="5">PENGGUNA ANGGARAN</td>
            </tr>
            <tr>
                <td class="tg-hf2e"></td>
                <td class="tg-hf2e"></td>
                <td class="tg-f5bs" colspan="3" style="padding:60px 0px 60px 15px;">${ttd_pengirim}</td>
                <td class="tg-hf2e"></td>
            </tr>
            <tr>
                <td class="tg-hf2e"></td>
                <td class="tg-hf2e"></td>
                <td class="tg-f5bs" colspan="3"><span style="text-decoration:underline;padding-top:40px;text-decoration-color:#000">DIDIK KRISTIA SOFIAN, S.Kom., M.Sc</span></td>
                <td class="tg-hf2e"></td>
            </tr>
            <tr>
                <td class="tg-hf2e"></td>
                <td class="tg-hf2e"></td>
                <td class="tg-f5bs" colspan="3">Pembina</td>
                <td class="tg-hf2e"></td>
            </tr>
            <tr>
                <td class="tg-hf2e"></td>
                <td class="tg-hf2e"></td>
                <td class="tg-f5bs" colspan="3">NIP. 197611262005011004</td>
                <td class="tg-hf2e"></td>
            </tr>
        </tbody>
    </table>
    <div class="page_break"></div>
    <style>
        .mid-1{
            width: 5%;
        }
        
        .mid-2{
            width: 3%;
        }
        
        .mid-3{
            width: 15%;
        }
        
        .bt-0{
            border-top:1px solid #fff;
        }
        
        .bl-0{
            border-left:1px solid #fff;
        }
        
        .br-0{
            border-right:1px solid #fff;
        }
        
        .bb-0{
            border-bottom:1px solid #fff;
        }
        
        span{
            font-size: 13px;
        }
    </style>
    <table style="width: 100%" class="tb-konten">
        <tbody>
            <tr>
                <td style="border-bottom: none;"></td>
                <td colspan="3" style="border-bottom: none;"></td>
                <td class="mid-2" style="border-bottom: none;border-right:none;">I.</td>
                <td colspan="2" style="border-bottom: none;border-left:none;border-right:none">Berangkat dari</td>
                <td class="mid-2" style="border-bottom: none;border-left:none;border-right:none">:</td>
                <td style="border-bottom: none;border-left:none;">DPMPTSP Kab. Magelang</td>
            </tr>
            <tr>
                <td style="border-bottom:none;border-top:none"></td>
                <td colspan="3" style="border-bottom:none;border-top:none"></td>
                <td style="border-bottom:none;border-top:none;border-right: none;"></td>
                <td colspan="4" style="border-bottom:none;border-top:none;border-left: none;" >(tempat kedudukan)</td>
            </tr>
            <tr>
                <td style="border-bottom:none;border-top:none"></td>
                <td style="border-bottom:none;border-top:none" colspan="3"></td>
                <td style="border-bottom:none;border-top:none;border-right: none;"></td>
                <td style="border:none" colspan="2">Ke</td>
                <td style="border:none">:</td>
                <td style="border-bottom:none;border-top:none;border-left: none;"><?=$tujuan;?></td>
            </tr>
            <tr>
                <td style="border-bottom:none;border-top:none"></td>
                <td colspan="3" style="border-bottom:none;border-top:none"></td>
                <td style="border-bottom:none;border-top:none;border-right: none;"></td>
                <td colspan="2" style="border:none">Pada Tanggal</td>
                <td style="border:none">:</td>
                <td style="border-bottom:none;border-top:none;border-left: none;"><?=$tanggal_berangkat;?></td>
            </tr>
            <tr>
                <td style="border-bottom:none;border-top:none"></td>
                <td colspan="3" style="border-bottom:none;border-top:none"></td>
                <td style="border-bottom:none;border-top:none;border-right: none;"></td>
                <td colspan="2"style="border:none">Kepala</td>
                <td style="border:none">:</td>
                <td style="border-bottom:none;border-top:none;border-left: none;"></td>
            </tr>
            <tr>
                <td style="border-bottom:none;border-top:none"></td>
                <td colspan="3" style="border-bottom:none;border-top:none"></td>
                <td colspan="5" style="text-align: center;border-bottom:none;border-top:none;" height="70">Selaku Pejabat Teknis Kegiatan</td>
            </tr>
            <tr>
                <td style="border-bottom:none;border-top:none"></td>
                <td colspan="3" style="border-bottom:none;border-top:none"></td>
                <td colspan="5" style="text-align: center;text-decoration: underline;border-bottom:none;border-top:none"><?=$pptk_nama;?></td>
            </tr>
            <tr>
                <td style="border-bottom:none;border-top:none"></td>
                <td colspan="3" style="border-bottom:none;border-top:none"></td>
                <td colspan="5" style="text-align: center;border-top:none;">NIP. <?=$pptk_id;?></td>
            </tr>
            <tr>
                <td class="mid-1">II.</td>
                <td class="mid-3" style="border-right:none;">Tiba</td>
                <td class="mid-2" style="border-left:none;border-right: none;">:</td>
                <td style="border-left: none;"><?=$tujuan_1;?></td>
                <td colspan="2" style="border-right:none;">Tiba</td>
                <td class="mid-2" style="border-left:none;border-right: none;">:</td>
                <td colspan="2" style="border-left: none;"><?=$tujuan_1;?></td>
            </tr>
            <tr>
                <td class="mid-1"></td>
                <td style="border-right:none;">Pada Tanggal</td>
                <td style="border-left:none;border-right: none;">:</td>
                <td style="border-left: none;"><?=$tanggal_1;?></td>
                <td style="border-right:none;" colspan="2">Pada Tanggal</td>
                <td style="border-left:none;border-right: none;">:</td>
                <td style="border-left: none;" colspan="2"><?=$tanggal_1;?></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3"  height="100"></td>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td class="mid-1">III.</td>
                <td style="border-right:none;">Tiba</td>
                <td style="border-left:none;border-right: none;">:</td>
                <td style="border-left: none;" ><?=$tujuan_2;?></td>
                <td style="border-right:none;" colspan="2">Tiba</td>
                <td style="border-left:none;border-right: none;">:</td>
                <td style="border-left: none;" colspan="2"><?=$tujuan_2;?></td>
            </tr>
            <tr>
                <td class="mid-1" ></td>
                <td style="border-right:none">Pada Tanggal</td>
                <td style="border-left:none;border-right: none;">:</td>
                <td style="border-left:none"><?=$tanggal_2;?></td>
                <td style="border-right:none" colspan="2">Pada Tanggal</td>
                <td style="border-left:none;border-right: none;">:</td>
                <td style="border-left:none" colspan="2"><?=$tanggal_2;?></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3" height="100"></td>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td class="mid-1">IV.</td>
                <td style="border-right:none;">Tiba</td>
                <td style="border-left:none;border-right: none;">:</td>
                <td style="border-left:none" >DPMPTSP Kab. Magelang</td>
                <td colspan="5" rowspan="4" style="text-align: justify;">Telah diperiksa, dengan keterangan bahwa perjalanan tersebut di atas dilakukan atas perintahnya dan semata-mata untuk kepentingan jabatan dalam waktu yang sesingkat-singkatnya</td>
            </tr>
            <tr>
                <td class="mid-1">V.</td>
                <td style="border-right:none">Pada Tanggal</td>
                <td style="border-left:none;border-right:none">:</td>
                <td style="border-left:none"><?=$tanggal_pulang;?></td>
            </tr>
            <tr>
                <td class="mid-1" style="border-bottom:none"></td>
                <td style="border:none">Kepala</td>
                <td style="border:none">:</td>
                <td style="border:none" >DPMPTSP</td>
            </tr>
            <tr>
                <td class="mid-1" style="border-top:none"></td>
                <td colspan="3" style="text-align: center;border-top:none">
                    <span > Pengguna Anggaran</span>
                    <br><br><br><br><br><br>
                    <span style="text-decoration: underline;">DIDIK KRISTIA SOFIAN, S.Kom., M.Sc</span>
                    <br>
                    <span >NIP. 197611262005011004</span>
                </td>
            </tr>
            <tr>
                <td>VI.</td>
                <td colspan="8">Catatan Lain-lain</td>
            </tr>
            <tr>
                <td>VII.</td>
                <td colspan="8" style="text-align: justify;">PERHATIAN:<br>
                Pengguna Anggaran/Kuasa Pengguna Anggaran yang menerbitkan SPD, pejabat/pegawai/pihak lain yang melakukan perjalanan dinas, para pejabat yang mengesahkan tanggal berangkat/tiba, serta bendahara pengeluaran bertanggung jawab berdasarkan peraturan-peraturan Keuangan Daerah apabila negara menderita rugi akibat kesalahan, kelalaian, dan kealpaannya.
                </td>
            </tr>
        </tbody>
    </table>
    <?php if($jml>$iterasi){ ?>
    <div class="page_break"></div>
    <?php } ?>
    <?php  $iterasi++; endforeach;?>