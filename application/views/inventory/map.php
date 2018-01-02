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
    <style type="text/css">
        .modal-dialog {
            right: auto;
            left: auto; 
            width: 600px;
            padding-top: 60px;
            padding-bottom: 30px;
        }


        ul#map {
            background: url(<?php echo base_url('assets/images/maptso.jpg'); ?>) no-repeat !important;
            width: 100%;
            height: 823px;

            position: relative;
            list-style: none;
        }

        ul#map li {
            position: absolute;
            opacity: 0.5;
        }

        ul#map li:hover {
            /*opacity: 1.0;*/
            background:none;
        }

        .ac28, .ac27, .ac26, .ac25, .ac24, .ac23, .ac22, .ac21, .ac20, .ac19, .ac18 { 
            left: 195px; 
            width: 35px; 
            height: 16px; 
            background-color: black; 
        }

        .rack.active {
            background: green;
        }

        .ac28 { top: 204px; }
        .ac27 { top: 222px; }
        .ac26 { top: 240px; }
        .ac25 { top: 258px; }
        .ac24 { top: 276px; }
        .ac23 { top: 294px; }
        .ac22 { top: 312px; }
        .ac21 { top: 330px; }
        .ac20 { top: 348px; }
        .ac19 { top: 366px; }
        .ac18 { top: 384px; }

        .ag28, .ag27, .ag26, .ag25, .ag24, .ag23, .ag22, .ag21, .ag20, .ag19, .ag18 {
            left: 251px;
            width: 35px;
            height: 16px;
            background-color: black; 
        }

        .ag28 { top: 204px; }
        .ag27 { top: 222px; }
        .ag26 { top: 240px; }
        .ag25 { top: 258px; }
        .ag24 { top: 276px; }
        .ag23 { top: 294px; }
        .ag22 { top: 312px; }
        .ag21 { top: 330px; }
        .ag20 { top: 348px; }
        .ag19 { top: 366px; }
        .ag18 { top: 384px; }

        .aj28, .aj27, .aj26, .aj25, .aj24, .aj23, .aj22, .aj21, .aj20, .aj19, .aj18 {
            left: 323px;
            width: 35px;
            height: 16px;
            background-color: black; 
        }

        .aj28 { top: 204px; }
        .aj27 { top: 222px; }
        .aj26 { top: 240px; }
        .aj25 { top: 258px; }
        .aj24 { top: 276px; }
        .aj23 { top: 294px; }
        .aj22 { top: 312px; }
        .aj21 { top: 330px; }
        .aj20 { top: 348px; }
        .aj19 { top: 366px; }
        .aj18 { top: 384px; }

        .an28, .an27, .an26, .an25, .an24, .an23, .an22, .an21, .an20, .an19, .an18 {
            left: 379px;
            width: 35px;
            height: 16px;
            background-color: black; 
        }

        .an28 { top: 204px; }
        .an27 { top: 222px; }
        .an26 { top: 240px; }
        .an25 { top: 258px; }
        .an24 { top: 276px; }
        .an23 { top: 294px; }
        .an22 { top: 312px; }
        .an21 { top: 330px; }
        .an20 { top: 348px; }
        .an19 { top: 366px; }
        .an18 { top: 384px; }

        .aq28, .aq27, .aq26, .aq25, .aq24, .aq23, .aq22, .aq21, .aq20, .aq19, .aq18 {
            left: 451px;
            width: 35px;
            height: 16px;
            background-color: black; 
        }

        .aq28 { top: 204px; }
        .aq27 { top: 222px; }
        .aq26 { top: 240px; }
        .aq25 { top: 258px; }
        .aq24 { top: 276px; }
        .aq23 { top: 294px; }
        .aq22 { top: 312px; }
        .aq21 { top: 330px; }
        .aq20 { top: 348px; }
        .aq19 { top: 366px; }
        .aq18 { top: 384px; }

        .aw26, .aw25, .aw24, .aw17, .aw16, .aw15, .aw13 {
            left: 543px;
            width: 35px;
            height: 16px;
            background-color: black; 
        }

        .aw26 { top: 241px; }
        .aw25 { top: 259px; }
        .aw24 { top: 277px; }

        .aw17 { top: 398px; }
        .aw16 { top: 416px; }
        .aw15 { top: 435px; }

        .aw13 { top: 471px; }
    </style>

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
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel with-nav-tabs panel-default">
                                <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#">Layout</a></li>
                                        <?php
                                            if ($this->session->userdata('level')=="Administrator"){
                                                echo "<li><a href='" . site_url('inventory/listing') ."'>Listing</a></li>";
                                            }
                                        ?>
                                        <!-- <li><a href="<?php //echo site_url('inventory/listing');?>">Listing</a></li> -->
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <ul id="map">
                                            <li class="rack ac28"></li>
                                            <li class="rack ac27"></li>
                                            <li class="rack ac26"></li>
                                            <li class="rack ac25"></li>
                                            <li class="rack ac24"></li>
                                            <li class="rack ac23"></li>
                                            <li class="rack ac22"></li>
                                            <li class="rack ac21"></li>
                                            <li class="rack ac20"></li>
                                            <li class="rack ac19"></li>
                                            <li class="rack ac18"></li>

                                            <li class="rack ag28"></li>
                                            <li class="rack ag27"></li>
                                            <li class="rack ag26"></li>
                                            <li class="rack ag25"></li>
                                            <li class="rack ag24"></li>
                                            <li class="rack ag23"></li>
                                            <li class="rack ag22"></li>
                                            <li class="rack ag21"></li>
                                            <li class="rack ag20"></li>
                                            <li class="rack ag19"></li>
                                            <li class="rack ag18"></li>

                                            <li class="rack aj28"></li>
                                            <li class="rack aj27"></li>
                                            <li class="rack aj26"></li>
                                            <li class="rack aj25"></li>
                                            <li class="rack aj24"></li>
                                            <li class="rack aj23"></li>
                                            <li class="rack aj22"></li>
                                            <li class="rack aj21"></li>
                                            <li class="rack aj20"></li>
                                            <li class="rack aj19"></li>
                                            <li class="rack aj18"></li>

                                            <li class="rack an28"></li>
                                            <li class="rack an27"></li>
                                            <li class="rack an26"></li>
                                            <li class="rack an25"></li>
                                            <li class="rack an24"></li>
                                            <li class="rack an23"></li>
                                            <li class="rack an22"></li>
                                            <li class="rack an21"></li>
                                            <li class="rack an20"></li>
                                            <li class="rack an19"></li>
                                            <li class="rack an18"></li>

                                            <li class="rack aq28"></li>
                                            <li class="rack aq27"></li>
                                            <li class="rack aq26"></li>
                                            <li class="rack aq25"></li>
                                            <li class="rack aq24"></li>
                                            <li class="rack aq23"></li>
                                            <li class="rack aq22"></li>
                                            <li class="rack aq21"></li>
                                            <li class="rack aq20"></li>
                                            <li class="rack aq19"></li>
                                            <li class="rack aq18"></li>

                                            <li class="rack aw26"></li>
                                            <li class="rack aw25"></li>
                                            <li class="rack aw24"></li>

                                            <li class="rack aw17"></li>
                                            <li class="rack aw16"></li>
                                            <li class="rack aw15"></li>

                                            <li class="rack aw13"></li>
                                        </ul>

                                        <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog">
                                        
                                            <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="table-responsive">
                                                            <table id="example1" class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Type Hardware</th>
                                                                        <th>Serial Number</th>
                                                                        <th>Hostname</th>
                                                                        <th>PIC</th>
                                                                        <th>PO Number</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="modal-table">
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
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

    var data = <?php echo json_encode($data); ?>;
    window.addEventListener('load', function() {
        // rack active 
        if(data) {
            for (var i = 0; i < data.length; i++) {
                $('.'+ data[i]['coor_rack'].toLocaleLowerCase()).addClass('active');
            }
        }

        $('ul#map li.active').on('click', function(evt) {

            var classes = $(this).attr('class').split(/\s+/);
            var rackId = classes[1];
            // title rack modal
            $('.modal-title').html(rackId.toUpperCase());


            // filter data berdasarkan rack
            var devices = data.filter(function(val) {
                if(rackId == val['coor_rack'].toLocaleLowerCase()) return true;
                return false;
            });

            $('#modal-table').html(null);
            for (var i = 0; i < devices.length; i++) {
                $('#modal-table').append('<tr>'+
                                            '<td>'+(i+1)+'</td>'+
                                            // '<td>'+(devices[i]['coor_rack'])+'</td>'+
                                            '<td>'+(devices[i]['type_hardware'])+'</td>'+
                                            '<td>'+(devices[i]['sn'])+'</td>'+
                                            '<td>'+(devices[i]['hostname'])+'</td>'+
                                            '<td>'+(devices[i]['pic'])+'</td>'+
                                            '<td>'+(devices[i]['po_number'])+'</td>'+
                                        '</tr>');
            }

            $('#myModal').modal('show');

            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            });
        });


    }, false );

</script>

</body>
</html>
