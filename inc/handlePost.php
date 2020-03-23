<?php
// handle logout form
if(isset($_POST['logout']))
{
	session_destroy();
	header("Location:" . $_SERVER['PHP_SELF']);
	exit;
}

// handle login form
if(isset($_POST['login']))
{
	// to do: inlog using the database instead of hardcoded username and password
	if($_POST['username'] == "abc" && $_POST['password'] == "abc")
	{
		$_SESSION['dcLogin'] 			= true;
		$_SESSION['dcUser']['userId']	= 3141592654;
		$_SESSION['dcUser']['firstname']= "Peter";
		$_SESSION['dcUser']['lastname']	= "Nocker";
		$_SESSION['dcUser']['fullname']	= "Peter Nocker";
	}
	if($_POST['username'] == "qwe" && $_POST['password'] == "qwe")
	{
		$_SESSION['dcLogin'] 			= true;
		$_SESSION['dcUser']['userId']	= 9564258711;
		$_SESSION['dcUser']['firstname']= "John";
		$_SESSION['dcUser']['lastname']	= "Doe";
		$_SESSION['dcUser']['fullname']	= "John Doe jr.";
	}
}

// handle rating and review form
if(isset($_POST['submitRating']))
{
	myDump($_POST,"\$_POST",1, __FILE__, __LINE__);
	if(!isset($_SESSION['dcLogin']) || $_SESSION['dcLogin'] == false)
	{
		$returnMessages['error'][] = "You have to login to rate a hero!";
	}
	else
	{
		$userId = $_SESSION['dcUser']['userId'];
		if(!isset($_POST['rating']))
		{
			$returnMessages['error'][] = "You haven't rated!";
			if(trim($_POST['ratingReview']) == "")
			{
				$returnMessages['error'][] = "Please leave a message!";
			}
		}
		else
		{
			// first, get heroId from the form
			$heroId 		= $_POST['heroId'];
			$heroName 		= $_POST['heroName'];
			// and get its rating and review..
			$rating 		= $_POST['rating'];
			$ratingReview 	= $_POST['ratingReview'];
			
			//
			// define SQL string
			$insertRatingSQL = "
			INSERT INTO
			`rating` 
			(
			`ratingId`,
			`heroId`,
			`rating`,
			`ratingDate`,
			`ratingReview`,
			`userId`
			)
			VALUES
			(
			NULL,
			'" . $heroId . "',
			'" . $rating . "',
			'" . time() . "',
			'" . $ratingReview . "',
			" . $userId . "
			)
			";

			// run query
			$resource = mysqli_query($connection, $insertRatingSQL) or die(mysqli_error($connection) . "<br />" . myDump($insertRatingSQL));
			
			// return messages..
			$returnMessages['succes'][] = "Thank you for rating " . $rating / 2 . " stars on " . $heroName . "!";
		} 	
	}
}

if(isset($_POST['contactFrom']))
{
	myDump($_POST, "\$_POST['contactFrom']", 0, __FILE__, __LINE__);
}

if(isset($_POST['search']))
{
	myDump($_POST, "\$_POST['searchPhrase']", 0, __FILE__, __LINE__);
}

if(isset($_POST['addProject']))
{
	myDump($_POST, "\$_POST", 0, __FILE__, __LINE__);
}
?>