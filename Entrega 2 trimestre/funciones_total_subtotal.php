<?php

function get_total($cantidades, $precios){

$total = (float) 0;
for ($i = 0; $i < count($cantidades); $i++){
	$total = $total + ($cantidades[$i] * $precios[$i]);
}

return ($total);
}


function get_subtotal($cantidad, $precio){
	return $cantidad * $precio;
}


function print_values(){
echo "Número de Pedido: $orderNumber<br>";
echo "Fecha del Pedido: $orderDate<br>";
echo "metodo de pago: $PayMethod<br>";
echo "Cliente: $cliente<br>";

echo "<h4>Líneas de Pedido:</h4>";
echo "<ul>";
for ($i = 0; $i < count($productos); $i++) {
    echo "<li>";
    echo "Producto ID: " . $productos[$i] . ", ";
    echo "Cantidad: " . $cantidades[$i] . ", ";
    echo "Precio Unitario: " . $precios[$i] . ", ";
    echo "</li>";
}
echo "</ul>";
echo "Total: $totalAmount<br>";
}