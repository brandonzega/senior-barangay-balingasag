<!-- ========================= MODAL ======================= -->
<style>
    .table1 {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
}

.table1 tbody {
  display: table;
  width: 100%;
}
</style>
            <div id="sendSMS" class="modal fade">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
              <div class="modal-dialog modal-lg" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Send Message</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="container-fluid">
                                <div class="col-md-6 col-sm-12">                    
                                    <div class="form-group">

                                        <label class="control-label">Message</label> <br>
                                        <textarea name="message" class="form-control input-sm input-size" type="text"  placeholder="Enter your message here." rows="10" required ></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    
                                <div class="form-group">
                                        <label class="control-label">Recipients</label>
                                        <select name="recipients" class="form-control input-sm input-size" onchange="SelectRecipients(this)">
                                            <option value = 'all'>Send To All</option>
                                            <option value = 'selective'>Select Users</option>
                                        
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" name="btn_send" id="btn_send" value="Send"/>
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

function SelectRecipients(selected) {
        var selectedValue = selected.options[selected.selectedIndex].value;
        var recipients = document.getElementById("recipients");
       
        //Users SHOW / HIDE
        let element = document.getElementById("selectUsers");
        let hidden = element.getAttribute("hidden");

        recipients.disabled = selectedValue == 'all' ? false : true;
        if (!recipients.disabled) {
            recipients.focus();
            element.removeAttribute("hidden");
        } else {
            element.setAttribute("hidden", "hidden");
            //document.getElementById("monthlyPension").value = '0';
        }
    }
</script>