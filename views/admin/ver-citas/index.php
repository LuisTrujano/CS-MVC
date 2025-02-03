<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>
<div class="dashboard__main">
    <div class="dashboard__formulario consultorios">
        <form method="POST" action="/admin/ver-citas" class="formulario">
            <?php include_once __DIR__ . '/formulario.php'; ?>
            <input class="formulario__submit formulario__submit--registrar" type="submit" value="Buscar">
        </form>

    </div>

    <div class="dashboard__respuesta">
        <?php
            include_once __DIR__ . './../../templates/alertas.php';
        ?>
    </div>

</div>

<div class="dashboard__contenedor">
    <?php if(!empty($citas)){ ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Número</th>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Edad</th>
                    <th scope="col" class="table__th">Consultorio</th>
                    <th scope="col" class="table__th">Fecha y Hora</th>
                    <th scope="col" class="table__th">Expediente</th>
                    <th scope="col" class="table__th-acostado">Primer Visita</th>
                    <th scope="col" class="table__th-acostado">Subsecuente</th>
                    <th scope="col" class="table__th-acostado">Embarazo</th>
                    <th scope="col" class="table__th-acostado">Hipertensión</th>
                    <th scope="col" class="table__th-acostado">Diabete</th>
                    <th scope="col" class="table__th-acostado">Respiratorio(IRA)</th>
                    <th scope="col" class="table__th-acostado">EDAS</th>
                    <th scope="col" class="table__th-acostado">Certificado Médico</th>
                    <th scope="col" class="table__th-acostado">Otros</th>
                    <th scope="col" class="table__th"></th>

                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php 
                $numero = 1;
                foreach($citas as $cita)  { 
                ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $numero++; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $cita->Nombre . " " . $cita->ApellidoP . " " . $cita->ApellidoM ; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $cita->Edad; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $cita->Consultorio; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $cita->Fecha . "<br>" . $cita->Hora; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $cita->Expediente; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $cita->PrimerVisita; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $cita->Subsecuente; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $cita->Embarazo; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $cita->Hipertension; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $cita->Diabetes; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $cita->Respiratorio; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $cita->EDAS; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $cita->CertificadoMedico; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $cita->Otros; ?>
                        </td>

                        <td class="table__td--acciones">
                            <form method="POST" action="/admin/ver-citas/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $cita->id; ?>">
                                <button class="table__accion table__accion--eliminar" type="submit">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                 <?php  }?>   
            </tbody>
        </table>
    <?php } else { ?>
        <p class="text-center">No Hay Citas Aún</p>
    <?php } ?>
</div>
