<center>
  <form method="post" action="index.php?mod=equipo&act=agregar">
  <input type="hidden" name="backend" value="1" />
  <table class="form" cellpadding="8" cellspacing="0" border="0">
    <tr valign="top">
      <td width="40%" align="right">Tipo:</td>
      <td width="60%">
		<div class="check1">
<?php if (@$vista->clase != 'laptop') { ?>
          <input type="radio" name="clase" value="canon" checked="checked" />
<?php } else { ?>        
          <input type="radio" name="clase" value="canon" />          
<?php } ?>          
        Cañon</div>
        <div class="check2">
<?php if (@$vista->clase == 'laptop') { ?>        
          <input type="radio" name="clase" value="laptop" checked="checked" />        
<?php } else { ?>          
          <input type="radio" name="clase" value="laptop" />
<?php } ?>          
        Laptop</div>
      </td>
    </tr>      	          
    <tr>
      <td align="right">Numero:</td>
      <td><input class="input" type="text" name="identificacion" value="<?php echo @$vista->identificacion ?>" /></td>
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
<?php if (@$vista->error) { ?>
  <div class="error">
    <span><?php echo $vista->error ?></span>
  </div>        
<?php } ?>
</center>


