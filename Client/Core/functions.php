<?php


function dd($v)
{
    var_dump($v);
    exit();
}

function callGETApi($url)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Cookie: PHPSESSID=no1i9kffp3evfv7ukvtcblvnh1'
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

function callPOSTApi($url, $data)
{
    $curl = curl_init();

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $data,
        //   CURLOPT_POSTFIELDS => 'email_address=tung%40gmail.comf&phone_number=0123456780&password=123dd&isAdmin=false',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'Cookie: PHPSESSID=no1i9kffp3evfv7ukvtcblvnh1'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
}
function view($Name, $Data = [])
{
    extract($Data);
    if (file_exists(__DIR__ . "/../Views/$Name.php")) :
        require_once __DIR__ . "/../Views/$Name.php";
    else :
        echo "<h1 style='color: red;text-align: center'>View [$Name] Not found</h1>";
        exit();
    endif;
}

function config($Key)
{
    $Config = require __DIR__ . '/config.php';

    if (array_key_exists($Key, $Config)) :
        return $Config[$Key];
    else :
        echo "<h1 style='color: red;text-align: center'>[$Key] not found in config.php file</h1>";
        exit();
    endif;
}


function route($RouteName, $Data = []): string
{
    return config('app_url') . (new Core\Router)->GetRouteByName($RouteName, $Data);
}

function redirect($RouteName, $Data = [])
{
    header('Location: ' . route($RouteName, $Data));
    exit();
}

function public_dir(string $File): string
{
    if (strpos($File, '/') === 0) :
        $File = substr($File, 1);
    endif;

    return config('public_url') . $File;
}

function abort($Code = 404)
{
    http_response_code($Code);

    if (file_exists(__DIR__ . "/../Views/errors/$Code.php")) {
        view("errors/$Code");
    } else {
        echo "Error $Code";
    }

    exit();
}
