<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Network Operation Unit - MoE</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default"><br>
				<center>
					<img src="img/logo.png">
					<h3>Network Operation Unit</h3>
					<div class="panel-heading">Log in</div>
				</center>
				<div class="panel-body">
					<form role="form" id="dataForm">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" id="username" type="username" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" id="password" type="password" value="">
							</div>
							
							<center><button type="button" class="btn btn-primary" id="login"><span class="">Login</button>
							<button type="reset" class="btn " id="reset"><span class="">Reset</button></center>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>

	<script src="js/custom/auth.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
