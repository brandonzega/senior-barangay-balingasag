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
                                        
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addSeniorCitizen"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Senior Citizens</button>  
                                        <?php 
                                            if(!isset($_SESSION['staff']))
                                            {
                                        ?>
                                        <!-- <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button> -->
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
                                                <th>Pension</th>
                                                <th>Status</th>
                                                <th>Contact No.</th>
                                                <th style="width: 40px !important;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                                                         $squery = mysqli_query($con, "SELECT * from senior_citizen where status = 'Active' OR status = 'Inactive'");
                                                while($row = mysqli_fetch_array($squery))
                                                {
                                                    echo '
                                                    <tr>
                                                    <td><input type="checkbox" name="chk_selected[]" class="chk_selected" value="'.$row['id'].'" /></td>
                                                        <td>'.$row['seniorCitizenID'].'</td>
                                                       
                                                        <td>'.$row['lastName'].', '.$row['firstName'].'</td>
                                            
                                                        <td>'.$row['gender'].'</td>
                                                        <td>'.$row['birthdate'].'</td>
                                                        <td>'.$row['age'].'</td>
                                                        <td>'.$row['pension'].'</td>
                                                        <td>'.$row['status'].'</td>
                                                        <td>'.$row['contactNumber'].'</td>
                                                        <td><button class="btn btn-primary btn-sm" data-target="#editModal'.$row['id'].'" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></td>
                                                    </tr>
                                                    ';

                                                    include "edit_modal.php";
                                                }
                                            
                                            ?>
                                        </tbody>
                                    </table>

                                    <?php include "../deleteModal.php"; ?>

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            <?php include "../edit_notif.php"; ?>

                            <?php include "../added_notif.php"; ?>

                            <?php include "../delete_notif.php"; ?>

                            <?php include "../duplicate_error.php"; ?>

            <?php include "add_modal.php"; ?>

            <?php include "function.php"; ?>


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
</script>
    </body>
</html>