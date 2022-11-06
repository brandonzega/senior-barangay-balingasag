<?php

	echo '
	<aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        
                        <div class="pull-left info" style= margin-top:80px;>
                            <h4>Hello, '.$_SESSION['role'].'</h4>
                        </div>
                    </div>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    ';
                    if($_SESSION['role'] == "Administrator"){
                        echo '
                    <ul class="sidebar-menu">
                            <li>
                                <a href="../dashboard/dashboard.php">
                                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="../purok/purok.php">
                                    <i class="fa fa-home"></i> <span>Purok</span>
                                </a>
                            </li>
                          
                            <li>
                                <a href="../seniorcitizen/seniorcitizen.php">
                                    <i class="fa fa-blind"></i> <span>Senior Citizens</span>
                                </a>
                            </li>
                            <li>
                            <a href="../pension/pension.php">
                                <i class="fa fa-money"></i> <span>Pension</span>
                            </a>
                           </li>
                           
                             
                           <li>
                           <a href="../request_list/request_list.php" >
                           <i class="fa fa-list"></i> <span> Request List</span>
                           </a> 
                          </li>  

                          <li>
                          <a href="../report/report.php">
                          <i class="fa fa-bar-chart"></i> <span>Report</span>
                          </a>
                         </li>   
                               
                          
                            
                       <li>
                            <a href="../sms/sms.php">
                           <i class="fa fa-paper-plane"></i> <span>SMS</span>
                           </a>
                       </li>    
                       <li>
                         <a href="../users/users.php">
                             <i class="fa fa-users"></i> <span>Users</span>
                         </a>
                       </li>  
                       <li>
                       <a href="../logs/logs.php">
                           <i class="fa fa-history"></i> <span>Activity log</span>
                       </a>
                       </li>                                  
                            
                    </ul>';
                    }
                    elseif(isset($_SESSION['staff'])){
                        echo '
                        <ul class="sidebar-menu">
                            <li>
                                <a href="../officials/officials.php">
                                    <i class="fa fa-user"></i> <span>Barangay Officials</span>
                                </a>
                            </li>
                            <li>
                                <a href="../household/household.php">
                                    <i class="fa fa-home"></i> <span>Household</span>
                                </a>
                            </li>
                            <li>
                                <a href="../resident/resident.php">
                                    <i class="fa fa-users"></i> <span>Resident</span>
                                </a>
                            </li>
                            <li>
                                <a href="../zone/zone.php">
                                    <i class="fa fa-user"></i> <span>Zone Leader</span>
                                </a>
                            </li>
                            <li>
                                <a href="../permit/permit.php">
                                    <i class="fa fa-file"></i> <span>Permit</span>
                                </a>
                            </li>
                            <li>
                                <a href="../blotter/blotter.php">
                                    <i class="fa fa-users"></i> <span>Blotter</span>
                                </a>
                            </li>
                            <li>
                                <a href="../clearance/clearance.php">
                                    <i class="fa fa-file"></i> <span>Clearance</span>
                                </a>
                            </li>
                            <li>
                                <a href="../activity/activity.php">
                                    <i class="fa fa-calendar"></i> <span>Activity</span>
                                </a>
                            </li>
                        </ul>';
                    }
                    else{
                        echo '
                        <ul class="sidebar-menu">
                            <li>
                                <a href="../permit/permit.php">
                                    <i class="fa fa-file"></i> <span>Permit</span>
                                </a>
                            </li>
                            <li>
                                <a href="../clearance/clearance.php">
                                    <i class="fa fa-file"></i> <span>Clearance</span>
                                </a>
                            </li>
                            <li>
                                <a href="../activity/activity.php">
                                    <i class="fa fa-calendar"></i> <span>Activity</span>
                                </a>
                            </li>
                        </ul>';
                    }
                echo '
                </section>
                <!-- /.sidebar -->
            </aside>
	';
?>