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
        @page { margin:  55px 55px 94px 94px; font-family: Arial, Helvetica, sans-serif; }
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
            font-size: 18px;
            line-height: 18px;
            margin: 0;
            padding-left:15px;
        }

        .tg .tg-instansi {
            font-weight: 400;
            text-align: center;
            font-size: 23px;
            padding-left: 15px;
        }

        .tg .tg-alamat {
            text-align: center;
            font-size: 14px;
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
    </style>
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
    <!-- template -->
    <style>
        .judul{ 
            font-size: 16px; 
            line-height: 18px; 
            text-align: center;
        }

        .konten{
            font-size: 16px; 
            line-height: 18px; 
            text-align: left;
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
        }

        .tb-konten td{
            vertical-align:top
        }

        .tg .tg-hf2e{
            font-family:Arial, Helvetica, sans-serif !important;
            text-align:left;
        }

        .tg .tg-f5bs{
            font-family:Arial, Helvetica, sans-serif !important;
            text-align:center;
        }
    </style>
    <p class="judul">SURAT PERINTAH TUGAS<br>Nomor : ${nomor_naskah}</p>
    <br>
    <table style="width: 100%;border:none" class="tb-konten">
        <tbody>
            <tr>
                <td style="width: 10%;">Dasar</td>
                <td style="width: 2%">:</td>
                <td style="width: 3%">1.</td>
                <td style="width: 85%;text-align: justify;">Peraturan Pemerintah Nomor 5 Tahun 2021 tentang Penyelenggaraan Perizinan Berusaha Berbasis Risiko;</td>
            </tr>
            <tr>
                <td style="width: 10%;"></td>
                <td style="width: 2%"></td>
                <td style="width: 3%">2.</td>
                <td style="width: 80%;text-align: justify;">Peraturan Badan Koordinasi Penanaman Modal Nomor 5 Tahun 2021 tentang Pedoman dan Tata Cara Pengawasan Perizinan Berusaha Berbasis Risiko;</td>
            </tr>
            <tr>
                <td style="width: 10%;"></td>
                <td style="width: 2%"></td>
                <td style="width: 3%">3.</td>
                <td style="width: 85%;text-align: justify;">Peraturan Daerah Kabupaten Magelang Nomor: 19/2016 tentang Pembentukan dan Susunan Perangkat Daerah Kabupaten Magelang;</td>
            </tr>
            <tr>
                <td style="width: 10%;"></td>
                <td style="width: 2%"></td>
                <td style="width: 3%">4.</td>
                <td style="width: 85%;text-align: justify;">Peraturan Bupati Magelang Nomor: 14/2010 tanggal 12 April 2010 tentang Penandatanganan dan Penomoran Surat Perintah Perjalanan Dinas (SPPD) di Lingkungan Pemerintah Kabupaten Magelang;</td>
            </tr>
            <tr>
                <td style="width: 10%;"></td>
                <td style="width: 2%"></td>
                <td style="width: 3%">5.</td>
                <td style="width: 85%;text-align: justify;">Peraturan Daerah Nomor 11 Tahun 2023 tentang Anggaran Pendapatan dan Belanja Daerah Kabupaten Magelang Tahun Anggaran 2024 Tanggal 28 Desember 2023;</td>
            </tr>
            <tr>
                <td style="width: 10%;"></td>
                <td style="width: 2%"></td>
                <td style="width: 3%">6.</td>
                <td style="width: 85%;text-align: justify;">DPPA Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Nomor DPA/A.1/2/18.0.00.0.00.01.0000/001/2004 tanggal 16 Februari 2024;</td>
            </tr>
        </tbody>
    </table>
    <br>
    <p class="judul">MEMERINTAHKAN</p>
    <br>
    <table style="width: 100%;border:none" class="tb-konten">
        <tbody>
            <?php $i=1; foreach($pengikut as $row) : ?>
            <tr>
                <?php if($i==1){?>
                    <td style="width: 10%;">Kepada</td>
                    <td style="width: 2%">:</td>
                <?php } else{ ?>
                    <td style="width: 10%;"></td>
                    <td style="width: 2%"></td>
                <?php } ?>
                
                <td style="width: 3%"><?=$i;?>.</td>
                <td style="width: 15%;">Nama</td>
                <td style="width: 2%">:</td>
                <td style="width: 68%; text-align: justify;"><?=$row['nama_gelar'];?></td>
            </tr>
            <tr>
                <td style="width: 10%;"></td>
                <td style="width: 2%"></td>
                <td style="width: 3%"></td>
                <td style="width: 15%;">NIP</td>
                <td style="width: 2%">:</td>
                <td style="width: 68%"><?=$row['nip'];?></td>
            </tr>
            <tr>
                <td style="width: 10%;"></td>
                <td style="width: 2%"></td>
                <td style="width: 3%"></td>
                <td style="width: 15%;">Pangkat/Gol.</td>
                <td style="width: 2%">:</td>
                <td style="width: 68%"><?=$row['pangkat'];?>, <?=$row['golru'];?></td>
            </tr>
            <tr>
                <td style="width: 10%;"></td>
                <td style="width: 2%"></td>
                <td style="width: 3%"></td>
                <td style="width: 15%;">Jabatan</td>
                <td style="width: 2%">:</td>
                <td style="width: 68%; text-align: justify;"><?=$row['jabatan'];?> pada <?=$row['opd'];?></td>
            </tr>
            <?php $i++;endforeach; ?>
        </tbody>
    </table>
    </table>
    <br>
    <table style="width: 100%;border:none" class="tb-konten">
        <tbody>
            <tr>
                <td style="width: 10%;">Untuk</td>
                <td style="width: 2%">:</td>
                <td style="width: 3%">1.</td>
                <td colspan="3" style="width: 85%; text-align: justify;">Melaksanakan tugas perjalanan dinas dalam daerah dalam rangka <?=$tujuan;?> pada:</td>
            </tr>
            <tr>
                <td style="width: 10%;"></td>
                <td style="width: 2%"></td>
                <td style="width: 3%"></td>
                <td style="width: 15%">Hari/tanggal</td>
                <td style="width: 5%">:</td>
                <td style="width: 65%; text-align: justify;"><?=$hari;?>, <?=$tanggal;?></td>
            </tr>
            <tr>
                <td style="width: 10%;"></td>
                <td style="width: 2%"></td>
                <td style="width: 3%"></td>
                <td style="width: 15%">Lokasi</td>
                <td style="width: 5%">:</td>
                <td style="width: 65%; text-align: justify;">
                <?php $urut_lokasi=1;foreach($lokasi as $rl): ?>
                    <?=$urut_lokasi.". ".$rl['lokasi'];?><br><?=$rl['alamat'];?><br>
                <?php $urut_lokasi++;endforeach;?>
                </td>
            </tr>
            <tr>
                <td style="width: 10%;"></td>
                <td style="width: 2%"></td>
                <td style="width: 4%">2.</td>
                <td colspan="3" style="width: 85%; text-align: justify;">Melaporkan hasil pelaksanaan tugas kepada pejabat pemberi tugas.</td>
            </tr>
            <tr>
                <td style="width: 10%;"></td>
                <td style="width: 2%"></td>
                <td style="width: 3%">3.</td>
                <td colspan="3" style="width: 85%; text-align: justify;">Perintah ini dilaksanakan dengan penuh tanggung jawab.</td>
            </tr>
        </tbody>
    </table>
    <br>
    <table class="tg" style="width: 100%;border:none">
        <thead>
            <tr>
                <td class="tg-hf2e" style="width:45%"></td>
                <td class="tg-hf2e" style="width:2%"></td>
                <td class="tg-hf2e" style="width:51%;padding-left :75px">Dikeluarkan di Kota Mungkid</td>
                <td class="tg-hf2e" style="width:2%"></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tg-hf2e"></td>
                <td class="tg-hf2e"></td>
                <td class="tg-hf2e" style="padding-left :75px; padding-bottom:10px">Pada Tanggal ${tanggal_naskah}</td>
                <td class="tg-hf2e"></td>
            </tr>
            <tr>
                <td class="tg-hf2e"></td>
                <td class="tg-f5bs" colspan="3">Plt. KEPALA DINAS PENANAMAN MODAL<br>DAN PELAYANAN TERPADU SATU PINTU<br>KABUPATEN MAGELANG,<br>SEKRETARIS</td>
            </tr>
            <tr>
                <td class="tg-hf2e"></td>
                <td class="tg-hf2e"></td>
                <td class="tg-f5bs" style="padding:60px 0px 60px 15px;">${ttd_pengirim}</td>
                <td class="tg-hf2e"></td>
            </tr>
            <tr>
                <td class="tg-hf2e"></td>
                <td class="tg-hf2e"></td>
                <td class="tg-f5bs"><span style="text-decoration:underline;padding-top:40px">DIDIK KRISTIA SOFIAN, S.Kom., M.Sc</span></td>
                <td class="tg-hf2e"></td>
            </tr>
            <tr>
                <td class="tg-hf2e"></td>
                <td class="tg-hf2e"></td>
                <td class="tg-f5bs">Pembina</td>
                <td class="tg-hf2e"></td>
            </tr>
            <tr>
                <td class="tg-hf2e"></td>
                <td class="tg-hf2e"></td>
                <td class="tg-f5bs">NIP. 197611262005011004</td>
                <td class="tg-hf2e"></td>
            </tr>
        </tbody>
    </table>
</body>
</html>