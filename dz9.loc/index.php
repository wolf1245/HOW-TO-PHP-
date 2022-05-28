<?php
declare(strict_types=1);
/**
 * Задание 1
*Отправить 3 e-mail – средствами PHP
 */
if($_POST['submit']) {
	if(inputsEmpty() == '') {
		if(preg_match('/.+@\w{2,5}.\w{2,5}/', $_POST['email'])) {
			if(checkTextLength() == 1) {
				$to = "nobody@example.com";
				$subject = 'Test';
				$message = wordwrap($_POST['text'], 70, "\r\n");
				$headers = array(
						'From' => $_POST['email'],
						'Reply-To' => $_POST['email'],
						'X-Mailer' => 'PHP/' . phpversion(),
				);
				if(mail($to, $subject, $message, $headers)) {
					echoResponse("Письмо взято в обработку");
				} else {
					echoResponse(error("Что то пошло не так!"));
				}
			} else {
				echoResponse(error("Длина строки не соответствует указанной = " . checkTextLength() . " символа"));
			}
 		} else {
 			echoResponse(error("email не годный"));
 		}
	} else {
		echoResponse(error('Вы не заполнили поле ' . inputsEmpty()));
	}
}
//
function checkTextLength() : int
{
	$response = 0;
	if(strlen($_POST['text']) >= 5 && strlen($_POST['text']) <= 70) {
		$response = 1;
	} else {
		$response = strlen($_POST['text']);
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
	<title>Mail</title>
</head>
<body>
	<form action="#" method="POST">
		<legend>Mail Form</legend>
		<label>
			Введите email:
			<input type="email" name="email" value="<?=$_POST['email'] ?? '';?>">
		</label>
		<br>
		<label>
			Text: не менее 5 символов, если <br>длинее 70 символов,<br>обрежиться до 70
			<input type="text" minlength="5" maxlength="70" name="text" value="<?=$_POST['text'] ?? '';?>">
		</label>
		<br>
		<input type="submit" name="submit">
	</form>
	<div><?=echoResponse();?></div>
</body>
</html>