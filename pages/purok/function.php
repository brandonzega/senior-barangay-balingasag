<?php
if(isset($_POST['btn_add'])){
    $purokName = $_POST['purokName'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $contactInfo = $_POST['contactInfo'];

    if(isset($_SESSION['role'])){
        $action = 'Added Purok Leader '.$purokName;
        $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['role']."', NOW(), '".$action."')");
    }

    $purokQuery = mysqli_query($con,"SELECT * from purok where purokName = '".$purokName."' ");
    $countPurok = mysqli_num_rows($purokQuery);

    if($countPurok == 0){
        $query = mysqli_query($con,"INSERT INTO purok (purokName,firstName,lastName,contactInfo) 
            values ('$purokName', '$firstName', '$lastName', '$contactInfo')") or die('Error: ' . mysqli_error($con));
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
{
    $id = $_POST['id'];
    $purokName = $_POST['purokName'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $contactInfo = $_POST['contactInfo'];

    if(isset($_SESSION['role'])){
        $action = 'Update Purok Info'.$purokName;
        $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['role']."', NOW(), '".$action."')");
    }

    $purokQuery = mysqli_query($con,"SELECT * from purok where purokName = '".$purokName."' ");
    $countPurok = mysqli_num_rows($purokQuery);
    
    if($ct == 0){
        $update_query = mysqli_query($con,"UPDATE purok set purokName = '".$purokName."', firstName = '".$firstName."', lastName = '".$lastName."', contactInfo = '".$contactInfo."' where id = '".$id."' ") or die('Error: ' . mysqli_error($con));

        if($update_query == true){
            $_SESSION['edited'] = 1;
            header("location: ".$_SERVER['REQUEST_URI']);
        }
    }
    else{
        $_SESSION['duplicateuser'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    } 
}

if(isset($_POST['btn_delete']))
{
    if(isset($_POST['chk_selected']))
    {
        foreach($_POST['chk_selected'] as $value)
        {
            $delete_query = mysqli_query($con,"DELETE from purok where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}


?>