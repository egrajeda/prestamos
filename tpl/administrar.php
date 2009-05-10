<center>
  <form method="post" action="index.php?mod=administrar">
  <input type="hidden" name="backend" value="1" />
  <table class="reporte" cellpadding="5" cellspacing="0" border="0">
    <tr class="cabecera">
      <td width="12%">Día</td>
      <td width="20%">Hora</td>
      <td width="11%">Escuela</td>
      <td width="11%">Docente</td>
      <td width="22%">Descripción del uso</td>
      <td width="7%">Cañon</td>
      <td width="7%">Laptop</td>
      <td width="10%">Local</td>      
    </tr>
  <?php if ($vista->vacio) { ?>
    <tr>
      <td colspan="8" align="center">
        <div class="advertencia">
          <span>No existe ninguna solicitud para esta semana.</span>
        </div>          
      </td>
    </tr>
  <?php } ?>  
  <?php $h = false; for ($dia = 0; $dia < 7; $dia++) { $a = false; ?>
    <?php foreach ($vista->solicitudes[$dia] as $solicitud) { ?>
<?php if ($h) { ?>
    <tr class="h">  
<?php } else { ?>
    <tr>
<?php } ?>
      <?php if (!$a) { $a = true; ?>
      <td class="dia" align="center" rowspan="<?php echo count($vista->solicitudes[$dia])*3 ?>" style="background: #fff">
        <?php echo $vista->dias[$dia] ?>
      </td>
      <?php } ?>        
      <td align="center">
        <input type="hidden" name="fecha[<?php echo $solicitud['id_reserva'] ?>]" value="<?php echo $solicitud['fecha_reserva'] ?>" />
        <input type="hidden" name="hora_inicio[<?php echo $solicitud['id_reserva'] ?>]" value="<?php echo $solicitud['hora_prestamo'] ?>" />
        <input type="hidden" name="hora_final[<?php echo $solicitud['id_reserva'] ?>]" value="<?php echo $solicitud['hora_devolucion'] ?>" />
        <?php echo date('h:i a', strtotime($solicitud['hora_prestamo'])) ?>
        &mdash;
        <?php echo date('h:i a', strtotime($solicitud['hora_devolucion'])) ?>        
      </td>        
      <td align="center"><?php echo ucfirst($solicitud['departamento']) ?></td>
      <td align="center"><?php echo $solicitud['nombre'] . ' ' . $solicitud['apellido'] ?></td>
      <td align="center"><?php echo $solicitud['descripcion'] ?></td>
      <td align="center">
        <?php if($solicitud['canon']) { ?>
          <input type="checkbox" checked="checked" disabled="disabled" />
        <?php } else { ?>
          <input type="checkbox" disabled="disabled" />
        <?php } ?>    
      </td>
      <td align="center">
        <?php if($solicitud['laptop']) { ?>
          <input type="checkbox" checked="checked" disabled="disabled" />
        <?php } else { ?>
          <input type="checkbox" disabled="disabled" />
        <?php } ?>        
      </td>
      <td align="center"><?php echo $solicitud['aula'] ?></td>      
    </tr>
<?php if ($h) { ?>
    <tr class="h">  
<?php } else { ?>
    <tr>
<?php }?>
      <td colspan="5" align="right">Asignar cañon:</td>
      <td colspan="2">
        <?php if (isset($vista->conflictosCanon[$solicitud['id_reserva']])) { ?>
        <span class="conflicto">        
        <?php } else { ?>
        <span>
        <?php } ?>           
        <select name="canon[<?php echo $solicitud['id_reserva'] ?>]">
          <option value="-1">- Sin asignar -</option>
          <?php foreach ($vista->canones as $canones) { ?>
          <?php if ($canones['id_equipo'] == $solicitud['id_canon']) { ?>
          <option value="<?php echo $canones['id_equipo'] ?>" selected="selected">          
          <?php } else { ?>                    
          <option value="<?php echo $canones['id_equipo'] ?>">
          <?php } ?>          
            <?php echo $canones['nombre'] ?>
          </option>
          <?php } ?>         
        </select>      
        </span>
      </td>
    </tr>
<?php if ($h) { ?>
    <tr class="h">  
<?php } else { ?>
    <tr>
<?php } $h = !$h; ?>
      <td colspan="5" align="right">Asignar laptop:</td>
      <td colspan="2">
        <?php if (isset($vista->conflictosLaptop[$solicitud['id_reserva']])) { ?>
        <span class="conflicto">        
        <?php } else { ?>
        <span>
        <?php } ?>     
        <select name="laptop[<?php echo $solicitud['id_reserva'] ?>]">
          <option value="-1">- Sin asignar -</option>
          <?php foreach ($vista->laptops as $laptops) { ?>
          <?php if ($laptops['id_equipo'] == $solicitud['id_laptop']) { ?>
          <option value="<?php echo $laptops['id_equipo'] ?>" selected="selected">          
          <?php } else { ?>                    
          <option value="<?php echo $laptops['id_equipo'] ?>">
          <?php } ?>         
            <?php echo $laptops['nombre'] ?>
          </option>
          <?php } ?>         
        </select>  
        </span>
      </td>
    </tr>
    <?php } ?>
  <?php } ?>
  </table>
  <br />
  <?php if (isset($vista->otrodia)) { ?>
  <del class="button"><span>Guardar modificaciones</span></del>
  <?php } else { ?>  
  <span class="button">
    <button type="submit" value="Guardar modificaciones">Guardar modificaciones</button>
  </span>
  <?php } ?>
  </form>
<?php if (@$vista->error) { ?>
  <div class="error">
    <span><?php echo $vista->error ?></span>
  </div>        
<?php } ?>        
</center>
<br />
