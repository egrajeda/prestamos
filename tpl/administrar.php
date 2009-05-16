<center>
  <a class="button" href="index.php?mod=equipo&act=agregar"><span>Agregar equipo</span></a> 
  <br /><br />
  <form method="post" action="index.php?mod=administrar">
  <input type="hidden" name="backend" value="1" />
  <table class="reporte" cellpadding="5" cellspacing="0" border="0">
    <tr class="cabecera">
      <td>Día</td>
      <td>Hora</td>
      <td>Escuela</td>
      <td>Docente</td>
      <td>Descripción del uso</td>
      <td>Cañon</td>
      <td>Laptop</td>
      <td>Local</td>
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
  <?php for ($dia = 0; $dia < 7; $dia++) { $a = false; ?>
    <?php $h = false; foreach ($vista->solicitudes[$dia] as $solicitud) { ?>
<?php if ($h) { ?>
    <tr class="h">  
<?php } else { ?>
    <tr>
<?php } ?>
      <?php if (!$a) { $a = true; ?>
      <td class="dia" align="center" rowspan="<?php echo count($vista->solicitudes[$dia])*3 ?>">
        <?php echo $vista->dias[$dia] ?>
      </td>
      <?php } ?>        
      <td align="center">
        <?php echo date('h:i a', strtotime($solicitud['hora_prestamo'])) ?>
        &mdash;
        <?php echo date('h:i a', strtotime($solicitud['hora_devolucion'])) ?>        
      </td>        
      <td align="center"><?php echo ucfirst($solicitud['departamento']) ?></td>
      <td align="center"><?php echo $solicitud['usuario'] ?></td>
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
      </td>
    </tr>
<?php if ($h) { ?>
    <tr class="h">  
<?php } else { ?>
    <tr>
<?php } $h = !$h; ?>
      <td colspan="5" align="right">Asignar laptop:</td>
      <td colspan="2">
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
</center>
<br />
