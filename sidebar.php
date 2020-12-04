<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="index.php" class="<?php if($menu=="index"){echo "active";} ?>"><i class="fa fa-credit-card"></i> <span>My Orders</span></a></li>
                <li><a href="user_project_create.php" class="<?php if($menu=="create"){echo "active";} ?>"><i class="fa fa-credit-card"></i> <span>Create Project</span></a></li>
                <li><a href="user_project_confirm.php<?php if(isset($_GET["id"])){echo "id=".$_GET["id"];} ?>" class="<?php if($menu=="confirm"){echo "active";} ?>"><i class="fa fa-credit-card"></i> <span>Confirm Project</span></a></li>
                <li><a href="user_project_submit.php<?php if(isset($_GET["id"])){echo "id=".$_GET["id"];} ?>" class="<?php if($menu=="submit"){echo "active";} ?>"><i class="fa fa-credit-card"></i> <span>Submit Project</span></a></li>
                <li><a href="user-login.html" class=""><i class="lnr lnr-cog"></i> <span>Logout</span></a></li>
            </ul>
        </nav>
    </div>
</div>
<!-- END LEFT SIDEBAR -->