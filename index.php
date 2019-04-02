<?php
/*
********************************************
* Page Name         : quick_php.php
* Page Author       : Tathagata Basu
* Created On        : 25/03/2012
* Modified By       : 
* Modified On       : 
********************************************
*/

/*
	This page convert php code into a live page online
*/

///////////////////////////////////////////////////////////

session_start();

///////////////////////////////////////////////////////////

if(isset($_REQUEST['key'])&&$_REQUEST['key']=='sessionForm') {
	if($_REQUEST['password']=='compaq') {
		$_SESSION['quick_php']['access'] = 'ok';
	}
}

///////////////////////////////////////////////////////////

if(isset($_REQUEST['hidden'])&&$_REQUEST['key']=='htmlTagForm'&&$_SESSION['quick_php']['access']=='ok') {
	//script for generating output.php
	$handle = fopen("output.php","w+");
	fwrite($handle, trim($_REQUEST['htmlTag']));
	fclose($handle);
}

///////////////////////////////////////////////////////////
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quick PHP Coader<?=" (".$_SERVER['SERVER_NAME'].")"?></title>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/quick_php.js"></script>
<link href="css/quick_php.css" type="text/css" rel="stylesheet"/>
</head>

<body>
<?php
if(!isset($_SESSION)||$_SESSION['quick_php']['access']<>'ok') {
?>
<div class="password-section">
	<form name="sessionForm" id="sessionForm" action="" method="post">
		<input type="hidden" name="key" value="sessionForm">
		<input type="password" name="password" id="password" value="" placeholder="Enter Password">
		<input type="submit" name="btnSubmit" id="btnSubmit" value="Enter">
	</form>
</div>
<?php
	exit;
}
?>
<table class="main">
  <tr>
    <td class="code"><strong>Your PHP Code Here :</strong><br />
    <form name="htmlTagForm" id="htmlTagForm" action="" method="post">
    <input type="hidden" name="key" value="htmlTagForm">
    <input type="hidden" name="hidden" id="hidden" value="<?php if(isset($_REQUEST['hidden'])) { echo "1"; } ?>" />
    <textarea name="htmlTag" id="htmlTag">
	<?php 
	if(isset($_REQUEST['hidden'])) { 
		echo trim($_REQUEST['htmlTag']); 
	} else {
echo "
<!--Do not remove those php tags.-->
<?php		












?>	
";
	}
	?>
    </textarea>
    </form>
    </td>
  </tr>
  <tr>
    <td>
    <input type="button" name="convert" id="convert" value="Test Code >>" />
    </td>
  </tr>
  <tr>
    <td class="code">
    <strong>HTML Output :</strong>
    <div id="output"></div>
    </td>
  </tr>
</table>
Page Author : Tathagata Basu. 
</body>
</html>