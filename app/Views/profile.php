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
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user">
								<use xlink:href="#stroked-male-user"></use>
							</svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user">
										<use xlink:href="#stroked-male-user"></use>
									</svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear">
										<use xlink:href="#stroked-gear"></use>
									</svg> Settings</a></li>
							<li><a href="#"><svg class="glyph stroked cancel">
										<use xlink:href="#stroked-cancel"></use>
									</svg> Logout</a></li>
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
			<li><a href="index.html"><svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> Dashboard</a></li>
			<li><a href="widgets.html"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-calendar"></use>
					</svg> Widgets</a></li>
			<li><a href="charts.html"><svg class="glyph stroked line-graph">
						<use xlink:href="#stroked-line-graph"></use>
					</svg> Charts</a></li>
			<li><a href="tables.html"><svg class="glyph stroked table">
						<use xlink:href="#stroked-table"></use>
					</svg> Tables</a></li>
			<li class="active"><a href="forms.html"><svg class="glyph stroked pencil">
						<use xlink:href="#stroked-pencil"></use>
					</svg> Forms</a></li>
			<li><a href="panels.html"><svg class="glyph stroked app-window">
						<use xlink:href="#stroked-app-window"></use>
					</svg> Alerts &amp; Panels</a></li>
			<li><a href="icons.html"><svg class="glyph stroked star">
						<use xlink:href="#stroked-star"></use>
					</svg> Icons</a></li>
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down">
							<use xlink:href="#stroked-chevron-down"></use>
						</svg></span> Dropdown
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right">
								<use xlink:href="#stroked-chevron-right"></use>
							</svg> Sub Item 1
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right">
								<use xlink:href="#stroked-chevron-right"></use>
							</svg> Sub Item 2
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right">
								<use xlink:href="#stroked-chevron-right"></use>
							</svg> Sub Item 3
						</a>
					</li>
				</ul>
			</li>
			<li role="presentation" class="divider"></li>
			<li><a href="login.html"><svg class="glyph stroked male-user">
						<use xlink:href="#stroked-male-user"></use>
					</svg> Login Page</a></li>
		</ul>

	</div>
	<!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Customer Profile</h1>
			</div>
		</div>
		<!--/.row-->


		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">Customer Details</div>
					<div class="panel-body">
						<div class="col-md-12">
							<form method="post" role="form" id="dataForm">
								<input type="hidden" class="form-control" name="id" id="id" >
								<div class="form-group col-md-6">
									<label>First Name</label>
									<input class="form-control" name="first_name" id="first_name" required>
								</div>

								<div class="form-group col-md-6">
									<label>Last Name</label>
									<input class="form-control" name="last_name" id="last_name" required>
								</div>
								<div class="form-group col-md-6">
									<label>Address</label>
									<input class="form-control" name="address" id="address" required>
								</div>
								<div class="form-group col-md-6">
									<label>City</label>
									<input class="form-control" name="city" id="city" required>
								</div>
								<div class="form-group col-md-4">
									<label>DoB</label>
									<input type="date" class="form-control" name="dob" id="dob" required>
								</div>
								<div class="form-group col-md-4">
									<label>NIC</label>
									<input class="form-control" name="nic" id="nic" required>
								</div>
								<div class="form-group col-md-4">
									<label>Gender</label>
									<select class="form-control" name="gender" id="gender" required>
										<option value="1">Male</option>
										<option value="2">Female</option>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label>Contact Number</label>
									<input class="form-control" name="contact_no" id="contact_no" required>
								</div>
								<div class="form-group col-md-4">
									<label>Email</label>
									<input type="email" class="form-control" name="email" id="email">
								</div>
								<div class="form-group col-md-4">
									<label>Status</label>
									<select class="form-control" name="status" id="status" required>
										<option value="1">Active</option>
										<option value="2">Inactive</option>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label>Line</label>
									<select class="form-control" name="line" id="line" required>

									</select>
								</div>


								<div class="form-group col-md-12">
									<button type="button" class="btn btn-primary" id="add"><span class="">Add</button>
									<button type="button" class="btn btn-success" id="update">Update</button>
									<button type="button" class="btn btn-danger" id="delete">Delete</button>
									<button type="reset" class="btn btn-default" id="reset">Reset</button>
								</div>

							</form>

						</div>

					</div>
				</div>
			</div><!-- /.col-->


			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">Active Loan Details</div>
					<div class="panel-body">
						<div class="col-md-12">
						<form role="form" form method="post" id="loanForm">
								<input type="hidden" class="form-control" name="lid" id="lid">
								<!-- <div class="form-group col-md-6">
									<label>Customer Name</label>
									<input class="form-control" name="customer_name" id="customer_id">
									<select class="form-control" name="customer_id" id="customer_id" required>
										<option value="">Select here</option>
									</select>
								</div> -->
								<div class="form-group col-md-4">
									<label>Loan Amount</label>
									<input class="form-control" name="loan_amount" id="loan_amount" required readonly="readonly">
								</div>

								<div class="form-group col-md-6">
									<label>Reason</label>
									<input class="form-control" name="reason" id="reason" required readonly="readonly">
								</div>
								<div class="form-group col-md-6">
									<label>Guarantor 01</label>
									<input class="form-control" name="guarantor_1" id="guarantor_1" required readonly="readonly">
								</div>
								<div class="form-group col-md-6">
									<label>Guarantor 02</label>
									<input class="form-control" name="guarantor_2" id="guarantor_2" required readonly="readonly">
								</div>
								
								<div class="form-group col-md-4">
									<label>Period</label>
									<input class="form-control" name="loan_period" id="loan_period" placeholder="65" value="65" readonly="readonly">
									<!-- <select class="form-control" name="loan_period" id="loan_period">
										    <option value="1">65</option>
										</select> -->
								</div>
								<div class="form-group col-md-4">
									<label>Interest Rate</label>
									<input class="form-control" name="loan_interest" id="loan_interest" placeholder="30" value="30" readonly="readonly">
									<!-- <select class="form-control" name="loan_interest" id="loan_interest">
										    <option value="1">30</option>
										</select> -->
								</div>
								<div class="form-group col-md-4">
									<label>Created By</label>
									<select class="form-control" name="created_by" id="created_by" required readonly="readonly">
										<option value=""></option>
										<option value="1">Admin</option>
										<option value="2">Rider</option>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label>Loan Status</label>
									<select class="form-control" name="lstatus" id="lstatus" required readonly="readonly">
										<option value=""></option>
										<option value="1">Pending</option>
										<option value="2">Approved</option>
										<option value="3">Refused</option>
										<option value="4">Abandoned</option>
										<option value="5">Cleared</option>
									</select>
								</div>
								<!-- <div class="form-group col-md-4">
										<label>Approved Date</label>
										<input type="date" class="form-control" name="approved_date" id="approved_date" readonly="readonly">
									</div> -->
								<!-- <div class="form-group col-md-4">
										<label>Approved By</label>
										<select class="form-control" name="approved_by" id="approved_by" readonly="readonly">
											<option value="0">Pending</option>
										    <option value="1">Admin</option>
											<option value="2">Rider</option>
										</select>
									</div> -->
								<!-- <div class="form-group col-md-4">
										<label>Effective Date</label>
										<input type="date" class="form-control" name="effective_date" id="effective_date" value="<?php echo date('Y-m-d'); ?>" readonly="readonly">
									</div> -->

								<div class="form-group col-md-12">
									<button type="submit" class="btn btn-primary" id="add"><span class="">Submit</button>
									<button type="button" class="btn btn-success" id="update">Update</button>
									<button type="button" class="btn btn-danger" id="delete">Delete</button>
									<button type="reset" class="btn btn-default" id="reset">Reset</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div><!-- /.row -->


		<!-- <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Current Customers</div>
					<div class="panel-body">
						<table id="dataTable" data-click-to-select="true" data-show-export="true" data-toggle="table" data-url="customer/get" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
							<thead>
								<tr>
									<th data-field="state" data-checkbox="true"></th>
									<th data-field="id" data-sortable="true">Emp ID</th>
									<th data-field="first_name" data-sortable="true">Fisrt Name</th>
									<th data-field="last_name" data-sortable="true">Last Name</th>
									<th data-field="address" data-sortable="true">Address</th>
									<th data-field="city" data-sortable="true">City</th>
									<th data-field="dob" data-sortable="true">DoB</th>
									<th data-field="nic" data-sortable="true">NIC</th>
									<th data-field="gender" data-sortable="true">Gender</th>
									<th data-field="contact_no" data-sortable="true">Contact No</th>
									<th data-field="email" data-sortable="true">Email</th>
									<th data-field="line" data-sortable="true">Line</th>
									<th data-field="status" data-sortable="true">Status</th>
								</tr>
							</thead>



						</table>
					</div>
				</div>
			</div>
		</div>

	</div> -->
	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>

	<script src="js/custom/profile.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


	<script>
		var $table = $('#dataTable');
		var $remove = $('#remove');

		! function($) {
			$(document).on("click", "ul.nav li.parent > a > span.icon", function() {
				$(this).find('em:first').toggleClass("glyphicon-minus");
			});
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function() {
			if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function() {
			if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})

		function getIdSelections() {
			return $.map($table.bootstrapTable('getSelections'), function(row) {
				return row.id
			})
		}
	</script>
</body>

</html>