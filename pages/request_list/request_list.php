<!DOCTYPE html>
<html>

    <?php
    session_start();
    if(!isset($_SESSION['role']))
    {
        header("Location: ../../login.php"); 
    }
    else
    {
    ob_start();
    include('../head_css.php'); ?>
    <style>
    .input-size {
        width:418px;
    }

    .zoom:hover {
            -ms-transform: scale(15); /* IE 9 */
            -webkit-transform: scale(15); /* Safari 3-8 */
            transform: scale(15); 
    }
    </style>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <?php 
        
        include "../connection.php";
        ?>
        <?php include('../header.php'); ?>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include('../sidebar-left.php'); ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage Senior Citizens
                    </h1>
                    
                </section>

                <?php 
                if(!isset($_GET['seniorcitizen']))
                {
                ?>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="box-header">
                                    <div style="padding:10px;">
                                        
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#approvalModal"><i class="fa fa-check" aria-hidden="true"></i> Approval</button> 
                                        <?php 
                                            if(!isset($_SESSION['staff']))
                                            {
                                        ?>
                                        <!-- <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>  -->
                                        <?php
                                            }
                                        ?>
                                
                                    </div>                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <form method="post"  enctype="multipart/form-data">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <?php 
                                                    if(!isset($_SESSION['staff']))
                                                    {
                                                ?>
                                                <th style="width: 20px !important;"><input type="checkbox" name="chk_selected[]" class="cbxMain" onchange="checkMain(this)"/></th>
                                                <?php
                                                    }
                                                ?>
                                                <th>ID No.</th>
                                                <th>Fullname</th> 
                                                <th>Gender</th>
                                                <th>Birthdate</th>                                            
                                                <th>Age</th>
                                                <th>address</th>
                                                <th>Brgy Confirmation <i style='font-size: 12px;'>(Attachments)</i></th>
                                                <!-- <th>Certificate of Senior Pension <i style='font-size: 12px;'>(Attachments)</i></th> -->
                                                <th>Status</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $squery = mysqli_query($con, "SELECT * from senior_citizen where status = 'Pending' OR status = 'Denied' ORDER BY status DESC");
                                                while($row = mysqli_fetch_array($squery))
                                                {
                                                    $status = $row['status'];
                                                    echo '
                                                    <tr>
                                                    ';
                                                    if($status == 'Pending'){
                                                        echo '<td><input type="checkbox" name="chk_selected[]" class="chk_selected" value="'.$row['id'].'" /></td>';
                                                    } else {
                                                        echo '<td></td>';
                                                    }
                                                    echo'
                                                        <td>'.$row['seniorCitizenID'].'</td>                                                     
                                                        <td>'.$row['lastName'].', '.$row['firstName'].'</td>                                       
                                                        <td>'.$row['gender'].'</td>
                                                        <td>'.$row['birthdate'].'</td>                                                
                                                        <td>'.$row['age'].'</td>
                                                        <td>'.$row['address'].'</td>
                                                        <td> <img class="zoom" style="width:50px; height: 50px;" src="../../file_attachments/'.$row['brgy_confirmation'].'" onclick="enlargeImg1(this)"></td>';
                                                        
                                                         
                                                        

                                                    if($status == 'Pending'){
                                                        echo '<td style="color:orange; font-weight: bold;">'.$row['status'].'</td>';
                                                    } else {
                                                        echo '<td style="color:red; font-weight: bold;">'.$row['status'].'</td>';
                                                    }
                                                    echo'    
                                                    </tr>
                                                    ';
                                                        //    image insert pension file code incase needed
                                                        // <td> <img class="zoom" style="width:50px; height: 50px;" src="../../file_attachments/'.$row['cert_pension'].'" onclick="enlargeImg2(this)"></td>';
                                                      
                                                     
                                                }
                                            
                                            ?>
                                        </tbody>
                                    </table>


                                    <?php 
                                        include "../approvalModal.php"; 
                                        include "../deleteModal.php";
                                    ?>

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            <?php include "../edit_notif.php"; ?>

                            <?php include "../added_notif.php"; ?>

                            <?php include "../delete_notif.php"; ?>

                            <?php include "../duplicate_error.php"; ?>


            <?php include "function.php"; ?>


                    </div>   <!-- /.row -->
                </section><!-- /.content -->
                <?php
                }
                else
                {
                ?>
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                
                                <div class="box-body table-responsive">
                                <form method="post"  enctype="multipart/form-data">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)"/></th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>Gender</th>
                                                <th>Former Address</th>
                                                <th style="width: 40px !important;">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $squery = mysqli_query($con, "SELECT id,CONCAT(lname, ', ', fname, ' ', mname) as cname, age, gender, formerAddress, image FROM tblresident where householdnum = '".$_GET['resident']."'");
                                            while($row = mysqli_fetch_array($squery))
                                            {
                                                echo '
                                                <tr>
                                                    <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['id'].'" /></td>
                                                    <td style="width:70px;"><image src="image/'.basename($row['image']).'" style="width:60px;height:60px;"/></td>
                                                    <td>'.$row['cname'].'</td>
                                                    <td>'.$row['age'].'</td>
                                                    <td>'.$row['gender'].'</td>
                                                    <td>'.$row['formerAddress'].'</td>
                                                    <td><button class="btn btn-primary btn-sm" data-target="#editModal'.$row['id'].'" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></td>
                                                </tr>
                                                ';

                                                include "edit_modal.php";
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <?php include "../deleteModal.php"; ?>
                            <?php include "../duplicate_error.php"; ?>

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box --> 
                        </div>   <!-- /.row -->
                </section><!-- /.content -->
                <?php
                }
                ?>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <?php }
        include "../footer.php"; ?>
<script type="text/javascript">
    $(function() {
        $("#table").dataTable({
           "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,6 ] } ],"aaSorting": []
        });
    });

    function enlargeImg1(img) {
                img.style.transform = "scale(10)";
                img.style.transition =
                  "transform 0.25s ease";
            }

    function enlargeImg2(img) {
                img.style.transform = "scale(10)";
                img.style.transition =
                  "transform 0.25s ease";
            }
</script>
    </body>
</html>