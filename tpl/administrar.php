<center>
  <a class="button" href="index.php?mod=equipo&act=agregar"><span>Agregar equipo</span></a> 
  <br /><br />
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
          <span>No ha creado ninguna solicitud para esta semana.</span>
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
      <td></td>
      <td></td>
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
        <select>
          <option>- Sin asignar -</option>
          <option>Cañon A</option>
          <option>Cañon B</option>
          <option>Cañon C</option>          
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
        <select>
          <option>- Sin asignar -</option>
          <option>Laptop 1</option>
          <option>Laptop 2</option>
          <option>Laptop 3</option>          
        </select>           
      </td>
    </tr>
    <?php } ?>
  <?php } ?>
  </table>
  <a class="button" href="index.php?mod=administrar&act=modificar">
    <span>Guardar modificaciones</span>
  </a>          
</center>
<br />
