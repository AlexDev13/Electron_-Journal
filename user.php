<title>Home Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

<?php 

	require 'db.php';
?>

<?php if ( isset ($_SESSION['logged_user']) ) : ?>
	
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-60" style="font-size:20px;">
						Welcome
					</span>
					<span class="login100-form-avatar">
						<img src="images/vector.png" alt="AVATAR">
					</span>

					

					<div class="container-login100-form-btn">
						<a type="button" onClick="MainClick()" style="margin-top:20px;background-color:#000000; width:150px;color:whitesmoke" class="btn btn-default"><?php echo $_SESSION['logged_user']->login; ?></a>
					</div>

					<ul class="login-more p-t-190">
						

						<li>
							<span class="txt1">
                            You can leave
							</span>

							<a href="./logout.php" class="txt2">
								Exit
							</a>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
<?php else : ?>
<h1>Error</h1>
<?php endif; ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    function MainClick(){
Swal.fire({
  title: '<strong>HTML <u>example</u></strong>',
  type: 'info',
  html:
    '<?php echo $_SESSION['logged_user']->login; ?> ' +
    '<a href="//github.com">links</a> ' +
    'and other HTML tags',
  showCloseButton: true,
  showCancelButton: true,
  focusConfirm: false,
  confirmButtonText:
    '<i class="fa fa-thumbs-up"></i> Great!',
  confirmButtonAriaLabel: 'Thumbs up, great!',
  cancelButtonText:
    '<i class="fa fa-thumbs-down"></i>',
  cancelButtonAriaLabel: 'Thumbs down',
})
    }
</script>
