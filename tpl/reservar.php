<center>
<?php if (!isset($vista->otrodia)) { ?>
  <a class="button" href="index.php?mod=reservar&act=agregar"><span>Agregar equipo</span></a> 
<?php } else { ?>  
  <del class="button"><span>Agregar equipo</span></del>
<?php } ?>  
<a class="button" href="index.php?mod=reservar&act=informe"><span>Informe pasado</span></a>
<br /><br />
<table class="reporte" cellpadding="5" cellspacing="0" border="0">
  <tr class="cabecera">
    <td width="25%">Descripción del uso</td>
    <td width="20%">Rango de hora</td>
    <td width="10%">Fecha</td>
    <td width="5%">Cañon</td>
    <td width="5%">Laptop</td>
    <td width="12%">Local</td>
    <td width="23%">&nbsp;</td>
  </tr>
<?php if (isset($vista->otrodia)) { ?>
  <tr>
    <td colspan="7" align="center">
      <div class="advertencia">
        <span>Solamente puede manejar solicitudes los dias <b>viernes</b> y <b>sábados</b>.</span>
      </div>          
    </td>
  </tr>
<?php } elseif (!$vista->solicitudes) { ?>
  <tr>
    <td colspan="7" align="center">
      <div class="advertencia">
        <span>No ha creado ninguna solicitud para la semana entrante.</span>
      </div>          
    </td>
  </tr>
<?php } ?>  
<?php $h = false; foreach($vista->solicitudes as $solicitud) { ?>  
<?php if ($h) { ?>
  <tr class="h">  
<?php } else { ?>
  <tr>
<?php } $h = !$h; ?>
    <td align="center"><?php echo $solicitud['descripcion'] ?></td>
    <td align="center">
      <?php echo date('h:i a', strtotime($solicitud['hora_prestamo'])) ?>
      &mdash;
      <?php echo date('h:i a', strtotime($solicitud['hora_devolucion'])) ?>
    </td>
    <td align="center"><?php echo date('d/m/Y', strtotime($solicitud['fecha_reserva'])) ?></td>
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
    <td align="center">    
      <a class="button" href="index.php?mod=reservar&act=modificar&id=<?php echo $solicitud['id_reserva'] ?>"><span>Modificar</span></a>
      <a class="button" href="index.php?mod=reservar&act=eliminar&id=<?php echo $solicitud['id_reserva'] ?>"><span>Eliminar</span></a>  
    </td>
  </tr>  
<?php } ?>  
</table>
</center>
<br />
