<center>
  <div class="semana"> 
    Semana del <?php echo $vista->dia_inicial ?> al
    <?php echo $vista->dia_final ?> de <?php echo $vista->mes_final ?>
  </div>
  <table class="reporte" cellpadding="5" cellspacing="0" border="0">
    <tr class="cabecera">
      <td width="12%">Día</td>
      <td width="20%">Hora</td>
      <td width="35%">Descripción del uso</td>
      <td width="9%">Cañon</td>
      <td width="9%">Laptop</td>
      <td width="15%">Local</td>
    </tr>
  <?php if ($vista->vacio) { ?>
    <tr>
      <td colspan="6" align="center">
        <div class="advertencia">
          <span>No existe registro de ninguna solicitud para esta semana.</span>
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
        <?php echo date('h:i a', strtotime($solicitud['hora_prestamo'])) ?>
        &mdash;
        <?php echo date('h:i a', strtotime($solicitud['hora_devolucion'])) ?>        
      </td>        
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
      <td colspan="3" align="right">Cañon asignado:</td>
      <td colspan="2">
        <?php if ($solicitud['id_canon']) { ?>
          <span class="si">Si</span>
        <?php } else { ?>
          <span class="no">No</span>
        <?php } ?>
      </td>
    </tr>
<?php if ($h) { ?>
    <tr class="h">  
<?php } else { ?>
    <tr>
<?php } $h = !$h; ?>
      <td colspan="3" align="right">Laptop asignada:</td>
      <td colspan="2">
        <?php if ($solicitud['id_laptop']) { ?>
          <span class="si">Si</span>
        <?php } else { ?>
          <span class="no">No</span>
        <?php } ?>      
      </td>
    </tr>
    <?php } ?>
  <?php } ?>
  </table>
</center>
<br />
