<?php
// start application, start or resume session data
session_start();
// include custom functions
require("inc/functions.php");

// connect to database
$connection     = dBconnect();

// collection of returnMessages to show when posted a form for example
$returnMessages = array();

// VERY IMPORTANT: HANDLE THE POST REQUEST FIRST
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    // if server request equals POST, include handkePost.php
	require("inc/handlePost.php");
}

// get proeject cayegories and store in $projectCategories
$projectCategories 	= getProjectCategories();
// dump projectCategories
// myDump($projectCategories, "\$projectCategories", 0, __FILE__, __LINE__);

// get projects and store in $projects
$projects           = getProjects();
// dump projects
// myDump($projects, "\$projects", 0, __FILE__, __LINE__);

// get single project and store in $project/
// function getProject uses function getProjectImages and getProjectProperties
$singleProject 	    = getProject();
// dump project
// myDump($singleProject, "\$singleProject", 1, __FILE__, __LINE__);

// current page name to show in browser tab
$pageTitle          = curPageName();

?>
<!DOCTYPE html>
<html lang="en">
<?php
include("inc/HTMLhead.php");
?>
<body>
<?php
// show 
showTopNavigation();

$headerImages = headerImages();
$numIMages = count($headerImages);

// myDump($headerImages, "\$headerImages",0,__FILE__,__LINE__);

?>
<div class="wrapper">
	<header>
    <h1><i class="fas fa-home fa-w-10 fa-sm"></i>&nbsp;My Portfolio</h1>
	</header>
    <section class="">
        <div id="demo" class="carousel slide" data-ride="carousel" style="width:70%; margin:auto;">
            <!-- Indicators -->
            <ul class="carousel-indicators">
                <?php
                for($n = 0; $n < $numIMages; $n++)
                {
                    if($n == 0)
                    {
                        $c = "active";
                    }
                    else
                    {
                        $c = "";
                    }
                    ?><li data-target="#demo" data-slide-to="<?php echo $n; ?>" class="<?php echo $c; ?>"></li><?php
                }
                ?>
            </ul>
            <!-- The slideshow -->
            <div class="carousel-inner">
                <?php
                for($n = 0; $n < $numIMages; $n++)
                {
                    if($n == 0)
                    {
                        $c = " active";
                    }
                    else
                    {
                        $c = "";
                    }
                    ?>
                <div class="carousel-item<?php echo $c; ?>">
                    <a href="gallery.php?projectId=<?php echo $headerImages[$n]['projectId']; ?>">
                    <img src="images/projects/<?php echo $headerImages[$n]['projectImagePath']; ?>" alt="">
                    </a>
                </div>
                    <?php
                }
                ?>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </section>
    <section class="columns">
        <div class="column" id="">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu blandit massa. Morbi ultrices magna id nibh scelerisque posuere.
            Sed vel tellus sit amet risus tincidunt posuere at sed nulla.
            Etiam fermentum tellus et quam vestibulum, at ullamcorper metus porta. Cras sed ornare augue. Vivamus semper nulla ac vulputate aliquet. Integer in risus vitae ex facilisis viverra. Fusce gravida est vel euismod hendrerit. Integer tempor, ex ut porttitor sodales, felis libero cursus justo, in pharetra tortor ligula nec turpis. Cras nec sapien volutpat, hendrerit libero ac, consectetur odio. In consectetur metus mauris, eu ornare sapien tristique ac. Nullam ultricies nisl diam, in laoreet massa dictum sed. Integer non velit nec massa rutrum scelerisque pellentesque vel nunc.
        </div>
        <div class="column">
            Phasellus mollis nisi a hendrerit semper.
            Nulla ac diam at quam dignissim placerat. Morbi erat nisl, euismod sed hendrerit ut, varius vel leo.
            Donec sollicitudin elit sed ipsum pellentesque, nec ornare nunc tempor. Quisque arcu sem, consequat et tellus non, mollis elementum leo.
            Proin sit amet odio eu dui tincidunt rutrum in ac massa. 
            Etiam iaculis consectetur cursus. Proin id mi ac arcu porta ultricies.
        </div>
        <div class="column" id="">
            Etiam libero orci, maximus id felis ac, feugiat consectetur purus.
            Vestibulum in iaculis quam. Nulla in urna urna. Duis pulvinar ut enim a venenatis. Morbi nisi ante, pellentesque euismod leo et, tincidunt imperdiet turpis. Ut accumsan feugiat eros, eu vulputate nunc gravida vitae. Duis quis mattis metus. Suspendisse convallis urna sit amet consectetur ultricies. In vel cursus orci, a iaculis leo. Integer nec magna commodo, dignissim neque a, tincidunt neque. Sed vehicula quis diam at rutrum. Phasellus at dolor libero. Duis ultricies mollis interdum. Donec condimentum laoreet mi quis dignissim.
            Cras et tincidunt elit. Fusce a urna et ante pulvinar suscipit nec sed ante. Quisque molestie neque et aliquam consectetur. Donec porttitor eros a tortor elementum gravida. Cras suscipit vestibulum velit. Aliquam a faucibus lorem, ut finibus lectus. Ut elementum sem massa, id ultrices ipsum molestie sit amet. Pellentesque et nulla a massa viverra mollis ac id libero. Maecenas dapibus diam et sapien efficitur fermentum nec id augue.
            Vestibulum luctus tortor ac posuere porttitor. Nulla lacus dui, auctor ut facilisis ut, porttitor et nisl. Curabitur gravida odio ut diam posuere, vitae tincidunt felis molestie. Phasellus ante felis, lacinia ut risus ut, ultricies condimentum arcu. Phasellus ut libero lorem. In porttitor dignissim cursus. Integer vulputate mauris dignissim convallis pretium. Nullam sit amet accumsan diam. Suspendisse lectus neque, viverra ac lobortis vel, ornare sed tortor. Morbi egestas mattis diam, eget dapibus justo eleifend et. Pellentesque lorem justo, molestie fermentum ante sed, pulvinar pharetra enim. Nunc non lacinia purus, eget aliquet turpis.
            Maecenas id venenatis augue, non sollicitudin sem.
    </div>
    </section>
    <section class="">
    </section>
    <section class="columns">
    <?php
        $dir = "images/gallery/";
        $images = [];
        // open a directory, and read its contents
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
                }
                closedir($dh);
            }
        }
        // shuffle, randomize $images
        shuffle($images);
        // count $images
        $numImages = count($images);
        // loop and print each image
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
        ?>
    </section>
</div>
<?php
include("inc/footer.php");
?>
</script>
</body>
</html>