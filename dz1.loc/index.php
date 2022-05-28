<?php
declare(strict_type=1);
/**
 * Задание 1
*Создать пользовательскую функцию которая выведет слово "Привет"
 */
function hello(string $text) : string
{
	return $text;
}
echo hello('Hello!');
echo "<br>";
/**
 * Задание 2
*Создать рекурсивную функцию вычисляющую ряд Фибоначи
 */
function fibonacchi($num)
{
	if ($num == 0 ) return 0;
 
  if ($num == 1) return 1;
  return fibonacchi($num - 2) + fibonacchi($num - 1);
}
echo fibonacchi(15);
echo "<br>";
/**
 * Задание 3
*Создать анонимную функцию возвращающую пустой массив
 */
$anon = array();
var_dump($anon);
echo "<br>";
/**
 * Задание 4
*Создать пользовательскую функцию которая использует функцию из задания 1 и выводит
*словосочетание "Привет мир".
 */
function wordHello($fun)
{
	echo $fun;
}
wordHello(hello('Привет мир!'));