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
		<h1><i class="fas fa-link fa-w-10 fa-sm"></i>&nbsp;<?php echo curPageTitle(); ?></h1>
	</header>
    <section class="columns">
        <div class="column">
        <ul class="list-group">
            <li class="list-group-item">
                <a href="https://www.linkedin.com/in/peternocker/" target="_blank">
                <i class="fab fa-linkedin fa-w-10 fa-lg"></i>&nbsp;LinkedIn
                <i class="fas fa-external-link-alt fa-w-10 fa-sm" style="float: right;"></i>
                </a>
            </li>
            <li class="list-group-item">
                <a href="https://github.com/P-Nocker?tab=repositories" target="_blank" >
                <i class="fab fa-github fa-w-10 fa-lg"></i>&nbsp;Github
                <i class="fas fa-external-link-alt fa-w-10 fa-sm" style="float: right;"></i>
                </a>
            </li>
            <li class="list-group-item">
                <a href="https://stackoverflow.com/users/13071253/peter-nocker" target="_blank" >
                <i class="fab fa-stack-overflow fa-w-10 fa-lg"></i>&nbsp;StackOverflow
                <i class="fas fa-external-link-alt fa-w-10 fa-sm" style="float: right;"></i>
                </a>
            </li>
            <li class="list-group-item">
                <a href="http://www.instagram.com/" target="_blank">
                <i class="fab fa-instagram fa-w-10 fa-lg"></i>&nbsp;Instagram
                <i class="fas fa-external-link-alt fa-w-10 fa-sm" style="float: right;"></i>
                </a>
            </li>
            <li class="list-group-item">
                <a href="https://nl.pinterest.com/peternocker/" target="_blank">
                <i class="fab fa-pinterest fa-w-10 fa-lg"></i>&nbsp;Pinterest
                <i class="fas fa-external-link-alt fa-w-20 fa-sm" style="float: right;"></i>
                </a>                
            </li>
            <li class="list-group-item">
                <a href="https://open.spotify.com/user/peternocker" target="_blank">
                <i class="fab fa-spotify fa-w-10 fa-lg"></i>&nbsp;Spotify
                <i class="fas fa-external-link-alt fa-w-20 fa-sm" style="float: right;"></i>
                </a>                
            </li>
        </ul>
        </div>
        <div class="column">
        <ul class="list-group">
            <li class="list-group-item">
                <a href="https://www.w3schools.com/" target="_blank">
                W3schools
                <i class="fas fa-external-link-alt fa-w-10 fa-sm" style="float: right;"></i>
                </a>
            </li>
            <li class="list-group-item">
                <a href="https://getbootstrap.com/" target="_blank">
                CSS Bootstrap
                <i class="fas fa-external-link-alt fa-w-10 fa-sm" style="float: right;"></i>
                </a>
            </li>
            <li class="list-group-item">
                <a href="https://css-tricks.com/" target="_blank">
                CSS Tricks
                <i class="fas fa-external-link-alt fa-w-10 fa-sm" style="float: right;"></i>
                </a>
            </li>
            <li class="list-group-item">
                <a href="https://jquery.com/" target="_blank">
                jQuery documentation
                <i class="fas fa-external-link-alt fa-w-10 fa-sm" style="float: right;"></i>
                </a>
            </li>
            <li class="list-group-item">
                <a href="https://www.php.net/" target="_blank">
                PHP documentation
                <i class="fas fa-external-link-alt fa-w-10 fa-sm" style="float: right;"></i>
                </a>
            </li>
            <li class="list-group-item">
                <a href="https://dev.mysql.com/" target="_blank">
                MySQL Developer Zone
                <i class="fas fa-external-link-alt fa-w-10 fa-sm" style="float: right;"></i>
                </a>
            </li>
        </ul>
        </div>
        <div class="column">
        </div>
        <?php
/* 
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
            $numImages = count($images);
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
            }
             */
            ?>
     </section>	
</div>
<?php
include("inc/footer.php");
?>
</body>
</html>