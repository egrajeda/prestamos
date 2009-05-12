<center>
<a class="button" href="index.php?mod=equipo&act=agregar"><span>Agregar equipo</span></a> 
<br /><br />
<table class="reporte" cellpadding="5" cellspacing="0" border="0" style="width: 30%">
  <tr class="cabecera">
    <td width="50%">Nombre</td>
    <td width="50%">&nbsp;</td>
  </tr>
<?php if (!$vista->equipos) { ?>
  <tr>
    <td colspan="2" align="center">
      <div class="advertencia">
        <span>No existe ningún equipo registrado.</span>
      </div>          
    </td>
  </tr>
<?php } ?>  
<?php $h = false; foreach($vista->equipos as $equipo) { ?>  
<?php if ($h) { ?>
  <tr class="h">  
<?php } else { ?>
  <tr>
<?php } $h = !$h; ?>
    <td align="center"><?php echo $equipo['nombre'] ?></td>
    <td align="center">    
      <a class="button" href="index.php?mod=equipo&act=eliminar&id=<?php echo $equipo['id_equipo'] ?>"><span>Eliminar</span></a>  
    </td>
  </tr>  
<?php } ?>  
</table>
</center>
<br />
