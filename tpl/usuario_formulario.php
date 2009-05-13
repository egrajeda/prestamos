<center>
  <form method="post" action="index.php?mod=usuario&act=agregar">
  <input type="hidden" name="backend" value="1" />

  <table class="form" cellpadding="8" cellspacing="0" border="0">
    	<tr>
      <td width="40%" align="right">Usuario:</td>
      <td width="60%">
        <input class="input" type="text" name="user" value="<?php echo $vista->user?>" />
      </td>
    </tr>
    <tr>
      <td width="40%" align="right">Password:</td>
      <td width="60%"><input class="input" type="password" name="clave" value="" />
      </td>
    </tr>    
	 <tr>
      <td width="40%" align="right">Confirmar Password:</td>
      <td width="60%"><input class="input" type="password" name="clave1" value="" />
      </td>
    </tr> 
	<tr>
      <td width="40%" align="right">Nombre:</td>
      <td width="60%">
        <input class="input" type="text" name="nombre" value="<?php echo $vista->nombre?>" />
      </td>
    </tr>
	<tr>
      <td width="40%" align="right">Apellido:</td>
      <td width="60%">
        <input class="input" type="text" name="apellido" value="<?php echo $vista->apellido?>" />
      </td>
    </tr>   
    <tr>
	      <td width="40%" align="right">Departamento:</td>
      <td width="60%">
        <input class="input" type="text" name="departamento" value="<?php echo $vista->departamento?>" />
      </td>
    </tr>                
    <tr>
      <td align="right">Nivel:</td>
      
	  <td>
         <select name="nivel">
<?php $m= array("normal","administrador","ambos") ?>
<?php for ($i = 0; $i<= 2; $i += 1) { ?>
<?php if ($m [$i]== $vista->nivel) { ?>
          <option value="<?php echo $i+1?>" selected="selected">
<?php } else { ?>
          <option value="<?php echo $i+1?>">
<?php } ?>
            <?php echo $m[$i]?>
          </option>
        <?php } ?> 
        </select>		
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
<?php if ($vista->error) { ?>
  <div class="error">
    <span><?php echo $vista->error ?></span>
  </div>        
<?php } ?>
</center>
</center>

