<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Loan Approval</title>

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
	

	

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="home"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Loan Approval</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Loan Approval</h1>
			</div>
		</div>
		<!--/.row-->
		<!-- table view- for pending cases -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Pending Loans</div>
					<div class="panel-body">
						<table id="dataTable" data-click-to-select="true" data-show-export="true" data-toggle="table" data-url="loan/get" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
							<thead>
								<tr>
								<th data-field="state" data-checkbox="true"></th>
									<th data-field="id" data-sortable="true">Loan ID</th>
									<th data-field="customer_id" data-sortable="true">Customer Name</th>
									<!-- <th data-field="guarantor_1" data-sortable="true">Gurantor 01</th>
									<th data-field="guarantor_2" data-sortable="true">Gurantor 02</th>-->
									<th data-field="loan_amount" data-sortable="true">Loan Amount</th>
									<th data-field="reason" data-sortable="true">Reason</th> 
									<th data-field="created_date" data-sortable="true">Created Date</th>
									<th data-field="username" data-sortable="true">Created By</th>
								</tr>
							</thead>


						</table>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Loan Details</div>
					<div class="panel-body">
						<div class="col-md-12">
							<form role="form" form method="post" id="loanForm">
								<input type="hidden" class="form-control" name="id" id="id">
								<div class="form-group col-md-6">
									<label>Customer Name</label>
									<!-- <input type="hidden" class="form-control" name="customer_id" id="customer_id"> -->
									<input class="form-control" name="customer_name" id="customer_name"  readonly='readonly'>
									<!-- <select class="form-control" name="customer_id" id="customer_id" readonly="readonly">
										<option value=""></option>
										<?php foreach ($guarantordata as $guarantor) { ?>
											<option value="<?php echo $guarantor->id ?>"><?php echo $guarantor->name ?></option>
										<?php } ?>
									</select> -->
								</div>
								<div class="form-group col-md-6">
									<label>Reason</label>
									<input class="form-control" name="reason" id="reason" readonly="readonly" >
								</div>
								<div class="form-group col-md-6">
									<label>Guarantor 01</label>
									<!-- <input type="hidden" class="form-control" name="guarantor_1_id" id="guarantor_1_id"> -->
									<input class="form-control" name="guarantor_1" id="guarantor_1" readonly="readonly">
									
								</div>
								<div class="form-group col-md-6">
									<label>Guarantor 02</label>
									<!-- <input type="hidden" class="form-control" name="guarantor_2_id" id="guarantor_2_id"> -->
									<input class="form-control" name="guarantor_2" id="guarantor_2"readonly="readonly">
									
								</div>
								<div class="form-group col-md-4">
									<label>Loan Amount</label>
									<input class="form-control" name="loan_amount" id="loan_amount" readonly="readonly">
								</div>
								<div class="form-group col-md-4">
									<label>Period</label>
									<input class="form-control" name="loan_period" id="loan_period" readonly="readonly">
									
								</div>
								<div class="form-group col-md-4">
									<label>Interest Rate</label>
									<input class="form-control" name="loan_interest" id="loan_interest" readonly="readonly">
									
								</div>
								<div class="form-group col-md-4">
									<label>Created By</label>
									<input class="form-control" name="created_by" id="created_by" readonly="readonly">
									
								</div>
								<div class="form-group col-md-4">
									<label>Loan Status</label>
									<select class="form-control" name="status" id="status" required>
										<option value="" disabled selected>Select here</option>
										<option value="2">Approved</option>
										<option value="3">Refused</option>
										<option value="4">Abandoned</option>
										<option value="5">Cleared</option>
									</select>
								</div>
								<div class="form-group col-md-4">
										<label>Approved Date</label>
										<input type="date" class="form-control" name="approved_date" id="approved_date" value="<?php echo date('Y-m-d'); ?>" required>
									</div>
								<!-- <div class="form-group col-md-4">
										<label>Approved By</label>
										<select class="form-control" name="approved_by" id="approved_by" required>
											<option value="0"></option>
										    <option value="1">Admin</option>
											<option value="2">Rider</option>
										</select>
									</div> -->
								<div class="form-group col-md-4">
										<label>Effective Date</label>
										<input type="date" class="form-control" name="effective_date" id="effective_date"  required>
									</div>

								<div class="form-group col-md-12">
									<button type="button" class="btn btn-success" id="update">Update</button>
									<!-- <button type="button" class="btn btn-danger" id="delete">Delete</button> -->
									<button type="reset" class="btn btn-default" id="reset">Reset</button>
									<!-- <button type="button" class="btn btn-primary" id="show">Process the repayment summary</button> -->
									<!-- <button type="button" class="btn btn-primary" id="hide">Hide the repayment summary</button> -->
								</div>
							</form>
						</div>

					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->

		

		<!-- table view- for approved cases -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Approved Loans</div>
					<div class="panel-body">
						<table id="dataTablenew" data-click-to-select="true" data-show-export="true" data-toggle="table" data-url="loan/get_approved" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
							<thead>
								<tr>
								<th data-field="state" data-checkbox="true"></th>
									<th data-field="id" data-sortable="true">Loan ID</th>
									<th data-field="customer_id" data-sortable="true">Customer Name</th>
									<!-- <th data-field="guarantor_1" data-sortable="true">Gurantor 01</th>
									<th data-field="guarantor_2" data-sortable="true">Gurantor 02</th>-->
									<th data-field="loan_amount" data-sortable="true">Loan Amount</th>
									<th data-field="reason" data-sortable="true">Reason</th> 
									<th data-field="created_date" data-sortable="true">Created Date</th>
									<th data-field="username" data-sortable="true">Created By</th>
								</tr>
							</thead>


						</table>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->


		<!-- table view- for inactive cases -->
		<!-- <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Loan Payemnts (Daily)</div>
					<div class="panel-body">
						<table id="repaymentTable" data-click-to-select="true" data-show-export="true" data-toggle="table" data-url="loanapproval/get" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
							<thead>
								<tr>
									<th data-field="state" data-checkbox="true"></th>
									<th data-field="id" data-sortable="true">Loan ID</th>
									<th data-field="customer_id" data-sortable="true">Customer Name</th> 
								    <th data-field="guarantor_1" data-sortable="true">Gurantor 01</th>
									<th data-field="guarantor_2" data-sortable="true">Gurantor 02</th> -->
									<!-- <th data-field="created_date" data-sortable="true">Created Date</th>
									<th data-field="loan repayment amount" data-sortable="true">Loan Amount</th>
									<th data-field="status" data-sortable="true">Status</th>
								</tr>
							</thead>


						</table>
					</div>
				</div>
			</div>
		</div>

	</div>  -->
	<!--/.main-->




	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>

	<script src="js/custom/loanApproval.js"></script>
	<!-- <script src="js/custom/loan.js"></script> -->

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

		
		//show,hide the repayment table data
		// $(document).ready(function(){
		// 	$("#hide").click(function(){
		// 		$("#repaymentTable").hide();
		// 	});
		// 	$("#show").click(function(){
		// 		$("#repaymentTable").show();
		// 	});
		// });


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