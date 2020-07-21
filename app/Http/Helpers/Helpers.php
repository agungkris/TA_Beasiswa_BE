<?php

function getResponse($code,$message = '',$options = null){
    $responseMessage = '';
    switch($code){
        case 404:
            $responseMessage = $message == '' ? 'Not Found' : $message;
        break;
        case 500:
            $responseMessage = $message == '' ? 'Internal Server Error' : $message;
        break;
        case 200:
            $responseMessage = $message == '' ? 'Success' : $message;
        break;
        case 201:
            $responseMessage = $message == '' ? 'Created' : $message;
        break;
        case 401:
            $responseMessage = $message == '' ? 'Unauthorized' : $message;
        break;
        case 422:
            $responseMessage = $message == '' ? 'Unprocessable Entity' : $message;
        break;
    }
    $responseArray = [
        'code' => $code,
        'status' => $code == 200 ? true : false,
        'message' => $responseMessage,
    ];
    if($options != null){
        $responseArray = array_merge($responseArray,$options);
    }
    return response()->json($responseArray,$code);
}
