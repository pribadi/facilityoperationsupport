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
                <?php if(validation_errors()): ?>
                <div class="box-body">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Failed!</h4>
                            <?php echo validation_errors(); ?>
                    </div>
                </div>
                <?php endif; ?>
                <div class="col-xs-12">
                    <a href="<?php echo site_url('inventory/listing');?>" class="btn btn-primary">Back</a>
					<br>
					<br>
                    <div class="box box-primary">
                        <?php echo form_open('inventory/create'); ?>
                            <div class="form-group">
                                <label>Koordinat Rack</label>
                                <select class="form-control" name="coor_rack">
                                    <option value="">...</option>
                                    <option value="AC18" <?php echo set_select('coor_rack', 'AC18'); ?>>AC18</option>
                                    <option value="AC19" <?php echo set_select('coor_rack', 'AC19'); ?>>AC19</option>
                                    <option value="AC20" <?php echo set_select('coor_rack', 'AC20'); ?>>AC20</option>
                                    <option value="AC21" <?php echo set_select('coor_rack', 'AC21'); ?>>AC21</option>
                                    <option value="AC22" <?php echo set_select('coor_rack', 'AC22'); ?>>AC22</option>
                                    <option value="AC23" <?php echo set_select('coor_rack', 'AC23'); ?>>AC23</option>
                                    <option value="AC24" <?php echo set_select('coor_rack', 'AC24'); ?>>AC24</option>
                                    <option value="AC25" <?php echo set_select('coor_rack', 'AC25'); ?>>AC25</option>
                                    <option value="AC26" <?php echo set_select('coor_rack', 'AC26'); ?>>AC26</option>
                                    <option value="AC27" <?php echo set_select('coor_rack', 'AC27'); ?>>AC27</option>
                                    <option value="AC28" <?php echo set_select('coor_rack', 'AC28'); ?>>AC28</option>

                                    <option value="AG18" <?php echo set_select('coor_rack', 'AG18'); ?>>AG18</option>
                                    <option value="AG19" <?php echo set_select('coor_rack', 'AG19'); ?>>AG19</option>
                                    <option value="AG20" <?php echo set_select('coor_rack', 'AG20'); ?>>AG20</option>
                                    <option value="AG21" <?php echo set_select('coor_rack', 'AG21'); ?>>AG21</option>
                                    <option value="AG22" <?php echo set_select('coor_rack', 'AG22'); ?>>AG22</option>
                                    <option value="AG23" <?php echo set_select('coor_rack', 'AG23'); ?>>AG23</option>
                                    <option value="AG24" <?php echo set_select('coor_rack', 'AG24'); ?>>AG24</option>
                                    <option value="AG25" <?php echo set_select('coor_rack', 'AG25'); ?>>AG25</option>
                                    <option value="AG26" <?php echo set_select('coor_rack', 'AG26'); ?>>AG26</option>
                                    <option value="AG27" <?php echo set_select('coor_rack', 'AG27'); ?>>AG27</option>
                                    <option value="AG28" <?php echo set_select('coor_rack', 'AG28'); ?>>AG28</option>

                                    <option value="AJ18" <?php echo set_select('coor_rack', 'AJ18'); ?>>AJ18</option>
                                    <option value="AJ19" <?php echo set_select('coor_rack', 'AJ19'); ?>>AJ19</option>
                                    <option value="AJ20" <?php echo set_select('coor_rack', 'AJ20'); ?>>AJ20</option>
                                    <option value="AJ21" <?php echo set_select('coor_rack', 'AJ21'); ?>>AJ21</option>
                                    <option value="AJ22" <?php echo set_select('coor_rack', 'AJ22'); ?>>AJ22</option>
                                    <option value="AJ23" <?php echo set_select('coor_rack', 'AJ23'); ?>>AJ23</option>
                                    <option value="AJ24" <?php echo set_select('coor_rack', 'AJ24'); ?>>AJ24</option>
                                    <option value="AJ25" <?php echo set_select('coor_rack', 'AJ25'); ?>>AJ25</option>
                                    <option value="AJ26" <?php echo set_select('coor_rack', 'AJ26'); ?>>AJ26</option>
                                    <option value="AJ27" <?php echo set_select('coor_rack', 'AJ27'); ?>>AJ27</option>
                                    <option value="AJ28" <?php echo set_select('coor_rack', 'AJ28'); ?>>AJ28</option>

                                    <option value="AN18" <?php echo set_select('coor_rack', 'AN18'); ?>>AN18</option>
                                    <option value="AN19" <?php echo set_select('coor_rack', 'AN19'); ?>>AN19</option>
                                    <option value="AN20" <?php echo set_select('coor_rack', 'AN20'); ?>>AN20</option>
                                    <option value="AN21" <?php echo set_select('coor_rack', 'AN21'); ?>>AN21</option>
                                    <option value="AN22" <?php echo set_select('coor_rack', 'AN22'); ?>>AN22</option>
                                    <option value="AN23" <?php echo set_select('coor_rack', 'AN23'); ?>>AN23</option>
                                    <option value="AN24" <?php echo set_select('coor_rack', 'AN24'); ?>>AN24</option>
                                    <option value="AN25" <?php echo set_select('coor_rack', 'AN25'); ?>>AN25</option>
                                    <option value="AN26" <?php echo set_select('coor_rack', 'AN26'); ?>>AN26</option>
                                    <option value="AN27" <?php echo set_select('coor_rack', 'AN27'); ?>>AN27</option>
                                    <option value="AN28" <?php echo set_select('coor_rack', 'AN28'); ?>>AN28</option>

                                    <option value="AQ18" <?php echo set_select('coor_rack', 'AQ18'); ?>>AQ18</option>
                                    <option value="AQ19" <?php echo set_select('coor_rack', 'AQ19'); ?>>AQ19</option>
                                    <option value="AQ20" <?php echo set_select('coor_rack', 'AQ20'); ?>>AQ20</option>
                                    <option value="AQ21" <?php echo set_select('coor_rack', 'AQ21'); ?>>AQ21</option>
                                    <option value="AQ22" <?php echo set_select('coor_rack', 'AQ22'); ?>>AQ22</option>
                                    <option value="AQ23" <?php echo set_select('coor_rack', 'AQ23'); ?>>AQ23</option>
                                    <option value="AQ24" <?php echo set_select('coor_rack', 'AQ24'); ?>>AQ24</option>
                                    <option value="AQ25" <?php echo set_select('coor_rack', 'AQ25'); ?>>AQ25</option>
                                    <option value="AQ26" <?php echo set_select('coor_rack', 'AQ26'); ?>>AQ26</option>
                                    <option value="AQ27" <?php echo set_select('coor_rack', 'AQ27'); ?>>AQ27</option>
                                    <option value="AQ28" <?php echo set_select('coor_rack', 'AQ28'); ?>>AQ28</option>

                                    <option value="AW26" <?php echo set_select('coor_rack', 'AW26'); ?>>AW26</option>
                                    <option value="AW25" <?php echo set_select('coor_rack', 'AW25'); ?>>AW25</option>
                                    <option value="AW24" <?php echo set_select('coor_rack', 'AW24'); ?>>AW24</option>
                                    <option value="AW17" <?php echo set_select('coor_rack', 'AW17'); ?>>AW17</option>
                                    <option value="AW16" <?php echo set_select('coor_rack', 'AW16'); ?>>AW16</option>
                                    <option value="AW15" <?php echo set_select('coor_rack', 'AW15'); ?>>AW15</option>
                                    <option value="AW13" <?php echo set_select('coor_rack', 'AW13'); ?>>AW13</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Type Hardware</label>
                                <input class="form-control" name="type_hardware" type="text" value="<?php echo set_value('type_hardware'); ?>">
                            </div>
                            <div class="form-group">
                                <label>Serial Number</label>
                                <input class="form-control" name="sn" type="text" value="<?php echo set_value('sn'); ?>">
                            </div>
                            <div class="form-group">
                                <label>Hostname</label>
                                <input class="form-control" name="hostname" type="text" value="<?php echo set_value('hostname'); ?>">
                            </div>
                            <div class="form-group">
                                <label>PIC</label>
                                <input class="form-control" name="pic" type="text" value="<?php echo set_value('pic'); ?>">
                            </div>
                            <div class="form-group">
                                <label>PO Number</label>
                                <input class="form-control" name="po_number" type="text" value="<?php echo set_value('po_number'); ?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
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
