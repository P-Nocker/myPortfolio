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
		<h1><i class="fas fa-address-card fa-w-10 fa-sm"></i>&nbsp;<?php echo curPageTitle(); ?></h1>
	</header>
    <div class="container">
    <section class="columns">
        <div class="column" id="">
            <h4>Personal</h4>
        </div>
        <div class="column" id="">
            <h4>Skills</h4>
        </div>
        <div class="column" id="">
            <h4>Education</h4>
        </div>
        <div class="column" id="">
            <h4>Certificates</h4>
        </div>
        <div class="column" id="">
            <h4>Talents</h4>
        </div>
        <div class="column" id="">
            <h4>Languages i speak</h4>
            <ul class="list-group">
            <li class="list-group-item">
                <i class="fa fa-flag fa-w-10 fa-lg"></i>&nbsp;Dutch, native
            </li>
            <li class="list-group-item">
                <i class="fa fa-flag fa-w-10 fa-lg"></i>&nbsp;English, good
            </li>
            <li class="list-group-item">
                <i class="fa fa-flag fa-w-10 fa-lg"></i>&nbsp;German, good
            </li>
            <li class="list-group-item">
                <i class="fa fa-flag fa-w-10 fa-lg"></i>&nbsp;French, a little
            </li>
        </ul>
        </div>
        <div class="column" id="">
            <h4>What i did for work</h4>
        </div>
        <div class="column" id="">
        </div>
    </section>	
    </div>
</div>
<?php
include("inc/footer.php");
?>
</body>
</html>