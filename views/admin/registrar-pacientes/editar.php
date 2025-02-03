<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>
<div class="dashboard__main">
    <div class="dashboard__formulario">
        <form method="POST" action="/admin/editar-pacientes" class="formulario">
            <?php include_once __DIR__ . '/formularioEditar.php'; ?>
            <input class="formulario__submit formulario__submit--registrar" type="submit" value="Editar Paciente">
        </form>

    </div>

    <div class="dashboard__respuesta">
        <?php
            include_once __DIR__ . './../../templates/alertas.php';
        ?>
    </div>

</div>