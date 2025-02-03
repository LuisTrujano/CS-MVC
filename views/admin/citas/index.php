<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__formulario">
    <?php
        include_once __DIR__ . './../../templates/alertas.php';
    ?>
        <?php include_once __DIR__ . '/formulario.php'; ?>

        <input id="btnRegistrarCita" name="btnRegistrarCita" class="formulario__submit formulario__submit--registrar" type="submit" value="Registrar Cita">
</div>

<script src=https://cdn.jsdelivr.net/npm/sweetalert2@11></script>
