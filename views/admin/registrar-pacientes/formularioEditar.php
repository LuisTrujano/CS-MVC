<fieldset class="formulario__fieldset">
    <div class="formulario__campo">
        <input
            type="hidden"
            class="formulario__input"
            id="id"
            name="id"
            placeholder="id"
            value="<?php echo $paciente->id ?? ''; ?>"
        >
        <label for="Nombre" class="formulario__label">Nombre</label>
        <input
            type="text"
            class="formulario__input"
            id="Nombre"
            name="Nombre"
            placeholder="Nombre"
            value="<?php echo $paciente->Nombre ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="ApellidoP" class="formulario__label">Apellido Paterno</label>
        <input
            type="text"
            class="formulario__input"
            id="ApellidoP"
            name="ApellidoP"
            placeholder="Apellido Paterno"
            value="<?php echo $paciente->ApellidoP ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="ApellidoM" class="formulario__label">Apellido Materno</label>
        <input
            type="text"
            class="formulario__input"
            id="ApellidoM"
            name="ApellidoM"
            placeholder="Apellido Materno"
            value="<?php echo $paciente->ApellidoM ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="Edad" class="formulario__label">Fecha de Nacimiento</label>
        <input
            type="date"
            class="formulario__input"
            id="Edad"
            name="Edad"
            placeholder="Fecha de Nacimiento"
            value="<?php echo $paciente->Edad ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="Calle" class="formulario__label">Calle</label>
        <input
            type="text"
            class="formulario__input"
            id="Calle"
            name="Calle"
            placeholder="Calle"
            value="<?php echo $paciente->Calle ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="Telefono" class="formulario__label">Teléfono</label>
        <input
            type="text"
            class="formulario__input"
            id="Telefono"
            name="Telefono"
            placeholder="Telefono"
            value="<?php echo $paciente->Telefono ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="CURP" class="formulario__label">CURP</label>
        <input
            type="text"
            class="formulario__input"
            id="CURP"
            name="CURP"
            placeholder="CURP"
            maxlength="18"
            value="<?php echo $paciente->CURP ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="Expediente" class="formulario__label">Expediente</label>
        <input
            type="text"
            class="formulario__input"
            id="Expediente"
            name="Expediente"
            placeholder="Expediente"
            value="<?php echo $paciente->Expediente ?? ''; ?>">
    </div>
</fieldset>
