# SKTelLinkSecureMobileNumber
SK텔링크의 0504 안심번호 소켓 인터페이스를 PHP에서 사용하기 위해 작성한 소스


## 시작하기
- [PHP 소스 묶음을 다운로드](https://github.com/whiteday910/SKTelLinkSecureMobileNumber/archive/master.zip) 한 후 PHP 소스파일들과 함께 둔다.
- [환경파일](https://github.com/whiteday910/SKTelLinkSecureMobileNumber/blob/master/config.php)을 SK텔링크에서 발급받은 대로 셋팅한다.
- [테스트소스](https://github.com/whiteday910/SKTelLinkSecureMobileNumber/blob/master/test.php)를 참고하여 원하는 기능을 사용한다.

#### 안심번호 할당하기
```php
<?php
  require_once "./secmobnumber.php"
  $numberSample = SECMOB01_getSecNumberWithOriginNumber("01099998888");
  echo  $numberSample;
?>
```
