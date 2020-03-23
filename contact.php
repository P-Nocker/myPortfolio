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
		<h1><i class="fas fa-envelope fa-w-10 fa-sm"></i>&nbsp;<?php echo curPageTitle(); ?></h1>
	</header>
        <div class="container">
        <section class="columns">
            <div class="column" id="">
                <h2>Leave a message or question</h2>
                <p>The form can be used to send me a message. <br>I will try to answer as quick as possible, and always within 24 hours!</p>
                <h2>Quote of the day</h2>
                <p><q class="quote">"People often say that motivation doesn't last. Well, neither does bathing -- that's why we recommend it daily." - <q>Zig Ziglar</q></q></p>
            </div>
            <div class="column" id="">
                <div class="container">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="form-group">
                            <label for="firstname">First Name:</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" required="required" placeholder=" First name">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name:</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" required="required" placeholder=" Last name">
                        </div>
                        <div class="form-group">
                            <label for="emailaddress">Your e-mail address:</label>
                            <input type="email" class="form-control" id="emailaddress" name="emailaddress" required="required" placeholder=" E-mailaddress">
                        </div>
                        <div class="form-group">
                            <label for="emailaddress">Subject:</label>
                            <input type="email" class="form-control" id="subject" name="subject" required="required" placeholder=" Subject">
                        </div>
                        <div class="form-group">
                            <label for="emailaddress">Website:</label>
                            <input type="email" class="form-control" id="website" name="website" placeholder=" http://www.yourwebsite.example">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" cols="30" rows="10" class="form-control" required="required" placeholder=" Message or question"></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" name="contactFrom" value="Send message / question" />
                        <button type="reset" class="btn btn-warning">Clear form</button>
                    </form>
                </div>
            </div>
            <?php
            $dir = "images/gallery/";
            $images = [];
            // Open a directory, and read its contents
            if (is_dir($dir))
            {
                if ($dh = opendir($dir))
                {
                    while (($file = readdir($dh)) !== false)
                    {
                        if($file != "." && $file != "..")
                        {
                            $images[] = $file;
                        }
                        //echo "filename:" . $file . "<br>";
                        
                    }
                    closedir($dh);
                }
            }
            shuffle($images);

            //myDump($images,'',0);
/*             $numImages = count($images);
            for($n = 0; $n < $numImages; $n++)
            {
                $x = rand(0, $numImages - 1);
                $image = $images[$n];
                ?>
                <div class="column">
                    <div class="test">
                        <img src="<?php echo $dir . $image; ?>" class="image">
                        <div class="overlay">
                            <a href="gallery.php?projectId=<?php echo $n; ?>" style="width: 100%; height:100%; display:block;">
                            <div class="text"><?php echo $image; ?></div>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            } */
            ?>
            </section>	
        </div>
</div>
<?php
include("inc/footer.php");
?>
</body>
</html>