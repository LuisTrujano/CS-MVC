<fieldset class="formulario__fieldset">
    <div class="formulario__campo">
        <h2>¿Estas seguro de continuar? Esta accion es irreversible</h2>
        <input
            type="hidden"
            class="formulario__input"
            id="id"
            name="id"
            placeholder="id"
            value="<?php echo $paciente->id ?? ''; ?>"
        >
        
</fieldset>
