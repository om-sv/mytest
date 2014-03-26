<?
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/multiship.v2/classes/general/mlspclass.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/multiship.v2/classes/general/optionclass.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/multiship.v2/classes/mysql/mlspclass.php');
if($_GET['MS_LOG'] == 'N') unset($_SESSION['MS_LOG']);
if($_GET['MS_LOG'] == 'Y') $_SESSION['MS_LOG'] = 'Y';
?>