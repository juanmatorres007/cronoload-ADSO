<h2>Fichas relacionadas al proyecto</h2>

<table>    
<tr> 
    <th>#</th>
    <th>Numero ficha</th>
    <th>Estado</th>
    <th>Fecha de inicio</th>
    <th>Fecha de finalización</th>  
</tr>

<?php

$ct=1;
foreach($rta as $row):
     
?>
<tr>
    <td><?php echo $ct; ?></td>
    <td><?php echo $row['number_file'];?></td>
    <td><?php echo $row['state_file'];?></td>
    <td><?php echo $row['start_date_file'];?></td>
    <td><?php echo $row['end_date_file'];?></td>
</tr>

<?php
$ct++;
endforeach;
?>

</table>

<a href="../routes/validarIdProyecto.php?x=<?php echo $idproyect;?>">Registrar ficha</a>
