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
                      Manage Pensions
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
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#processPension"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Process Pension</button>  
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
                                                <th>Monthly Pension</th>
                                                <th>contactNumber</th>
                                                
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $squery = mysqli_query($con, "SELECT * from senior_citizen where status='active' and pension= 'Yes'");
                                                while($row = mysqli_fetch_array($squery))
                                                {
                                                    echo '
                                                    <tr>
                                                        <td><input type="checkbox" name="chk_selected[]" class="chk_selected" value="'.$row['id'].'" /></td>
                                                        <td>'.$row['seniorCitizenID'].'</td>
                                                        <td>'.$row['lastName'].', '.$row['firstName'].'</td>
                                                        <td>'.$row['monthlyPension'].'</td>
                                                        <td>'.$row['contactNumber'].'</td>
                                                        
                                                     
                                                    </tr>
                                                    ';

                                                 
                                                }
                                            
                                            ?>
                                        </tbody>
                                    </table>

                                    <?php include "processPension.php"; ?>

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                           

                            <?php include "../process_notif.php"; ?>

                            

                            

            <?php include "add_modal.php"; ?>

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
                                                <th style="width: 20px !important;"><input type="checkbox" name="chk_selected[]" class="cbxMain" onchange="checkMain(this)"/></th>
                                                <th>Name</th>
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
                                                    <td><input type="checkbox" name="chk_selected[]" class="chk_selected" value="'.$row['id'].'" /></td>
                                                    <td style="width:70px;"><image src="image/'.basename($row['image']).'" style="width:60px;height:60px;"/></td>
                                                    <td>'.$row['cname'].'</td>
                                                </tr>
                                                ';                                          
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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
</script>
    </body>
</html>