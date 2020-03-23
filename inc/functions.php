<?php
// function to connect to database server
// returns mysqli database connection
function dBconnect()
{
	if($_SERVER['SERVER_NAME'] == "www.nekweb.nl")
	{
		$host		= "localhost";
		$user		= "p14900_nope";
		$pass		= "nopeT3r44";
		$database	= "p14900_myportfolio";
	}
	elseif($_SERVER['SERVER_NAME'] == "localhost")
	{
		$host		= "localhost";
		$user		= "root";
		$pass		= "";
		$database	= "my_portfolio";
	}

	$connection = mysqli_connect($host, $user, $pass, $database) or die(mysqli_error($connection));
	
	return $connection;
}

function myDump($varToDump, $varName = "", $exit = false, $fileName = "", $lineNumber = "")
{
    echo "\n<style>\n";
    echo "\t.myDump\n";
    echo "\t{\n";
    echo "\t\tdisplay: block;\n";
    echo "\t\twidth: 90%;\n";
    echo "\t\tmargin: 10px auto 10px;\n";
    echo "\t\tpadding: 5px;\n";
    echo "\t\tborder: 1px solid  rgba(255,0,0,1);\n";
    echo "\t\tbackground-color: rgba(241,241,241,1);\n";
    echo "\t\tcolor: #000;\n";
    echo "\t\tline-height: 1 !important;\n";
    echo "\t\tposition: relative;\n";
    echo "\t\ttop: 10px;\n";
    echo "\t\tz-index: 1000 !important;\n";
    echo "\t\toverflow: visible;\n";
    echo "\t}\n";
    echo "\t.myDump h5\n";
    echo "\t{\n";
    echo "\twidth: 100%;\n";
    echo "\t\theight: 42px;\n";
    echo "\t\tmargin: 0px;\n";
    echo "\t\tfont-size: 1.2em;\n";
    echo "\t\tfont-family: tahoma;\n";
    echo "\t\tcolor: rgba(255,0,0,1);\n";
    echo "\t\ttext-align: center;\n";
    echo "\t}\n";
    echo "\t.closeMyDump\n";
    echo "\t{\n";
    echo "\t\tdisplay: block;\n";
    echo "\t\twidth: 40px;\n";
    echo "\t\theight: 36px;\n";
    echo "\t\tfloat: right;\n";
    echo "\t\tborder: 1px solid rgba(255,0,0,1);\n";
    echo "\t\tpadding-top: 10px;\n";
    echo "\t\tmargin: 0px;\n";
    echo "\t\tbackground-color: rgba(255,255,255,1);\n";
    echo "\t\ttext-align: center;\n";
    echo "\t\tcolor: rgba(255,0,0,1);\n";
    echo "\t\tfont-size: 1.2em;\n";
    echo "\t\tfont-family: tahoma;\n";
    echo "\t}\n";
    echo "\t.closeMyDump:hover\n";
    echo "\t{\n";
    echo "\t\tbackground-color: rgba(255,0,0,1);\n";
    echo "\t\tborder: 1px solid rgba(255,0,0,1);\n";
    echo "\t\tcolor: rgba(255,255,255,1);\n";
    echo "\t\tcursor: pointer;\n";
    echo "\t}\n";
    echo "\t.myDump h6\n";
    echo "\t{\n";
    echo "\t\tmargin: 0px;\n";
    echo "\t\ttext-align: center;\n";
    echo "\t\tfont-size: 1.1em;\n";
    echo "\t}\n";
    echo "</style>\n";
    echo "<script>\n";
    ?>
    $(".closeMyDump").click(function(e)
    {
        e.preventDefault();

        var myDump = $(this).parent().parent();

        myDump.hide(1000);
    });
    <?php
    echo "</script>\n";

    echo "<pre class=\"myDump\">\n";
    echo "<h5>My Dump<span id=\"closeMyDump\" class=\"closeMyDump\" title=\"Close MyDump\">x</span></h5>\n";
    if($fileName)
    {
        echo "<h6>File : " . $fileName . "</h6>\n";
    }
    if($lineNumber)
    {
        echo "<h6>Line : " . $lineNumber . "</h6>\n";
    }
    if($varName)
    {
        echo "<h6>Variable : " . $varName . "</h6>\n";
    }
    var_dump($varToDump);

    if($exit != false)
    {
        die("end myDump()\n</pre>\n");
    }
    echo "</pre>\n";
}

function headerImages()
{
	// connect to database
	$con = dBconnect();

	$getProjectImagesSQL = "
	SELECT `projects`.`projectId`, `projectimages`.`projectImagePath` FROM `projects` JOIN `projectsprojectimages` ON `projects`.`projectId` = `projectsprojectimages`.`projectId` JOIN `projectimages` ON `projectsprojectimages`.`projectImageId` = `projectimages`.`projectImageId` ORDER BY `projects`.`projectId` ASC
	";
	
	// perform $query on $con and store resource
	$resource = mysqli_query($con, $getProjectImagesSQL) or die(mysqli_error($con) . "<br /><hr />" . $getProjectImagesSQL);

	// array headerImages
	$headerImages 	= [];

	while($row = mysqli_fetch_assoc($resource))
	{
		// add new items to $teams
		$headerImages[] = $row;
	}

	// shuffle
	shuffle($headerImages);
	// retun
	return $headerImages;
}

// function to fetch categories from dB
function getProjectCategories()
{
	// connect to database
	$con = dBconnect();

	$getProjectCategoriesSQL = "
	SELECT 
	`projectcategories`.`projectCategoryId`,
	`projectcategories`.`projectCategoryImage` as `categoryImg`,
	`projectcategories`.`projectCategoryTitle`,
	COUNT(DISTINCT `projects`.`projectId`) as `numProject`,
	ROUND(AVG((`projectreviews`.`projectReviewRating`) / 2),3) as `categoryAverage`,
	COUNT(`projectreviews`.`projectReviewRating`) as `categoryVotes`,
	SUM(`projectreviews`.`projectReviewRating`) as `categoryTotal`
	FROM 
	`projectcategories`
	LEFT JOIN
	`projects`
	ON
	`projectcategories`.`projectCategoryId` = `projects`.`projectCategoryId`
	LEFT JOIN
	`projectreviews`
	ON
	`projects`.`projectId` = `projectreviews`.`projectId`
	GROUP BY `categoryImg`, `projectCategoryTitle`
	ORDER BY 
    `categoryAverage` DESC,
	`projectcategories`.`projectCategoryTitle` ASC
	";
	
	// perform $query on $con and store resource
	$resource = mysqli_query($con, $getProjectCategoriesSQL) or die(mysqli_error($con) . "<br /><hr />" . $getProjectCategoriesSQL);

	// empty array $teams to store info from dB
	$projectCategories = array();

	while($row = mysqli_fetch_assoc($resource))
	{
		// add new items to $teams
		$projectCategories[] = $row;
	}
	return $projectCategories;
}

// function to fetch multiple projects from dB
function getProjects($projectCategoryId = false)
{
	// connect to database
	$connection = dBconnect();
	
	// if there's a projectId in the URL
	if(isset($_GET['projectCategoryId']) && $_GET['projectCategoryId'] != "")
	{
		$projectCategoryId = $_GET['projectCategoryId'];
	}

	// define empty array
	$projects = array();

	// heroes sq
	$selectProjectsSQL = "
	SELECT
	`projectcategories`.`projectCategoryId`,
	`projectcategories`.`projectCategoryTitle`,
	SUBSTRING(`projectcategories`.`projectCategoryDescription`, 0, 25) as `projectCategoryDescription`,
	`projectcategories`.`projectCategoryImage`,
	`projects`.`projectId`,
	`projects`.`projectTitle`,
	SUBSTRING(`projects`.`projectDescription`, 1, 25) as `projectDescription`,
	(AVG(`projectreviews`.`projectReviewRating`) / 2) as `projectRating`,
	COUNT(`projectreviews`.`projectReviewRating`) as `projectRatingNum`
	FROM
	`projects`
	LEFT JOIN
	`projectreviews`
	ON
	`projects`.`projectId` = `projectreviews`.`projectId`
	INNER JOIN
	`projectcategories`
	ON
	`projects`.`projectCategoryId` = `projectcategories`. `projectCategoryId`
	WHERE
	1
	";
	if($projectCategoryId)
	{
		$selectProjectsSQL .= "
		AND
		`projectcategories`.`projectCategoryId` = " . $projectCategoryId . "		
		";
	}
	
	$selectProjectsSQL .= "
	GROUP BY
	`projects`.`projectId`
	";

	$selectProjectsSQL .= "
	ORDER BY `projectId` ASC, `projectRating` DESC, `projectRatingNum` DESC
	";
		
	//
	$result = mysqli_query($connection, $selectProjectsSQL) or die("on line " . __LINE__ . "<br />\$selectHeroesSQL<br />" . mysqli_error($connection) . "<br />" . $selectProjectsSQL);
	$projects = array();
	while($row = mysqli_fetch_assoc($result))
	{
		$projects[$row['projectId']] = $row;
		$projects[$row['projectId']]['projectImages'] 		= getProjectImages($row['projectId']);
		$projects[$row['projectId']]['projectProperties'] 	= getProjectProperties($row['projectId']);
	}
	return $projects;
}

// function to fetch one single project
function getProject($projectCategoryId = false, $projectId = false)
{
	// connect to database
	$connection = dBconnect();

	// if there's a projectId in the URL
	if(isset($_GET['projectId']) && $_GET['projectId'] != "")
	{
		$projectId = $_GET['projectId'];
	}
	$selectProjectSQL = "
	SELECT
	`projectcategories`.`projectCategoryId`,
	`projectcategories`.`projectCategoryTitle`,
	`projectcategories`.`projectCategoryDescription`,
	`projectcategories`.`projectCategoryImage`,
	`projects`.`projectId`,
	`projects`.`projectTitle`,
	`projects`.`projectDescription`,
	(AVG(`projectreviews`.`projectReviewRating`) / 2) as `projectRating`,
	COUNT(`projectreviews`.`projectReviewRating`) as `projectRatingNum`
	FROM
	`projects`
	LEFT JOIN
	`projectreviews`
	ON
	`projects`.`projectId` = `projectreviews`.`projectId`
	INNER JOIN
	`projectcategories`
	ON
	`projects`.`projectCategoryId` = `projectcategories`. `projectCategoryId`
	WHERE
	1
	";
	if($projectId)
	{
		$selectProjectSQL .= "
		AND
		`projects`.`projectId` = " . $projectId . "		
		";
	}
	else
	{
	}
	
	$selectProjectSQL .= "
	GROUP BY
	`projects`.`projectId`
	";

	//myDump($selectProjectSQL, "\$selectProjectSQL", 0, __FILE__, __LINE__);
	// run query and store in $resource
	$resource = mysqli_query($connection, $selectProjectSQL) or die(mysqli_error($connection) . "<br />" . $selectProjectSQL);
	// empty array $hero to store info
	$project = array();
	// loop through resource
	$project = mysqli_fetch_assoc($resource);

	// get the the project properties
	$project['projectProperties'] = getProjectProperties($project['projectId']);
	
	// get the the project images
	$project['projectImages'] = getProjectImages($project['projectId']);

	// return project
	return $project;
}

function getProjectProperties($projectId = false)
{
	$pId = $projectId;
	// connect to database
	$connection = dBconnect();

	// get the the heroes properties
	$selectProjectPropertiesSQL = "
	SELECT `projectPropertyTitle`
	FROM `projectproperties`
	JOIN `projectsprojectproperties`
	ON `projectproperties`.`projectPropertyId` = `projectsprojectproperties`.`projectPropertyId`
	JOIN `projects`
	ON `projectsprojectproperties`.`projectId` = `projects`.`projectId`";
	if($pId)
	{
		$selectProjectPropertiesSQL .= "	
		WHERE `projects`.`projectId` = " . $pId;
	}

	$selectProjectPropertiesSQL .= "	
	ORDER BY `projects`.`projectId`";

	//myDump($selectProjectPropertiesSQL);

	$result = mysqli_query($connection, $selectProjectPropertiesSQL) or die("\$selectProjectPropertiesSQL<br />" . mysqli_error($connection) . "<br />" . $selectProjectPropertiesSQL);
	// empty array $hero to store info
	$projectProperties = array();
	// loop through resource
	while($row = mysqli_fetch_assoc($result))
	{
		$projectProperties[] = $row;
	}
	return $projectProperties;
}

function getProjectReviews($projectId)
{
	// connect to database
	$connection = dBconnect();

	$pId = $projectId;
	//die($projectId);

	// get the the heroes properties
	//$selectProjectReviewsSQL = "SELECT * FROM `projectreviews` JOIN `users` ON `projectreviews`.`userId` = `users`.`userId` WHERE `projectId` = " . $projectId;

	$selectProjectReviewsSQL = "
	SELECT
	*
	FROM
	`projectreviews`
	WHERE
	`projectId` = $pId
	";

	myDump($selectProjectReviewsSQL, "\$selectProjectReviewsSQL", 0, __FILE__, __LINE__);

	$result = mysqli_query($connection, $selectProjectReviewsSQL) or die(mysqli_error($connection));
	
	// empty array $hero to store info
	$projectReviews = array();
	// loop through resource
	while($row = mysqli_fetch_assoc($result))
	{
		$projectReviews[] = $row;
	}

	//myDump($projectReviews, "\$projectReviews", 1, __FILE__, __LINE__);
	return $projectReviews;
}

function getProjectImages($projectId = false)
{

	$pId = $projectId;
	//myDump($projectId, "\$projectId", 1, __FILE__, __LINE__);

	// connect to database
	$connection = dBconnect();

	// get the the heroes properties
	$selectProjectImagesSQL = "
	SELECT `projectImagePath` FROM `projectimages` JOIN `projectsprojectimages` ON `projectimages`.`projectImageId` = `projectsprojectimages`.`projectImageId` JOIN `projects` ON `projectsprojectimages`.`projectId` = `projects`.`projectId`";
	
	if($pId != false)
	{
		$selectProjectImagesSQL .= " WHERE `projects`.`projectId` = " . $pId;
	}

	

	//myDump($selectProjectImagesSQL, "\$selectProjectImagesSQL", 1, __FILE__, __LINE__);

	$result = mysqli_query($connection, $selectProjectImagesSQL) or die("\$selectProjectImagesSQL<br />" . mysqli_error($connection) . "<br />" . $selectProjectImagesSQL);
	// empty array $hero to store info
	$projectImages = array();
	// loop through resource
	while($row = mysqli_fetch_assoc($result))
	{
		$projectImages[] = $row;
	}

	//myDump($projectImages, "\$projectImages", 1, __FILE__, __LINE__);
	// return @array $projectImages
	return $projectImages;
}

function showProjectsOverview($projectCategoryId = false)
{
	// get teams for left column and store in $teams
	$projectCategories 	= getProjectCategories();
	// dump projectCategories
	//myDump($projectCategories, "\$projectCategories", 0, __FILE__, __LINE__);

	// get heroes for center column and store in $heroes
	$projects = getProjects();
	// dump projects
	//myDump($projects, "\$projects", 0, __FILE__, __LINE__);

	$dir = "images/projects/";
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
			}
			closedir($dh);
		}
	}	
	shuffle($projects);

	//myDump($projects, "\$projects", 1, __FILE__, __LINE__);

	foreach ($projects as $key => $project) 
	{

		//myDump($project);
		$n = count($project['projectImages']);
		if($n == 0 || !in_array($project['projectImages'][0]["projectImagePath"],$images))
		{
			$dir = "images/design/";
			$projectImage = "noimage.jpg";
			//$projectImage = "fiets";
		}
		else
		{
			$dir = "images/projects/";
			$projectImage = $project['projectImages'][0]["projectImagePath"];
		}
		?>
		<div class="column">
			<div class="test">
				<img src="<?php echo $dir . $projectImage; ?>" class="image">
				<div class="overlay">
					<a href="gallery.php?projectId=<?php echo $project['projectId']; ?>" style="width: 100%; height:100%; display:block;">
					<div class="text">
						<?php echo $project['projectCategoryTitle']; ?><br />
						<?php echo $project['projectTitle']; ?><br />
					</div>
					</a>
				</div>
			</div>
			<div class="projectProperties">
				<?php
				if(count($project['projectProperties']) > 0)
				{
					echo "<ul class=\"list-group\" style=\"margin-top: 2px;\">";
					foreach($project['projectProperties'] as $projectProperty)
					{
						?>
						<li class="list-group-item"><?php echo $projectProperty['projectPropertyTitle']; ?></li>
						<?php
					}
					echo "</ul>";
				}
				?>
			</div>
		</div>
		<?php
	}
}

function showProjectDetail($projectId = false)
{
	// get teams for left column and store in $teams
	$projectCategories 	= getProjectCategories();
	// dump projectCategories
	//myDump($projectCategories, "\$projectCategories", 0, __FILE__, __LINE__);

	//$pagination = pagination();

	// get heroes for center column and store in $heroes
	$project = getProject($projectId);
	//myDump($project, "\$project", 0, __FILE__, __LINE__);
	//myDump($projects, "\$projects", 0, __FILE__, __LINE__);

	$dir = "images/projects/";
	
	?>
        <div class="column" id="">
            <h4>Project Description</h4>
			<?php
			echo $project['projectDescription'];
			?>
        </div>
        <div class="column" id="">
            <h4>Project Properties</h4>
			<div class="projectProperties">
				<?php
				if(count($project['projectProperties']) > 0)
				{
					echo "<ul class=\"list-group\" style=\"margin-top: 2px;\">";
					foreach($project['projectProperties'] as $projectProperty)
					{
						?>
						<li class="list-group-item"><?php echo $projectProperty['projectPropertyTitle']; ?></li>
						<?php
					}
					echo "</ul>";
				}
				?>
			</div>
        </div>
        <div class="column" id="">
            <h4><?php echo $project['projectTitle']; ?></h4>
			<img src="<?php echo $dir . $project['projectImages'][0]["projectImagePath"]; ?>" style="width: 100%;" alt="">	
        </div>
        <div class="column" id="">
            <h4>Other image</h4>
        </div>
        <div class="column" id="">
            <h4>Other image</h4>
        </div>
        <div class="column" id="">
			<h4>Other image</h4>
        </div>
        <div class="column" id="">
			<h4>Navigate</h4>
			<?php
			pagination();
			?>
        </div>
	<?php
}

function showTopNavigation ()
{
	$menuItems = array
	(
		"index.php" => array
		(
			"menuName"	=> "<i class=\"fas fa-home fa-w-10 fa-sm\"></i>&nbsp;Home", 
			"menuTitle"	=> "Go to home page",
		),
		"blog.php" => array
		(
			"menuName"	=> "<i class=\"fab fa-twitter fa-w-10 fa-sm\"></i>&nbsp;Blog",
			"menuTitle"	=> "Go to my blog",
		),
		"gallery.php" => array
		(
			"menuName"	=> "<i class=\"fas fa-images fa-w-10 fa-sm\"></i>&nbsp;Gallery",
			"menuTitle"	=> "Go to my gallery",
		),
		"links.php" => array
		(
			"menuName"	=> "<i class=\"fas fa-link fa-w-10 fa-sm\"></i>&nbsp;Links",
			"menuTitle"	=> "Go to my favorite links",
		),
		"contact.php" => array
		(
			"menuName"	=> "<i class=\"fas fa-envelope fa-w-10 fa-sm\"></i>&nbsp;Contact",
			"menuTitle"	=> "Contact Me!",
		),
		"about.php" => array
		(
			"menuName"	=> "<i class=\"fas fa-address-card fa-w-10 fa-sm\"></i>&nbsp;&nbsp;About",
			"menuTitle"	=> "Info about Me!",
		),
		"search.php" => array
		(
			"menuName"	=> "<i class=\"fa fa-search fa-w-10 fa-sm\"></i>&nbsp;&nbsp;Search",
			"menuTitle"	=> "Search my site",
		),
		"admin.php" => array
		(
			"menuName"	=> "<i class=\"fa fa-user-secret fa-w-10 fa-sm\"></i>&nbsp;&nbsp;Admin",
			"menuTitle"	=> "edit your site",
		),
	);
	?>
	<div class="topnav" id="myTopnav" style="font-size: 0.4rem;">
	<?php
	foreach($menuItems as $key => $value)
	{
		if(curPageName() == $key)
		{
		  $activeItem = "active";
	  }
	  else
	  {
		  $activeItem = "";
	  }
		?>
		<a href="<?php echo $key; ?>" class="<?php echo $activeItem; ?>" title="<?php echo $value['menuTitle']; ?>"><?php echo $value['menuName']; ?></a>
		<?php
	  }
	  ?>
		<!--
		<div class="search-container">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<input type="search" placeholder="Search.." name="search">
				<button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
		<div class="container h-100">
			<div class="d-flex justify-content-center h-100">
				<div class="searchbar">
					<input class="search_input" type="text" name="" placeholder="Search...">
					<a href="#" class="search_icon"><i class="fas fa-search"></i></a>
				</div>
			</div>
		</div>
		-->
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i id="fa-toggle" class="fa fa-bars" title="open menu"></i>
		</a>
	  </div>
	  <?php
}

// function to get current page URL (from website-root)
function curPageURL()
{
	$pageURL = 'http';
	if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on")
	{
		$pageURL .= "s";
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80")
	{
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	//die($pageURL);
	return substr($pageURL,strrpos($pageURL,"/")+1);
}

// function to get the current page name
function curPageName()
{
	return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

function curPageTitle()
{
	$curPageTitle = curPageName();
	
	$curPageTitle = substr($curPageTitle, 0, strlen($curPageTitle) - 4);
	if($curPageTitle == "index")
	{
		$curPageTitle = "home";
	}
	return ucfirst($curPageTitle);
}

function pagination()
{
	// connect to database
	$connection = dBconnect();
	
	// find out how many rows are in the table 
	$sql = "SELECT COUNT(*) FROM `projects`";
	$result = mysqli_query($connection, $sql) or trigger_error("SQL", E_USER_ERROR);
	$r = mysqli_fetch_row($result);
	$numrows = $r[0];

	//myDump($numrows, "\$numrows");

	// number of rows to show per page
	$rowsperpage = 1;
	// find out total pages
	$totalpages = ceil($numrows / $rowsperpage);

	// get the current page or set a default
	if (isset($_GET['projectId']) && is_numeric($_GET['projectId']))
	{
	// cast var as int
	$currentpage = (int) $_GET['projectId'];
	}
	else
	{
		// default page num
		$currentpage = 1;
	} // end if

	//myDump($currentpage, "\$currentpage",0,__FILE__,__LINE__);
	// if current page is greater than total pages...
	if ($currentpage > $totalpages)
	{
		// set current page to last page
		$currentpage = $totalpages;
	}
	// end if
	
	// if current page is less than first page...
	if ($currentpage < 1)
	{
		// set current page to first page
		$currentpage = 1;
	} // end if

	// the offset of the list, based on current page 
	$offset = ($currentpage - 1) * $rowsperpage;

	// get the info from the db 
	$sql = "SELECT `projectId` FROM `projects` LIMIT $offset, $rowsperpage";
	$result = mysqli_query($connection, $sql) or trigger_error("SQL", E_USER_ERROR);

	// while there are rows to be fetched...
	while ($list = mysqli_fetch_assoc($result))
	{
		// echo data
		//echo $list['projectId'] . " : " . $list['projectId'] . "<br />";
	}
	// end while

	/******  build the pagination links ******/
	// range of num links to show
	$range = 1;

	//myDump($currentpage, "\$currentpage",0,__FILE__,__LINE__);

	echo "<nav aria-label=\"Page navigation example\">";
	echo "<ul class=\"pagination\">";

	// if not on page 1, don't show back links
	if ($currentpage > 1)
	{
		// show << link to go back to page 1
		echo "<li class=\"page-item\"><a href=\"gallery.php?projectId=1\" class=\"page-link\"><<<</a></li>";
		
		// get previous page num
		$prevpage = $currentpage - 1;
		// show < link to go back to 1 page

		echo "<li class=\"page-item\"><a class=\"page-link\" href=\"gallery.php?projectId=$prevpage\"><</a></li>";
	}
	// end if 

	// loop to show links to range of pages around current page
	for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++)
	{
		// if it's a valid page number...
		if (($x > 0) && ($x <= $totalpages))
		{
			// if we're on current page...
			if ($x == $currentpage)
			{
				// 'highlight' it but don't make a link
				//echo " [<b>$x</b>] ";
				echo "<li class=\"page-item\"><b class=\"page-link\">$x</b></li>";
				// if not current page...
			}
			else
			{
				// make it a link
				//echo " <a href='{$_SERVER['PHP_SELF']}?projectId=$x'>$x</a> ";
				echo "<li class=\"page-item\"><a class=\"page-link\" href=\"gallery.php?projectId=$x\">$x</a></li>";
			}
			// end else
			}
			// end if 
	}
	// end for

	// if not on last page, show forward and last page links        
	if ($currentpage != $totalpages)
	{
		// get next page
		$nextpage = $currentpage + 1;
		// echo forward link for next page 
		echo "<li class=\"page-item\"><a class=\"page-link\" href=\"gallery.php?projectId=$nextpage\">></a></li>";
		// echo forward link for lastpage
		echo "<li class=\"page-item\"><a class=\"page-link\" href=\"gallery.php?projectId=$totalpages\">>>></a></li>";
	}
	// end if
	/****** end build pagination links ******/
}

if (!function_exists('array_key_first'))
{
	function array_key_first(array $arr)
	{
		foreach($arr as $key => $unused)
		{
            return $key;
        }
        return NULL;
    }
}

if (!function_exists("array_key_last"))
{
	function array_key_last($array)
	{
		if (!is_array($array) || empty($array))
		{
            return NULL;
        }
       
        return array_keys($array)[count($array)-1];
    }
}
?>