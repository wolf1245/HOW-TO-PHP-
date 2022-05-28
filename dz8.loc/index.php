<?php
declare(strict_types=1);
/**
 * Задание 1
*Найти в интернете и изучить регулярку для валидации email
 */
if($_POST['submit']) {
	if(!empty($_POST['email'])) {
		if(preg_match('/.+@\w{2,5}.\w{2,5}/', $_POST['email'])) {
				echoResponse('email годный');
		} else {
			echoResponse(error("email не годный"));
		}
	}  else {
		echoResponse(error("Введите email"));
	}
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
	<title>Regular</title>
</head>
<body>
	<form action="#" method="POST">
		<legen>Email</legen>
		<input type="text" name="email">
		<input type="submit" name="submit">
	</form>
	<div><?=echoResponse();?></div>
</body>
</html>