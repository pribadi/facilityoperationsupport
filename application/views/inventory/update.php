<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
	<link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css'>
	<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.4/jquery-jvectormap.min.css'>
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/style.css">
	<link href="<?php echo base_url('assets/js/datatables/dataTables.bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet" type="text/css" />

</head>

<body>
	<?php $this->load->view('headerSide'); ?>

<main>
  	<section>
    	<div class="rad-body-wrapper rad-nav-min">
      		<div class="container-fluid">
				<header class="rad-page-title">
                    <span>Inventory Data Center TSO</span>
				</header>
                <?php if($this->session->flashdata('info')): ?>
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <h4>Success!</h4>
                        <?php echo $this->session->flashdata('info'); ?>

                    </div>
                <?php endif; ?>
				<div class="col-xs-12">
                    <a href="<?php echo site_url('inventory/listing');?>" class="btn btn-primary">Back</a>
                    <br>
                    <br>
                    <div class="box box-primary">
                        <?php echo form_open('inventory/update/'.$editdata->id); ?>
                            <div class="form-group">
                                <label>Koordinat Rack</label>
                                <input class="form-control" name="coor_rack" type="text" value="<?php echo $editdata->coor_rack; ?>">
                            </div>
                            <div class="form-group">
                                <label>Type Hardware</label>
                                <input class="form-control" name="type_hardware" type="text" value="<?php echo $editdata->type_hardware; ?>">
                            </div>
                            <div class="form-group">
                                <label>Serial Number</label>
                                <input class="form-control" name="sn" type="text" value="<?php echo $editdata->sn; ?>">
                            </div>
                            <div class="form-group">
                                <label>Hostname</label>
                                <input class="form-control" name="hostname" type="text" value="<?php echo $editdata->hostname; ?>">
                            </div>
                            <div class="form-group">
                                <label>PIC</label>
                                <input class="form-control" name="pic" type="text" value="<?php echo $editdata->pic; ?>">
                            </div>
                            <div class="form-group">
                                <label>PO Number</label>
                                <input class="form-control" name="po_number" type="text" value="<?php echo $editdata->po_number; ?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                            </form>
                        <?php echo form_close(); ?>
                    </div>
                </div>
			</div>
		</div>
	</section>
</main>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js'></script>
<script src='http://code.jquery.com/ui/1.11.4/jquery-ui.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.3/jquery.slimscroll.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.8.0/lodash.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js'></script>
<script src='http://jvectormap.com/js/jquery-jvectormap-2.0.3.min.js'></script>
<script src='http://jvectormap.com/js/jquery-jvectormap-world-mill-en.js'></script>
<script src="<?php echo base_url('assets/js/bootstrap.js'); ?>" type="text/javascript"></script>

<script src="<?php echo base_url('assets/js/datatables/jquery.dataTables.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/datatables/dataTables.bootstrap.js'); ?>" type="text/javascript"></script>

<script src="<?php echo base_url();?>assets/js/sliderMenu.js"></script>
<script src="<?php echo base_url();?>assets/js/inputData.js"></script>

</body>
</html>
