<!DOCTYPE html>
<html>
<?php
    session_start();
    include "pages/connection.php";
?>
    <head>
        <meta charset="UTF-8">
        <title>Barangay Balingasag Senior Citizen  Information Management  System </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

    </head>
    <body class="skin-black">
        <div class="container" style="margin-top:30px">
          <div class="col-md-10 col-sm-offset-1">
              <div class="panel panel-default">
            <div class="panel-heading" style="text-align:center;">
                <img src="img/Barangay-Balingasag-Logo.png" style="height:100px;"/>
              <h3 class="panel-title">
                <strong>
                     Senior Citizen Information Management System <br><br> User Registration
                </strong>
                
              </h3>
            </div>
            <form method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                        <div class="row">
                            <div class="container-fluid">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label" >Name:</label><br>
                                        <div class="col-sm-3">
                                            <input name="lastName" class="form-control input-sm" type="text" placeholder="Lastname" required/>
                                        </div>
                                        <div class="col-sm-4">
                                            <input name="firstName" class="form-control input-sm col-sm-2" type="text" placeholder="Firstname" required/>
                                        </div>
                                        <div class="col-sm-3">
                                            <input name="middleName" class="form-control input-sm col-sm-2" type="text" placeholder="Middlename" required/>
                                        </div>
                                        <div class="col-sm-2">
                                            <input name="suffix" class="form-control input-sm col-sm-2" type="text" placeholder="suffix" />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="control-label">Birthdate:</label>
                                        <input name="birthdate" class="form-control input-sm input-size" type="date" placeholder="Birthdate" required/>
                                    </div>

                                    <div class="form-group">     
                                        <label class="control-label">Gender:</label>
                                        <select name="gender" class="form-control input-sm" required>
                                            <option value="" selected>-Select Gender-</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Birth Place:</label>
                                        <input name="birthplace" class="form-control input-sm input-size" type="text"  placeholder="Enter Birth Place" required/>
                                    </div>

                                    <div class="form-group">     
                                        <label class="control-label">Address:</label>
                                        <select name="address" class="form-control input-sm" required>
                                            <option value="" selected>-Select adress-</option>
                                            <option value="Barangay Balingasag">Barangay Balingasag</option>
                    
                                        </select>
                                    </div>

                                    <div class="form-group">
                                    <label>Purok</label>
                                    <select name="purokId" class="form-control input-sm" required>
                                    <option value="" selected>-- Select Purok -- </option>   
                                    <?php 
                                        $purokSql = mysqli_query($con,"SELECT * from purok");
                                        while($row = mysqli_fetch_array($purokSql)){
                                            $id = $row['id'];
                                            echo "
                                                <option value='".$id."'>".$row['purokName']."</option>
                                            ";

                                        }
                                    ?>
                                    </select>
                                </div>

                                    <div class="form-group">
                                        <label class="control-label">Contact Number:</label>
                                        <input name="contactNumber" class="form-control input-sm input-size" type="text" placeholder="Enter Mobile Number" maxlength="11" required/>
                                    </div>             

     
                                    
                                </div>

                             
                                    

                                    <!-- <div class="form-group">      -->
                                        <!-- <label class="control-label">with Pension:</label> -->
                                        <!-- <select name="pension" class="form-control input-sm" id="pension" onchange="EnableDisableTextBox(this)" required> -->
                                            <!-- <option value="" selected>-Select-</option> -->
                                            <!-- <option value="Yes">Yes</option> -->
                                            <!-- <option value="No">No</option> -->
                                        <!-- </select> -->
                                    <!-- </div> -->
                                    

                                    <!-- <div class="form-group"> -->
                                        <!-- <label class="control-label">Monthly Pension:</label> -->
                                        <!-- <input name="monthlyPension" id="monthlyPension" class="form-control input-sm input-size" type="text" placeholder="Enter Monthly Pension" disabled="disabled" step='0.01' value='0.00' maxlength="7"/> -->
                                    <!-- </div>     -->
                                    
                                    <!-- <div class="form-group" id="pensionFile"> -->
                                        <!-- <label class="control-label">File Attachment: <br> <i style="font-size: 12px;">* Upload your <b style="color:red;"> Certificate for Senior Citizen Pension.</b><i></label> -->
                                        <!-- <input type="file" name="pensionFile"/> -->
                                    <!-- </div>    -->


                                    <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label" >Senior Citizen ID:</label><br>
                                        <input name="seniorCitizenID" class="form-control input-sm" type="text" placeholder="Enter Senior Citizen ID" maxlength="6" required/>                                 
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">File Attachment: <br> <i style="font-size: 12px;">* Upload your Barangay Confirmation <b style="color:red;">(Census or Barangay Certificate) ONLY.</b><i></label>
                                        <input type="file" name="brgyConfirmation" required/>
                                    </div>   

                                    <hr>
                                    <div class="form-group">
                                        <label class="control-label">Contact Person Details</label>
                                      
                                    </div>      

                                    <div class="form-group">
                                        <label class="control-label">Contact Person:</label>
                                        <input name="contactPerson" class="form-control input-sm input-size" type="text" placeholder="Enter Contact Person" required/>
                                    </div>            

                                    <div class="form-group">
                                        <label class="control-label">Contact Number:</label>
                                        <input name="contactPersonNumber" class="form-control input-sm input-size" type="num" placeholder="Enter Mobile Person Number" maxlength="11" required/>
                                    </div>            

                                    <div class="form-group">
                                        <label class="control-label">Contact Address:</label>
                                        <input name="contactAddress" class="form-control input-sm input-size" type="text" placeholder="Enter Contact Address" required/>
                                    </div>       
                                    
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" onclick="window.location.href='http://localhost/bmisnew/index.php';" value="Back"/>
                                        <input type="submit" class="btn btn-primary btn-sm" name="btn_register" id="btn_register" value="Register"/>
                                    </div>

                                </div>

                            </div>
                        </div>
                        
                    </div>
            </div>
            <form>
          </div>
        </div>
        

      <?php
       include "pages/edit_notif.php"; 
       include "pages/added_notif.php"; 
       include "pages/delete_notif.php"; 
       include "pages/duplicate_error.php"; 

    if(isset($_POST['btn_register'])){
        
        $seniorCitizenID = $_POST['seniorCitizenID'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $lastName = $_POST['lastName'];
        $gender1 = $_POST['gender'];
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
        $status = "Pending";
        $contactPerson = $_POST['contactPerson'];
        $contactPersonNumber= $_POST['contactPersonNumber'];
        $contactAddress = $_POST['contactAddress'];

        $fileName = $_FILES['brgyConfirmation']['name'];

        if (!empty($fileName)) {
            move_uploaded_file($_FILES["brgyConfirmation"]["tmp_name"], 'file_attachments/'.$fileName);
        }
        
        
        // $pensionFile = $_FILES['pensionFile']['name'];
        // if(!empty($pensionFile)){
            // move_uploaded_file($_FILES['pensionFile']['tmp_name'], 'file_attachments/'.$pensionFile);
        // } 
    
        $su = mysqli_query($con,"SELECT * from senior_citizen where 
                                    firstName = '".$firstName."' and 
                                    lastName = '".$lastName."' and 
                                    middleName = '".$middleName."' and
                                    birthdate = '".$birthdate."'");
        $ct = mysqli_num_rows($su);

        $dcn = mysqli_query($con,"SELECT * from senior_citizen where 
                                    contactNumber = '".$contactNumber."'");
        $cn = mysqli_num_rows($dcn);
        
        if($ct == 0 && $cn == 0){
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
                                            contactAddress,
                                            brgy_confirmation
                                            -- cert_pension                         
                                        ) 
                                        values (
                                            '$seniorCitizenID', 
                                            '$firstName', 
                                            '$middleName',  
                                            '$lastName', 
                                            '$gender1',
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
                                            '$contactAddress',
                                            '$fileName'
                                            -- '$pensionFile'
                                        )"
                                ) 
                                or die('Error: ' . mysqli_error($con));
                if($query == true)
                {
                    $action = ' User Registration '.$lastName.', '.$firstName.' '.$middleName;
                    $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('New User Registration', NOW(), '".$action."')");
                    $_SESSION['added'] = 1;
                   
                    // Send SMS
                    $message = [
                        "secret" => "d5a1f3d1f6799722a22030400651c2cf3eebaf9f", // your API secret from (Tools -> API Keys) page
                        "mode" => "devices",
                        "device" => "00000000-0000-0000-d87c-948812ad3bbd",
                        "sim" => 1,
                        "priority" => 1,
                        "phone" => $contactNumber,
                        "message" => "Hi, you already completed your registration. Kindly wait for your approval from the Barangay."
                    ];
                  
                        $cURL = curl_init("https://www.cloud.smschef.com/api/send/sms");
                        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($cURL, CURLOPT_POSTFIELDS, $message);
                        $response = curl_exec($cURL);
                        curl_close($cURL);
                    
                        $result = json_decode($response, true);
                }

                 // Prompt Notif Msg 1
                 echo "<script>alert('Registered Successfully Please Wait For your approval we will send a message if your application is already  approve, THANK YOU!');
                                window.location.replace('http://localhost/bmisnew/index.php');
                        </script>";

        }
        
        else if($ct == 0 && $cn == 1){
            // Prompt Notif Msg 2
            echo "<script>alert('Your Number is already used.');
                    window.location.replace('http://localhost/bmisnew/register.php');
                </script>";
        } else  if($ct == 1 && $cn == 0){
            // Prompt Notif Msg 3
            echo "<script>alert('You have already registered.');
                    window.location.replace('http://localhost/bmisnew/register.php');
            </script>";
        }
        
    }      
      ?>
    </body>

    <script type="text/javascript">
    function EnableDisableTextBox(pension) {
        var selectedValue = pension.options[pension.selectedIndex].value;
        var monthlyPension = document.getElementById("monthlyPension");
        
        //Pension File SHOW / HIDE
        let element = document.getElementById("pensionFile");
        let hidden = element.getAttribute("hidden");

        monthlyPension.disabled = selectedValue == 'Yes' ? false : true;
        if (!monthlyPension.disabled) {
            monthlyPension.focus();
            element.removeAttribute("hidden");
        } else {
            element.setAttribute("hidden", "hidden");
            document.getElementById("monthlyPension").value = '0';
        }
    }
</script>
</html>