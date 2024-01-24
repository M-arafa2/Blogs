<?php


namespace App\Service;


use Illuminate\Support\Facades\Http;

class Urway
{
    protected static $password = "mawthuq@123";
    protected static $username = "mawthuq";
    protected static $termailID = "mawthuq";
    protected static $secretKey = "cbdec3f13b9e28da11c55de5fac33fdf761a6c46840afa73c60cd4cfd0c7df1a";
    protected static function hashedRequestData($amount,$trackId){
        $password = static::$password;
        $sercretKey = static::$secretKey;
        $terminalID = static::$termailID;
        $txn_details= "$trackId|$terminalID|$password|$sercretKey|$amount|SAR";
        $hash=hash('sha256', $txn_details);
        return $hash;
    }
    public static function request($amount,$trackid){
        $url = "https://payments-dev.urway-tech.com/URWAYPGService/transaction/jsonProcess/JSONrequest";
        $fields = array(
            'trackid' => $trackid ,
            'terminalId' => static::$termailID,
            'customerEmail' =>'a@a.com',
            'action' => "1", // action is always 1
            'merchantIp' =>$_SERVER['SERVER_ADDR'],
            'password'=> static::$password,
            'currency' => "SAR",
            'country'=>"SA",
            'udf2'=>url('/urway-response'),
            'amount' => $amount,
            'requestHash' => static::hashedRequestData($amount,$trackid)//generated Hash
             );
        $data = json_encode($fields);
        $res = Http::withHeaders([
            'Content-Type'  =>  'application/json',
            'Content-Length'  =>  strlen($data),
        ])->withBody($data,'application/json')
            ->post($url);
        $urldecode = $res->json();
        if($urldecode['payid'] != NULL)
        {
            $url=$urldecode['targetUrl']."?paymentid=".$urldecode['payid'];
            echo '
<html>
<form name="myform" method="POST" action="'.$url.'">
<h1> العملية قيد التنفيذ........</h1> 
</form>
<script type="text/javascript">document.myform.submit();
</script>
</html>';
        }

        else{
            echo "<b>هناك خلل في البيانات!!!!</b>";
        }

    }
    public static function response($amount,$trackid){
        $terminalId = static::$termailID;// Will be provided by URWAY
        $password = static::$password;// Will be provided by URWAY
        $key = static::$secretKey;// Will be provided by URWAY
        $requestHash  ="".$_GET['TranId']."|".$key."|".$_GET['ResponseCode']."|".$_GET['amount']."";
        $hash=hash('sha256', $requestHash);
        if ($_GET !== NULL) {
            if ($hash === $_GET['responseHash']) {
                $txn_details1 = "" . $_GET['TrackId'] . "|" . $terminalId . "|" . $password . "|" . $key . "|" . $_GET['amount'] . "|SAR";
                //Secure check
                $requestHash1 = hash('sha256', $txn_details1);
                $apifields    = array(
                    'trackid' => $_GET['TrackId'],
                    'terminalId' => $terminalId,
                    'action' => '10',
                    'merchantIp' => "",
                    'password' => $password,
                    'currency' => "SAR",
                    'transid' => "",
                    'transid' => $_GET['TranId'],
                    'amount' => $_GET['amount'],
                    'udf2' => url('/urway-response'),
                    'requestHash' => $requestHash1
                );

                $apifields_string = json_encode($apifields);

                $url = "https://payments-dev.urway-tech.com/URWAYPGService/transaction/jsonProcess/JSONrequest";
                $res = Http::withHeaders([
                    'Content-Type'  =>  'application/json',
                    'Content-Length'  =>  strlen($apifields_string),
                ])->withBody($apifields_string,'application/json')
                    ->post($url);
                $urldecodeapi        = $res->json();
                $inquiryResponsecode = $urldecodeapi['responseCode'];
                $inquirystatus       = $urldecodeapi['result'];



                if ($_GET['Result'] === 'Successful'  && $_GET['ResponseCode']==='000') {
                    if($inquirystatus=='Successful' || $inquiryResponsecode=='000'){
                        return ['response' => $_GET];
                    }else {
                        echo "Something went wrong!!! Secure Check failed!!!!!!!";
                    }

                } else {
                    return ['response' => $_GET];
                }
            } else {
                return "Hash Mismatch!!!!!!!";

            }
        } else {

            return "Something Went wrong!!!!!!!!!!!!";
        }
    }

}