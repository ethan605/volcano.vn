<?
umask(0);

#
# If we are in subdir of X-Cart dir, then include with '../'
# else include with './'
#
//if (!@include("../lib/Smarty.class.php"))
//	@include("./lib/Smarty.class.php");
require('Smarty.class.php');

#
# Get absolute path
#
define('BASEDIR', '');
//define('BASEDIR', '/data/5/0/52/4/215656/user/219119/htdocs/');

#
# Smarty object for processing html templates
#
$smarty = new Smarty;

#
# Store all compiled templates to the single directory
#
$smarty->use_sub_dirs = false;

$smarty->template_dir = BASEDIR."templates/lib";
$smarty->compile_dir = BASEDIR."templates/templates_c";
$smarty->config_dir = BASEDIR."config";
$smarty->cache_dir = BASEDIR."cache";
$smarty->secure_dir = BASEDIR."templates";

$smarty->caching = 0;
$smarty->cache_lifetime = 0;

//$smarty->debug_tpl="file:debug_templates.tpl";

if( !is_dir($smarty->compile_dir) && !file_exists($smarty->compile_dir) )
	@mkdir($smarty->compile_dir);

if( !is_writable($smarty->compile_dir) || !is_dir($smarty->compile_dir) ){
	echo "Can't write template cache in the directory: <b>".$smarty->compile_dir."</b>.<br>Please check if it exists, and have writable permissions.";
	exit;
}



$smarty->assign("ImagesDir",BASEDIR."image");
//$smarty->assign("CategoryDir",BASEDIR.DIRECTORY_SEPARATOR."cat_images");
//$smarty->assign("BannerDir",BASEDIR.DIRECTORY_SEPARATOR."banner");

$smarty->assign("SkinDir","css");

#
# Smarty object for processing mail templates
#
$mail_smarty = $smarty;

#
# WARNING :
# Please ensure that you have no whitespaces / empty lines below this message.
# Adding a whitespace or an empty line below this line will cause a PHP error.
#
?>	