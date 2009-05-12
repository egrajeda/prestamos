
   <center>
  <form method="post" action="index.php?mod=equipo&act=agregar">
  <input type="hidden" name="backend" value="1" />



  <table class="form" cellpadding="8" cellspacing="0" border="0">
    <tr>
      <td width="40%" align="right">Marca:</td>
      <td width="60%">
        <input class="input" type="text" name="marca" value="<?php echo $vista->marca ?>" />
      </td>
    </tr>
    <tr valign="top">
      <td align="right">Equipo:</td>
      <td>

<?php if ($vista->clase) { ?>
          <input type="checkbox" name="clase" checked="checked" />
<?php } else { ?>        
          <input type="checkbox" name="clases" />          
<?php } ?>          
        Cañon

<?php if ($vista->clase) { ?>        
          <input type="checkbox" name="clase" checked="checked" />        
<?php } else { ?>          
          <input type="checkbox" name="clase" />
<?php } ?>          
        Laptop
      </td>
    </tr>      
	          
    <tr>
      <td align="right">Serial:</td>
      <td><input class="input" type="text" name="identificacion" value="<?php echo $vista->identificacion ?>" /></td>
    </tr>                    
    <tr>
      <td></td>
      <td>
        <span class="button">
          <button type="submit" value="Iniciar sesión">Agregar equipo</button>
        </span>
      </td>
    </tr>
  </table>
  </form>
<?php if ($vista->error) { ?>
  <div class="error">
    <span><?php echo $vista->error ?></span>
  </div>        
<?php } ?>
</center>

