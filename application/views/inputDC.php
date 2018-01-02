<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>Input Data Center</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>

	<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/style.css">

	<?php
	foreach($css_files as $file): ?>
	    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	 
	<?php endforeach; ?>
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
						<span>Input Gedung</span>
					</header>
					<?php echo $output; ?>
				</div>
			</div>
		</section>
	</main>

	<?php foreach($js_files as $file): ?>
	 
	    <script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>

	<script src="<?php echo base_url();?>assets/js/sliderMenu.js"></script>
</body>
</html>
