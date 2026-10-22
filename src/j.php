<?php
function factoresPrimos(int $numero): array {
    $x = 2;
    $hola = []; 
    while ($numero != 1) {
        $valor = 1;
        if ($numero % $x == 0) {
            $numero = $numero / $x;

            
            $hola[] =  $x;
        } else {
            $x = $x + 1;
        }
    }
    return $hola;
}
function imprimeFactoresPrimos(array $factoresArray): void {
$factoresArrayB = array_count_values($factoresArray);
 $contador = 0;
foreach ($factoresArrayB as $key => $value) {
$contador++;
        echo  $key, " ^ ", $value, ($contador == count($factoresArrayB)) ? "" : " * ";        
}
}
while($linea = fgets(STDIN)) {
$datos = explode(" ", trim($linea));
?><p><?php echo $datos[0]; ?> = <?php imprimeFactoresPrimos(factoresPrimos($datos[0])); ?></p><?php echo "\n";
}?>