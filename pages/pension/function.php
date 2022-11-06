<?php
if(isset($_POST['btn_process'])){
    /*
    if(isset($_POST['chk_selected']))
    {
        foreach($_POST['chk_selected'] as $value)
        {   
            $id = $value;
            
            echo "<script>alert('1')</script>";
            $squery = mysqli_query($con, "SELECT CONCAT(lastName, firstName, middleName) AS seniorName, monthlyPension FROM senior_citizen WHERE id = '$id'");
            $row = mysqli_fetch_array($squery);
            echo "<script>alert('2')</script>";
            $seniorName = $row['seniorName'];
            $monthlyPension = $row['monthlyPension'];
            echo "<script>alert('3')</script>";
            $insert_query = mysqli_query($con,"INSERT INTO pension (name, monthlyPension, date) VALUES  ('$seniorName', '$monthlyPension', NOW()") or die('Error: ' . mysqli_error($con));
            echo "<script>alert('4')</script>";
                    
            if($insert_query == true)
            { 
            echo "<script>alert('5')</script>";

                $_SESSION['process'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    } */

    if(isset($_POST['chk_selected']))
    {
        foreach($_POST['chk_selected'] as $value)
        {
            $squery = mysqli_query($con, "SELECT * FROM senior_citizen WHERE id = '$value'");
            $row = mysqli_fetch_array($squery);
            
            $firstName = $row['firstName'];
            $middleName = $row['middleName'];
            $lastName = $row['lastName'];
            $monthlyPension = $row['monthlyPension'];
            $contactNumber = $row['contactNumber'];

            $seniorName = $lastName.' ,'.$firstName.','.$middleName;
            

            if($lastName){
                $insert_query = mysqli_query($con,"INSERT INTO pension (name, monthlyPension, date) VALUES ('$seniorName', '$monthlyPension', NOW())") or die('Error: ' . mysqli_error($con));        
                if($insert_query == true)
                {
                    $action = 'Releasing Pension of : '.$lastName.', '.$firstName.', '.$middleName;
                    $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('Administrator ', NOW(), '".$action."')");
                    $_SESSION['added'] = 1;
                   
                    // Send SMS
                    $message = [
                        "secret" => "d5a1f3d1f6799722a22030400651c2cf3eebaf9f", // your API secret from (Tools -> API Keys) page
                        "mode" => "devices",
                        "device" => "00000000-0000-0000-d87c-948812ad3bbd",
                        "sim" => 1,
                        "priority" => 1,
                        "phone" => $contactNumber,
                        "message" => "Hi, ".$firstName." ".$lastName.", your pension is ready to Release ! ,"
                        
                        
                    ];
                  
                        $cURL = curl_init("https://www.cloud.smschef.com/api/send/sms");
                        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($cURL, CURLOPT_POSTFIELDS, $message);
                        $response = curl_exec($cURL);
                        curl_close($cURL);
                    
                        $result = json_decode($response, true);
                }
               

                {
                    $_SESSION['process'] = 1;
                    header("location: ".$_SERVER['REQUEST_URI']);
                }
            }
            

            // $delete_query = mysqli_query($con,"DELETE from senior_citizen where id = '$value' ") or die('Error: ' . mysqli_error($con));
            
        }
    }
}


?>