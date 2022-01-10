<?php

function rotacionar($array) {
    $aux = $array[0];

    for ($i=0; $i < count($array); $i++) { 
        $array[$i] = $array[$i + 1] ?? 0;
    }
    $array[count($array) - 1] = $aux;
    return $array;
}

$rots = 5;
$array = array(1,2,3,4,5,6);

print_r($array);

for ($i=0; $i < $rots; $i++) { 
    $array = rotacionar($array);
}

print_r($array);

?>

<?php

function separarPorTipo($array, $tipo) {
    $aux = array();
    
    for ($i=0; $i < count($array); $i++) { 
        if ($array[$i] % 2 === 0 && $tipo === 'par') $aux[count($aux)] = $array[$i];
        if ($array[$i] % 2 !== 0 && $tipo === 'impar') $aux[count($aux)] = $array[$i];
    }
    return $aux;
}

function ordenar($array, $ordem) {
    $aux = array();

    for ($i=0; $i < count($array); $i++) {
        $index = $i;

        for ($j=0; $j < count($array); $j++) { 
            if ($array[$j] !== null && $ordem === 'asc' && ($array[$index] === null || $array[$index] > $array[$j])) $index = $j;
            if ($array[$j] !== null && $ordem === 'desc' && ($array[$index] === null || $array[$index] < $array[$j])) $index = $j;
        }

        $aux[count($aux)] = $array[$index];
        $array[$index] = null;
    }
    return $aux;
}

function concatena($array1, $array2) {
    $aux = array();
    $len = count($array1) + count($array2);

    for ($i=0; $i < $len; $i++) { 
        if ($i < count($array1)) {
            $aux[$i] = $array1[$i]; 
        } else {
            $aux[$i] = $array2[$i - count($array1)]; 
        }
    }

    return $aux;
}

$array = array(1,2,3,4,5,6,3,34,5,6,7,7,8,9,10);

$par = separarPorTipo($array, 'par');
$impar = separarPorTipo($array, 'impar');

$par = ordenar($par, 'asc');
$impar = ordenar($impar, 'desc');

$array = concatena($par, $impar);

print_r($array);

?>