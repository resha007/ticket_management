<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Network Operation Unit - MoE</title>

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
<style type="text/css">
        html {
            overflow: hidden;
        }
          
        html,
        body,
        div,
        iframe {
            margin: 0px;
            padding: 0px;
            height: 100%;
            border: none;
        }
          
        iframe {
            display: block;
            width: 100%;
            border: none;
            overflow-y: auto;
            overflow-x: hidden;
        }
    </style>

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
				<a class="navbar-brand" href="#"><span>NOU</span>MOE</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="#" id="logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
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
			<li><a href="<?=base_url()?>/dashboard" target="pageContent"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Dashboard</a></li>
			<li><a href="<?=base_url()?>/ticket" target="pageContent"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Ticket</a></li>
			<li><a href="<?=base_url()?>/user" target="pageContent"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User</a></li>
			
			<hr>
			
			
		</ul>

	</div><!--/.sidebar-->

	<iframe name="pageContent" src="" class="" frameborder="0px"  width="100%" id="iframe1" scrolling="auto"></iframe>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
			
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>

	<script src="js/custom/employee.js"></script>
	<script src="js/custom/home.js"></script>

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
