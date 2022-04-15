<?php
function getVisIpAddr(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
        return $_SERVER['REMOTE_ADDR'];
    }
}
//$ip = getVisIpAddr();
$ip = '52.25.109.230';
$ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
echo 'Country Name: ' .$ipdat->geoplugin_countryName ."\n";
echo 'Country City: ' .$ipdat->geoplugin_city ."\n";
echo 'Contitent Name: ' .$ipdat->geoplugin_continentName ."\n";
echo 'Latitude: ' .$ipdat->geoplugin_latitude ."\n";
echo 'Longitute: ' .$ipdat->geoplugin_longitude ."\n";
echo 'Currency Symbol: ' .$ipdat->geoplugin_currencySymbol ."\n";
echo 'Currency Code: ' .$ipdat->geoplugin_currencyCode ."\n";
echo 'Timezone: ' .$ipdat->geoplugin_timezone ."\n";