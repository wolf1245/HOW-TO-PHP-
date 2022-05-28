<?php
/**
 * Задание 1
*Запросить с помощью cURL – любую страницу доступную в сети и вывести отдельно заголовки и
*отдельно контент
 */
$url = 'https://runebook.dev/';
// создаем сеанс
$ch = curl_init();
// Загружаемый адресс
curl_setopt($ch, CURLOPT_URL, $url);
//Возврат результата передачи в качестве строки из curl_exec() вместо прямого вывода в браузер.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// false для остановки cURL от проверки сертификата узла сети.
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Выполняет запрос cURL
$html = curl_exec($ch);
// для включения заголовков в вывод
curl_setopt($ch, CURLOPT_HEADER, true);
// Выполняет запрос cURL
$headers = curl_exec($ch);
curl_close($ch);
echo "<pre>";
var_dump($headers);
echo "</pre>";
echo $html;