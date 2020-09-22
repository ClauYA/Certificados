<?php
foreach ($firma as $fila)
{
?>
<tr>
	<td><?=$fila->nombreCompleto?></td>
	<td><?=$fila->grado?></td>
	<td><?=$fila->cargo?></td>
	<td><?=$fila->institucion?></td>
	<td><a>modificar</a></td>
	<td><button>eliminar</button></td>
</tr>
<?php
}
?>
