<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__formulario">
    <?php
        include_once __DIR__ . './../../templates/alertas.php';
    ?>
    <!-- <form method="POST" action="/admin/citas/crear" enctype="multipart/form-data" class="formulario"> -->
    <!-- <form class="formulario"> -->
        <?php include_once __DIR__ . '/formulario.php'; ?>

        <input id="btnRegistrarConsultaMedica" name="btnRegistrarConsultaMedica" class="formulario__submit formulario__submit--registrar" type="submit" value="Registrar Cita">
    <!-- </form> -->
</div>

<script src=https://cdn.jsdelivr.net/npm/sweetalert2@11></script>
