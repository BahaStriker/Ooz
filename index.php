<?php
ini_set('zlib.output_compression', 1);
header("Cache-Control: max-age=2592000");

if(preg_match('/RestSharp/i',$userAgent))
{
    die("Unauthorized !");
}

$dom=$_SERVER['HTTP_HOST'];
$dom=str_replace("www.","",$dom);
$dom=explode(":",$dom);
$dom=array_shift($dom);
$dom=explode(".",$dom);
$dom=array_shift($dom);

if(isset($_GET["page"])) 
{
	$page = strtolower($_GET["page"]);
}
else 
{ 
	$page = NULL; 
}

unset($_GET["page"]);
unset($_GET["_"]);
chdir(__dir__);

require "protected/config.php";

if(session_id() == '') 
{
    session_start();
}

if($dom	==	'localhost' || $dom	==	'127')
{
  switch($page)
  {
    case NULL:
		case "":
		case "home":
		case "index.php": 
                      require "views/main.php";
                      break;
    default:			    require '404.php';
								      break;
  }
}
else
{
  die("Unauthorized !");
}
