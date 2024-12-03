<?php

$data = [
	['Иванов', 'Математика', 5],
	['Иванов', 'Математика', 4],
	['Иванов', 'Математика', 5],
	['Петров', 'Математика', 5],
	['Сидоров', 'Физика', 4],
	['Иванов', 'Физика', 4],
	['Петров', 'ОБЖ', 4],
];

$sorted_data = [];


foreach ($data as $key => [$name, $subject, $score]) {
	
	if (!isset($sorted_data[$name][$subject])){
		$sorted_data[$name][$subject] = 0; //Устанавливаем счет по умолчанию 0, иначе при первой итерации нужный ключ не будет найден
	}

	$sorted_data[$name][$subject] += $score;
}

require_once('table.php');