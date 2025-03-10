<?php

function entitiestag($variable)
{
    $variable = htmlentities($variable, ENT_QUOTES, 'UTF-8');
    if(strpos($variable, "&lt")>=1)
    {
        return substr($variable, 0, strpos($variable, "&lt"));
    }
    else{
        return $variable;
    }
}

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function rp($rp)
{
    if ($rp <> "-" || !empty($rp) || isset($rp)) {
        return 'Rp. ' . number_format($rp, 0, ',', '.');
    } else {
        return $rp;
    }
}
function nominal($rp)
{
    if ($rp <> "-" || !empty($rp) || isset($rp)) {
        return number_format($rp, 0, ',', '.');
    } else {
        return $rp;
    }
}

function norp($param)
{
    return preg_replace('/\./', '', $param);
}

function strip($param)
{
    if (empty($param) || $param==0 | $param=="0") {
        return "-";
    } else {
        return $param;
    }
}

function tanggal_Y($tgl)
{
    if ($tgl == '0000-00-00') {
        return "";
    } else {
        return date('Y', strtotime($tgl));
    }
}

function tanggal_m($tgl)
{
    if ($tgl == '0000-00-00') {
        return "";
    } else {
        return date('m', strtotime($tgl));
    }
}

function tanggal_d($tgl)
{
    if ($tgl == '0000-00-00') {
        return "";
    } else {
        return date('d', strtotime($tgl));
    }
}

function tanggal_Ymd($tgl)
{
    if ($tgl == '') {
        return "";
    } else {
        return date('Y-m-d', strtotime($tgl));
    }
}

function tanggal_siasn($tgl)
{
    if ($tgl == '') {
        return "";
    } else {
        return date('d-m-Y', strtotime($tgl));
    }
}

function tanggal_sistem($tgl)
{
    if ($tgl == '') {
        return "";
    } else {
        return date('Ymd', strtotime($tgl));
    }
}

function tanggal_efile($tgl)
{
    if ($tgl == '00000000' || empty($tgl))
    {
        return "";
    } 
    else
    {
        return date('dmY', strtotime($tgl));
    }
}

function tanggal_dMY($tgl)
{
    if ($tgl == '0000-00-00' || empty($tgl)) {
        return "";
    } else {
        return date('d M Y', strtotime($tgl));
    }
}

function tanggal_slash($tgl)
{
    if ($tgl == '0000-00-00' || empty($tgl)) {
        return "";
    } else {
        return date('d/m/Y', strtotime($tgl));
    }
}

function tanggal_dFY($tgl)
{
    return date('d F Y', strtotime($tgl));
}

function jam_Hi($tgl)
{
    return date('H:i', strtotime($tgl));
}

function tanggal_indo($tgl)
{
    if ($tgl == '0000-00-00' || empty($tgl) || ($tgl=='') || ($tgl=='1970-01-01') ) {
        return "";
    } else {
        return date('d', strtotime($tgl)) . ' ' . nama_full_bulan_indo(date('m', strtotime($tgl))) . ' ' . date('Y', strtotime($tgl));
    }
}

function bulan_indo($tgl)
{
    if ($tgl == '0000-00-00' || empty($tgl) || ($tgl=='') || ($tgl=='1970-01-01') ) {
        return "";
    } else {
        return nama_full_bulan_indo(date('m', strtotime($tgl))) . ' ' . date('Y', strtotime($tgl));
    }
}

function tanggal_indo_min($tgl)
{
    if ($tgl == '0000-00-00' || empty($tgl) || ($tgl=='') || ($tgl=='1970-01-01') ) {
        return "";
    } else {
        return date('d', strtotime($tgl)) . ' ' . nama_bulan_indo(date('m', strtotime($tgl))) . ' ' . date('Y', strtotime($tgl));
    }
}

function nama_bulan_indo($bln)
{
    $bln = (int)$bln;
    switch ($bln) {
        case '1':
            return "Jan";
            break;
        case '2':
            return "Feb";
            break;
        case '3':
            return "Mar";
            break;
        case '4':
            return "Apr";
            break;
        case '5':
            return "Mei";
            break;
        case '6':
            return "Jun";
            break;
        case '7':
            return "Jul";
            break;
        case '8':
            return "Agu";
            break;
        case '9':
            return "Sep";
            break;
        case '10':
            return "Okt";
            break;
        case '11':
            return "Nov";
            break;
        case '12':
            return "Des";
            break;
        default:
            return $bln;
            break;
    }
}

function nama_full_bulan_indo($bln)
{
    $bln = (int)$bln;
    switch ($bln) {
        case '1':
            return "Januari";
            break;
        case '2':
            return "Februari";
            break;
        case '3':
            return "Maret";
            break;
        case '4':
            return "April";
            break;
        case '5':
            return "Mei";
            break;
        case '6':
            return "Juni";
            break;
        case '7':
            return "Juli";
            break;
        case '8':
            return "Agustus";
            break;
        case '9':
            return "September";
            break;
        case '10':
            return "Oktober";
            break;
        case '11':
            return "November";
            break;
        case '12':
            return "Desember";
            break;
        default:
            return $bln;
            break;
    }
}

function yatidak($obj)
{
    if ($obj == 1) {
        return "<span class='badge badge-success badge-pill'>Ya</span>";
    } else if ($obj == 0) {
        return "<span class='badge badge-danger badge-pill'>Tidak</span>";
    } else {
        return "-";
    }
}

function yt($obj)
{
    if ($obj == 'ya') {
        return "<span class='badge badge-success badge-pill'>Ya</span>";
    } else if ($obj == 'tidak') {
        return "<span class='badge badge-danger badge-pill'>Tidak</span>";
    } else {
        return "-";
    }
}

function tipe_hirarki($obj)
{
    if ($obj == '1') {
        return "<span class='badge badge-primary badge-pill'>Menu</span>";
    } else if ($obj == '2') {
        return "<span class='badge badge-warning badge-pill'>Sub Menu</span>";
    } else {
        return "-";
    }
}

function nama_gelar($depan, $nama, $belakang)
{
    $depan      = trim($depan);
    $belakang   = trim($belakang);

    if (($depan <> '') || (!empty($depan))) {
        $depan = $depan . '. ';
    }

    if (($belakang <> '') || (!empty($belakang))) {
        $belakang = ', ' . $belakang;
    }

    return $depan . $nama . $belakang;
}

function penyebut($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10) . " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
    }
    return $temp;
}



function badge($favcolor)
{
    switch ($favcolor) {
        case "BELUM":
            return '<span class="badge bg-label-warning">' . $favcolor . '</span>';
            break;
        case "VALID":
            return '<span class="badge bg-label-success">' . $favcolor . '</span>';
            break;
        case "VERIFIKASI":
            return '<span class="badge bg-label-success">' . $favcolor . '</span>';
            break;
        case "SINKRON":
            return '<span class="badge bg-label-success">' . $favcolor . '</span>';
            break;
        case "TOLAK":
            return '<span class="badge bg-label-danger">' . $favcolor . '</span>';
            break;
        case "KONFIRMASI":
            return '<span class="badge bg-label-info">' . $favcolor . '</span>';
            break;
        case "HAPUS":
            return '<span class="badge bg-label-danger">' . $favcolor . '</span>';
            break;
        case "TAMBAH":
            return '<span class="badge bg-label-info">' . $favcolor . '</span>';
            break;
        default:
            return '<span class="badge bg-label-primary">' . $favcolor . '</span>';
    }
}


if ( ! function_exists( 'enkripsi' ) )
{
    function enkripsi($url)
    {
        $encrypter = \Config\Services::encrypter();
        $encoded   = base64_url_encode($encrypter->encrypt($url));
        return $encoded;
    }
}

if ( ! function_exists( 'dekripsi' ) )
{
    function dekripsi($encoded)
    {
        $encrypter = \Config\Services::encrypter();
        $first     = base64_url_decode($encoded);
        $second    = $encrypter->decrypt($first);
        return $second;
    }
}

function base64_url_encode($input) {
    return strtr(base64_encode($input), '+/=', '._-');
}

function base64_url_decode($input) {
    return base64_decode(strtr($input, '._-', '+/='));
}

function romawi($angka)
{
    $angka  = intval($angka);
    $result = '';
    
    $array = array(
        'M'  => 1000,
        'CM' => 900,
        'D'  => 500,
        'CD' => 400,
        'C'  => 100,
        'XC' => 90,
        'L'  => 50,
        'XL' => 40,
        'X'  => 10,
        'IX' => 9,
        'V'  => 5,
        'IV' => 4,
        'I'  => 1
    );
    
    foreach($array as $roman => $value){
        $matches = intval($angka/$value);
        
        $result .= str_repeat($roman,$matches);
        
        $angka = $angka % $value;
    }

    return $result;
}

function konversipangkat($golru)
{
    switch ($golru)
    {
        case "11":
            return "I";
            break;
        case "12":
            return "II";
            break;
        case "13":
            return "III";
            break;
        case "14":
            return "IV";
            break;
        case "21":
            return "V";
            break;
        case "22":
            return "VI";
            break;
        case "23":
            return "VII";
            break;
        case "24":
            return "VIII";
            break;
        case "31":
            return "IX";
            break;
        case "32":
            return "X";
            break;
        case "33":
            return "XI";
            break;
        case "34":
            return "XII";
            break;
        case "41":
            return "XIII";
            break;
        case "42":
            return "XIV";
            break;
        case "43":
            return "XV";
            break;
        case "44":
            return "XVI";
            break;
        case "45":
            return "XVII";
            break;
        default:
            return "-";
    }
}


function golru($golru)
{
    switch ($golru)
    {
        case "11":
            return "I/a";
            break;
        case "12":
            return "I/b";
            break;
        case "13":
            return "I/c";
            break;
        case "14":
            return "I/d";
            break;
        case "21":
            return "II/a";
            break;
        case "22":
            return "II/b";
            break;
        case "23":
            return "II/c";
            break;
        case "24":
            return "II/d";
            break;
        case "31":
            return "III/a";
            break;
        case "32":
            return "III/b";
            break;
        case "33":
            return "III/c";
            break;
        case "34":
            return "III/d";
            break;
        case "41":
            return "IV/a";
            break;
        case "42":
            return "IV/b";
            break;
        case "43":
            return "IV/c";
            break;
        case "44":
            return "IV/d";
            break;
        case "45":
            return "IV/e";
            break;
        default:
            return "-";
    }
}

function pangkat($golru)
{
    switch ($golru)
    {
        case "11":
            return "Juru Muda";
            break;
        case "12":
            return "Juru Muda Tk. I";
            break;
        case "13":
            return "Juru";
            break;
        case "14":
            return "Juru Tk. I";
            break;
        case "21":
            return "Pengatur Muda";
            break;
        case "22":
            return "Pengatur Muda Tk. I";
            break;
        case "23":
            return "Pengatur";
            break;
        case "24":
            return "Pengatur Tk. I";
            break;
        case "31":
            return "Penata Muda";
            break;
        case "32":
            return "Penata Muda Tk. I";
            break;
        case "33":
            return "Penata";
            break;
        case "34":
            return "Penata Tk. I";
            break;
        case "41":
            return "Pembina";
            break;
        case "42":
            return "Pembina Tk. I";
            break;
        case "43":
            return "Pembina Utama Muda";
            break;
        case "44":
            return "Pembina Utama Madya";
            break;
        case "45":
            return "Pembina UtamaPembina Utama";
            break;
        default:
            return "-";
    }
}

function today()
{
    $hari = date ("D");
    
    switch($hari){
        case 'Sun':
            $hari_ini = "Minggu";
        break;
        
        case 'Mon': 
            $hari_ini = "Senin";
        break;
        
        case 'Tue':
            $hari_ini = "Selasa";
        break;
        
        case 'Wed':
            $hari_ini = "Rabu";
        break;
        
        case 'Thu':
            $hari_ini = "Kamis";
        break;
        
        case 'Fri':
            $hari_ini = "Jumat";
        break;
        
        case 'Sat':
            $hari_ini = "Sabtu";
        break;
        
        default:
            $hari_ini = "Tidak di ketahui"; 
        break;
    }
    
    return $hari_ini;
}

function hari($tanggal)
{
    $hari = array ( 1 =>    'Senin',
			'Selasa',
			'Rabu',
			'Kamis',
			'Jumat',
			'Sabtu',
			'Minggu'
		);

    $num = date('N', strtotime($tanggal)); 
    return $hari[$num];
}
