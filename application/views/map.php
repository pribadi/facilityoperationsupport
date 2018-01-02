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
					<span>Map Layout Data Center TSO</span>
				</header>
				<div class="col-xs-12">
                    <div class="box box-primary">
                    <style type="text/css">
                        .modal-dialog {
                            right: auto;
                            left: auto; 
                            width: 600px;
                            padding-top: 60px;
                            padding-bottom: 30px;
                        }


                    ul#map {
                        background: url(<?php echo base_url('assets/images/maptso.jpg'); ?>) no-repeat;
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
                        opacity: 1.0;
                        background:none;
                    }

                    .ac28, .ac27, .ac26, .ac25, .ac24, .ac23, .ac22, .ac21, .ac20, .ac19, .ac18 { 
                        left: 195px; 
                        width: 35px; 
                        height: 16px; 
                        background-color: black; 
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

                    .ag28 { top: 204px; left: 251px; width: 35px; height: 16px; background-color: black; }
                    .ag27 { top: 222px; left: 251px; width: 35px; height: 16px; background-color: black; }
                    .ag26 { top: 240px; left: 251px; width: 35px; height: 16px; background-color: black; }
                    .ag25 { top: 258px; left: 251px; width: 35px; height: 16px; background-color: black; }
                    .ag24 { top: 276px; left: 251px; width: 35px; height: 16px; background-color: black; }
                    .ag23 { top: 294px; left: 251px; width: 35px; height: 16px; background-color: black; }
                    .ag22 { top: 312px; left: 251px; width: 35px; height: 16px; background-color: black; }
                    .ag21 { top: 330px; left: 251px; width: 35px; height: 16px; background-color: black; }
                    .ag20 { top: 348px; left: 251px; width: 35px; height: 16px; background-color: black; }
                    .ag19 { top: 366px; left: 251px; width: 35px; height: 16px; background-color: black; }
                    .ag18 { top: 384px; left: 251px; width: 35px; height: 16px; background-color: black; }

                    .aj28 { top: 204px; left: 323px; width: 35px; height: 16px; background-color: black; }
                    .aj27 { top: 222px; left: 323px; width: 35px; height: 16px; background-color: black; }
                    .aj26 { top: 240px; left: 323px; width: 35px; height: 16px; background-color: black; }
                    .aj25 { top: 258px; left: 323px; width: 35px; height: 16px; background-color: black; }
                    .aj24 { top: 276px; left: 323px; width: 35px; height: 16px; background-color: black; }
                    .aj23 { top: 294px; left: 323px; width: 35px; height: 16px; background-color: black; }
                    .aj22 { top: 312px; left: 323px; width: 35px; height: 16px; background-color: black; }
                    .aj21 { top: 330px; left: 323px; width: 35px; height: 16px; background-color: black; }
                    .aj20 { top: 348px; left: 323px; width: 35px; height: 16px; background-color: black; }
                    .aj19 { top: 366px; left: 323px; width: 35px; height: 16px; background-color: black; }
                    .aj18 { top: 384px; left: 323px; width: 35px; height: 16px; background-color: black; }

                    .an28 { top: 204px; left: 379px; width: 35px; height: 16px; background-color: black; }
                    .an27 { top: 222px; left: 379px; width: 35px; height: 16px; background-color: black; }
                    .an26 { top: 240px; left: 379px; width: 35px; height: 16px; background-color: black; }
                    .an25 { top: 258px; left: 379px; width: 35px; height: 16px; background-color: black; }
                    .an24 { top: 276px; left: 379px; width: 35px; height: 16px; background-color: black; }
                    .an23 { top: 294px; left: 379px; width: 35px; height: 16px; background-color: black; }
                    .an22 { top: 312px; left: 379px; width: 35px; height: 16px; background-color: black; }
                    .an21 { top: 330px; left: 379px; width: 35px; height: 16px; background-color: black; }
                    .an20 { top: 348px; left: 379px; width: 35px; height: 16px; background-color: black; }
                    .an19 { top: 366px; left: 379px; width: 35px; height: 16px; background-color: black; }
                    .an18 { top: 384px; left: 379px; width: 35px; height: 16px; background-color: black; }

                    .aq28 { top: 204px; left: 451px; width: 35px; height: 16px; background-color: black; }
                    .aq27 { top: 222px; left: 451px; width: 35px; height: 16px; background-color: black; }
                    .aq26 { top: 240px; left: 451px; width: 35px; height: 16px; background-color: black; }
                    .aq25 { top: 258px; left: 451px; width: 35px; height: 16px; background-color: black; }
                    .aq24 { top: 276px; left: 451px; width: 35px; height: 16px; background-color: black; }
                    .aq23 { top: 294px; left: 451px; width: 35px; height: 16px; background-color: black; }
                    .aq22 { top: 312px; left: 451px; width: 35px; height: 16px; background-color: black; }
                    .aq21 { top: 330px; left: 451px; width: 35px; height: 16px; background-color: black; }
                    .aq20 { top: 348px; left: 451px; width: 35px; height: 16px; background-color: black; }
                    .aq19 { top: 366px; left: 451px; width: 35px; height: 16px; background-color: black; }
                    .aq18 { top: 384px; left: 451px; width: 35px; height: 16px; background-color: black; }

                    .aw26 { top: 241px; left: 543px; width: 32px; height: 15px; background-color: black; }
                    .aw25 { top: 259px; left: 543px; width: 32px; height: 15px; background-color: black; }
                    .aw24 { top: 277px; left: 543px; width: 32px; height: 15px; background-color: black; }

                    .aw17 { top: 398px; left: 543px; width: 32px; height: 15px; background-color: black; }
                    .aw16 { top: 416px; left: 543px; width: 32px; height: 15px; background-color: black; }
                    .aw15 { top: 435px; left: 543px; width: 32px; height: 15px; background-color: black; }

                    .aw13 { top: 471px; left: 543px; width: 32px; height: 15px; background-color: black; }
                </style>
                <ul id="map">
                    <a href="<?php echo site_url('layout/detail/ac28');?>"><li class="rack ac28"></li></a>
                    <a href="<?php echo site_url('layout/detail/ac27');?>"><li class="rack ac27"></li></a>
                    <a href="<?php echo site_url('layout/detail/ac26');?>"><li class="rack ac26"></li></a>
                    <a href="<?php echo site_url('layout/detail/ac25');?>"><li class="rack ac25"></li></a>
                    <a href="<?php echo site_url('layout/detail/ac24');?>"><li class="rack ac24"></li></a>
                    <a href="<?php echo site_url('layout/detail/ac23');?>"><li class="rack ac23"></li></a>
                    <a href="<?php echo site_url('layout/detail/ac22');?>"><li class="rack ac22"></li></a>
                    <a href="<?php echo site_url('layout/detail/ac21');?>"><li class="rack ac21"></li></a>
                    <a href="<?php echo site_url('layout/detail/ac20');?>"><li class="rack ac20"></li></a>
                    <a href="<?php echo site_url('layout/detail/ac19');?>"><li class="rack ac19"></li></a>
                    <a href="<?php echo site_url('layout/detail/ac18');?>"><li class="rack ac18"></li></a>

                    <a href="<?php echo site_url('layout/detail/ag28');?>"><li class="rack ag28"></li></a>
                    <a href="<?php echo site_url('layout/detail/ag27');?>"><li class="rack ag27"></li></a>
                    <a href="<?php echo site_url('layout/detail/ag26');?>"><li class="rack ag26"></li></a>
                    <a href="<?php echo site_url('layout/detail/ag25');?>"><li class="rack ag25"></li></a>
                    <a href="<?php echo site_url('layout/detail/ag24');?>"><li class="rack ag24"></li></a>
                    <a href="<?php echo site_url('layout/detail/ag23');?>"><li class="rack ag23"></li></a>
                    <a href="<?php echo site_url('layout/detail/ag22');?>"><li class="rack ag22"></li></a>
                    <a href="<?php echo site_url('layout/detail/ag21');?>"><li class="rack ag21"></li></a>
                    <a href="<?php echo site_url('layout/detail/ag20');?>"><li class="rack ag20"></li></a>
                    <a href="<?php echo site_url('layout/detail/ag19');?>"><li class="rack ag19"></li></a>
                    <a href="<?php echo site_url('layout/detail/ag18');?>"><li class="rack ag18"></li></a>

                    <a href="<?php echo site_url('layout/detail/aj28');?>"><li class="rack aj28"></li></a>
                    <a href="<?php echo site_url('layout/detail/aj27');?>"><li class="rack aj27"></li></a>
                    <a href="<?php echo site_url('layout/detail/aj26');?>"><li class="rack aj26"></li></a>
                    <a href="<?php echo site_url('layout/detail/aj25');?>"><li class="rack aj25"></li></a>
                    <a href="<?php echo site_url('layout/detail/aj24');?>"><li class="rack aj24"></li></a>
                    <a href="<?php echo site_url('layout/detail/aj23');?>"><li class="rack aj23"></li></a>
                    <a href="<?php echo site_url('layout/detail/aj22');?>"><li class="rack aj22"></li></a>
                    <a href="<?php echo site_url('layout/detail/aj21');?>"><li class="rack aj21"></li></a>
                    <a href="<?php echo site_url('layout/detail/aj20');?>"><li class="rack aj20"></li></a>
                    <a href="<?php echo site_url('layout/detail/aj19');?>"><li class="rack aj19"></li></a>
                    <a href="<?php echo site_url('layout/detail/aj18');?>"><li class="rack aj18"></li></a>

                    <a href="<?php echo site_url('layout/detail/an28');?>"><li class="rack an28"></li></a>
                    <a href="<?php echo site_url('layout/detail/an27');?>"><li class="rack an27"></li></a>
                    <a href="<?php echo site_url('layout/detail/an26');?>"><li class="rack an26"></li></a>
                    <a href="<?php echo site_url('layout/detail/an25');?>"><li class="rack an25"></li></a>
                    <a href="<?php echo site_url('layout/detail/an24');?>"><li class="rack an24"></li></a>
                    <a href="<?php echo site_url('layout/detail/an23');?>"><li class="rack an23"></li></a>
                    <a href="<?php echo site_url('layout/detail/an22');?>"><li class="rack an22"></li></a>
                    <a href="<?php echo site_url('layout/detail/an21');?>"><li class="rack an21"></li></a>
                    <a href="<?php echo site_url('layout/detail/an20');?>"><li class="rack an20"></li></a>
                    <a href="<?php echo site_url('layout/detail/an19');?>"><li class="rack an19"></li></a>
                    <a href="<?php echo site_url('layout/detail/an18');?>"><li class="rack an18"></li></a>

                    <a href="<?php echo site_url('layout/detail/aq28');?>"><li class="rack aq28"></li></a>
                    <a href="<?php echo site_url('layout/detail/aq27');?>"><li class="rack aq27"></li></a>
                    <a href="<?php echo site_url('layout/detail/aq26');?>"><li class="rack aq26"></li></a>
                    <a href="<?php echo site_url('layout/detail/aq25');?>"><li class="rack aq25"></li></a>
                    <a href="<?php echo site_url('layout/detail/aq24');?>"><li class="rack aq24"></li></a>
                    <a href="<?php echo site_url('layout/detail/aq23');?>"><li class="rack aq23"></li></a>
                    <a href="<?php echo site_url('layout/detail/aq22');?>"><li class="rack aq22"></li></a>
                    <a href="<?php echo site_url('layout/detail/aq21');?>"><li class="rack aq21"></li></a>
                    <a href="<?php echo site_url('layout/detail/aq20');?>"><li class="rack aq20"></li></a>
                    <a href="<?php echo site_url('layout/detail/aq19');?>"><li class="rack aq19"></li></a>
                    <a href="<?php echo site_url('layout/detail/aq18');?>"><li class="rack aq18"></li></a>

                    <a href="<?php echo site_url('layout/detail/aw26');?>"><li class="rack aw26"></li></a>
                    <a href="<?php echo site_url('layout/detail/aw25');?>"><li class="rack aw25"></li></a>
                    <a href="<?php echo site_url('layout/detail/aw24');?>"><li class="rack aw24"></li></a>

                    <a href="<?php echo site_url('layout/detail/aw17');?>"><li class="rack aw17"></li></a>
                    <a href="<?php echo site_url('layout/detail/aw16');?>"><li class="rack aw16"></li></a>
                    <a href="<?php echo site_url('layout/detail/aw15');?>"><li class="rack aw15"></li></a>

                    <a href="<?php echo site_url('layout/detail/aw13');?>"><li class="rack aw13"></li></a>
                </ul>

                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                
                    <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                            </div>
                            <div class="modal-body">
                            </div>
                            <div class="modal-footer">
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

        // $('body').on('hidden.bs.modal', '.modal', function () {
        //     $(this).removeData('bs.modal');
        // });

        // $(function(){
        //     $(document).on('click','.rack',function(e){
        //         e.preventDefault();
        //         $("#myModal").modal('show');
        //         $.post('<?php echo base_url();?>index.php/layout/modal',
        //             {id:$(this).attr('data-id')},
        //             function(html){
        //                 $(".modal-body").html(html);
        //             }   
        //         );
        //     });
        // });
    </script>

</body>
</html>
