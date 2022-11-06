<?php
if(isset($_POST['btn_send'])){

    $msg = $_POST['message']; 

    $getContact = mysqli_query($con, "SELECT contactNumber FROM senior_citizen WHERE status = 'Active'");
    while($row = mysqli_fetch_array($getContact)){
        $contactNumber = $row['contactNumber'];

        $action = 'Send a Message To : '.$contactNumber.'';
        $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('New SMS', NOW(), '".$action."')");
        $_SESSION['added'] = 1;
        $message = [
            "secret" => "d5a1f3d1f6799722a22030400651c2cf3eebaf9f", // your API secret from (Tools -> API Keys) page
            "mode" => "devices",
            "device" => "00000000-0000-0000-d87c-948812ad3bbd",
            "sim" => 1,
            "priority" => 1,
            "phone" => $contactNumber,
            "message" => $msg
        ];
        
        $cURL = curl_init("https://www.cloud.smschef.com/api/send/sms");
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURL, CURLOPT_POSTFIELDS, $message);
        $response = curl_exec($cURL);
        curl_close($cURL);
        
        $result = json_decode($response, true);
    }

    $_SESSION['added'] = 1;
    header ("location: ".$_SERVER['REQUEST_URI']);
}
?>