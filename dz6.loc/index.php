<?php
declare(strict_types=1);
ob_start();
session_start();
/**
 * Задание 1
*Отправить данные из формы и занести в сессии и куки и проверить данные массивов сессий и
*куков
 */
if($_POST['submit']) {
	if(emptyForm()) {
		if(inputsEmpty() === 3) {
			$_SESSION['register'] = true;
			setcookie('register', htmlspecialchars($_POST['login']), time() + (60 * 60 * 24), '/');
			header("Location: /");
			echo 1;
		} else {
			if(inputsEmpty() === 1) {
				echoResponse(error("Login пуст"));
			} else {
				echoResponse(error("Password пуст"));
			}
		}
	} else  {
		echoResponse(error("Форма пуста1111"));
	}
}
if(!empty($_COOKIE) && !empty($_SESSION)) {
	if(htmlspecialchars_decode($_COOKIE['register']) == 'admin@gmail.com' && $_SESSION['register'] == true) {
	echoResponse("Зареганы");
	} else {
	echoResponse("НЕ Зареганы");
	}
}
//
function emptyForm() : bool
{
	$response = false;
	if(!empty($_POST['login']) && !empty($_POST['password'])) {
		$response = true;
	}
	return $response;
}
//
function inputsEmpty() : int
{
	$response = 0;
	if(empty($_POST['login'])) {
		$response = 1;
	} else if(empty($_POST['password'])) {
		$response = 2;
	} else {
		$response = 3;
	}
	return $response;
}
//
function error($text) : string
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
	<title>Form</title>
</head>
<body>
	<form action="#" method="POST">
		<legend>Form $_SESSION and $_COOKIE</legend>
		<label>
			Login:
			<input type="text" name="login" required>
		</label>
		<label>
			Password:
			<input type="password" name="password" required>
		</label>
		<input type="submit" name="submit"">
	</form>
	<div><?=echoResponse();?></div>
</body>
</html>