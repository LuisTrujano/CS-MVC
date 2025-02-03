<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>
<div class="dashboard__main">
    <div class="dashboard__formulario">
        <form method="POST" action="/admin/buscar-expediente" class="formulario">
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
    <?php if(!empty($expedientes)){ ?>
                <?php 
                 foreach($expedientes as $expediente)  { 

                $fechaNacimiento = $expediente->Edad;
                //Calcula la diferencia entre las fechas
                $fechaNacimiento = new DateTime($fechaNacimiento);
                $hoy = new DateTime();
                $diferencia = $hoy->diff($fechaNacimiento);
            
                $anios = $diferencia->y;
                $meses = $diferencia->m;
                $dias = $diferencia->d;
            
                //Mostrar la edad calculada
                $edadCalculada = ($anios > 0) ? $anios .' años': (($meses > 0) ? $meses .' meses' : $dias . ' dias');
                ?>
                <table class="my-table resultado--expediente">
            <tr>
                <th class="color" colspan="4">Expediente:</th>
                <th class="color" colspan="2"><span><?php echo $expediente->Expediente ?></span></th>
            </tr>
            <tr>
                <td colspan="2"><span><?php echo $expediente->ApellidoP ?></span></td>
                <td colspan="2"><span><?php echo $expediente->ApellidoM ?></span></td>
                <td colspan="2"><span><?php echo $expediente->Nombre ?></span></td>
            </tr>
            <tr>
                <td class="color" colspan="2">Apellido Paterno:</td>
                <td class="color" colspan="2">Apellido Materno:</td>
                <td class="color" colspan="2">Nombre:</td>
            </tr>
            <tr>
            <td class="color" colspan="1">Fecha de Nacimiento:</td>
            <td colspan="3"><span><?php echo $expediente->Edad ?></span></td>
            <td class="color" colspan="1">Edad:</td>
            <td colspan="3"><span><?php echo $edadCalculada ?></span></td>
            </tr>
            <tr>
                <td class="color" colspan="1">CURP:</td>
                <td colspan="3"><span><?php echo $expediente->CURP ?></span></td>
                <td class="color" colspan="1">Teléfono:</td>
                <td colspan="3"><span><?php echo $expediente->Telefono ?></span></td>
            </tr>
            <tr>
                <td class="color" colspan="2">Calle:</td>
                <td colspan="4"><span id="resultadoCalle"><?php echo $expediente->Calle ?></span></td>
            </tr>
            <!-- <tr>
                <td class="color" colspan="2">Ultima Visita Registrada:</td>
                <td colspan="4"><span id="resultadoVisita">></span></td>
            </tr> -->
            <td colspan="6" align="center">
                <a class="formulario__submit" href="/admin/citas?id=<?php echo $expediente->id; ?>&edad=<?php echo $edadCalculada; ?>">AGENDAR CITA</a>
                <a class="formulario__submit" href="/admin/consultas?id=<?php echo $expediente->id; ?>&edad=<?php echo $edadCalculada; ?>">ASIGNAR TURNO PARA CONSULTA MEDICA</a>
                <a class="formulario__submit" href="/admin/editar-pacientes?id=<?php echo $expediente->id;?>">EDITAR INFORMACION</a> 
                <!-- <br>
                <form method="POST" action="/admin/eliminar-paciente">
                                <input type="hidden" name="id" value="<?php echo $expediente->id; ?>">
                                <button class="table__accion--eliminar-cita" type="submit">
                                    Eliminar
                                </button>
                </form> -->
                <a class="table__accion--eliminar-cita" href="/admin/eliminar-paciente?id=<?php echo $expediente->id;?>">ELIMINAR PACIENTE</a>  
            </td>
        </table>
        <br><br><br>

    <?php } ?>
        <!-- <p class="text-center">No Hay Citas Aún</p> -->
    <?php }?>
    
</div>
