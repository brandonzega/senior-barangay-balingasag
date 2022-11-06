<?php if(isset($_SESSION['process'])){
    echo '<script>$(document).ready(function (){deleted();});</script>';
    unset($_SESSION['process']);
    } ?>
<div class="alert alert-success alert-autocloseable-danger" style=" position: fixed; top: 1em; right: 1em; z-index: 9999; display: none;">
     Pension Successfully Processed!
</div>
