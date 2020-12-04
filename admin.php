<!doctype html>
<html lang="en">
<?php $menu="index";
$handler = opendir("app/");
while (($filename = readdir($handler)) !== false)
{
    // 务必使用!==，防止目录下出现类似文件名“0”等情况
    if ($filename !== "." && $filename !== "..")
    {
            $files[] = $filename ;
   }
}
closedir($handler);

?>
<head>
	<title>All Orders</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
        <?php
        include "navbar.php";
        include "admin_sidebar.php";
        ?>

		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<!-- RECENT PURCHASES -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">All Submitted Orders</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Project No.</th>
												<th>Project</th>
												<th>Budget</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
                                        <?php
                                        foreach ($files as $value) {
                                            if(strlen($value)==17){
                                                $id=str_replace(".txt","",$value);
                                                $status="Confirming";
                                                $tag="confirm";
                                                //检查是否存在文件
                                                if(file_exists ("app/".$id."_submit.txt")){
                                                    $status="Submitted";
                                                    $tag="access";
                                                }
                                                if($status=="Submitted"){
                                                    if(file_exists ("app/".$id."_submit.txt")){
                                                        $status="Assessing";
                                                        $tag="assess";
                                                    }
                                                    if(file_exists ("app/".$id."_return.txt")){
                                                        $status="Returned";
                                                        $tag="detail";
                                                    }
                                                    if(file_exists ("app/".$id."_assess.txt")){
                                                        $status="Final Submitting";
                                                        $tag="submit";
                                                    }
                                                    if(file_exists ("app/".$id."_final.txt")){
                                                        $status="Final Submitted";
                                                        $tag="detail";
                                                    }
                                                    $f=file_get_contents("app/".$id."_submit.txt");
                                                    $f=json_decode($f,true);
                                        ?>
											<tr>
												<td><a href="admin_project_<?php echo $tag; ?>.php?id=<?php echo $id; ?>"><?php echo $id; ?></a></td>
												<td><?php echo $f["project_name"]; ?></td>
												<td><?php echo $f["budget_for_project"]; ?></td>
												<td><span class="label label-<?php switch ($status){
                                                        case "Assessing":
                                                            echo "warning";
                                                            break;
                                                        case "Final Submitting":
                                                            echo "info";
                                                            break;
                                                        case "Final Submitted":
                                                            echo "success";
                                                            break;
                                                        case "Returned":
                                                            echo "danger";
                                                            break;
                                                    } ?>"><?php echo $status; ?></span></td>
											</tr>
                                        <?php } }} ?>
										</tbody>
									</table>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 24 hours</span></div>

									</div>
								</div>
							</div>
							<!-- END RECENT PURCHASES -->
						</div>
					</div>

				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
                <p class="copyright">Copyright &copy; 2020.UN PROJECT, SASESTIME All rights reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script>
	$(function() {
		var data, options;

		// headline charts
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[23, 29, 24, 40, 25, 24, 35],
				[14, 25, 18, 34, 29, 38, 44],
			]
		};

		options = {
			height: 300,
			showArea: true,
			showLine: false,
			showPoint: false,
			fullWidth: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,
		};

		new Chartist.Line('#headline-chart', data, options);


		// visits trend charts
		data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			series: [{
				name: 'series-real',
				data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
			}, {
				name: 'series-projection',
				data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
			}]
		};

		options = {
			fullWidth: true,
			lineSmooth: false,
			height: "270px",
			low: 0,
			high: 'auto',
			series: {
				'series-projection': {
					showArea: true,
					showPoint: false,
					showLine: false
				},
			},
			axisX: {
				showGrid: false,

			},
			axisY: {
				showGrid: false,
				onlyInteger: true,
				offset: 0,
			},
			chartPadding: {
				left: 20,
				right: 20
			}
		};

		new Chartist.Line('#visits-trends-chart', data, options);


		// visits chart
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[6384, 6342, 5437, 2764, 3958, 5068, 7654]
			]
		};

		options = {
			height: 300,
			axisX: {
				showGrid: false
			},
		};

		new Chartist.Bar('#visits-chart', data, options);


		// real-time pie chart
		var sysLoad = $('#system-load').easyPieChart({
			size: 130,
			barColor: function(percent) {
				return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
			},
			trackColor: 'rgba(245, 245, 245, 0.8)',
			scaleColor: false,
			lineWidth: 5,
			lineCap: "square",
			animate: 800
		});

		var updateInterval = 3000; // in milliseconds

		setInterval(function() {
			var randomVal;
			randomVal = getRandomInt(0, 100);

			sysLoad.data('easyPieChart').update(randomVal);
			sysLoad.find('.percent').text(randomVal);
		}, updateInterval);

		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

	});
	</script>
</body>

</html>
