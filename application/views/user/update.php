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
                    <span>User</span>
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
                            <?php echo form_open('user/update/'.$editdata->id); ?>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" name="username" type="text" value="<?php echo $editdata->username; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Department</label>
                                    <input class="form-control" name="department" type="text" value="<?php echo $editdata->department; ?>" disabled>
                                    <input class="form-control" name="department" type="hidden" value="<?php echo $editdata->department; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Level</label>
                                    <select class="form-control" name="level">
                                        <option value="">...</option>
                                        <option value="Administrator" <?php echo ($editdata->level == "Administrator") ? "selected" : "" ?>>Administrator</option>
                                        <option value="Koordinator User" <?php echo ($editdata->level == "Koordinator User") ? "selected" : "" ?>>Koordinator User</option>
                                        <option value="Member" <?php echo ($editdata->level == "Member") ? "selected" : "" ?>>Member</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?php echo site_url('user');?>" class="btn btn-default">Cancel</a>
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

</body>
</html>
