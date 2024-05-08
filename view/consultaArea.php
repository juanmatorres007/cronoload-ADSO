<h2>CONSULTA DE AREA</h2>

<table>
  <tr>
    <th>#</th>
    <th>Nombre de area</th>
    <th>Fecha de registro</th>
    <th>Estado</th>
  </tr>
  <?php

  $ct = 1;
  foreach ($rta as $retados) : ?>
    <tr>
      <td><?php echo $ct; ?> </td>
      <td><?php echo $retados['area_name_know']; ?> </td>
      <td><?php echo $retados['date_register_know']; ?> </td>
      <td><?php echo $retados['state_know']; ?> </td>
      <td><a href="../routes/consultarProyect.php?x=<?php echo $retados['id_auto_know']; ?>">Consultar proyectos</a></td>
    </tr>

  <?php
    $ct++;
  endforeach; ?>
</table>