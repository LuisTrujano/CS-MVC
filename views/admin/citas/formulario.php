
<fieldset class="formulario__fieldset">
<!-- <div class="formulario__campo consultorios" id="consultorios"> -->
    <div class="formulario__campo>
        <label for="Nombre" class="formulario__label">Nombre</label>
        <?php
        echo '<h3>' . $paciente->Nombre .' ' . $paciente->ApellidoP .  ' ' . $paciente->ApellidoM . '</h3>';
        ?>
        <input
            type="hidden"
            class="formulario__input"
            id="Nombre"
            name="Nombre"
            value="<?php echo $paciente->Nombre ?? ''; ?>"
        >
        <input
            type="hidden"
            class="formulario__input"
            id="ApellidoP"
            name="ApellidoP"
            value="<?php echo $paciente->ApellidoP ?? ''; ?>"
        >
        <input
            type="hidden"
            class="formulario__input"
            id="ApellidoM"
            name="ApellidoM"
            value="<?php echo $paciente->ApellidoM ?? ''; ?>"
        >
        <input
            type="hidden"
            class="formulario__input"
            id="Edad"
            name="Edad"
            value="<?php echo $edad ?? ''; ?>"
        >
        <input
            type="hidden"
            class="formulario__input"
            id="Expediente"
            name="Expediente"
            value="<?php echo $paciente->Expediente ?? ''; ?>"
        >
    </div>
    <div class="formulario__campo" id="consultorios">
    <label for="Consultorio" class="formulario__label">Consultorio</label>
    </div>

    <div class="formulario__campo">
        <label for="fechaCita" class="formulario__label">Fecha</label>
        <input
            id="fechaCita"
            type="date"
            class="formulario__input"
        >
    </div>

    <div class="formulario__campo">
        <label for="hora" class="formulario__label">Hora</label>
        <input
            id="hora"
            type="time"
            class="formulario__input"
        >
    </div>

    <label for="razones">Frecuencia de Visita</label>
    <div id="opciones-marcables" class="formulario__opciones">
        <label>
        <input
            id="radio"
            type="radio"
            name="visita"
            value="PrimeraVez"
        > Primera Vez
        </label>
        <label>
        <input 
            id="radio"
            type="radio"
            name="visita"
            value="Subsecuente"
        > Subsecuente
        </label>
    </div>

    <label for="razones">Razones de Visita:</label>
    

    <div class="formulario__opciones">
        <label>
            <input type="checkbox" name="hipertension" value="si"> Hipertensión
        </label>
         <label>
            <input type="checkbox" name="diabetes" value="si"> Diabetes
        </label><br>
        <label>
            <input type="checkbox" name="embarazo" value="si"> Embarazo
        </label>
        <label>
            <input type="checkbox" name="enfRespiratorias" value="si"> Enfer.Respiratorias (IRA)
        </label>
        <br>
         <label>
            <input type="checkbox" name="EDAS" value="si"> EDAS
        </label>
    </div>
    <div class="formulario__campo">
        <label for="otros">Otros</label>
        <input 
            type="text"
            name="Otros"
            id="otros"
            class="formulario__input"
        >
    </div>
</fieldset>


