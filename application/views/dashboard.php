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
</head>

<body>
<?php
	include 'headerSide.php';
?>
<main>
	<section>
		<div class="rad-body-wrapper rad-nav-min">
			<div class="container-fluid">
				<header class="rad-page-title">
					<span>Dashboard</span>
					<small class="md-txt">Welcome <?PHP echo $_SESSION['username']; ?>, </small><br>

           <small class="md-txt"> <i class="fa fa-map-marker rad-txt-danger">&nbsp;&nbsp;Select The Data Center : </i></small>
			<?php
				echo '<select name="dc" id="selectDc">';
				if (is_array($listDCName)) {
					foreach ($listDCName as $key => $value) {
						echo "<option value='".$value->DCName."'>".$value->DCName."</option>";
					}
				}
				echo '</select>';
			?>
           <small class="md-txt"> <i class="rad-txt-danger">&nbsp;&nbsp;&nbsp;Select The Floor : </i></small>
			<?php
				echo '<select name="floor" id="selectFloor">';
				if (is_array($listFloor)) {
					foreach ($listFloor as $key => $value) {
						echo "<option value='".$value->floor."'>".$value->floor."</option>";
					}
				}
				echo '</select>';
			?>

				</header>
				<div class="row" id="summaryGraph">
					<div class="col-lg-4 col-xs-6">
						<div class="rad-info-box rad-txt-success">
							<i class="fa fa-bolt"></i>
							<i class="fa">Power ( A )</i>
							<span class="heading">
								<span>Capacity</span>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<span>Spare</span>
							</span>
							<span class="value">
								<span id="powerCap">
									<?php
										echo $listCapacity[0]->power;
									?>
								</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<span id="powerSpare">
									<?php
										$sparePower = $listCapacity[0]->power - $listUtilization->power;
										echo $sparePower;
									?>
								</span>
							</span>
						</div>
					</div>
					<div class="col-lg-4 col-xs-6">
						<div class="rad-info-box rad-txt-primary">
							<i class="fa fa-thermometer-half"></i>
							<!-- <i class="fa">Cooling ( <sup>o</sup>C )</i> -->
							<i class="fa">Cooling ( Btu/H )</i>
							<span class="heading">
								<span>Capacity</span>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<span>Spare</span>
							</span>
							<span class="value">
								<span id="coolingCap">
									<?php
										echo $listCapacity[0]->cooling;
									?>
								</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<span id="coolingSpare">
									<?php
										$spareCooling = $listCapacity[0]->cooling - $listUtilization->cooling;
										echo $spareCooling;
									?>
								</span>
							</span>
						</div>
					</div>
					<div class="col-lg-4 col-xs-6">
						<div class="rad-info-box rad-txt-danger">
							<i class="fa fa-building-o"></i>
							<!-- <i class="fa">Space ( m<sup>2</sup> )</i> -->
							<i class="fa">Space ( Rack )</i>
							<span class="heading">
								<span>Capacity</span>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<span>Spare</span>
							</span>
							<span class="value">
								<span id="spaceCap">
									<?php
										echo $listCapacity[0]->space;
									?>
								</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<span id="spaceSpare">
									<?php
										$spareSpace = $listCapacity[0]->space - $listUtilization->space;
										echo $spareSpace;
									?>
								</span>
						</div>
					</div>
				</div>

				<div class="row" id="lineGraph">
					<div class="col-lg-4 col-xs-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Power Historical (Last 7 days)</h3>
							</div>
							<div class="panel-body">
								<div id="lineChart" class="rad-chart"></div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-xs-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Cooling Historical (Last 7 days)</h3>
							</div>
							<div class="panel-body">
								<div id="lineChart2" class="rad-chart"></div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-xs-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Space Historical (Last 7 days)</h3>
							</div>
							<div class="panel-body">
								<div id="lineChart3" class="rad-chart"></div>
							</div>
						</div>
					</div>
				</div>


				<!--<div class="row">
					<div class="col-md-12 col-xs-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Power Historical<ul class="rad-panel-action">
																	<li><i class="fa fa-chevron-down"></i></li>
																	<li><i class="fa fa-rotate-right"></i></li>
																	<li><i class="fa fa-cog"></i>
																	<li><i class="fa fa-close"></i>
																	</li>
																</ul></h3>
							</div>
							<div class="panel-body">
								<div id="lineChart" class="rad-chart"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 col-xs-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Cooling Historical<ul class="rad-panel-action">
																	<li><i class="fa fa-chevron-down"></i></li>
																	<li><i class="fa fa-rotate-right"></i></li>
																	<li><i class="fa fa-cog"></i>
																	<li><i class="fa fa-close"></i>
																	</li>
																</ul></h3>
							</div>
							<div class="panel-body">
								<div id="lineChart2" class="rad-chart"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 col-xs-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Space Historical<ul class="rad-panel-action">
																	<li><i class="fa fa-chevron-down"></i></li>
																	<li><i class="fa fa-rotate-right"></i></li>
																	<li><i class="fa fa-cog"></i>
																	<li><i class="fa fa-close"></i>
																	</li>
																</ul></h3>
							</div>
							<div class="panel-body">
								<div id="lineChart3" class="rad-chart"></div>
							</div>
						</div>
					</div>
				</div>-->

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

	<script src="<?php echo base_url();?>assets/js/dashboard.js"></script>
	<script src="<?php echo base_url();?>assets/js/index.js"></script>
    
</body>
</html>
