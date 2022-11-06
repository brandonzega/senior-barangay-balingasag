<!-- ========================= MODAL ======================= -->
            <div id="addSeniorCitizen" class="modal fade">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
              <div class="modal-dialog modal-lg" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Manage Senior Citizen</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="container-fluid">
                                <div class="col-md-6 col-sm-12">

                                <div class="form-group">
                                        <label class="control-label" >Senior Citizen ID:</label><br>
                                        <div class="col-sm-12">
                                            <input name="seniorCitizenID" class="form-control input-sm" type="text" placeholder="senior citizen id"maxlength="6"required/>
                                        </div>                                   
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" >Name:</label><br>
                                        <div class="col-sm-4">
                                            <input name="lastName" class="form-control input-sm" type="text" placeholder="Lastname"required/>
                                        </div>
                                        <div class="col-sm-4">
                                            <input name="firstName" class="form-control input-sm col-sm-4" type="text" placeholder="Firstname"required/>
                                        </div>
                                        <div class="col-sm-4">
                                            <input name="middleName" class="form-control input-sm col-sm-4" type="text" placeholder="Middlename"required/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Birthdate:</label>
                                        <input name="birthdate" class="form-control input-sm input-size" type="date" placeholder="Birthdate"required/>
                                    </div>
                                    <!--
                                    <div class="form-group">
                                        <label class="control-label">Age:</label>
                                        <input name="txt_age" class="form-control input-sm input-size" type="number" placeholder="Age"/>
                                    </div> -->


                    
                                    <div class="form-group">
                                        <label class="control-label">Birth Place:</label>
                                        <input name="birthplace" class="form-control input-sm input-size" type="text"  placeholder="Birth Place"required/>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Address:</label>
                                        <input name="address" class="form-control input-sm input-size" type="text" placeholder="Address"required/>
                                    </div>

                                    <div class="form-group">
                                    <label>Purok</label>
                                    <select name="purokId" class="form-control input-sm">
                                    <option selected="" disabled="">-- Select Purok -- </option>   
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
                                        <input name="contactNumber" class="form-control input-sm input-size" type="text" placeholder="Contact Number"maxlength="11"required/>
                                    </div>             

                                </div>

                                <div class="col-md-6 col-sm-12">
                                    
                                <div class="form-group">
                                        <label class="control-label">Status:</label>
                                        <select name="status" class="form-control input-sm input-size">
                                            <option value = 'active'>Active</option>
                                            <option value = 'inactive'>Inactive</option>
                                        
                                        </select>
                                    </div>

                                    <div class="form-group">     
                                        <label class="control-label">Gender:</label>
                                        <select name="gender" class="form-control input-sm">
                                            <option selected="" disabled="">-Select Gender-</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group">     
                                        <label class="control-label">with Pension:</label>
                                        <select name="pension" class="form-control input-sm">
                                            <option selected="" disabled="">-Select-</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Monthly Pension:</label>
                                        <input name="monthlyPension" class="form-control input-sm input-size" type="text" placeholder="Monthly Pension"/>
                                    </div>            

                                    <div class="form-group">
                                        <label class="control-label">Contact Person:</label>
                                        <input name="contactPerson" class="form-control input-sm input-size" type="text" placeholder="Contact Person"required/>
                                    </div>            

                                    <div class="form-group">
                                        <label class="control-label">Contact Person Number:</label>
                                        <input name="contactPersonNumber" class="form-control input-sm input-size" type="num" placeholder="Contact Person Number"maxlength="11"required/>
                                    </div>            

                                    <div class="form-group">
                                        <label class="control-label">Contact Address:</label>
                                        <input name="contactAddress" class="form-control input-sm input-size" type="text" placeholder="Contact Address"required/>
                                    </div>            

                                </div>

                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" name="btn_add" id="btn_add" value="Add Senior Citizen"/>
                    </div>
                </div>
              </div>
              </form>
            </div>

<script type="text/javascript">
    $(document).ready(function() {
 
        var timeOut = null; // this used for hold few seconds to made ajax request
 
        var loading_html = '<img src="../../img/ajax-loader.gif" style="height: 20px; width: 20px;"/>'; // just an loading image or we can put any texts here
 
        //when button is clicked
        $('#username').keyup(function(e){
 
            // when press the following key we need not to make any ajax request, you can customize it with your own way
            switch(e.keyCode)
            {
                //case 8:   //backspace
                case 9:     //tab
                case 13:    //enter
                case 16:    //shift
                case 17:    //ctrl
                case 18:    //alt
                case 19:    //pause/break
                case 20:    //caps lock
                case 27:    //escape
                case 33:    //page up
                case 34:    //page down
                case 35:    //end
                case 36:    //home
                case 37:    //left arrow
                case 38:    //up arrow
                case 39:    //right arrow
                case 40:    //down arrow
                case 45:    //insert
                //case 46:  //delete
                    return;
            }
            if (timeOut != null)
                clearTimeout(timeOut);
            timeOut = setTimeout(is_available, 500);  // delay delay ajax request for 1000 milliseconds
            $('#user_msg').html(loading_html); // adding the loading text or image
        });
  });
function is_available(){
    //get the username
    var username = $('#username').val();
 
    //make the ajax request to check is username available or not
    $.post("check_username.php", { username: username },
    function(result)
    {
        console.log(result);
        if(result != 0)
        {
            $('#user_msg').html('Not Available');
            document.getElementById("btn_add").disabled = true;
        }
        else
        {
            $('#user_msg').html('<span style="color:#006600;">Available</span>');
            document.getElementById("btn_add").disabled = false;
        }
    });
 
}
</script>