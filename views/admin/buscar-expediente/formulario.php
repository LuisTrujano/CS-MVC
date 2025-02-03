<fieldset class="formulario__fieldset">
    <div class="formulario__campo consultorios">
        <label for="Expediente" class="formulario__label">Numero de Expediente</label>
        <input 
            type="text"
            class="formulario__input"
            id="Expediente"
            name="Expediente"
            value="<?php echo $paciente->Expediente ?? ''; ?>"
        >
    </div>
</fieldset>