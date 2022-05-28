<?php
declare(strict_types=1);
ob_start();
session_start();
$pathMyFile = $_SERVER['DOCUMENT__ROOT'] . 'C:/OpenServer/domains/dz7.loc/files/';
/**
 * Задание 1
*Создать форму которая описывает параметры картины (автор, год выпуска, цена, ширина
*полотна, высота полотна)
*Записать в файл 10 строк с параметрами 10ти картин
*Прочитать и вывести на монитор содержимое файла
 */
if($_POST['submit']) {
	if(emptyForm()) {
		if(inputsEmpty() == '') {
			if(fileWrite(emptyFile($pathMyFile, 'data.txt'), $pathMyFile, 'data.txt')) {
				header('Location: /');
			} else {
				echoResponse(error("Что то пошло не так!"));
			}
		} else {
			echoResponse(error(inputsEmpty() . " не указали"));
		}
	} else {
		echoResponse(error("Форма пуста!"));
	}
}
if(emptyFile($pathMyFile, 'data.txt')) {
	echo "</pre>" . file_get_contents($pathMyFile. 'data.txt') . "</pre>" . "<br><br><br>";
}
//
function fileWrite(bool $fun, string $pathMyFile, string $name) : bool
{
	$response  = false;
	$mode = '';
	if($fun) {
		$mode = "a";
	} else {
		$mode = "a+";
	}
	$myFile = fopen($pathMyFile . $name, $mode);
	fwrite($myFile, "Автор= $_POST[author], Год выпуска= $_POST[yearOfIssue], Цена= $_POST[price], Ширина полотна= $_POST[webWidth], Высота полотна= $_POST[canvasHeight]\r\n");
	fclose($myFile);
	if($myFile != false) {
		$response = true;
	}
	return $response;
}
//
function emptyFile(string $pathMyFile, string $name) : bool
{
	$response = false;
	if(file_exists($pathMyFile . $name)) {
		$response = true;
	}
	return $response;
}
//
function inputsEmpty() : string
{
	$response = '';
	foreach ($_POST as $key => &$value) {
		if($key == 'submit') {
			continue;
		}
		if(empty($value)) {
			$response = $key;
		}
	}
	return $response;
}
//
function emptyForm() : bool
{
	$response = false;
	foreach ($_POST as $key => &$value) {
		if($key == 'submit') {
			continue;
		}
		if(!empty($value)) {
			$response = true;
		}
	}
	return $response;
}
//
function error(string $text) : string
{
	return $text;
}
//
function echoResponse($fun = '')
{
	echo $fun;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form data img</title>
</head>
<body>
	<form action="#" method="POST">
		<legend>Form data img</legend>
		<label>
			Author:
			<input type="text" name="author">
		</label>
		<label>
			Year of issue:
			<input type="text" name="yearOfIssue">
		</label>
		<label>
			Price:
			<input type="text" name="price">
		</label>
		<label>
			Web width:
			<input type="text" name="webWidth">
		</label>
		<label>
			Canvas height:
			<input type="text" name="canvasHeight">
		</label>
		<input type="submit" name="submit">
	</form>
	<div><?=echoResponse();?></div>
</body>
</html>