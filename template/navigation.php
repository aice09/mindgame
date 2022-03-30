<nav class="navbar navbar-default navbar-fixed-top"  role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">PDF Viewer</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><?php echo getenv('SYS_NAME') ?></a>
    </div> 
    <!-- /.navbar-header -->
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse" id="vmcs_navigation">
        <ul class="nav navbar-nav navbar-right">  
            
            <?php if (isset($_SESSION['system_logged_in'])==false) { ?>
                <li><a href="login.php">Login</a></li>
            <?php } else { ?>
                <li><a href="index.php?page=play">Play</a></li>
                <li><a href="index.php?page=results">Results</a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="dist/img/fixtures/default_employee_img.jpg" style="width: 30px" class="profile-image img-circle">   <?php echo $_SESSION['system_userlastname'] ?>  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!-- <li><a href="dashboard.php">Dashboard</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="index.php?page=help">Help</a></li>
                        <li><a href="index.php?page=settings">Settings</a></li> -->
                        <li><a href="javascript:void(0);" onclick="logout('1');">Sign Out</a></li>
                    </ul>
                </li>
            <?php } ?>
        </ul>
        <!-- /.navbar-top-links -->
    </div><!-- /.navbar-collapse -->
    
</nav>
<script>
    $('#nav_foldericon').click(function() {
        $(this).find('i').toggleClass('fa-folder fa-folder-open-o')
    });
</script>

