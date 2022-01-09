<?php

// function rotacionar($array) {
//     $aux = $array[0];

//     for ($i=0; $i < count($array); $i++) { 
//         $array[$i] = $array[$i + 1] ?? 0;
//     }
//     $array[count($array) - 1] = $aux;
//     return $array;
// }

// $rots = 5;
// $array = array(1,2,3,4,5,6);

// print_r($array);

// for ($i=0; $i < $rots; $i++) { 
//     $array = rotacionar($array);
// }

// print_r($array);

?>

<?php

function pares($array) {
    $aux = array();
    
    for ($i=0; $i < count($array); $i++) { 
        if ($array[$i] % 2 === 0) array_push($aux, $array[$i]);
    }
    return $aux;
}

function impares($array) {
    $aux = array();
    
    for ($i=0; $i < count($array); $i++) { 
        if ($array[$i] % 2 !== 0) array_push($aux, $array[$i]);
    }
    return $aux;
}

function ordenar($array) {
    $aux2 = array();

    for ($i=0; $i < count($array); $i++) {
        $aux = $array[$i];
        for ($j=0; $j < count($array); $j++) { 
            if ($array[$j] < $aux && !existe($aux2, $array[$j])) {
                $aux = $array[$j];
                print_r(existe($aux2, $array[$j]));
            } else if(!existe($aux2, $array[$j])) {
                $aux = $array[$j];
            }
        }
        array_push($aux2, $aux);
    }
    return $aux2;
}

function existe($array, $numero) {
    for ($i=0; $i < count($array); $i++) { 
        if ($array[$i] === $numero) return true;
    }
    return false;
}

$array = array(1,6,3,4,5,2);
$par = pares($array);
$impar = impares($array);

$par = ordenar($par);

print_r($par);
print_r($impar);

?>