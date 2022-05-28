<?php
/**
 * Задание 1
*Вывести на монитор даты рождения свою и родителей отдельно в UNIXTIME и в формате даты
 */
function getDates(string $myDate, string $fatherDate, string $motherDate) : array
{
	return [
		'myDate' => [
			'UNIX' => strtotime($myDate),
			'common' => date("d.m.Y", strtotime($myDate)),
		],
		'fatherDate' => [
			'UNIX' => strtotime($fatherDate),
			'common' => date("d.m.Y", strtotime($fatherDate)),
		],
		'motherDate' => [
			'UNIX' => strtotime($motherDate),
			'common' => date("d.m.Y", strtotime($motherDate)),
		],
	];
}
var_dump(getDates('11-01-1993', '31-01-1958', '10.02.1960'));
echo "<br>";
/**
 * Задание 2
*Вывести на монитор даты рождения свою и родителей с помощью класса DateTime
 */
$myDate = new DateTime('11.01.1993');
echo $myDate->format('Y-m-d');
echo "<br>";
$fatherDate = new DateTime('31=01=1958');
echo $fatherDate->format('Y-m-d');
echo "<br>";
$motherDate = new DateTime('10.02.1960');
echo $motherDate->format('Y-m-d');