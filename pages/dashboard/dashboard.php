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
                        Dashboard
                    </h1>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                
                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../purok/purok.php"><span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">Total Purok</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from purok");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../seniorcitizen/seniorcitizen.php"><span class="info-box-icon bg-aqua"><i class="fa fa-blind"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">Total Senior Citizens</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from senior_citizen where status = 'active' OR status ='inactive'");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>

                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../With Pension/with_pension.php"><span class="info-box-icon bg-aqua"><i class="fa fa-check"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">With Pensions</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from senior_citizen WHERE pension= 'yes'  AND status='active'");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../Without pension/without_pension.php"><span class="info-box-icon bg-aqua"><i class="fa fa-times"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">Without Pensions</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from senior_citizen where pension= 'No'and status='active'");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../Male/male.php"><span class="info-box-icon bg-aqua"><i class="fa fa-male"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">Male</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from  senior_citizen where gender= 'male' and status= 'active'");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../Female/female.php"><span class="info-box-icon bg-aqua"><i class="fa fa-female"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">Female</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from  senior_citizen where gender= 'female' and status= 'active'");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../Active/active.php"><span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">active</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from  senior_citizen where status= 'active'");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../Inactive/inactive.php"><span class="info-box-icon bg-aqua"><i class="fa fa-times"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">inactive</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from  senior_citizen where status= 'inactive'");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../Pending/pending.php"><span class="info-box-icon bg-aqua"><i class="fa fa-reorder"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">Pending Request</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from senior_citizen where status = 'Pending' ");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../Denied request/denied_request.php"><span class="info-box-icon bg-aqua"><i class="fa fa-exclamation-circle"></i></span></a>
                                    <div class="info-box-content">
                                      <span class="info-box-text">Denied Request</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from senior_citizen where status = 'denied' ");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>
                            </div><!-- /.box -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <?php }
        include "../footer.php"; ?>
<script type="text/javascript">
    $(function() {
        $("#table").dataTable({
           "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,5 ] } ],"aaSorting": []
        });
    });
</script>
    </body>
</html>