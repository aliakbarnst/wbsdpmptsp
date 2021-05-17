<?php

function bersih( $str, $delimiter = '-', $options = array() )
{

    $str = mb_convert_encoding( ( string ) $str, 'UTF-8', mb_list_encodings() );

    $defaults = array(
        'delimiter' => $delimiter,
        'limit' => null,
        'lowercase' => true,
        'replacements' => array(),
        'transliterate' => false,
    );

    $options = array_merge( $defaults, $options );

    $char_map = array(
        // Latin
        'ÃƒÂ€' => 'A', 'ÃƒÂ' => 'A', 'ÃƒÂ‚' => 'A', 'ÃƒÂƒ' => 'A', 'ÃƒÂ„' => 'A', 'ÃƒÂ…' => 'A', 'ÃƒÂ†' => 'AE', 'ÃƒÂ‡' => 'C',
        'ÃƒÂˆ' => 'E', 'ÃƒÂ‰' => 'E', 'ÃƒÂŠ' => 'E', 'ÃƒÂ‹' => 'E', 'ÃƒÂŒ' => 'I', 'ÃƒÂ' => 'I', 'ÃƒÂŽ' => 'I', 'ÃƒÂ' => 'I',
        'ÃƒÂ' => 'D', 'ÃƒÂ‘' => 'N', 'ÃƒÂ’' => 'O', 'ÃƒÂ“' => 'O', 'ÃƒÂ”' => 'O', 'ÃƒÂ•' => 'O', 'ÃƒÂ–' => 'O', 'Ã…Â' => 'O',
        'ÃƒÂ˜' => 'O', 'ÃƒÂ™' => 'U', 'ÃƒÂš' => 'U', 'ÃƒÂ›' => 'U', 'ÃƒÂœ' => 'U', 'Ã…Â°' => 'U', 'ÃƒÂ' => 'Y', 'ÃƒÂž' => 'TH',
        'ÃƒÂŸ' => 'ss',
        'Ãƒ ' => 'a', 'ÃƒÂ¡' => 'a', 'ÃƒÂ¢' => 'a', 'ÃƒÂ£' => 'a', 'ÃƒÂ¤' => 'a', 'ÃƒÂ¥' => 'a', 'ÃƒÂ¦' => 'ae', 'ÃƒÂ§' => 'c',
        'ÃƒÂ¨' => 'e', 'ÃƒÂ©' => 'e', 'ÃƒÂª' => 'e', 'ÃƒÂ«' => 'e', 'ÃƒÂ¬' => 'i', 'ÃƒÂ­' => 'i', 'ÃƒÂ®' => 'i', 'ÃƒÂ¯' => 'i',
        'ÃƒÂ°' => 'd', 'ÃƒÂ±' => 'n', 'ÃƒÂ²' => 'o', 'ÃƒÂ³' => 'o', 'ÃƒÂ´' => 'o', 'ÃƒÂµ' => 'o', 'ÃƒÂ¶' => 'o', 'Ã…Â‘' => 'o',
        'ÃƒÂ¸' => 'o', 'ÃƒÂ¹' => 'u', 'ÃƒÂº' => 'u', 'ÃƒÂ»' => 'u', 'ÃƒÂ¼' => 'u', 'Ã…Â±' => 'u', 'ÃƒÂ½' => 'y', 'ÃƒÂ¾' => 'th',
        'ÃƒÂ¿' => 'y',

        // Latin symbols
        'Ã‚Â©' => '(c)',

        // Greek
        'ÃŽÂ‘' => 'A', 'ÃŽÂ’' => 'B', 'ÃŽÂ“' => 'G', 'ÃŽÂ”' => 'D', 'ÃŽÂ•' => 'E', 'ÃŽÂ–' => 'Z', 'ÃŽÂ—' => 'H', 'ÃŽÂ˜' => '8',
        'ÃŽÂ™' => 'I', 'ÃŽÂš' => 'K', 'ÃŽÂ›' => 'L', 'ÃŽÂœ' => 'M', 'ÃŽÂ' => 'N', 'ÃŽÂž' => '3', 'ÃŽÂŸ' => 'O', 'ÃŽ ' => 'P',
        'ÃŽÂ¡' => 'R', 'ÃŽÂ£' => 'S', 'ÃŽÂ¤' => 'T', 'ÃŽÂ¥' => 'Y', 'ÃŽÂ¦' => 'F', 'ÃŽÂ§' => 'X', 'ÃŽÂ¨' => 'PS', 'ÃŽÂ©' => 'W',
        'ÃŽÂ†' => 'A', 'ÃŽÂˆ' => 'E', 'ÃŽÂŠ' => 'I', 'ÃŽÂŒ' => 'O', 'ÃŽÂŽ' => 'Y', 'ÃŽÂ‰' => 'H', 'ÃŽÂ' => 'W', 'ÃŽÂª' => 'I',
        'ÃŽÂ«' => 'Y',
        'ÃŽÂ±' => 'a', 'ÃŽÂ²' => 'b', 'ÃŽÂ³' => 'g', 'ÃŽÂ´' => 'd', 'ÃŽÂµ' => 'e', 'ÃŽÂ¶' => 'z', 'ÃŽÂ·' => 'h', 'ÃŽÂ¸' => '8',
        'ÃŽÂ¹' => 'i', 'ÃŽÂº' => 'k', 'ÃŽÂ»' => 'l', 'ÃŽÂ¼' => 'm', 'ÃŽÂ½' => 'n', 'ÃŽÂ¾' => '3', 'ÃŽÂ¿' => 'o', 'ÃÂ€' => 'p',
        'ÃÂ' => 'r', 'ÃÂƒ' => 's', 'ÃÂ„' => 't', 'ÃÂ…' => 'y', 'ÃÂ†' => 'f', 'ÃÂ‡' => 'x', 'ÃÂˆ' => 'ps', 'ÃÂ‰' => 'w',
        'ÃŽÂ¬' => 'a', 'ÃŽÂ­' => 'e', 'ÃŽÂ¯' => 'i', 'ÃÂŒ' => 'o', 'ÃÂ' => 'y', 'ÃŽÂ®' => 'h', 'ÃÂŽ' => 'w', 'ÃÂ‚' => 's',
        'ÃÂŠ' => 'i', 'ÃŽÂ°' => 'y', 'ÃÂ‹' => 'y', 'ÃŽÂ' => 'i',

        // Turkish
        'Ã…Âž' => 'S', 'Ã„Â°' => 'I', 'ÃƒÂ‡' => 'C', 'ÃƒÂœ' => 'U', 'ÃƒÂ–' => 'O', 'Ã„Âž' => 'G',
        'Ã…ÂŸ' => 's', 'Ã„Â±' => 'i', 'ÃƒÂ§' => 'c', 'ÃƒÂ¼' => 'u', 'ÃƒÂ¶' => 'o', 'Ã„ÂŸ' => 'g',

        // Russian
        'ÃÂ' => 'A', 'ÃÂ‘' => 'B', 'ÃÂ’' => 'V', 'ÃÂ“' => 'G', 'ÃÂ”' => 'D', 'ÃÂ•' => 'E', 'ÃÂ' => 'Yo', 'ÃÂ–' => 'Zh',
        'ÃÂ—' => 'Z', 'ÃÂ˜' => 'I', 'ÃÂ™' => 'J', 'ÃÂš' => 'K', 'ÃÂ›' => 'L', 'ÃÂœ' => 'M', 'ÃÂ' => 'N', 'ÃÂž' => 'O',
        'ÃÂŸ' => 'P', 'Ã ' => 'R', 'ÃÂ¡' => 'S', 'ÃÂ¢' => 'T', 'ÃÂ£' => 'U', 'ÃÂ¤' => 'F', 'ÃÂ¥' => 'H', 'ÃÂ¦' => 'C',
        'ÃÂ§' => 'Ch', 'ÃÂ¨' => 'Sh', 'ÃÂ©' => 'Sh', 'ÃÂª' => '', 'ÃÂ«' => 'Y', 'ÃÂ¬' => '', 'ÃÂ­' => 'E', 'ÃÂ®' => 'Yu',
        'ÃÂ¯' => 'Ya',
        'ÃÂ°' => 'a', 'ÃÂ±' => 'b', 'ÃÂ²' => 'v', 'ÃÂ³' => 'g', 'ÃÂ´' => 'd', 'ÃÂµ' => 'e', 'Ã‘Â‘' => 'yo', 'ÃÂ¶' => 'zh',
        'ÃÂ·' => 'z', 'ÃÂ¸' => 'i', 'ÃÂ¹' => 'j', 'ÃÂº' => 'k', 'ÃÂ»' => 'l', 'ÃÂ¼' => 'm', 'ÃÂ½' => 'n', 'ÃÂ¾' => 'o',
        'ÃÂ¿' => 'p', 'Ã‘Â€' => 'r', 'Ã‘Â' => 's', 'Ã‘Â‚' => 't', 'Ã‘Âƒ' => 'u', 'Ã‘Â„' => 'f', 'Ã‘Â…' => 'h', 'Ã‘Â†' => 'c',
        'Ã‘Â‡' => 'ch', 'Ã‘Âˆ' => 'sh', 'Ã‘Â‰' => 'sh', 'Ã‘ÂŠ' => '', 'Ã‘Â‹' => 'y', 'Ã‘ÂŒ' => '', 'Ã‘Â' => 'e', 'Ã‘ÂŽ' => 'yu',
        'Ã‘Â' => 'ya',

        // Ukrainian
        'ÃÂ„' => 'Ye', 'ÃÂ†' => 'I', 'ÃÂ‡' => 'Yi', 'Ã’Â' => 'G',
        'Ã‘Â”' => 'ye', 'Ã‘Â–' => 'i', 'Ã‘Â—' => 'yi', 'Ã’Â‘' => 'g',

        // Czech
        'Ã„ÂŒ' => 'C', 'Ã„ÂŽ' => 'D', 'Ã„Âš' => 'E', 'Ã…Â‡' => 'N', 'Ã…Â˜' => 'R', 'Ã… ' => 'S', 'Ã…Â¤' => 'T', 'Ã…Â®' => 'U',
        'Ã…Â½' => 'Z',
        'Ã„Â' => 'c', 'Ã„Â' => 'd', 'Ã„Â›' => 'e', 'Ã…Âˆ' => 'n', 'Ã…Â™' => 'r', 'Ã…Â¡' => 's', 'Ã…Â¥' => 't', 'Ã…Â¯' => 'u',
        'Ã…Â¾' => 'z',

        // Polish
        'Ã„Â„' => 'A', 'Ã„Â†' => 'C', 'Ã„Â˜' => 'e', 'Ã…Â' => 'L', 'Ã…Âƒ' => 'N', 'ÃƒÂ“' => 'o', 'Ã…Âš' => 'S', 'Ã…Â¹' => 'Z',
        'Ã…Â»' => 'Z',
        'Ã„Â…' => 'a', 'Ã„Â‡' => 'c', 'Ã„Â™' => 'e', 'Ã…Â‚' => 'l', 'Ã…Â„' => 'n', 'ÃƒÂ³' => 'o', 'Ã…Â›' => 's', 'Ã…Âº' => 'z',
        'Ã…Â¼' => 'z',

        // Latvian
        'Ã„Â€' => 'A', 'Ã„ÂŒ' => 'C', 'Ã„Â’' => 'E', 'Ã„Â¢' => 'G', 'Ã„Âª' => 'i', 'Ã„Â¶' => 'k', 'Ã„Â»' => 'L', 'Ã…Â…' => 'N',
        'Ã… ' => 'S', 'Ã…Âª' => 'u', 'Ã…Â½' => 'Z',
        'Ã„Â' => 'a', 'Ã„Â' => 'c', 'Ã„Â“' => 'e', 'Ã„Â£' => 'g', 'Ã„Â«' => 'i', 'Ã„Â·' => 'k', 'Ã„Â¼' => 'l', 'Ã…Â†' => 'n',
        'Ã…Â¡' => 's', 'Ã…Â«' => 'u', 'Ã…Â¾' => 'z'
    );

    $str = preg_replace( array_keys( $options['replacements'] ), $options['replacements'], $str );

    if ( $options['transliterate'] ) {
        $str = str_replace( array_keys( $char_map ), $char_map, $str );
    }

    $str = preg_replace( '/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
    $str = preg_replace( '/(' . preg_quote( $options['delimiter'], '/') . '){2,}/', '$1', $str);
    $str = substr( $str, 0, ( $options['limit'] ? $options['limit'] : strlen( $str ) ) );
    $str = trim( $str, $options['delimiter'] );

    return $options['lowercase'] ? strtolower( $str ) : $str;

}

function meta_description($string) {
    if(strlen($string) > 160)
    {
        $truncate = 160;
        $string = preg_replace ('/<[^>]*>/', ' ', $string);
        $string = str_replace("\r", '', $string);
        $string = str_replace("\n", ' ', $string);
        $string = str_replace("\t", ' ', $string);
        $string = str_replace("&nbsp;&nbsp;&nbsp;", ' ', $string);
        $string = str_replace("&nbsp;&nbsp;", ' ', $string);
        $string = str_replace("&nbsp; &nbsp;", ' ', $string);
        $string = trim(preg_replace('/ {2,}/', ' ', $string));
        $string = preg_replace("/&#?[a-z0-9]{2,8};/i","",$string);
        $string = preg_replace("#[[:punct:]]#", "", $string);
        $string = trim($string, ", ");
        $string = trim($string, " ,");
        $string = trim($string, ",");
        $string = str_replace("  ", ' ', $string);
        $string = trim($string);
        $string = substr($string, 0, $truncate).'...';
    }
    return $string;
}

function meta_keywords($string) {
    $string = preg_replace ('/<[^>]*>/', ' ', $string);
    $string = str_replace("\r", '', $string);
    $string = str_replace("\n", ' ', $string);
    $string = str_replace("\t", ' ', $string);
    $string = trim(preg_replace('/ {2,}/', ' ', $string));
    $string = preg_replace("/&#?[a-z0-9]{2,8};/i","",$string);
    $string = preg_replace("#[[:punct:]]#", "", $string);
    $string = preg_replace("[^-\w\d\s\.=$'€%]",'',$string);
    $string = str_replace(' ', ', ', $string);
    $string = str_replace(' ,', '', $string);
    $string = trim($string, ", ");
    $string = trim($string, " ,");
    $string = trim($string, ",");
    $string = trim($string);
    return $string;
}

function levelCode($kode)
{
    switch ($kode) 
    {
        case '1':
            $status = '<span class="badge badge-info">Superadmin</span>';
            break;
        case '2':
            $status = '<span class="badge badge-warning">Admin Destinasi</span>';
            break;
        case '3':
            $status = '<span class="badge badge-dark">Admin Ekraf</span>';
            break;
        case '4':
            $status = '<span class="badge badge-primary">Admin SDP</span>';
            break;
        case '5':
            $status = '<span class="badge badge-success">Admin Pemasaran</span>';
            break;
        case '6':
            $status = '<span class="badge badge-danger">Admin UPT</span>';
            break;
        case '7':
            $status = '<span class="badge badge-secondary">Admin Kabupaten</span>';
            break;
        default:
            $status ="-";
            break;
    }
    return $status;
}

function roleMiddle($kode)
{
    switch($kode)
    {
        case 'super_admin':
            $id = 1;
            break;
        case 'auth_destinasi':
            $id = 2;
            break;
        case 'auth_ekraf':
            $id = 3;
            break;
        case 'auth_sdp':
            $id = 4;
            break;
        case 'auth_pemasaran':
            $id = 5;
            break;
        case 'auth_upt':
            $id = 6;
            break;
        case 'auth_kabupaten':
            $id = 7;
            break;
        default:
            $id =0;
            break;
    }
    return $id;
}

function status($kode)
{
    switch ($kode) 
    {
        case '1':
            $status = '<span class="badge badge-info">Diusulkan</span>';
            break;
        case '2':
            $status = '<span class="badge badge-warning">Proses</span>';
            break;
        case '3':
            $status = '<span class="badge badge-success">Selesai</span>';
            break;
        case '4':
            $status = '<span class="badge badge-danger">Ditolak</span>';
            break;
        default:
            $status ="-";
            break;
    }
    return $status;
}

function apiMap()
{
    return "AIzaSyD4qfrYReAFlZNx5YPg1mIMKQ_k5ilrlAw";
}

function latLongProv()
{
    return "0.507068,101.447777";
}

function getDistance($from,$to)
{
    $api = apiMap();
    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$from."&destinations=".$to."&key=".$api;
    $data = json_decode(file_get_contents($url),true);
    if(isset($data['status']) && $data['status'] == "OK")
    {
        if(isset($data['rows'][0]['elements'][0]['distance']))
        {
            $jarak = $data['rows'][0]['elements'][0]['distance']['text'];
            $jarak = str_replace(' mi', '', $jarak)*1.609344;
            $jarak = formatAngkat($jarak).' Km';
            $durasi = $data['rows'][0]['elements'][0]['duration']['value'];
            $durasi = waktu($durasi);
            return $jarak." (".$durasi.")";
        }
        return '-';
    }
    return False;
}

function getLocationLatLong($lat,$long)
{
    $api = apiMap();
    $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$long."&key=".$api;
    $data = file_get_contents($url);
    print_r($data);
}

function getCurrentLoc()
{
    $api = apiMap();
    $url = "https://maps.googleapis.com/maps/api/geocode/json?key=".$api;
    $data = file_get_contents($url);
    print_r($data);
}

function formatAngkat($number)
{
    return number_format((float)$number, 2, '.', '');
}

function waktu($waktu){
    if(($waktu>0) and ($waktu<60)){
        $lama=number_format($waktu,2)." detik";
        return $lama;
    }
    if(($waktu>60) and ($waktu<3600)){
        $detik=fmod($waktu,60);
        $menit=$waktu-$detik;
        $menit=$menit/60;
        $lama=$menit." Menit";
        return $lama;
    }
    elseif($waktu >3600){
        $detik=fmod($waktu,60);
        $tempmenit=($waktu-$detik)/60;
        $menit=fmod($tempmenit,60);
        $jam=($tempmenit-$menit)/60;    
        $lama=$jam." Jam ".$menit." Menit";
        return $lama;
    }
}

function jenisWisata($ar)
{
    $ar = explode(',',$ar);
    $data = '';
    foreach($ar as $key)
    {
        switch ($key) 
        {
            case '1':
                $status = '<span class="badge badge-success">Alam</span>';
                break;
            case '2':
                $status = '<span class="badge badge-success">Buatan</span>';
                break;
            case '3':
                $status = '<span class="badge badge-success">Budaya</span>';
                break;
            default:
                $status ="-";
                break;
        }
        $data .=$status;
    }
    return $data;
}

function jenisHotel($ar)
{
    $ar = explode(',',$ar);
    $data = '';
    foreach($ar as $key)
    {
        switch ($key) 
        {
            case '1':
                $status = '<span class="badge badge-success">Bintang 1</span>';
                break;
            case '2':
                $status = '<span class="badge badge-success">Bintang 2</span>';
                break;
            case '3':
                $status = '<span class="badge badge-success">Bintang 3</span>';
                break;
            case '4':
                $status = '<span class="badge badge-success">Bintang 4</span>';
                break;
            case '5':
            $status = '<span class="badge badge-success">Bintang 4</span>';
                break;
            default:
                $status ="-";
                break;
        }
        $data .=$status;
    }
    return $data;
}

function jenisLayanan($ar)
{
    $ar = explode(',',$ar);
    $data = '';
    foreach($ar as $key)
    {
        switch ($key) 
        {
            case '1':
                $status = '<span class="badge badge-success">Elevator in Building</span>';
                break;
            case '2':
                $status = '<span class="badge badge-success">Free Wi fi</span>';
                break;
            case '3':
                $status = '<span class="badge badge-success">Free Parking</span>';
                break;
            case '4':
                $status = '<span class="badge badge-success">Air Conditioned</span>';
                break;
            case '5':
            $status = '<span class="badge badge-success">Online Ordering</span>';
                break;
            default:
                $status ="-";
                break;
        }
        $data .=$status;
    }
    return $data;
}

function listAgama()
{
    $data =[
        'Islam',
        'Protestan',
        'Katolik',
        'Hindu',
        'Buddha',
        'Khonghucu'
    ];
    return $data;
}

function listSosmed()
{
    return [
        [
            'id'=>1,
            'nama'=>"Instagram"
        ],
        [
            'id'=>2,
            'nama'=>"Twitter"
        ],
        [
            'id'=>3,
            'nama'=>"Facebook"
        ],
        [
            'id'=>4,
            'nama'=>"Tiktok"
        ],
        [
            'id'=>5,
            'nama'=>"Whatsapp"
        ],
        [
            'id'=>6,
            'nama'=>"Youtube"
        ]
    ];
}

function getSosmed($kode)
{
    switch($kode)
    {
        case 1 :
            $sosmed = "<span class='badge badge-success'>Instagram</span>";
            break;
        case 2 :
            $sosmed = "<span class='badge badge-success'>Twitter</span>";
            break;
        case 3 :
            $sosmed = "<span class='badge badge-success'>Facebook</span>";
            break;
        case 4 :
            $sosmed = "<span class='badge badge-success'>Tiktok</span>";
            break;
        case 5 :
            $sosmed = "<span class='badge badge-success'>Whatsapp</span>";
            break;
        case 6 :
            $sosmed = "<span class='badge badge-success'>Youtube</span>";
            break;
    }
    return $sosmed;
    
}

function tgl_indo($tanggal){
    $tanggal = date('Y-m-d',strtotime($tanggal));

	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function bulanIndo()
{
    $bulan[0]['nomor'] = 1;
    $bulan[0]['nama_bulan'] = "Januari";

    $bulan[1]['nomor'] = 2;
    $bulan[1]['nama_bulan'] = "Februari";

    $bulan[2]['nomor'] = 3;
    $bulan[2]['nama_bulan'] = "Maret";

    $bulan[3]['nomor'] = 4;
    $bulan[3]['nama_bulan'] = "April";

    $bulan[4]['nomor'] = 5;
    $bulan[4]['nama_bulan'] = "Mei";

    $bulan[5]['nomor'] = 6;
    $bulan[5]['nama_bulan'] = "Juni";

    $bulan[6]['nomor'] = 7;
    $bulan[6]['nama_bulan'] = "Juli";

    $bulan[7]['nomor'] = 8;
    $bulan[7]['nama_bulan'] = "Agustus";

    $bulan[8]['nomor'] = 9;
    $bulan[8]['nama_bulan'] = "September";

    $bulan[9]['nomor'] = 10;
    $bulan[9]['nama_bulan'] = "Oktober";

    $bulan[10]['nomor'] = 11;
    $bulan[10]['nama_bulan'] = "November";

    $bulan[11]['nomor'] = 12;
    $bulan[11]['nama_bulan'] = "Desember";
    
    return $bulan;
}

function getBulan($id){

	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	return $bulan[$id];
}

function iconSosmedHome($kode)
{
    switch($kode)
    {
        case 1 :
            $sosmed = '<i class="fab fa-instagram"></i>';
            break;
        case 2 :
            $sosmed = '<i class="fab fa-twitter"></i>';
            break;
        case 3 :
            $sosmed = '<i class="fab fa-facebook-f"></i>';
            break;
        case 4 :
            $sosmed = '<i class="fab fa-tiktok"></i>';
            break;
        case 5 :
            $sosmed = '<i class="fab fa-whatsapp"></i>';
            break;
        case 6 :
            $sosmed = '<i class="fab fa-youtube"></i>';
            break;
    }
    return $sosmed;
}

function getSosmedHotel($id)
{
    $get = App\Models\sosialMedia::getHotelSosmed($id);
    $url = array();
    foreach($get as $item)
    {
        $icon = iconSosmedHome($item->kode_sosmed);
        $url[] = '<a target="_blank" href="'.$item->alamat_sosmed.'">'.$icon.'</a>';
    }
    return $url;
}

function getSosmedObjekWisata($id)
{
    $get = App\Models\sosialMedia::getObjekWisataSosmed($id);
    $url = array();
    foreach($get as $item)
    {
        $icon = iconSosmedHome($item->kode_sosmed);
        $url[] = '<a target="_blank" href="'.$item->alamat_sosmed.'">'.$icon.'</a>';
    }
    return $url;
}

function getSosmedObjekRestoran($id)
{
    $get = App\Models\sosialMedia::getRestoranSosmed($id);
    $url = array();
    foreach($get as $item)
    {
        $icon = iconSosmedHome($item->kode_sosmed);
        $url[] = '<a target="_blank" href="'.$item->alamat_sosmed.'">'.$icon.'</a>';
    }
    return $url;
}

function getSosmedObjekCindramata($id)
{
    $get = App\Models\sosialMedia::getCindramataSosmed($id);
    $url = array();
    foreach($get as $item)
    {
        $icon = iconSosmedHome($item->kode_sosmed);
        $url[] = '<a target="_blank" href="'.$item->alamat_sosmed.'">'.$icon.'</a>';
    }
    return $url;
}

function getGambarObjekWisata($id)
{
    $data =  App\Models\objekWisataGambar::getGallery($id);
    $hitung = count($data);
    $i = 1;
    $ar = array();
    foreach($data as $key)
    {
        if($i != $hitung)
        {
            $ar[$i] = "{'src': '".asset('/uploads/images/gallery-objek-wisata')."/".$key->gambar."'},"; 
        }
        else
        {
            $ar[$i] = "{'src': '".asset('/uploads/images/gallery-objek-wisata')."/".$key->gambar."'}";
        }
        $i++;
    }
    return $ar;
}

function getGambarHotel($id)
{
    $data =  App\Models\hotelGambar::getGallery($id);
    $hitung = count($data);
    $i = 1;
    $ar = array();
    foreach($data as $key)
    {
        if($i != $hitung)
        {
            $ar[$i] = "{'src': '".asset('/uploads/images/gallery-hotel')."/".$key->gambar."'},"; 
        }
        else
        {
            $ar[$i] = "{'src': '".asset('/uploads/images/gallery-hotel')."/".$key->gambar."'}";
        }
        $i++;
    }
    return $ar;
}

function getGambarRestoran($id)
{
    $data =  App\Models\restaurantGambar::getGallery($id);
    $hitung = count($data);
    $i = 1;
    $ar = array();
    foreach($data as $key)
    {
        if($i != $hitung)
        {
            $ar[$i] = "{'src': '".asset('/uploads/images/gallery-restaurant')."/".$key->gambar."'},"; 
        }
        else
        {
            $ar[$i] = "{'src': '".asset('/uploads/images/gallery-restaurant')."/".$key->gambar."'}";
        }
        $i++;
    }
    return $ar;
}

function hitungUlasan($ar)
{
    $i = 0;
    $bintang = 0;
    foreach($ar as $key)
    {
        $bintang = $bintang + $key->rating;
        $i++;
    }
    
    
    return ($i != 0) ? ceil($bintang/$i) : 0;
}

function statusUlasan($kode)
{
    switch ($kode) 
    {
        case '0':
            $status = '<span class="badge badge-info">Diusulkan</span>';
            break;
        case '1':
            $status = '<span class="badge badge-warning">Publish</span>';
            break;
    }
    return $status;
}

function getJabatan($kode)
{
    switch($kode)
    {
        case 1 :
            $sosmed = "<span class='badge badge-success'>Kepala Badan</span>";
            break;
        case 2 :
            $sosmed = "<span class='badge badge-primary'>Sekretaris</span>";
            break;
        case 3 :
            $sosmed = "<span class='badge badge-secondary'>Kepala Bidang</span>";
            break;
        case 4 :
            $sosmed = "<span class='badge badge-warning'>Kepala Sub Bidang</span>";
            break;
    }
    return $sosmed;
    
}

function getGaleriDetail($id)
{
    $get = App\Models\DetailGaleri::galeriByID($id);
    return $get;
}

function getYoutubeID($url)
{
    preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches);
    return $matches[0];
}

function nomorIndo($nomor)
{
    switch($nomor)
    {
        case 1 :
            $no = "Satu";
            break;
        case 2 :
            $no = "Dua";
            break;
        case 3 :
            $no = "Tiga";
            break;
        case 4 :
            $no = "Empat";
            break;
        case 5 :
            $no = "Lima";
            break;
        case 6 :
            $no = "Enam";
            break;
        case 7 :
            $no = "Tujuh";
            break;
        case 8 :
            $no = "Delapan";
            break;
        case 9 :
            $no = "Sembilan";
            break;
        case 10 :
            $no = "Sepuluh";
            break;
    }
    return $no;
}

function getPar($id)
{
    $get = App\Models\KategoriPelayanan::getPar($id);
    return $get;
}

function getParCount($id)
{
    $get = App\Models\KategoriPelayanan::getParCount($id);
    return $get;
}

function getPelayanan($id)
{
    $get = App\Models\KategoriPelayanan::getListPelayanan($id);
    return $get;
}

function getPelayananCount($id)
{
    $get = App\Models\KategoriPelayanan::getListPelayananCount($id);
    return $get;
}

function jabatan($id)
{
    switch($id)
    {
        case 1 :
            $sosmed = "Kepala Badan";
            break;
        case 2 :
            $sosmed = "Sekretaris";
            break;
        case 3 :
            $sosmed = "Kepala Bidang";
            break;
        case 4 :
            $sosmed = "Kepala Sub Bidang";
            break;
    }
    return $sosmed;
}

function generateRandomString($length = 12) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function getJenisPelanggaran($id) {
    $jenisPelanggaran = DB::table('jenis_pelanggarans')->where('id', $id)->first();
    return $jenisPelanggaran->nama;
}

function telegramAdmin() {
    $Admin = DB::table('users')->where('level_user_id', 2)->get();
    foreach ($Admin as $key ) {
    $chat_id = $key->id_telegram;
    $message_text = $key->nama. ' Ada Pengaduan Woy';
    $secret_token = "1797794695:AAEbDvghcqB-e3Wu0qsgKVF1Z2grNQYb0gs";
    $url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=html&chat_id=" . $chat_id;
    $url = $url . "&text=" . urlencode($message_text);
    // print_r($url);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}

}

function smsPemohon($nope, $ticket, $nama, $pelanggaran) {
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  
$pelanggaran = str_replace(" ", "%20", $pelanggaran);
$nama = str_replace(" ", "%20", $nama);

$response = file_get_contents('https://simpel.dpmptsp.riau.go.id/simpel/service/sms/smswbs.php?nope='.$nope.'&ticket='.$ticket.'&nama='.$nama.'&jenis='.$pelanggaran, false, stream_context_create($arrContextOptions));

// $url = 'https://simpel.dpmptsp.riau.go.id/simpel/service/sms/smswbs.php?nope='.$nope.'&ticket='.$ticket.'';
// file_get_contents($url);
}
