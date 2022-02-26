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
	
		
	
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="home"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Line</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Line</h1>
			</div>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Line Details</div>
						<div class="panel-body">
							<div class="col-md-12">
								<form method="post" role="form" id="dataForm">
									<!-- hiddn -->
									<input type="hidden" class="form-control" name="id" id="id">
									<div class="form-group col-md-6">
										<label>Code</label>
										<input class="form-control" name="code" id="code" required>
									</div>
																	
									<div class="form-group col-md-6">
										<label>Name</label>
										<input class="form-control" name="name" id="name" required>
									</div>
									<div class="form-group col-md-4">
										<label>Rider</label>
										<select class="form-control" name="rider" id="rider" required>
											<option value="0" selected disabled>Select a Rider</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label>Optional Rider</label>
										<select class="form-control" name="opt_rider" id="opt_rider">
											<option value="0" selected disabled>Select a Optional Rider</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label>Status</label>
										<select class="form-control" name="status" id="status" required>
											<option value="1">Active</option>
											<option value="2">Inactive</option>
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
					<div class="panel-heading">Current Lines</div>
					<div class="panel-body">
						<table id="dataTable" data-click-to-select="true" data-show-export="true"  data-toggle="table" data-url="line/get"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
								<thead>
								<tr>
									<th data-field="state" data-checkbox="true"></th>
									<th data-field="code"  data-sortable="true">Code</th>
									<th data-field="name" data-sortable="true">Name</th>
									<th data-field="rider"  data-sortable="true">Rider</th>
									<th data-field="opt_rider" data-sortable="true">Optional Rider</th>
									<th data-field="status" data-sortable="true">Status</th>
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

	<script src="js/custom/line.js"></script>

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
