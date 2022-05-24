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
var_dump('11-01-1993', '31=01=1958', '10.02.1960');
 echo "<br>";