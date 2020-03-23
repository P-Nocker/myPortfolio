<?php
// start application, start or resume session data
session_start();
// include custom functions
require("inc/functions.php");
// connect to database
$connection = dBconnect();
// collection of returnMessages to show when posted a form for example
$returnMessages = array();
// VERY IMPORTANT: HANDLE THE POST REQUEST FIRST
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	require("inc/handlePost.php");
}

//myDump($pagination, "\pagination", 0, __FILE__, __LINE__);

$pageTitle = curPageName();

?>
<!DOCTYPE html>
<html lang="en">
<?php
include("inc/HTMLhead.php");
?>
<body>
<?php
showTopNavigation();
?>
<div class="wrapper">
	<header>
		<h1><i class="fas fa-images fa-w-10 fa-sm"></i>&nbsp;My Portfolio!</h1>
	</header>
    <div class="container">
        <div class="columns">
            <?php
            if(isset($_GET['projectId']))
            {
                showProjectDetail($_GET['projectId']);
            }
            else
            {

                //die("boo");
                showProjectsOverview();
            }
            ?>
            <div class="" style="clear:both;"></div>
        </div>
    </div>
</div>
<?php
include("inc/footer.php");
?>
</body>
</html>