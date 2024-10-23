<?php
include('config.php');
include('src/enums/HttpMethodEnum.php');
include('src/helpers/SessionFlashHelper.php');


/**
 * Call the API
 */
function callAPI(string $method, string $endpoint, mixed $data = false, $token = null)
{

    $url = $_ENV['API_URL'] . $endpoint;

    $curl = curl_init();

    switch ($method) {
        case HttpMethodEnum::POST->value:
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            break;
        case HttpMethodEnum::GET->value:
            if ($data) {
                $url = sprintf("%s?%s", $url, http_build_query($data));
            }
            break;
    }

    $headers = ['Content-Type: application/json'];
    if ($token) {
        $headers[] = 'Authorization: Bearer ' . $token;
    }else{
        $headers[] = 'Authorization: Bearer ' . $_SESSION['token'];
    }

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    if ($httpCode === 401 || $httpCode === 403) {
        header('Location: /login.php?error=token_expired');
        exit();
    }

    if ($httpCode === 500) {
        /**
         * Set the error message in the session only if the response is a 500 error
         */
       SessionFlashHelper::set('error', json_decode($result)->message);
    }

    return json_decode($result);
}
