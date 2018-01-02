<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet" media="screen">
</head>

<body>
    <div class="container">
        <form class="form-signin" name="" method="post" action="<?php echo base_url();?>auth/cek_login">
            <!-- <div id="message"></div> -->
            <h2 class="form-signin-heading">Please sign in</h2>
            <input name="username" id="username" type="text" class="form-control" placeholder="Username" autofocus>
            <input name="password" id="password" type="password" class="form-control" placeholder="Password">
            <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    </div>

<script src="<?php echo base_url();?>assets/js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.js"></script>

</body>
</html>