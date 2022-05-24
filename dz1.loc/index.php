<?php
declare(strict_type=1);
/**
 * Задание 1
*Создать пользовательскую функцию которая выведет слово "Привет"
 */
function hello() : string
{
	return "Hello!";
}
echo hello();
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