<?php
if(isset($_POST['btn_add'])){
    $seniorCitizenID = $_POST['seniorCitizenID'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $birthplace = $_POST['birthplace'];

    //$txt_age = $_POST['txt_age'];
    $birthdate =$_POST['birthdate'];
    $today = date("Y-m-d");
    $diff = date_diff(date_create($birthdate), date_create($today));
    $age = $diff->format('%y');

    $address = $_POST['address'];
    $purokId = $_POST['purokId'];
    $contactNumber = $_POST['contactNumber'];
    $pension = $_POST['pension'];
    $monthlyPension = $_POST['monthlyPension'];
    $status = $_POST['status'];
    $contactPerson = $_POST['contactPerson'];
    $contactPersonNumber= $_POST['contactPersonNumber'];
    $contactAddress = $_POST['contactAddress'];

    

    if(isset($_SESSION['role'])){
        $action = 'Added Senior Citizen named '.$lastName.', '.$firstName.' '.$middleName;
        $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['role']."', NOW(), '".$action."')");
    }

    $su = mysqli_query($con,"SELECT * from senior_citizen where firstName = '".$firstName."' and lastName = '".$lastName."' ");
    $ct = mysqli_num_rows($su);
    
    if($ct == 0){

     
             
        $query = mysqli_query($con,"INSERT INTO senior_citizen (
                                        seniorCitizenID,
                                        firstName,
                                        middleName,
                                        lastName,
                                        gender,
                                        birthdate,
                                        age,
                                        birthplace,
                                        address,
                                        purokId,
                                        contactNumber,
                                        pension,
                                        monthlyPension,
                                        status,
                                        contactPerson,
                                        contactPersonNumber,
                                        contactAddress
                                       
                                    ) 
                                    values (
                                        '$seniorCitizenID', 
                                        '$firstName', 
                                        '$middleName',  
                                        '$lastName', 
                                        '$gender',
                                        '$birthdate',
                                        '$age',
                                        '$birthplace',
                                        '$address',
                                        '$purokId',
                                        '$contactNumber',
                                        '$pension',
                                        '$monthlyPension',
                                        '$status',
                                        '$contactPerson',
                                        '$contactPersonNumber',
                                        '$contactAddress'
                                    )"
                            ) 
                            or die('Error: ' . mysqli_error($con));
             
        

        
            if($query == true)
            {
                $_SESSION['added'] = 1;
                header ("location: ".$_SERVER['REQUEST_URI']);
            }
    }
    else{
        $_SESSION['duplicateuser'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }    

}


if(isset($_POST['btn_save']))
{    $id = $_POST['id'];
    $seniorCitizenID = $_POST['seniorCitizenID'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $birthplace = $_POST['birthplace'];

    //$txt_age = $_POST['txt_age'];
    $birthdate =$_POST['birthdate'];
    $today = date("Y-m-d");
    $diff = date_diff(date_create($birthdate), date_create($today));
    $age = $diff->format('%y');

    $address = $_POST['address'];
    $purokID = $_POST['purokId'];
    $contactNumber = $_POST['contactNumber'];
    $pension = $_POST['pension'];
    $monthlyPension = $_POST['monthlyPension'];
    $status = $_POST['status'];
    $contactPerson = $_POST['contactPerson'];
    $contactPersonNumber= $_POST['contactPersonNumber'];
    $contactAddress = $_POST['contactAddress'];



                $update_query = mysqli_query($con,"UPDATE senior_citizen set 
                                        seniorCitizenID = '".$seniorCitizenID."',
                                        firstName = '".$firstName."',
                                        middleName = '".$middleName."',
                                        lastName = '".$lastName."',
                                        gender = '".$gender."',
                                        birthdate = '".$birthdate."',
                                        age = '".$age."',
                                        birthplace = '".$birthplace."',
                                        address = '".$address."',
                                        purokId = '".$purokId."',
                                        contactNumber = '".$contactNumber."',
                                        pension = '".$pension."',
                                        monthlyPension = '".$monthlyPension."',
                                        status = '".$status."',
                                        contactPerson = '".$contactPerson."',
                                        contactPersonNumber = '".$contactPersonNumber."',
                                        contactAddress = '".$contactAddress."'
                            
                                        where id = '".$id."'
                                ") or die('Error: ' . mysqli_error($con));
                
        if($update_query == true){
            $_SESSION['edited'] = 1;
            header("location: ".$_SERVER['REQUEST_URI']);
        }
}

if(isset($_POST['btn_delete']))
{
    if(isset($_POST['chk_selected']))
    {
        foreach($_POST['chk_selected'] as $value)
        {
            $delete_query = mysqli_query($con,"DELETE from senior_citizen where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}

if(isset($_POST['btn_denied']))
{
    if(isset($_POST['chk_selected']))
    {
        foreach($_POST['chk_selected'] as $value)
        {
            $approval_query = mysqli_query($con,"UPDATE senior_citizen SET status = 'Denied' where id = '$value'") or die('Error: ' . mysqli_error($con));
                    
            $getContact = mysqli_query($con, "SELECT * FROM senior_citizen WHERE id = '$value'");
            $row = mysqli_fetch_array($getContact);
            
            // $action = 'Denied Request Of  '.$lastName.', '.$firstName.' '.$middleName;
            // $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('Administraitor ', NOW(), '".$action."')");
            // $_SESSION['added'] = 1;
            

            $contactNumber = $row['contactNumber'];
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];

            $name = $lastName.' '.$firstName;
            $msg = "Hi ".$name.",your online registration is denied";

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
            if($approval_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}

if(isset($_POST['btn_approval']))
{
    if(isset($_POST['chk_selected']))
    {
        foreach($_POST['chk_selected'] as $value)
        {
            $approval_query = mysqli_query($con,"UPDATE senior_citizen SET status = 'Active' where id = '$value'") or die('Error: ' . mysqli_error($con));
            $approval_query = mysqli_query($con,"UPDATE senior_citizen SET pension = 'Yes' where id = '$value'") or die('Error: ' . mysqli_error($con));
            $approval_query = mysqli_query($con,"UPDATE senior_citizen SET monthlyPension = '500.00' where id = '$value'") or die('Error: ' . mysqli_error($con));
                    
            $getContact = mysqli_query($con, "SELECT * FROM senior_citizen WHERE id = '$value'");
            $row = mysqli_fetch_array($getContact);

            $contactNumber = $row['contactNumber'];
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];

            $name = $lastName.' '.$firstName;
            $msg = "Hi ".$name.",your online registration is already approved";

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
            
            if($approval_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
                
            }
        }
        
    }
}





?>