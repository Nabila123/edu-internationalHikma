<?php

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Hidehalo\Nanoid\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Stevebauman\Location\Facades\Location;

function uang($nominal = '', $rp = '1', $dec = 0)
{
    if ($nominal == '') {
        return '0';
    } else {
        if ($rp) {
            if ($dec)
                return number_format($nominal, 2, ',', '.');
            else
                return number_format($nominal, 0, ',', '.');
        } else
            return number_format($nominal, 2);
    }
}

function spasi($rekursive = 1)
{
    for ($a = 1; $a <= $rekursive; $a++) {
        echo '&nbsp;';
    }
}

function get_client_ip()
{
    $ipaddress = '';
    if ($_SERVER['REMOTE_ADDR']) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }

    return $ipaddress;
}

function formatTanggalPanjang($tanggal = '')
{
    if ($tanggal == '') {
        return ' - ';
    }

    $aBulan = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    [$thn, $bln, $tgl] = explode('-', $tanggal);
    $bln = $bln > 0 && $bln < 10 ? substr($bln, 1, 1) : $bln;
    return ((int) @$tgl) . ' ' . @$aBulan[$bln] . ' ' . @$thn;
}


function formatBulanTahun($tanggal)
{
    $aBulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    list($thn, $bln) = explode("-", $tanggal);
    $bln = (($bln > 0) && ($bln < 10)) ? substr($bln, 1, 1) : $bln;
    return $aBulan[$bln] . " " . $thn;
}

function formatTanggalBulan($tanggal)
{
    $aBulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    list($thn, $bln, $tgl) = explode("-", $tanggal);
    $bln = (($bln > 0) && ($bln < 10)) ? substr($bln, 1, 1) : $bln;
    return ((int)$tgl) . " " . $aBulan[$bln];
}

function romawi($n = '1')
{
    $hasil = '';
    $iromawi = array(
        '',
        'I',
        'II',
        'III',
        'IV',
        'V',
        'VI',
        'VII',
        'VIII',
        'IX',
        'X',
        20 => 'XX',
        30 => 'XXX',
        40 => 'XL',
        50 => 'L',
        60 => 'LX',
        70 => 'LXX',
        80 => 'LXXX',
        90 => 'XC',
        100 => 'C',
        200 => 'CC',
        300 => 'CCC',
        400 => 'CD',
        500 => 'D',
        600 => 'DC',
        700 => 'DCC',
        800 => 'DCCC',
        900 => 'CM',
        1000 => 'M',
        2000 => 'MM',
        3000 => 'MMM'
    );

    if (array_key_exists($n, $iromawi)) {
        $hasil = $iromawi[$n];
    } elseif ($n >= 11 && $n <= 99) {
        $i = $n % 10;
        $hasil = $iromawi[$n - $i] . Romawi($n % 10);
    } elseif ($n >= 101 && $n <= 999) {
        $i = $n % 100;
        $hasil = $iromawi[$n - $i] . Romawi($n % 100);
    } else {
        $i = $n % 1000;
        $hasil = $iromawi[$n - $i] . Romawi($n % 1000);
    }
    return $hasil;
}

function combo_jnskelamin($id = '', $selected = "")
{
    $h = "<select id='$id' name='$id' style='width:100%'>";
    $h .= '<option value="">Pilih Jenis Kelamin</option>';
    $h .= '<option ' . (($selected == '1') ? 'selected' : '') . ' value="1">Laki-laki</option>';
    $h .= '<option ' . (($selected == '2') ? 'selected' : '') . ' value="2">Perempuan</option>';
    $h .= '</select>';
    return $h;
}

function tanggal_indonesia()
{
    $bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    //    $cetak_date = $hari[(int)date("w")] .', '. date("j ") . $bulan[(int)date('m')] . date(" Y"); 
    $cetak_date = date("j ") . $bulan[(int)date('m')] . date(" Y");
    return $cetak_date;
}

function generateRandomString($length = 10, $type = 'username')
{
    $characters = '123456789';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }

    $checkType = User::where($type, $randomString)->first();
    if ($checkType != null) {
        generateRandomString($length, $type);
    }


    return $randomString;
}

function catat_log($aksi = '', $modul = '')
{
    $simpan = array(
        'aksi' => $aksi,
        'module' => $modul,
        'user' => Session::get('user_id'),
        'url' => Request::url(),
        'waktu' => date("Y-m-d H:i:s")
    );
    $save = DB::table('application_log')->insert($simpan);
}


function hari($hari)
{
    switch ($hari) {
        case '0':
            return '';
            break;
        case '1':
            return 'Senin';
            break;
        case '2':
            return 'Selasa';
            break;
        case '3':
            return 'Rabu';
            break;
        case '4':
            return 'Kamis';
            break;
        case '5':
            return "Jum'at";
            break;
        case '6':
            return 'Sabtu';
            break;
        case '7':
            return 'Minggu';
            break;
    }
}
function konversi_hari($hari)
{
    $hari = date("l", strtotime($hari));
    switch ($hari) {
        case 'Monday':
            return 'Senin';
            break;
        case 'Thuesday':
            return 'Selasa';
            break;
        case 'Wednesday':
            return 'Rabu';
            break;
        case 'Thursday':
            return 'Kamis';
            break;
        case 'Friday':
            return "Jum'at";
            break;
        case 'Saturday':
            return 'Sabtu';
            break;
        case 'Sunday':
            return 'Minggu';
            break;
    }
};

function get_username()
{
    $role = Session::get('role_id');
    if ($role == '2' || $role == '3' || $role == '4' || $role == '6') {
        $user = explode('-', Session::get('user_name'));
        $user = $user[1];
        return $user;
    }
}

function isSecure()
{
    return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || $_SERVER['SERVER_PORT'] == 443;
}

function getUserPhoto($id = '')
{
    $user = DB::table('users')->where('id', $id)->first();
    return ($user) ? $user->photo : 'assets/media/svg/avatars/blank.png';
}

function getUserUuid($id = '')
{
    $user = DB::table('users')->where('id', $id)->first();
    return ($user) ? $user->uuid : '';
}

function getUserId()
{
    return Session::get('id', Auth::user()->id);
}

function getRolesNameNavbar()
{
    $role = Role::select('name')
        ->where('id', getRolesId())
        ->first()->name;

    $roleParts = explode("-", $role);

    if (count($roleParts) == 1) {
        return $roleParts[0];
    }

    $roleName = implode(" ", array_slice($roleParts, 0, -1));

    return $roleName . " " . end($roleParts);
}

function getNamaUser($id = '')
{
    if ($id != NULL) {
        $user = DB::table('users')->where('id', $id)->first();
    } else {
        $user = DB::table('users')->where('id', getUserId())->first();
    }
    return ($user) ? $user->name : '';
}

function getEmailUser($id = '')
{
    $user = DB::table('users')->where('id', $id)->first();
    return ($user) ? $user->email : '';
}

function getRolesId()
{
    return DB::table('model_has_roles')->select('role_id')->where('model_id', getUserId())->first()->role_id;
}

function formatNoHp($nohp)
{
    // kadang ada penulisan no hp 0811 239 345
    $nohp = str_replace(" ", "", $nohp);
    // kadang ada penulisan no hp (0274) 778787
    $nohp = str_replace("(", "", $nohp);
    // kadang ada penulisan no hp (0274) 778787
    $nohp = str_replace(")", "", $nohp);
    // kadang ada penulisan no hp 0811.239.345
    $nohp = str_replace(".", "", $nohp);

    // cek apakah no hp mengandung karakter + dan 0-9
    if (!preg_match('/[^+0-9]/', trim($nohp))) {
        // cek apakah no hp karakter 1-3 adalah 62
        if (substr(trim($nohp), 0, 2) == '62') {
            $hp = trim($nohp);
        }
        // cek apakah no hp karakter 1 adalah 0
        elseif (substr(trim($nohp), 0, 1) == '0') {
            $hp = '62' . substr(trim($nohp), 1);
        }
    }
    return $hp;
}

function returnNoHp($nohp)
{
    $nohp = substr_replace($nohp, '0', 0, 2);
    return $nohp;
}

function returnTanggal($tanggal = '')
{
    // Creating timestamp from given date
    $timestamp = strtotime($tanggal);

    // Creating new date format from that timestamp
    $new_date = date("d-m-Y", $timestamp);
    return $new_date; // Outputs: 31-03-2019
}


function sendWa($number = '', $msg = '')
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://202.74.236.148:3000/sendText/bmt0125',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
        "number": ["' . $number . '"],
        "msg": "' . $msg . '",
        "delay": 1000
    }',
        CURLOPT_HTTPHEADER => array(
            'x-api-key: key-001',
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
}

function getUserClientIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }

    return $ip;
}

function getSelectRoles($id = '', $class = '', $selected = '', $width = '')
{
    $data = DB::table('roles')->get();

    $html = "<select id='$id' name='$id' class='form-control $class' style='width:$width'><option value=''></option>";

    foreach ($data as $dt) {
        $sel = ($selected == $dt->id) ? 'selected' : '';
        $html .= "<option value='$dt->id' $sel >$dt->name</option>";
    }

    $html .= "</select>";

    echo $html;
}

function getNanoId()
{
    $client = new Client();
    # more safer random generator
    echo $client->generateId($size = 21, $mode = Client::MODE_DYNAMIC);
}

function getUuid()
{
    $uuid = \Ramsey\Uuid\Uuid::uuid7();

    return $uuid;
}

function logsLogin()
{
    $data = DB::table('logs_login')->insert([
        // 'user_id'       => getUserUuid(),
        'user_id'       => "1111",
        'last_login_at' => Carbon::now()->toDateTimeString(),
        'last_login_ip' => getUserClientIP(),
    ]);
}

function getBadgeStatus($status)
{
    switch ($status) {
        case 'Tidak Aktif':
            return 'badge-light-danger';
            break;

        case 'Aktif':
            return 'badge-light-success';
            break;

        default:
            return 'badge-light-dark';
            break;
    }
}
