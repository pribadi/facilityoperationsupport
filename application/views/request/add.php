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
					<span>Request Infrastructure</span>
				</header>
                <?php if(validation_errors()): ?>
                    <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <h4>Failed!</h4>
                          <?php echo validation_errors(); ?>
                    </div>
                <?php endif; ?>
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <?php echo form_open('request/add'); ?>

                                <?php if ($_SESSION['level'] == 'Member'): ?>
                                    <div class="form-group">
                                        <label>DC Name</label>
                                        <input class="form-control" name="DCName" type="text" value="<?php echo $_SESSION['department']; ?>" disabled>
                                        <input class="form-control" name="DCName" type="hidden" value="<?php echo $_SESSION['department']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Floor</label>
                                        <select class="form-control" name="floor">
                                            <option value="">...</option>
                                            <?php foreach ($floor as $v) : ?>
                                                <option value="<?php echo $v['floor']; ?>"><?php echo $v['floor']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input class="form-control" name="subject" type="text" value="<?php echo set_value('subject'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control" rows="5" id="deskripsi" name="deskripsi"></textarea>
                                    </div>
                                <?php else: ?>
                                    <div class="form-group">
                                        <label class="control-label">DC Name</label>
                                        <select name="DCName" id="kategori" class="form-control">
                                            <option value="">...</option>
                                            <?php foreach($datadc->result() as $row):?>
                                                <option value="<?php echo $row->DCName;?>"><?php echo $row->DCName;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Floor</label>
                                        <select name="floor" class="floor form-control">
                                            <option value="">...</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input class="form-control" name="subject" type="text" value="<?php echo set_value('subject'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control" rows="5" id="deskripsi" name="deskripsi"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option value="">...</option>
                                            <option value="Approve" <?php echo set_select('status', 'Approve'); ?>>Approve</option>
                                            <option value="Pending" <?php echo set_select('status', 'Pending'); ?>>Pending</option>
                                            <option value="Reject" <?php echo set_select('status', 'Reject'); ?>>Reject</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Remark</label>
                                        <textarea class="form-control" rows="5" id="remark" name="remark"></textarea>
                                    </div>
                                <?php endif; ?>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?php echo site_url('request');?>" class="btn btn-default">Cancel</a>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
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

	<script type="text/javascript">
        function doconfirm()
        {
            job=confirm("Are you sure to delete permanently?");
            if(job!=true)
            {
                return false;
            }
        }

        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
          })

        // get floor from database
        $(document).ready(function(){
            $('#kategori').change(function(){
                var DCName=$(this).val();
                $.ajax({
                    url : "<?php echo base_url();?>index.php/request/get_floor",
                    method : "POST",
                    data : {DCName: DCName},
                    async : false,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].floor+'>'+data[i].floor+'</option>';
                        }
                        $('.floor').html(html);
                         
                    }
                });
            });
        });
    </script>

</body>
</html>
