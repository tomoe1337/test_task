<?php

function SisterCounter ($n, $m) {

	if ($m < 1) die('У Алисы нет братьев');

	echo 'У произвольного брата Алисы кол-во сестер: ' . $n+1;


}


SisterCounter(8, 5);
