<!DOCTYPE html>
<html>

   
    </style>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <?php 
        
        include "../connection.php";
        ?>
                <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="panel-heading" style="text-align:center;">
                       <h2>
                           Request Form Barangay Balinasag Senior Citizen Information Management System
                       </h2>   
                          <br>
                            <a href="#" class="logo">
                                <img src="../../img/Barangay-Balingasag-Logo.png" style="height:110x; width:110px;"/>  
                            </a>
                </div>
             </section>
               
 
                <?php 
                if(!isset($_GET['form']))
                {
                ?>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="box-header">
                                    <div style="padding:10px;">

                                        <h5>
                                            click button bellow to fill out form
                                        </h5>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addSeniorCitizen"><i class="fa fa-user-plus" aria-hidden="true"></i>Application Form</button>  
                                        <?php 
                                            if(!isset($_SESSION['staff']))
                                            {
                                        ?>
                                        <!-- <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>  -->
                                        <?php
                                            }
                                        ?>
                                
                                    </div>                                
                              
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
        <?php 
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