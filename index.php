<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
header('Content-Type: text/html; charset=utf-8');
define('THISISADMINI',true);
$dirName=dirname(__FILE__);
$docConfig=$dirName.'/config/doc-config.php';
if(!is_file($docConfig)||filesize($docConfig)==0||filesize($docConfig)==3){require_once($dirName.'/inc/nosetup/setup.html');exit;}else{require_once($docConfig);}
require_once(ABSPATH.'/loader/load.php');