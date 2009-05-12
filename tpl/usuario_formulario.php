<center>
  <form method="post" action="index.php?mod=usuario&act=agregar">
  <input type="hidden" name="backend" value="1" />
  <table class="form" cellpadding="8" cellspacing="0" border="0">
    	<tr>
      <td width="40%" align="right">Usuario:</td>
      <td width="60%">
        <input class="input" type="text" name="user" value="<?php echo @$vista->user?>" />
      </td>
    </tr>
    <tr>
      <td width="40%" align="right">Contraseña:</td>
      <td width="60%"><input class="input" type="password" name="clave" value="" />
      </td>
    </tr>    
	 <tr>
      <td width="40%" align="right">Confirmar contraseña:</td>
      <td width="60%"><input class="input" type="password" name="clave1" value="" />
      </td>
    </tr> 
	<tr>
      <td width="40%" align="right">Nombre:</td>
      <td width="60%">
        <input class="input" type="text" name="nombre" value="<?php echo @$vista->nombre?>" />
      </td>
    </tr>
	<tr>
      <td width="40%" align="right">Apellido:</td>
      <td width="60%">
        <input class="input" type="text" name="apellido" value="<?php echo @$vista->apellido?>" />
      </td>
    </tr>   
    <tr>
	      <td width="40%" align="right">Escuela:</td>
      <td width="60%">
        <input class="input" type="text" name="departamento" value="<?php echo @$vista->departamento?>" />
      </td>
    </tr>                
    <tr valign="top">
      <td align="right">Roles:</td>  	  <td>
        <div class="check1">
<?php if (@$vista->nivel_normal) { ?>
          <input type="checkbox" name="nivel_normal" checked="checked" />
<?php } else { ?>        
          <input type="checkbox" name="nivel_normal" />          
<?php } ?>          
        Normal</div>
        <div class="check2">
<?php if (@$vista->nivel_admin) { ?>        
          <input type="checkbox" name="nivel_admin" checked="checked" />        
<?php } else { ?>          
          <input type="checkbox" name="nivel_admin" />
<?php } ?>          
        Administrador</div>  	  
      </td>
    </tr>     
	<tr>
      <td></td>
      <td>
        <span class="button">
          <button type="submit" >Agregar usuario</button>
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
</center>

