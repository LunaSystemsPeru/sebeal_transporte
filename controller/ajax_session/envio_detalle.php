<?php
session_start();
require '../../modelSession/EnvioDetalle.php';

$c_detalle = new EnvioDetalle();

$action = filter_input(INPUT_POST, 'action');

if ($action == 1) {
    $contar_items = count($_SESSION['enviodetalle']);
    $c_detalle->setId($contar_items + 1);
    $c_detalle->setDescripcion(filter_input(INPUT_POST, 'descripcion'));
    $c_detalle->setCantidad(filter_input(INPUT_POST, 'cantidad'));
    $c_detalle->setIdUnidadMedida(filter_input(INPUT_POST, 'id_unidad',FILTER_SANITIZE_NUMBER_INT));
    $c_detalle->setNombreUnidad(filter_input(INPUT_POST, 'nombre_unidad'));
    $c_detalle->setCosto(filter_input(INPUT_POST, 'costo'));
    $c_detalle->setPeso(filter_input(INPUT_POST, 'peso'));

    $c_detalle->agregar();
}
if ($action == 2) {
    $c_detalle->setId(filter_input(INPUT_POST, 'id_item'));
    $c_detalle->eliminar();
}

$total_precio = 0;
$total_peso = 0;
$item = 1;
$array_detalle = $_SESSION['enviodetalle'];
foreach ($array_detalle as $fila) {
    $total_precio += ($fila['cantidad'] * $fila['costo']);
    $total_peso += $fila['peso'];
    ?>
    <tr>
        <td class="text-center"><?php echo $item ?></td>
        <td><?php echo $fila['descripcion'] ?></td>
        <td class="text-right"><?php echo number_format($fila['cantidad'], 0) ?></td>
        <td class="text-right"><?php echo number_format( $fila['peso'], 2) ?></td>
        <td class="text-right"><?php echo number_format($fila['costo'], 2) ?></td>
        <td class="text-right"><?php echo number_format($fila['cantidad'] *$fila['costo'], 2) ?></td>
        <td class="text-center">
            <button class="btn btn-danger" onclick="eliminarItem(<?php echo $fila['id']; ?>)">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
    <?php
    $item++;
}
?>
<script>
    $('#inputPeso').val(<?php echo $total_peso ?>);
    $('#inputTotal').val(<?php echo $total_precio ?>);
</script>
