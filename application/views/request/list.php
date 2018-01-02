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
                <?php if($this->session->flashdata('info')): ?>
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <h4>Success!</h4>
                        <?php echo $this->session->flashdata('info'); ?>

                    </div>
                <?php endif; ?>
				<div class="col-xs-12">
                    <a href="<?php echo site_url('request/add');?>" class="btn btn-primary">Create Request</a>
					<br>
					<br>
                    <div class="box box-primary">
                        <?php if ($this->session->userdata('level')=="Administrator"): ?>
                            
                            <table id="example1" class="table table-bordered table-hover" style="background: white">
                                <thead>
                                    <tr>
                                        <th>DC Name</th>
                                        <th>Floor</th>
                                        <th>Subject</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th>Remark</th>
                                        <th>Submitted</th>
                                        <th>Approved</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php  foreach ($data as $v): ?>
                                        <tr>
                                            <td><?php echo $v['DCName']; ?></td>
                                            <td><?php echo $v['floor']; ?></td>
                                            <td><?php echo $v['subject']; ?></td>
                                            <td><?php echo $v['deskripsi']; ?></td>
                                            <td><?php echo $v['status']; ?></td>
                                            <td><?php echo $v['remark']; ?></td>
                                            <td><?php echo $v['submitted']; ?></td>
                                            <td><?php echo $v['approved']; ?></td>
                                            <td>
                                                <a href="<?php echo site_url('request/edit/' . $v['id']); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> |
                                                <a href="<?php echo site_url('request/delete/' . $v['id']); ?>" onClick="return doconfirm();"><i class="fa fa-remove" aria-hidden="true" style="color: #d9534f;"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        <?php elseif($this->session->userdata('level')=="Koordinator User"): ?>
                            
                            <table id="example1" class="table table-bordered table-hover" style="background: white">
                                <thead>
                                    <tr>
                                        <th>DC Name</th>
                                        <th>Floor</th>
                                        <th>Subject</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th>Remark</th>
                                        <th>Submitted</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach ($data as $v): ?>
                                        <tr>
                                            <td><?php echo $v['DCName']; ?></td>
                                            <td><?php echo $v['floor']; ?></td>
                                            <td><?php echo $v['subject']; ?></td>
                                            <td><?php echo $v['deskripsi']; ?></td>
                                            <td><?php echo $v['status']; ?></td>
                                            <td><?php echo $v['remark']; ?></td>
                                            <td><?php echo $v['submitted']; ?></td>
                                            <td>
                                                <a href="<?php echo site_url('request/edit/' . $v['id']); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        <?php else: ?>

                            <table id="example1" class="table table-bordered table-hover" style="background: white">
                                <thead>
                                    <tr>
                                        <th>DC Name</th>
                                        <th>Floor</th>
                                        <th>Subject</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach ($data as $v): ?>
                                        <tr>
                                            <td><?php echo $v['DCName']; ?></td>
                                            <td><?php echo $v['floor']; ?></td>
                                            <td><?php echo $v['subject']; ?></td>
                                            <td><?php echo $v['deskripsi']; ?></td>
                                            <td><?php echo $v['status']; ?></td>
                                            <td>
                                                <a href="<?php echo site_url('request/edit/' . $v['id']); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> |
                                                <a href="<?php echo site_url('request/delete/' . $v['id']); ?>" onClick="return doconfirm();"><i class="fa fa-remove" aria-hidden="true" style="color: #d9534f;"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        <?php endif; ?>

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
