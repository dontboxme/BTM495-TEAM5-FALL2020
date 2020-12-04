<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="admin.php" class="<?php if($menu=="index"){echo "active";} ?>"><i class="fa fa-credit-card"></i> <span>All Orders</span></a></li>
                <li><a href="admin_project_assess.php<?php if(isset($_GET["id"])){echo "id=".$_GET["id"];} ?>" class="<?php if($menu=="assess"){echo "active";} ?>"><i class="fa fa-credit-card"></i> <span>Assess Project</span></a></li>
                <li><a href="admin_project_submit.php<?php if(isset($_GET["id"])){echo "id=".$_GET["id"];} ?>" class="<?php if($menu=="submit"){echo "active";} ?>"><i class="fa fa-credit-card"></i> <span>Submit Project</span></a></li>
                <li><a href="admin-login.html" class=""><i class="lnr lnr-cog"></i> <span>Logout</span></a></li>
            </ul>
        </nav>
    </div>
</div>
<!-- END LEFT SIDEBAR -->