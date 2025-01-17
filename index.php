<?php
    ob_start();
	# Stop Hacking attempt
	define('__APP__', TRUE);
	
	# Start session
    session_start();
	
	# Database connection
	include ("dbconn.php");
	
	# Variables MUST BE INTEGERS
    if(isset($_GET['menu'])) { $menu   = (int)$_GET['menu']; }
	if(isset($_GET['action'])) { $action   = (int)$_GET['action']; }
	
	# Variables MUST BE STRINGS A-Z
    if(!isset($_POST['_action_']))  { $_POST['_action_'] = FALSE;  }
	
	if (!isset($menu)) { $menu = 1; }
	
	# Classes & Functions
    include_once("functions.php");
	
print'
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Ivan Žanić">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="fontawesome-free-6.2.1-web/fontawesome-free-6.2.1-web/css/all.css">

    <style>
        * {
            margin: 0;
            padding: 0;
        } 
        @font-face {
            font-family: "Ubuntu-Bold";
            src:url("fonts/Ubuntu/Ubuntu-Bold.ttf");
            }
        @font-face {
            font-family: "Raleway-Medium";
            src:url("fonts/Raleway/static/Raleway-Medium.ttf");
            }    
        body, html {
	        font-family: "Raleway-Medium";
	        margin: 0;
	        font-size: 16px;
            }
        header {
            background-image: url("images/main.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            height: 500px;
            width: 100%;
            }
        header h1 {
            font-family: "Ubuntu-Bold";
            font-size: 80px;
            text-align: center;
            -webkit-text-stroke: 2px black; 
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }   
        .topnav {
            overflow: hidden;
            background-color: #333;
        }
        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }
        .topnav a:hover, .dropdown:hover .dropbtn {
            background-color: #ddd;
            color: black;
        }
        .activeNav {
            background-color:dodgerblue;
            color: white;
        }
        .topnav .icon {
            display: none;
        }
        .dropdown {
            float: left;
            overflow: hidden;
        }
        /* Dropdown button */
        .dropdown .dropbtn {
            font-size: 17px;
            border: none;
            outline: none;
            color: #f2f2f2;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        /* Links inside the dropdown */
        .dropdown-content a {
            float: none;
            color: #ddd;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }
        .dropdown-content a:hover {
            background-color: #ddd;
            color: black;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        main{
            width:100% ;
        }
        p {
            font-family: "Raleway-Medium";
            font-size: 16px;
            line-height: 24px;
            
        }
        figure {
            float:left;
            border: 1px solid black;
            padding: 0.5em;
            margin: 0 1em 0.5em 1em;
            width:350px;
        }
        main h1{
            margin: 0.5em;
            margin-bottom: 20px;
            /* float: left; */
        }
        p.socials {
            margin: 1em;
            line-height: 1.4em;
        }

        main a {
            color: dodgerblue;
            text-decoration: none;
            }
        main a:hover {
            color: #df3b1a;
            text-decoration: underline;
            }
        
        p.standaloneText{
            margin: 1em;
        }

        figure.contactInfo {
            float: left;
            position: relative;
            text-align: center;
        }

        img.contactInfo{
            width: 165px;
        }

        .GoogleMaps{
            width: 1280px; 
            height: 720px;
        }

/* Form styling */
form {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}


form h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}


label {
    display: block;
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 8px;
    color: #555;
}


input[type="text"], input[type="email"], input[type="password"], textarea {
    width: 100%;
    padding: 12px;
    border: 2px solid #ddd;
    border-radius: 4px;
    margin-bottom: 16px;
    font-size: 14px;
    box-sizing: border-box;
}


input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, textarea:focus {
    border-color: #007BFF;
    outline: none;
}

input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #007BFF;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}


input[type="submit"]:hover {
    background-color: #0056b3;
}


select {
  width: 200px; 
  padding: 10px;
  border: 2px solid #ccc; 
  border-radius: 5px;
  background-color: #f9f9f9; 
  font-size: 16px; 
  font-family: Arial, sans-serif; 
  color: #333; 
  outline: none; 
  cursor: pointer; 
}

option {
  padding: 10px; 
  font-size: 16px; 
  background-color: #fff;
  color: #333; 
  border-bottom: 1px solid #ddd;
}


option:hover {
  background-color: #f1f1f1; 
}


select:focus {
  border-color: #007BFF; 
  background-color: #66AFFF; 
}
        
        /* image slideshow */

        * {box-sizing: border-box}
            .mySlides {display: none}
            img {vertical-align: middle;}

            /* Slideshow container */
            .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
            }

            /* Next & previous buttons */
            .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
            }

            /* Position the "next button" to the right */
            .next {
            right: 0;
            border-radius: 3px 0 0 3px;
            }

            /* On hover, add a black background color with a little bit see-through */
            .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
            }

            /* Caption text */
            .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
            }

            /* Number text (1/3 etc) */
            .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
            }

            /* The dots/bullets/indicators */
            .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
            }

            .active, .dot:hover {
            background-color: #717171;
            }

            /* Fading animation */
            .fade {
            animation-name: fade;
            animation-duration: 1.5s;
            }

            @keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
            }

        
        /* mobile view adaptation */
        @media only screen and (max-width: 480px){
            header {
            background-image: url("images/main_mobile.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            height: 500px;
            width: 100%;
            }
        header h1 {
            font-family: "Ubuntu-Bold";
            font-size: 60px;
            text-align: center; 
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        /* resposive navbar code */
        .topnav a:not(:first-child), .dropdown .dropbtn {
            display: none;
            }
        .topnav a.icon {
            float: right;
            display: block;
        }

        .topnav.responsive {position: relative;}
        .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
        }
        .topnav.responsive a {
            float: none;
            display: block;
            text-align: left;
        }
        .topnav.responsive .dropdown {float: none;}
        .topnav.responsive .dropdown-content {position: relative;}
        .topnav.responsive .dropdown .dropbtn {
            display: block;
            width: 100%;
            text-align: left;
        }
        /* end of responsive navbar code */
        
        figure {
            float:left;
            border: 1px solid black;
            padding: 0.5em;
            margin-left: 10px;
            width: 90%;
        }
        p {
            font-family: "Raleway-Medium";
            font-size: 16px;
            line-height: 24px;
            margin-left: 10px;
            margin-right: 10px;
        }
        main h1{
            margin: 10px;
            float: left;
        }
        p.socials {
            margin: 10px;
            line-height: 14px;
        }
        
        figure.contactInfo {
            float:left;
            position: relative;
            text-align: center;
        }
        img.contactInfo{
            width: 150px;
        }
        .GoogleMaps{
            width: 75%; 
            height: 400px;
        }



        }

        @media only screen and (max-width: 464px){
            p.temporaryfix{
                text-indent: 95px;
            }
        
        }
        @media only screen and (min-width: 412px){
            p.temporaryfix{
                text-indent: 0px;
            }
        }

    </style>

    <title>Apartment Asgard - official</title>
</head>
<body>
    <header>
        <h1>Apartment<br>Asgard</h1>
    </header>


    <div class="topnav" id="myTopnav">';
        include("menu.php");
      print '</div>

    <main>';
		if (isset($_SESSION['message'])) {
			print $_SESSION['message'];
			unset($_SESSION['message']);
		}
	
	# Homepage
	if (!isset($menu) || $menu == 1) { include("home.php"); }
	
	# News
	else if ($menu == 2) { include("news.php"); }
	
	# Contact
	else if ($menu == 3) { include("contactinfo.php"); }
	
	# About us
	else if ($menu == 4) { include("about.php"); }

	else if ($menu == 5) { include("gallery.php"); }
	
	# Register
	else if ($menu == 6) { include("register.php"); }
	
	# Signin
	else if ($menu == 7) { include("signin.php"); }
	
	# Admin webpage
	else if ($menu == 8) { include("admin.php"); }

	
	
	print '
	<footer style="background-color: #333; padding: 0.1em; clear: both;">
            <p style="color:white; text-align: center; margin: 0.5em;">&copy; Ivan Žanić</p>
        </footer>
    </main>
</body>
</html>';
ob_end_flush();
?>