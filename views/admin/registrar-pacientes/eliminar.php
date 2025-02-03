<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>
<div class="dashboard__main">
    <div class="dashboard__formulario">
        <form method="POST" action="/admin/eliminar-paciente" class="table__formulario">
            <h3>¿Estas seguro de continuar? Esta acción es irrerversible</h3>
            <input type="hidden" name="id" value="<?php echo $paciente->id; ?>">
            <button class="table__accion--eliminar-cita" type="submit">
            <i class="fa-solid fa-circle-xmark"></i>
                Eliminar
            </button>
            <a class="formulario__submit" href="/admin/buscar-expediente">Cancelar</a>
        </form>
        
    </div>

    <div class="dashboard__respuesta">
        <?php
            include_once __DIR__ . './../../templates/alertas.php';
        ?>
    </div>

</div>