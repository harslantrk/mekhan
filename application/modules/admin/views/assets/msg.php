<?php $msg = $this->session->flashdata('msg1'); if((isset($msg)) && (!empty($msg))) { ?>
	<div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <?php print_r($msg); ?>
    </div>
    <?php } ?>
    <?php $msg = $this->session->flashdata('msg0'); if((isset($msg)) && (!empty($msg))) { ?>
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <?php print_r($msg); ?>
    </div>
<?php } ?>
