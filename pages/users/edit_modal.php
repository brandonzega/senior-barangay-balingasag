<?php echo '<div id="editModal'.$row['id'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Purok Info</h4>
        </div>
        <div class="modal-body">
        <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Username</label>
                <input name="id" type="hidden" value="'.$row['id'].'" readonly/>
                <input name="username" class="form-control input-sm" type="text" placeholder="Enter Username" value="'.$row['username'].'" readonly/>
            </div> 
            <div class="form-group">
                <label>Password</label>
                <input name="password" class="form-control input-sm" type="password" placeholder="Enter Password" value="'.$row['password'].'" required/>
            </div>     
            <div class="form-group">
                <label>First Name:</label>
                <input name="firstName" class="form-control input-sm" id="username" type="text" placeholder="First Name" value="'.$row['firstname'].'" required/>
            </div>
            <div class="form-group">
                <label>Last Name:</label>
                <input name="lastName" class="form-control input-sm" id="username" type="text" placeholder="Last Name" value="'.$row['lastname'].'" required/>
            </div>
            <div class="form-group">
                <label>User Type:</label>
                <select name="type" class="form-control input-sm" required>
                <option selected="'.$row['type'].'">'.$row['type'].'</option>               
                    <option value="administrator">Administrator</option>
                    <option value="staff">Staff</option>
                </select>
            </div>
        </div>
    </div>
    </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_save" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>