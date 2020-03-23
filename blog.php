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
		<h1><i class="fab fa-twitter fa-w-10 fa-sm"></i>&nbsp;<?php echo curPageTitle(); ?></h1>
	</header>
    <section class="columns">
        <div class="column" id="">
        </div>
        <div class="column">
        </div>
        <div class="column" id="">
        </div>
    </section>	
</div>
<?php
include("inc/footer.php");
?>
</body>
</html>