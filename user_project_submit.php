<!doctype html>
<html lang="en">
<?php
$menu="submit";
if(!isset($_GET["id"])){
    header("refresh:0;url=index.php");
    exit();
}
$id=$_GET["id"];
$json=file_get_contents("app/".$id."_confirm.txt");
$json=json_decode($json,true);
?>
<head>
	<title>Submit Project</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.css">
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
            include "sidebar.php";
        ?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Submit Project</h3>
					<div class="row">
						<div class="col-md-6">
							<!-- INPUTS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Contractor Information</h3>
								</div>
								<div class="panel-body">
									<input type="text" class="form-control" placeholder="Name" id="name" name="name" value="<?php echo $json["name"]; ?>">
									<br>
                                    <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="<?php echo $json["email"]; ?>">
                                    <br>
                                    <input type="tel" class="form-control" placeholder="Phone Number" name="phone" id="phone" value="<?php echo $json["phone"]; ?>">
                                    <br>
                                    <input type="text" class="form-control" placeholder="Company" name="company" id="company" value="<?php echo $json["company"]; ?>">
                                    <br>
								</div>
							</div>
                            <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Basic Project Info</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-6">
                                    <h4>Project Class</h4>
                                    <label class="fancy-radio">
                                        <input name="project_class" value="General Building" type="radio" id="project_class" onchange="project_class_f('General Building')" <?php if($json["project_class"]=="General Building"){echo "checked";} ?>>
                                        <span><i></i>General Building</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input name="project_class" value="Heavy/Civil" type="radio" id="project_class" onchange="project_class_f('Heavy/Civil')" <?php if($json["project_class"]=="Heavy/Civil"){echo "checked";} ?>>
                                        <span><i></i>Heavy/Civil</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input name="project_class" value="Individual Trades" type="radio" id="project_class" onchange="project_class_f('Individual Trades')" <?php if($json["project_class"]=="Individual Trades"){echo "checked";} ?>>
                                        <span><i></i>Individual Trades</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input name="project_class" value="Professional Consul" type="radio" id="project_class" onchange="project_class_f('Professional Consul')" <?php if($json["project_class"]=="Professional Consul"){echo "checked";} ?>>
                                        <span><i></i>Professional Consul</span>
                                    </label>

                                    <h4>Sector</h4>
                                    <label class="fancy-radio">
                                        <input name="sector" value="private" type="radio" checked id="sector" onchange="sector_f('Private')"  <?php if($json["sector"]=="Private"){echo "checked";} ?>>
                                        <span><i></i>Private</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input name="sector" value="public" type="radio" id="sector" onchange="sector_f('Public')" <?php if($json["sector"]=="Public"){echo "checked";} ?>>
                                        <span><i></i>Public</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <h4>Construction Type</h4>
                                    <label class="fancy-radio">
                                        <input name="construction_type" value="Addition" type="radio" checked id="construction_type" onchange="construction_type_f('Addition')" <?php if($json["construction_type"]=="Addition"){echo "checked";} ?>>
                                        <span><i></i>Addition</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input name="construction_type" value="New" type="radio" id="construction_type" onchange="construction_type_f('New')" <?php if($json["construction_type"]=="New"){echo "checked";} ?>>
                                        <span><i></i>New</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input name="construction_type" value="Renovation" type="radio" id="construction_type" onchange="construction_type_f('Renovation')" <?php if($json["construction_type"]=="Renovation"){echo "checked";} ?>>
                                        <span><i></i>Renovation</span>
                                    </label>

                                </div>
                            </div>
                        </div>
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="row" style="margin-top: 5px">
                                                <span><i class="fa fa-upload"></i>
                                                    <?php
                                                    if(file_exists("app/".$id."_zip.txt")){
                                                        echo file_get_contents("app/".$id."_zip.txt");
                                                    }else{
                                                        echo "You haven't upload a zip file yet!";
                                                    }
                                                    ?>
                                                </span>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-primary" onclick="form_submit()">Submit Project</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<!-- END INPUTS -->
						</div>
                        <div class="col-md-6">
                            <!-- INPUTS -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Project Info</h3>
                                </div>
                                <div class="panel-body">
                                    <input type="text" class="form-control" placeholder="Project Name" name="project_name" id="project_name" value="<?php echo $json["project_name"]; ?>">
                                    <br>
                                    <input type="text" class="form-control" placeholder="Job Site" name="job_site" id="job_site" value="<?php echo $json["job_site"]; ?>">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <span>Date Bid Due</span><br>
                                            <input type="text" class="form-control time1" placeholder="Date Bid Due" name="date_bid_due" id="date_bid_due" value="<?php echo $json["date_bid_due"]; ?>">
                                        </div>
                                        <div class="col-md-5">
                                            <span>Project Start</span><br>
                                            <input type="text" class="form-control time2" placeholder="Project Start" name="project_start" id="project_start" value="<?php echo $json["project_start"]; ?>">
                                        </div>
                                    </div>
                                    <br>
                                    <input type="number" class="form-control" placeholder="Budget For Project" name="budget_for_project" id="budget_for_project" value="<?php echo $json["budget_for_project"]; ?>"><br>

                                    <span>Potential Employees And Their Experience (3)</span>
                                    <br>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Expertise</th>
                                            <th>Years Of Experience</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input class="form-control" type="text" id="name_1" name="name_1" value="<?php echo $json["name_1"]; ?>"></td>
                                            <td><input class="form-control" type="text" id="expertise_1" name="expertise_1" value="<?php echo $json["expertise_1"]; ?>"></td>
                                            <td><input class="form-control" type="text" id="yoe_1" name="yoe_1" value="<?php echo $json["yoe_1"]; ?>"></td>
                                        </tr>

                                        <tr>
                                            <td><input class="form-control" type="text" id="name_2" name="name_2" value="<?php echo $json["name_2"]; ?>"></td>
                                            <td><input class="form-control" type="text" id="expertise_2" name="expertise_2" value="<?php echo $json["expertise_2"]; ?>"></td>
                                            <td><input class="form-control" type="text" id="yoe_2" name="yoe_2" value="<?php echo $json["yoe_2"]; ?>"></td>
                                        </tr>

                                        <tr>
                                            <td><input class="form-control" type="text" id="name_3" name="name_3" value="<?php echo $json["name_3"]; ?>"></td>
                                            <td><input class="form-control" type="text" id="expertise_3" name="expertise_3" value="<?php echo $json["expertise_3"]; ?>"></td>
                                            <td><input class="form-control" type="text" id="yoe_3" name="yoe_3" value="<?php echo $json["yoe_3"]; ?>"></td>
                                        </tr>

                                        </tbody>
                                    </table>

                                    <br>
                                    <textarea class="form-control" placeholder="Specific Requests" rows="4" id="specific_requests"><?php echo $json["specific_requests"]; ?></textarea>
                                    <br>

                                </div>
                            </div>
                            <!-- END INPUTS -->
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
	<script src="assets/scripts/klorofil-common.js"></script>
	<script src="assets/scripts/moment.js"></script>
	<script src="assets/scripts/bootstrap-datetimepicker.min.js"></script>
    <script>
        $('.time1').datetimepicker({
            format: 'M/D/yyyy'
        })
        $('.time2').datetimepicker({
            format: 'M/D/yyyy'
        })
        var project_class="<?php echo $json["project_class"]; ?>";
        var sector="<?php echo $json["sector"]; ?>";
        var construction_type="<?php echo $json["construction_type"]; ?>";
        function project_class_f(data) {
            project_class=data;
        }
        function sector_f(data) {
            sector=data;
        }
        function construction_type_f(data) {
            construction_type=data;
        }
        function form_submit() {
            //读取所有信息
            var obj={
                id:"<?php echo $json["id"]; ?>",
                name:$("#name").val(),
                email:$("#email").val(),
                phone:$("#phone").val(),
                company:$("#company").val(),
                project_class:project_class,
                sector:sector,
                construction_type:construction_type,
                project_name:$("#project_name").val(),
                job_site:$("#job_site").val(),
                date_bid_due:$("#date_bid_due").val(),
                 project_start:$("#project_start").val(),
                 budget_for_project:$("#budget_for_project").val(),
                 specific_requests:$("#specific_requests").val(),
                 name_1:$("#name_1").val(),
                 name_2:$("#name_2").val(),
                 name_3:$("#name_3").val(),
                 expertise_1:$("#expertise_1").val(),
                 expertise_2:$("#expertise_2").val(),
                 expertise_3:$("#expertise_3").val(),
                 yoe_1:$("#yoe_1").val(),
                 yoe_2:$("#yoe_2").val(),
                 yoe_3:$("#yoe_3").val()
            };
            json=JSON.stringify(obj);
            $.post("app/project_submit.php",{json:json},function (data,status) {
                window.location.href="index.php?id="+obj.id;
            });
        }
        $(document).ready(function(){
            $("input").attr("disabled","true");
        });
    </script>
</body>

</html>
