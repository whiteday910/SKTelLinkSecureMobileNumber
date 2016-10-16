<?php


///  --------  안심번호 관련 환경설정 변수 ------  ////



/// SK텔링크 안심번호 서버 정보 --> ex> 211.xxx.xxx.xxx
$SKTEL_SERVER_IP = "211.237.78.41";
$SKTEL_SERVER_PORT = 48880;

/// SK텔링크의 고객번호 기입 --> ex> 9876
$SKTEL_CLIENT_CODE = "1202";

/// SK텔링크의 그룹코드 (반드시 10자리로 채워야 한다.)  --> 만약 그룹코드가 'aila_1' 일 경우  ex> "aila_1    "
$SKTEL_SEC_GROUP01 = "luxi_1    ";

/// 소스에서는 그룹 1개만 사용하므로 주석처리
//$SKTEL_SEC_GROUP02 = "luxi_2    ";


////////  -----   업무요청코드  (매뉴얼 고정값이므로 변경금지!!)  ----- ////////
$REQCODE01_NEW_NUM_RECEIVE = "1001";  /// 신규 안심번호 발급
$REQSIZE01_NEW_NUM_RECEIVE = "0110";  /// 신규 안심번호 발급 메시지 크기

$REQCODE02_SEC_NUM_CLEAR = "1002";  /// 안심번호 해제
$REQSIZE02_SEC_NUM_CLEAR = "0030";  /// 안심번호 해제 메시지 크기

$REQCODE03_SEC_NUM_REPLACE = "1003";  /// 안심번호 수정
$REQSIZE03_SEC_NUM_REPLACE = "0170";  /// 안심번호 수정 메시지 크기

$REQCODE04_GET_REALNUM = "1004";  /// 안심번호 해제
$REQSIZE04_GET_REALNUM = "0020";  /// 안심번호 해제 메시지 크기
////////////////////////////////////////////////////////////////////////



?>