<!doctype html>
<html lang="en">
<?php
$menu="submit";
if(!isset($_GET["id"])){
    header("refresh:0;url=index.php");
    exit();
}
$id=$_GET["id"];
$json=file_get_contents("app/".$id."_submit.txt");
$json=json_decode($json,true);
$assess=file_get_contents("app/".$id."_final.txt");
$assess=json_decode($assess,true);
?>
<head>
	<title>Final Submit</title>
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
					<h3 class="page-title">Project Final Submission Report</h3>
					<div class="row">
						<div class="col-md-3">
							<!-- INPUTS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Contractor Information</h3>
								</div>
								<div class="panel-body">
									<input type="text" class="form-control" placeholder="Name" id="name" name="name" value="<?php echo $json["name"]; ?>" disabled>
									<br>
                                    <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="<?php echo $json["email"]; ?>" disabled>
                                    <br>
                                    <input type="tel" class="form-control" placeholder="Phone Number" name="phone" id="phone" value="<?php echo $json["phone"]; ?>" disabled>
                                    <br>
                                    <input type="text" class="form-control" placeholder="Company" name="company" id="company" value="<?php echo $json["company"]; ?>" disabled>
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
                                        <input name="project_class" value="General Building" type="radio" id="project_class" onchange="project_class_f('General Building')" <?php if($json["project_class"]=="General Building"){echo "checked";} ?> disabled>
                                        <span><i></i>General Building</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input name="project_class" value="Heavy/Civil" type="radio" id="project_class" onchange="project_class_f('Heavy/Civil')" <?php if($json["project_class"]=="Heavy/Civil"){echo "checked";} ?> disabled>
                                        <span><i></i>Heavy/Civil</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input name="project_class" value="Individual Trades" type="radio" id="project_class" onchange="project_class_f('Individual Trades')" <?php if($json["project_class"]=="Individual Trades"){echo "checked";} ?> disabled>
                                        <span><i></i>Individual Trades</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input name="project_class" value="Professional Consul" type="radio" id="project_class" onchange="project_class_f('Professional Consul')" <?php if($json["project_class"]=="Professional Consul"){echo "checked";} ?> disabled>
                                        <span><i></i>Professional Consul</span>
                                    </label>

                                    <h4>Sector</h4>
                                    <label class="fancy-radio">
                                        <input name="sector" value="private" type="radio" checked id="sector" onchange="sector_f('Private')"  <?php if($json["sector"]=="Private"){echo "checked";} ?> disabled>
                                        <span><i></i>Private</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input name="sector" value="public" type="radio" id="sector" onchange="sector_f('Public')" <?php if($json["sector"]=="Public"){echo "checked";} ?> disabled>
                                        <span><i></i>Public</span>
                                    </label>
                                    <h4>Document</h4>
                                    <?php
                                    if(file_exists("app/".$id."_zip.txt")){
                                        ?>
                                        <a href="app/<?php echo file_get_contents("app/".$id."_zip.txt"); ?>" target="_blank"><?php echo file_get_contents("app/".$id."_zip.txt"); ?></a>
                                        <?php
                                    }else{
                                        echo "<a>There's no document here!</a>";
                                    }
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <h4>Construction Type</h4>
                                    <label class="fancy-radio">
                                        <input name="construction_type" value="Addition" type="radio" checked id="construction_type" onchange="construction_type_f('Addition')" <?php if($json["construction_type"]=="Addition"){echo "checked";} ?> disabled>
                                        <span><i></i>Addition</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input name="construction_type" value="New" type="radio" id="construction_type" onchange="construction_type_f('New')" <?php if($json["construction_type"]=="New"){echo "checked";} ?> disabled>
                                        <span><i></i>New</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input name="construction_type" value="Renovation" type="radio" id="construction_type" onchange="construction_type_f('Renovation')" <?php if($json["construction_type"]=="Renovation"){echo "checked";} ?> disabled>
                                        <span><i></i>Renovation</span>
                                    </label>

                                </div>
                            </div>
                        </div>
							<!-- END INPUTS -->
						</div>
                        <div class="col-md-3">
                            <!-- INPUTS -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Project Info</h3>
                                </div>
                                <div class="panel-body">
                                    <input type="text" class="form-control" placeholder="Project Name" name="project_name" id="project_name" value="<?php echo $json["project_name"]; ?>" disabled>
                                    <br>
                                    <input type="text" class="form-control" placeholder="Job Site" name="job_site" id="job_site" value="<?php echo $json["job_site"]; ?>" disabled>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <span>Date Bid Due</span><br>
                                            <input type="text" class="form-control time1" placeholder="Date Bid Due" name="date_bid_due" id="date_bid_due" value="<?php echo $json["date_bid_due"]; ?>" disabled>
                                        </div>
                                        <div class="col-md-5">
                                            <span>Project Start</span><br>
                                            <input type="text" class="form-control time2" placeholder="Project Start" name="project_start" id="project_start" value="<?php echo $json["project_start"]; ?>" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <span>Project Budget($)</span><br>
                                    <input type="number" class="form-control" placeholder="Budget For Project" name="budget_for_project" id="budget_for_project" value="<?php echo $json["budget_for_project"]; ?>" disabled><br>

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
                                            <td><input class="form-control" type="text" id="name_1" name="name_1" value="<?php echo $json["name_1"]; ?>" disabled></td>
                                            <td><input class="form-control" type="text" id="expertise_1" name="expertise_1" value="<?php echo $json["expertise_1"]; ?>" disabled></td>
                                            <td><input class="form-control" type="text" id="yoe_1" name="yoe_1" value="<?php echo $json["yoe_1"]; ?>" disabled></td>
                                        </tr>

                                        <tr>
                                            <td><input class="form-control" type="text" id="name_2" name="name_2" value="<?php echo $json["name_2"]; ?>" disabled></td>
                                            <td><input class="form-control" type="text" id="expertise_2" name="expertise_2" value="<?php echo $json["expertise_2"]; ?>" disabled></td>
                                            <td><input class="form-control" type="text" id="yoe_2" name="yoe_2" value="<?php echo $json["yoe_2"]; ?>" disabled></td>
                                        </tr>

                                        <tr>
                                            <td><input class="form-control" type="text" id="name_3" name="name_3" value="<?php echo $json["name_3"]; ?>" disabled></td>
                                            <td><input class="form-control" type="text" id="expertise_3" name="expertise_3" value="<?php echo $json["expertise_3"]; ?>" disabled></td>
                                            <td><input class="form-control" type="text" id="yoe_3" name="yoe_3" value="<?php echo $json["yoe_3"]; ?>" disabled></td>
                                        </tr>

                                        </tbody>
                                    </table>

                                    <br>
                                    <textarea class="form-control" placeholder="Specific Requests" rows="4" id="specific_requests" disabled><?php echo $json["specific_requests"]; ?></textarea>
                                    <br>

                                </div>
                            </div>
                            <!-- END INPUTS -->
                        </div>
                        <div class="col-md-3">
                            <!-- INPUTS -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><b>Project Assessment</b></h3>
                                </div>
                                <div class="panel-body">
                                    <span><b>Necessary Contractor Info</b></span><br>
                                    <div>
                                        <label class="fancy-radio" style="float: left">
                                            <input name="nci" id="nci" type="radio" value="Yes" checked onchange="nci_f('Yes')" <?php if($assess["nci"]=="Yes"){echo "checked";} ?> disabled>
                                            <span><i></i>Yes</span>
                                        </label>
                                        <label class="fancy-radio" style="float: left;padding-left: 10px">
                                            <input name="nci" id="nci" type="radio" value="No" onchange="nci_f('No')" <?php if($assess["nci"]=="No"){echo "checked";} ?> disabled>
                                            <span><i></i>No</span>
                                        </label>
                                        <br>
                                        <hr>
                                    </div>
                                    <span><b>Necessary Basic Project Info</b></span><br>
                                    <div>
                                        <label class="fancy-radio" style="float: left">
                                            <input name="nbpi" id="nbpi" type="radio" value="Yes" checked onchange="nbpi_f('Yes')" <?php if($assess["nbpi"]=="Yes"){echo "checked";} ?> disabled>
                                            <span><i></i>Yes</span>
                                        </label>
                                        <label class="fancy-radio" style="float: left;padding-left: 10px">
                                            <input name="nbpi" id="nbpi" type="radio" value="No" onchange="nbpi_f('No')" <?php if($assess["nbpi"]=="No"){echo "checked";} ?> disabled>
                                            <span><i></i>No</span>
                                        </label>
                                        <br>
                                        <hr>
                                    </div>
                                    <span><b>Necessary Project Info</b></span><br>
                                    <div>
                                        <label class="fancy-radio" style="float: left">
                                            <input name="npi" id="npi" type="radio" value="Yes" checked onchange="npi_f('Yes')" <?php if($assess["npi"]=="Yes"){echo "checked";} ?> disabled>
                                            <span><i></i>Yes</span>
                                        </label>
                                        <label class="fancy-radio" style="float: left;padding-left: 10px">
                                            <input name="npi" id="npi" type="radio" value="No" onchange="npi_f('No')" <?php if($assess["npi"]=="No"){echo "checked";} ?> disabled>
                                            <span><i></i>No</span>
                                        </label>
                                        <br>
                                        <hr>
                                    </div>
                                    <span><b>Necessary Qualified Contractor Info</b></span><br>
                                    <div>
                                        <label class="fancy-radio" style="float: left">
                                            <input name="nqci" id="nqci" type="radio" value="Yes" checked onchange="nqci_f('Yes')" <?php if($assess["nqci"]=="Yes"){echo "checked";} ?> disabled>
                                            <span><i></i>Yes</span>
                                        </label>
                                        <label class="fancy-radio" style="float: left;padding-left: 10px">
                                            <input name="nqci" id="nqci" type="radio" value="No" onchange="nqci_f('No')" <?php if($assess["nqci"]=="No"){echo "checked";} ?> disabled>
                                            <span><i></i>No</span>
                                        </label>
                                        <br>
                                        <hr>
                                    </div>
                                    <span><b>Required Attached Files</b></span><br>
                                    <div>
                                        <label class="fancy-radio" style="float: left">
                                            <input name="raf" id="raf" type="radio" value="Yes" checked onchange="raf_f('Yes')" <?php if($assess["raf"]=="Yes"){echo "checked";} ?> disabled>
                                            <span><i></i>Yes</span>
                                        </label>
                                        <label class="fancy-radio" style="float: left;padding-left: 10px">
                                            <input name="raf" id="raf" type="radio" value="No" onchange="raf_f('No')" <?php if($assess["raf"]=="No"){echo "checked";} ?> disabled>
                                            <span><i></i>No</span>
                                        </label>
                                        <br>
                                        <hr>
                                    </div>
                                    <span><b>General Feedback</b></span><br>
                                    <textarea class="form-control" placeholder="General Feedback" rows="4" id="general_feedback" disabled><?php echo $assess["general_feedback"]; ?></textarea>

                                    <span><b>Project Meets Requirements</b></span><br>
                                    <div>
                                        <label class="fancy-radio" style="float: left">
                                            <input name="pmr" id="pmr" type="radio" value="Yes" checked onchange="pmr_f('Yes')" <?php if($assess["pmr"]=="Yes"){echo "checked";} ?> disabled>
                                            <span><i></i>Yes</span>
                                        </label>
                                        <label class="fancy-radio" style="float: left;padding-left: 10px">
                                            <input name="pmr" id="pmr" type="radio" value="No" onchange="pmr_f('No')" <?php if($assess["pmr"]=="No"){echo "checked";} ?> disabled>
                                            <span><i></i>No</span>
                                        </label>
                                        <br>
                                        <hr>
                                    </div>


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
        var nci="<?php echo $assess["nci"]; ?>";
        var nbpi="<?php echo $assess["nbpi"]; ?>";
        var npi="<?php echo $assess["npi"]; ?>";
        var nqci="<?php echo $assess["nqci"]; ?>";
        var raf="<?php echo $assess["raf"]; ?>";
        var pmr="<?php echo $assess["pmr"]; ?>";
        function nci_f(data) {
            nci=data;
        }
        function nbpi_f(data) {
            nbpi=data;
        }
        function npi_f(data) {
            npi=data;
        }
        function nqci_f(data) {
            nqci=data;
        }
        function raf_f(data) {
            raf=data;
        }
        function pmr_f(data) {
            pmr=data;
        }
        function submit() {
            //读取所有信息
            var obj={
                id:"<?php echo $json["id"]; ?>",
                nci:nci,
                nbpi:nbpi,
                npi:npi,
                nqci:nqci,
                raf:raf,
                pmr:pmr,
                general_feedback:$("#general_feedback").val()

            };
            json=JSON.stringify(obj);
            $.post("app/project_assess.php?type=final",{json:json},function (data,status) {
                window.location.href="admin.php";
            });
        }
        function _return() {
            //读取所有信息
            var obj={
                id:"<?php echo $json["id"]; ?>",
                nci:nci,
                nbpi:nbpi,
                npi:npi,
                nqci:nqci,
                raf:raf,
                pmr:pmr,
                general_feedback:$("#general_feedback").val()

            };
            json=JSON.stringify(obj);
            $.post("app/project_assess.php?type=return",{json:json},function (data,status) {
                window.location.href="admin.php";
            });
        }
    </script>
</body>

</html>
