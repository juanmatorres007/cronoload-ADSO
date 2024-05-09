<style>
    input[type=text] {
        padding: 10px;
        width: 250px;
    }

    select {
        padding: 10px;
        width: 250px;
    }
</style>

<?php

if(!isset($roles)){
    $roles = array();
}
?>

<div class="registerContent">
    <form action="../routes/user.php" method="POST">
        <h2>Formulario de Registro</h2>

        <label><strong>Nombre: </strong></label>
        <input type="text" name="name_user" placeholder="Ingrese su Nombre"><br><br>

        <label><strong>Apellido: </strong></label>
        <input type="text" name="lastname_user" placeholder="Ingrese su Apellido"><br><br>

        <label><strong>Tipo de documento: </strong></label>
        <select name="type_id_user">
            <option value="1">CC</option>
            <option value="2">TI</option>
        </select><br><br>

        <label><strong>Número de identidad: </strong></label>
        <input type="number" name="munber_id_user" placeholder="Ingrese Numero de Identidad"><br><br>

        <!-- <label><strong>Rol: </strong></label>
        <select name="rol" id="rolSelect">
            <option value="Aprendiz">Aprendiz</option>
            <option value="Instructor">Instructor</option>
            <option value="coordinador">Coordinador</option>
            <option value="administrador">Administrador</option>
        </select><br><br> -->
        <?php var_dump($roles); ?>
        <label><strong>Rol: </strong></label>
        <select name="rol">
            <?php foreach ($roles as $rol) { ?>
                <option value="<?php echo $rol; ?>"><?php echo $rol; ?></option>
                
            <?php } ?>
        </select><br><br>

        <div id="optionsForInstructor" style="display: none;">
            <div id="tipoContratoDiv">
                <label><strong>Tipo de contrato: </strong></label>
                <select id="tipoContratoSelect" name="tcontrato">
                    <option value="1">Planta</option>
                    <option value="2">Contratista</option>
                </select>
            </div><br>

            <label><strong>Fecha inicial de contrato: </strong></label>
            <input type="date" id="fechaInicio" name="FI"><br><br>

            <label><strong>Fecha de finalización de contrato: </strong></label>
            <input type="date" id="fechaFin" name="FF"><br><br>

            <label><strong>Area de conocimiento: </strong></label>
            <input type="text" name="id_know_user" placeholder="Ingrese are de conocimiento"><br><br>

            <label><strong>Nivel formativo: </strong></label>
            <input type="text" name="id_information_lvl_user" placeholder="Ingrese nivel formativo"><br><br>
        </div>
        <button type="submit">Registrar</button>
    </form>
</div>