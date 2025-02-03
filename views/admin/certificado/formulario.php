
<fieldset class="formulario__fieldset">
    <div class="formulario__campo">
        <label class="formulario__label">Nombre</label>
        <input
            type="text"
            class="formulario__input"
            id="Nombre"
            name="Nombre"
        >
        <label for="ApellidoP" class="formulario__label">Apellido Paterno</label>
        <input
            type="text"
            class="formulario__input"
            id="ApellidoP"
            name="ApellidoP"
        >
        <label for="ApellidoM" class="formulario__label">Apellido Materno</label>
        <input
            type="text"
            class="formulario__input"
            id="ApellidoM"
            name="ApellidoM"
        >
        <label for="Edad" class="formulario__label">Edad</label>
        <input
            type="text"
            class="formulario__input"
            id="Edad"
            name="Edad"
        >

        <div class="formulario__campo" id="consultorios">
        <label for="Consultorio" class="formulario__label">Consultorio</label>
        </div>

        <label for="consul">Motivo de Certificado:</label>
                <select name="otros" id="otros" class="otros">
                  <option value=""></option>
                  <option value="PREESCOLAR">PREESCOLAR</option>
                  <option value="PRIMARIA">PRIMARIA</option>
                  <option value="SECUNDARIA">SECUNDARIA</option>
                  <option value="PREPARATORIA ">PREPARATORIA</option>
                  <option value="UNIVERSIDAD ">UNIVERSIDAD</option>
                  <option value="LABORAL">LABORAL</option>
                  <option value="DEPORTIVO">DEPORTIVO</option>
                  <option value="DISCAPACIDAD">DISCAPACIDAD</option>
                  <option value="OTRAS">OTRAS</option>
                  <!-- Agrega más opciones según tus necesidades -->
              </select>
        <input
            id="fechaConsulta"
            type="hidden"
            class="formulario__input"
            value="<?php echo date('Y-m-d'); ?>"
        >

        <?php
        date_default_timezone_set('America/Mexico_City');
         ?>
        <input
            id="horaConsulta"
            type="hidden"
            class="formulario__input"
            value="<?php echo date('H:i:s'); ?>"
        >
    </div>


</fieldset>


