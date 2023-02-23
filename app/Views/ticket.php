<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ticket</title>

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
				<li><a href="home"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Ticket</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ticket</h1>
			</div>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Ticket Details</div>
						<div class="panel-body">
							<div class="col-md-12">
								<form method="post" role="form" id="dataForm">
									<input type="hidden" class="form-control" name="id" id="id">
									<div class="form-group col-md-6">
										<label>Serial No</label>
										<input class="form-control" name="serial_no" id="serial_no" required>
									</div>
									<div class="form-group col-md-6">
										<label>Model</label>
										<select class="form-control search" name="model" id="model" required>
											<option disabled selected>Select a model</option>
											
										</select>
									</div>	
									<div class="form-group col-md-6">
										<label>Branch</label>
										<select class="form-control search" name="branch" id="branch" required>
											<option disabled selected>Select a branch</option>
											
										</select>
									</div>			
									<div class="form-group col-md-6">
										<label>Category</label>
										<select class="form-control search" name="category" id="category" required>
											<option disabled selected>Select a category</option>
											
										</select>
									</div>	
									<div class="form-group col-md-6">
										<label>Date</label>
										<input type="date" class="form-control" name="date_time" id="date_time" required>
									</div>

									<div class="form-group col-md-6">
										<label>Comment</label>
										<input class="form-control" name="comment" id="comment" required>
									</div>
									<div class="form-group col-md-6">
										<label>Officer</label>
										<select class="form-control search" name="assignee" id="assignee" required>
											<option disabled selected>Select a Officer</option>
											
										</select>
									</div>
									<div class="form-group col-md-6">
										<label>Status</label>
										<select class="form-control search" name="status" id="status" required>
											<!-- <option disabled selected>Select a Status</option> -->
											<option value="1">IN</option>
											<option value="2">COMPLETED</option>
											<option value="3">RECOMMENDATION</option>
										</select>
									</div>	

									<div class="form-group col-md-12">
										<button type="button" class="btn btn-primary" id="add"><span class="">Add</button>
										<button type="button" class="btn btn-success" id="update">Update</button>
										<button type="button" class="btn btn-danger" id="delete">Delete</button>
										<button type="reset" class="btn btn-default" id="reset">Reset</button>
									</div>
									
							</div>
							
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->

		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Current Tickets</div>
					<div class="panel-body">
						<table id="dataTable" data-click-to-select="true" data-show-export="true"  data-toggle="table" data-url="ticket/get"  data-show-refresh="true" data-show-toggle="false" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
								<thead>
								<tr>
									<th data-field="state" data-checkbox="true"></th>
									<th data-field="serial_no" data-sortable="true">Serial No</th>
									<th data-field="model"  data-sortable="true">Model</th>
									<th data-field="branch" data-sortable="true">Branch</th>
									<th data-field="category"  data-sortable="true">Category</th>
									<th data-field="date_time" data-sortable="true">Date</th>
									<th data-field="comment"  data-sortable="true">Comment</th>
									<th data-field="status_id" data-sortable="true">Status</th>
								</tr>
								</thead>
								
								
								
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

	<script src="js/custom/ticket.js"></script>
	
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


	<script>
		var $table = $('#dataTable');
		var $remove = $('#remove');
		
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

		function getIdSelections() {
			return $.map($table.bootstrapTable('getSelections'), function (row) {
				return row.id
			})
		}

	</script>	
</body>

</html>
