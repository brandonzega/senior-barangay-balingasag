<!-- ===== DELETE MODAL ==== -->
<div id="approvalModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Approval Confirmation</h4>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to confirm selected user?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-danger btn-sm" name="btn_denied" id="btn_denied" value="Denied"/>
            <input type="submit" class="btn btn-success btn-sm" name="btn_approval" id="btn_approval" value="Approve"/>
        </div>
    </div>
  </div>
</div>
<!-- ===== END OF DELETE MODAL ===== -->