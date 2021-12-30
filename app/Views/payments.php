<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lumino - Forms</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script> 

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>MICRO</span>fin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="index.html"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="widgets.html"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Widgets</a></li>
			<li><a href="charts.html"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Charts</a></li>
			<li><a href="tables.html"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Tables</a></li>
			<li class="active"><a href="forms.html"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Forms</a></li>
			<li><a href="panels.html"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Alerts &amp; Panels</a></li>
			<li><a href="icons.html"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Icons</a></li>
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Dropdown 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 1
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 2
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 3
						</a>
					</li>
				</ul>
			</li>
			<li role="presentation" class="divider"></li>
			<li><a href="login.html"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Loan Payments</h1>
			</div>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Payment Details</div>
						<div class="panel-body">
							<div class="col-md-12">
								<form role="form">

								<div class="form-group col-md-6">
										<label>Line Number</label>
										<input class="form-control" name="line_number" id="line_number">
									</div>
								
									<div class="form-group col-md-6">
										<label>Loan Number</label>
										<input class="form-control" name="loan_number" id="loan_number">
									</div>
																	
									<div class="form-group col-md-6">
										<label>First Name</label>
										<input class="form-control" name="first_name" id="first_name">
									</div>
									<div class="form-group col-md-6">
										<label>Last Name </label>
										<input class="form-control" name="last_name" id="last_name">
									</div>					
									<div class="form-group col-md-6">
										<label>Loan Amount</label>
										<input class="form-control" name="loan_amount" id="loan_amount">
									</div>
									<div class="form-group col-md-4">
										<label>Payment Date</label>
										<input type="name" class="form-control" value ='<?php echo date("Y-m-d"); ?>' name="payment_date" id="payment_date">
									</div>
									<div class="form-group col-md-4">
										<label>Amount</label>
										<input class="form-control" name="amount" id="amount">
									</div>
									<div class="form-group col-md-4">
										<label>Payment Type </label>
										<select class="form-control" name="gender" id="gender">
											<option value="1">Customer</option>
											<option value="2">Rider</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label>Contact Number</label>
										<input class="form-control" name="contact_no" id="contact_no">
									</div>
									<div class="form-group col-md-4">
										<label>Email</label>
										<input type="email" class="form-control" name="email" id="email">
									</div>
									<div class="form-group col-md-4">
										<label>Username</label>
										<input class="form-control" name="username" id="username">
									</div>
									<div class="form-group col-md-4">
										<label>Type</label>
										<select class="form-control" name="type" id="type">
											<option value="1">Employee</option>
											<option value="2">Rider</option>
										</select>
									</div>


									<div class="form-group col-md-12">
										<button type="submit" class="btn btn-primary">Submit Button</button>
										<button type="reset" class="btn btn-default">Reset Button</button>
									</div>
							</div>
							
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->

		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Current Employees</div>
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
								<thead>
								<tr>
									<th data-field="state" data-checkbox="true" >Item ID</th>
									<th data-field="id" data-sortable="true">Item ID</th>
									<th data-field="name"  data-sortable="true">Item Name</th>
									<th data-field="price" data-sortable="true">Item Price</th>
								</tr>
								</thead>
								<tr>
									<td>11</td>
									<td>1</td>
									<td>1</td>
									<td>1</td>
								</tr>
								
								
							</table>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
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
