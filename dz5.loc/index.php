<?php
declare(strict_types=1);
session_start();
define("URLFILES", "http://dz5.loc/readFiles.php");
$arrayFiles = [];
//
if(isset($_POST['subFile'])) {
	if(emptyFiles()) {
		if(checkType()) {
			loadedFile();
			echoView("Файлы сохранены");
			$arrayFiles = files($_SERVER['DOCUMENT__ROOT'] . "C:/OpenServer/domains/dz5.loc/file/");
			var_dump($arrayFiles);
			echo URLFILES;
		} else {
				echoView(error("Выбирите картинку формата .png, .jpg, .jpeg, .svg"));
		}
	} else {
		echoView(error("что то пошло не так, файлы не загруженны"));
	}
}
//
function checkType() : bool
{
	$response = false;
	if($_FILES["img"]["type"] == "image/jpeg" || $_FILES["img"]["type"] == "image/svg+xml" || $_FILES["img"]["type"] == "image/png" || $_FILES["img"]["type"] == "image/jpg") {
		$response = true;
	}
	return $response;
}
//
function emptyFiles() : bool
{
	$response = false;
	if($_FILES["img"]["size"] > 0 && $_FILES["file"]["size"] > 0) {
		$response = true;
	}
	return $response;
}
//
function loadedFile()
{
	$myPath = $_SERVER['DOCUMENT__ROOT'] . "C:/OpenServer/domains/dz5.loc/file/";
	foreach ($_FILES as &$value) {
		move_uploaded_file($value["tmp_name"], "$myPath" . $value["name"]);
	}
}
//
function echoView($fun) {
	echo $fun;
}
//
function error(string $text) : string
{
	return $text;
}
//
function files($pathFiles) : array
{
	$array = scandir($pathFiles);
	unset($array[0]);
	unset($array[1]);
	return $array;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form File</title>
</head>
<body>
	<form action="#" method="POST" enctype="multipart/form-data">
		<legend>Form File</legend>
		<label>
			Выбирите картинку формата .png, .jpg, .jpeg, .svg
			<input type="file" name="img" accept=".png, .jpg, .jpeg, .svg" require>
		</label>
		<label>
			Выбирите любой файл
			<input type="file" name="file" require>
		</label>
		<input type="submit" name="subFile">
		<div><?=echoView($fun);?></div>
	</form>
	<?php if(!empty($arrayFiles)){?>
			<?php foreach($arrayFiles as &$value) {?>
				<?php echo "<a href=" . URLFILES . "?file=" . $value ." target=\"_blank\">Скачать $value</a><br>" ?>
			<?php } ?>
		<?php }?>
</body>
</html>