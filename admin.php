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

// get proeject cayegories and store in $projectCategories
$projectCategories 	= getProjectCategories();
// dump projectCategories
// myDump($projectCategories, "\$projectCategories", 0, __FILE__, __LINE__);

// get projects and store in $projects
$projects           = getProjects();
// dump projects
// myDump($projects, "\$projects", 0, __FILE__, __LINE__);

$projectProperties = getProjectProperties($projectId = false);
// dump projectProperties
// myDump($projectProperties, "\$projectProperties", 0, __FILE__, __LINE__);

// get single project and store in $project/
// function getProject uses functions getProjectImages and getProjectProperties
$singleProject 	    = getProject();
// dump project
// myDump($singleProject, "\$singleProject", 1, __FILE__, __LINE__);

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
		<h1><i class="fa fa-user-secret fa-w-10 fa-sm"></i>&nbsp;<?php echo curPageTitle(); ?></h1>
	</header>
    <div class="container">
    <?php
    // if session admin
    if($_SESSION['admin'] == false)
    {
    ?>
        <section class="columns">
            <div class="column" id="">
                <div class="container">
                    <h4>Add newproject</h4>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <label for="projectCategory">Project Category</label>
                        <select name="projectCategory" id="" class="form-control">
                            <option value="0">Choose project category</option>
                        <?php
                        foreach ($projectCategories as $key => $projectCategory)
                        {
                            # code...
                            ?>
                            <option value="<?php echo $projectCategory['projectCategoryId']; ?>"><?php echo $projectCategory['projectCategoryTitle']; ?></option>
                            <?php
                        }
                        ?>
                        </select>
                        <!-- project properties -->
                        <label for="projectProperties">Project Category</label>
                        <select name="projectCategory" id="" class="form-control">
                            <option value="0">Choose project property</option>
                        <?php
                        foreach ($projectProperties as $key => $projectProperty)
                        {
                            # code...
                            ?>
                            <option value="<?php echo $projectProperty['projectPropertyId']; ?>"><?php echo $projectProperty['projectPropertyTitle']; ?></option>
                            <?php
                        }
                        ?>
                        </select>
                        <label for="projectTitle">Project title</label>
                        <input type="text" class="form-control" name="projectTitle" placeholder="New project title">
                        <textarea name="projectDEscription" id="" cols="30" rows="10" class="form-control" placeholder="Project description"></textarea>
                        <button class="btn btn-primary" name="addProject">Add new project</button>
                    </form>
                </div>
            </div>
            <div class="column" id="">
                    <h4>Education</h4>
            </div>
        </section>
    <?php
    }
    else
    {
    // else, if not logged in as admin
    ?>
        <section class="columns">
            <div class="column">
                <form>
                    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                    <div class="form-group">
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Sign in</button>
                    </div>
                </form>
            </div>
            <div class="column"></div>
            <div class="column"></div>
        </section>
    <?php
    }
    // end if
    ?>
    </div>
</div>
<?php
include("inc/footer.php");
?>
</body>
</html>