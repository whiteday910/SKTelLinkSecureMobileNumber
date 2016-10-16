<?php

require_once "./lib.php";


/// 문자열로 된 전화번호를 받아서 문자열로 된 안심번호를 리턴한다.
function SECMOB01_getSecNumberWithOriginNumber($originNumber)
{
    if(gettype($originNumber) != "string")
    {
        echo "plz check param --> SECMOB01_getSecNumberWithOriginNumber";
        return "plz check param --> SECMOB01_getSecNumberWithOriginNumber";
    }
    else
    {

        global $SKTEL_SEC_GROUP01,$REQCODE01_NEW_NUM_RECEIVE,$REQSIZE01_NEW_NUM_RECEIVE;
        $header = lx01_secmob00_makeHeader($REQCODE01_NEW_NUM_RECEIVE,$REQSIZE01_NEW_NUM_RECEIVE);
        $message = sec02_makeWhiteSpacePaddingWithStringAndLength($originNumber,20).sec02_makeWhiteSpacePaddingWithStringAndLength($originNumber,20).$SKTEL_SEC_GROUP01.sec01_makeWhiteSpaceWithLength(50).sec01_makeWhiteSpaceWithLength(10);


        $message = $header.$message;

        $socketResult = sec03_socketWithMessage($message);

        /// 디버깅 로그 출력
        /*
                echo "<br><br>";
                echo $message;
                echo "<br><br>";
                echo $socketResult;
                echo "<br><br>";
        */
        $result = substr($socketResult,12,12);

        return $result;
    }


}

// 문자열로 된 안심번호를 받아서 해당 번호를 해제한다.
function SECMOB02_clearSecNumberWithSecNum($secNumber)
{
    if(gettype($secNumber) != "string")
    {
        echo "plz check param --> SECMOB02_clearSecNumberWithSecNum";
        return "plz check param --> SECMOB02_clearSecNumberWithSecNum";
    }
    else
    {

        global $SKTEL_SEC_GROUP01,$REQCODE02_SEC_NUM_CLEAR,$REQSIZE02_SEC_NUM_CLEAR;
        $header = lx01_secmob00_makeHeader($REQCODE02_SEC_NUM_CLEAR,$REQSIZE02_SEC_NUM_CLEAR);
        $message = sec02_makeWhiteSpacePaddingWithStringAndLength($secNumber,20).$SKTEL_SEC_GROUP01;


        $message = $header.$message;

        /// 디버깅 로그 출력
        /*
                echo "<br><br>";
                echo $message;
                echo "<br><br>";
        */
        $socketResult = sec03_socketWithMessage($message);

        $resultCode = substr($socketResult,12,4);

        if($resultCode == "0000")
        {
            return true;
        }
        else
        {
            return $resultCode;
        }



    }
}


// 문자열로 된 안심번호, 착신되는 번호, 변경하고 싶은 실제번호를 받아서 해당 번호를 해제한다. 예> 기존에 050411112222 에 01031359358이 매칭되어있다. --> 이걸  01049987356으로 변경하고 싶을 때
function SECMOB03_replaceSecNumberWithSecNum($secNumber,$matchedRealNumber,$newRealNumber)
{
    if(gettype($secNumber) != "string")
    {
        echo "plz check param --> SECMOB03_replaceSecNumberWithSecNum";
        return "plz check param --> SECMOB03_replaceSecNumberWithSecNum";
    }
    else
    {

        global $SKTEL_SEC_GROUP01,$REQCODE03_SEC_NUM_REPLACE,$REQSIZE03_SEC_NUM_REPLACE;
        $header = lx01_secmob00_makeHeader($REQCODE03_SEC_NUM_REPLACE,$REQSIZE03_SEC_NUM_REPLACE);
        $message = sec02_makeWhiteSpacePaddingWithStringAndLength($secNumber,20)
            .sec02_makeWhiteSpacePaddingWithStringAndLength($matchedRealNumber,20)
            .sec02_makeWhiteSpacePaddingWithStringAndLength($newRealNumber,20)
            .sec02_makeWhiteSpacePaddingWithStringAndLength($matchedRealNumber,20)
            .sec02_makeWhiteSpacePaddingWithStringAndLength($newRealNumber,20)
            .$SKTEL_SEC_GROUP01.sec01_makeWhiteSpaceWithLength(50)
            .$SKTEL_SEC_GROUP01.sec01_makeWhiteSpaceWithLength(10);





        $message = $header.$message;

        /// 디버깅 로그 출력
        /*
                echo "<br><br>";
                echo $message;
                echo "<br><br>";
        */
        $socketResult = sec03_socketWithMessage($message);

        $result = substr($socketResult,12,4);

        if($result == "0000")
        {
            return true;
        }
        else
        {
            return $result;
        }


    }
}


// 문자열로 된 안심번호를 받아서 실제번호를 리턴한다.
function SECMOB04_getRealNumberWithSecNumber($secNumber)
{
    if(gettype($secNumber) != "string")
    {
        echo "plz check param --> SECMOB04_getRealNumberWithSecNumber";
        return "plz check param --> SECMOB04_getRealNumberWithSecNumber";
    }
    else
    {

        global $SKTEL_SEC_GROUP01,$REQCODE04_GET_REALNUM,$REQSIZE04_GET_REALNUM;
        $header = lx01_secmob00_makeHeader($REQCODE04_GET_REALNUM,$REQSIZE04_GET_REALNUM);
        $message = sec02_makeWhiteSpacePaddingWithStringAndLength($secNumber,20);


        $message = $header.$message;
        /// 디버깅 로그 출력
        /*
                        echo "<br><br>";
                        echo $message;
                        echo "<br><br>";
        */
        $socketResult = sec03_socketWithMessage($message);


        $result = substr($socketResult,16,20);

        $result = str_replace(" ","",$result);


        return $result;
    }
}

?>