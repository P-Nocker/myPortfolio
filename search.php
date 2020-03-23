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
	//require("inc/handlePost.php");
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
		<h1><i class="fas fa-search fa-w-10 fa-sm"></i>&nbsp;<?php echo curPageTitle(); ?></h1>
	</header>
        <div class="container">
        <section class="columns">
            <div class="column" id="">
                <h2>Leave a message or question</h2>
                <p>The form below can be used to send me a message. <br>I will try to answer as quick as possible, and always within 24 hours!</p>
            </div>
            <div class="column" id="">
                <h2>Leave a message or question</h2>
                <p>The form below can be used to send me a message. <br>I will try to answer as quick as possible, and always within 24 hours!</p>
            </div>
            <div class="column" id="">
                <div class="container">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="search-form">
                        <div class="form-group">
                            <label for="search">Search for:</label>
                        </div>
                        <div class="form-group">
                            <select name="projectCategory" id="" class="form-control">
                                <option value="0">Select a category</option>
                                <option value="1">Webdevelopment</option>
                                <option value="2">Software development</option>
                                <option value="3">Embedded Systems</option>
                                <option value="4">Industrial Automation</option>
                                <option value="5">IT Skills</option>
                                <option value="6">IT Essentials</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="search" id="search" name="search" placeholder="Enter a search phrase" required="required">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="column" id="">
                <h2>Leave a message or question</h2>
                <p>The form below can be used to send me a message. <br>I will try to answer as quick as possible, and always within 24 hours!</p>
            </div>
            <div class="column" id="">
                <h2>Leave a message or question</h2>
                <p>The form below can be used to send me a message. <br>I will try to answer as quick as possible, and always within 24 hours!</p>
            </div>
            <div class="column" id="">
                <h2>Leave a message or question</h2>
                <p>The form below can be used to send me a message. <br>I will try to answer as quick as possible, and always within 24 hours!</p>
            </div>
        </section>	
        </div>
</div>
<?php
include("inc/footer.php");
?>
</body>
</html>