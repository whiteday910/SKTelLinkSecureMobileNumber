<?php

require_once "./config.php";


function lx01_secmob00_makeHeader($reqCode,$reqSize)
{
    global $REQCODE_NEW_NUM_RECEIVE,$SKTEL_CLIENT_CODE;
    return $headerMSG = $reqSize.$reqCode.$REQCODE_NEW_NUM_RECEIVE.$SKTEL_CLIENT_CODE;
}


/// 원하는 숫자만큼 공백을 만들어 준다
/// 파라미터 -->  Integer
function sec01_makeWhiteSpaceWithLength($numberOfSpace)
{
    $typeOfParam = gettype($numberOfSpace);


    if($typeOfParam == "integer")
    {
        $space = " ";
        $result = "";
        for($i=0; $i < $numberOfSpace; $i++)
        {
            $result = $result.$space;
        }
        return $result;
    }
    else
    {
        echo "please confirm parameter of function --> sec01_makeWhiteSpaceWithLength";
        return "please confirm parameter of function --> sec01_makeWhiteSpaceWithLength";
    }
}

/// 원하는 숫자만큼 공백 패딩을 오른쪽에 만들어준다.
/// 파라미터 -->  String , Integer
function sec02_makeWhiteSpacePaddingWithStringAndLength($inputString, $wantLength)
{

    $typeOfString = gettype($inputString);
    $typeOfInteger = gettype($wantLength);

    if($typeOfString != "string" || $typeOfInteger != "integer")
    {
        echo "typeOfString : ".$typeOfString;
        echo "<br><br>";
        echo "wantLength : ".$wantLength;
        echo "<br><br>";
        echo "please confirm parameter of function --> sec02_makeWhiteSpacePaddingWithStringAndLength";
        return "please confirm parameter of function --> sec02_makeWhiteSpacePaddingWithStringAndLength";
    }
    else
    {
        $sourceLength = strlen($inputString);

        $numberOfMakeWhiteSpace = $wantLength - $sourceLength;

        $addedSpaceString = sec01_makeWhiteSpaceWithLength($numberOfMakeWhiteSpace);

        $result = $inputString.$addedSpaceString;

        return $result;

    }

    return "exception --> sec02_makeWhiteSpacePaddingWithStringAndLength";
}



//// 소켓통신을 진행한다
function sec03_socketWithMessage($message)
{
    global $SKTEL_SERVER_PORT,$SKTEL_SERVER_IP;

    /* Create a TCP/IP socket. */
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

    if ($socket === false)
    {
        echo "<br>socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n<br>";
    }
    else
    {

    }



    /// 타임아웃 설정
    socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, array('sec' => 10, 'usec' => 0));
    socket_set_option($socket, SOL_SOCKET, SO_SNDTIMEO, array('sec' => 10, 'usec' => 0));


    $result = socket_connect($socket, $SKTEL_SERVER_IP, $SKTEL_SERVER_PORT);
    if ($result === false)
    {
        echo "<br>socket_connect() failed.<br>Reason: ($result) " . socket_strerror(socket_last_error($socket)) . "<br>";
    } else {

    }

    $out = '';

    /// 서버에서 소켓을 끊을 수 있도록 \r\n 을 보냄.
    $message = $message."\r\n";


    $write_result = socket_write($socket, $message);

    $outResult = "";
    while ($out = socket_read($socket, 2048))
    {
        $outResult = $outResult.$out;
    }
    socket_close($socket);

    return $outResult;
}




?>