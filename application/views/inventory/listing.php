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
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/style2.css">
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
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel with-nav-tabs panel-default">
                                <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                        <li><a href="<?php echo site_url('inventory');?>">Layout</a></li>
                                        <li class="active"><a href="#">Listing</a></li>
                                    </ul>
                                    <br>
                                    <a href="<?php echo site_url('inventory/create'); ?>" class="btn btn-primary">Add</a>
                                </div>
                                
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="box box-primary">
                                            <table id="example1" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Koordinat Rack</th>
                                                        <th>Type Hardware</th>
                                                        <th>Serial Number</th>
                                                        <th>Hostname</th>
                                                        <th>PIC</th>
                                                        <th>PO Number</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $no = 1;
                                                     ?>
                                                    <?php foreach ($data as $v): ?>
                                                        <tr>
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $v['coor_rack']; ?></td>
                                                            <td><?php echo $v['type_hardware']; ?></td>
                                                            <td><?php echo $v['sn']; ?></td>
                                                            <td><?php echo $v['hostname']; ?></td>
                                                            <td><?php echo $v['pic']; ?></td>
                                                            <td><?php echo $v['po_number']; ?></td>
                                                            <td>
                                                                <a href="<?php echo site_url('inventory/update/'.$v['id']); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> |
                                                                <a href="<?php echo site_url('inventory/delete/'.$v['id']); ?>" onClick="return doconfirm();"><i class="fa fa-remove" aria-hidden="true" style="color: #d9534f;"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    </script>

</body>
</html>
