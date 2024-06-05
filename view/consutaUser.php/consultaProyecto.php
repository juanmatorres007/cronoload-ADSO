<h2>Consulta de proyectos formativos</h2>

<table>
  <tr>
    <th>#</th>
    <th>Nombre del proyecto</th>
    <th>Numero del proyecto</th>
    <th>Fecha de registro</th>
  </tr>

  <?php
  $ct = 1;
  foreach ($rta as $row) :
  ?>

    <tr>
      <td><?php echo $ct; ?></td>
      <td><?php echo $row['name_proj']; ?></td>
      <td><?php echo $row['number_proj']; ?></td>
      <td><?php echo $row['register_date_proj']; ?></td>
      <td><a href="../routes/consultaFicha.php?x=<?php echo $row['id_auto_proj']; ?>">Fichas</a></td>
    <?php
    $ct++;
  endforeach;
    ?>
    </tr>

</table>

<a href="../routes/validarArea.php?x=<?php echo $idarea; ?>">Registrar nuevo proyecto</a>