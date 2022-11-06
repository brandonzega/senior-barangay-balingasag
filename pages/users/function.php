<?php
if(isset($_POST['btn_add'])){
    //$username = $_POST['username'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $type = $_POST['type'];

    $username = $firstName.'.'.$lastName;
    $username = strtolower(preg_replace('/\s+/', '', $username));

    $userQuery = mysqli_query($con,"SELECT * from tbluser where firstname = '".$firstName."' AND lastname = '".$lastName."'"); 
    $userCount = mysqli_num_rows($userQuery);

    if($userCount == 0){
        if(isset($_SESSION['role'])){
            $action = 'Added New User'.$lastName.' '.$firstName;
            $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['role']."', NOW(), '".$action."')");
        }
    
        $hashPassword = md5($password);
        $query = mysqli_query($con,"INSERT INTO tbluser (username,password,firstname,lastname,type) 
            values ('$username','$hashPassword', '$firstName', '$lastName', '$type')") or die('Error: ' . mysqli_error($con));
        if($query == true)
        {
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        } 
    } else{
        $_SESSION['duplicateuser'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    } 
}


if(isset($_POST['btn_save']))
{
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $type = $_POST['type'];

    $username = $firstName.'.'.$lastName;
    $username = strtolower(preg_replace('/\s+/', '', $username));

    $username = $firstName.'.'.$lastName;
    $username = strtolower(preg_replace('/\s+/', '', $username));

    //$userQuery = mysqli_query($con,"SELECT * from tbluser where firstname = '".$firstName."' AND lastname = '".$lastName."'"); 
    //$userCount = mysqli_num_rows($userQuery);

    //if($userCount == 0){
        if(isset($_SESSION['role'])){
            $action = 'Update User'.$username;
            $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['role']."', NOW(), '".$action."')");
        }

        $hashPassword = md5($password);
        $update_query = mysqli_query($con,"UPDATE tbluser set username = '".$username."',
                                        password = '".$hashPassword."', firstname = '".$firstName."', lastname = '".$lastName."', type = '".$type."' where id = '".$id."' ") or die('Error: ' . mysqli_error($con));

        if($update_query == true){
            $_SESSION['edited'] = 1;
            header("location: ".$_SERVER['REQUEST_URI']);
        }
    //} else{
    //    $_SESSION['duplicateuser'] = 1;
    //    header ("location: ".$_SERVER['REQUEST_URI']);
    //} 

   
}

if(isset($_POST['btn_delete']))
{
    if(isset($_POST['chk_selected']))
    {
        foreach($_POST['chk_selected'] as $value)
        {
            $delete_query = mysqli_query($con,"DELETE from tbluser where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}
?>