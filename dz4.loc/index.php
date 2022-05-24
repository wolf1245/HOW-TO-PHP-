<?php
declare(strict_types=1);
/**
 * Задание 1
*Создать форму.
*Отправит ее на сервер методом GET и вывести их на монитор
 */
if(isset($_GET['submit'])) {
	print_r([$_GET['name'], $_GET['password']]);
} else {
	echo "Что то пошло не так";
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
	 <form action="index.php" method="GET">
		 <legend>Form GET</legend>
		 <input type="text" placeholder="Name" name="name">
		 <input type="text" placeholder="Password" name="password">
		 <input type="submit" name="submit">
		</form>
 </body>
 </html>