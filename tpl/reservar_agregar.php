<center>
  <form method="post" action="index.php?mod=reservar&act=agregar">
  <input type="hidden" name="backend" value="1" />
  <input id="fecha" type="hidden" name="fecha" value="" />
  <table class="form" cellpadding="8" cellspacing="0" border="0">
    <tr>
      <td width="40%" align="right">Descripción del uso:</td>
      <td width="60%">
        <input class="input" type="text" name="descripcion" value="" />
      </td>
    </tr>
    <tr>
      <td align="right">Hora de préstamo:</td>
      <td>
        <select name="hora_inicio">
<?php for($m = 420; $m <= 1200; $m += 30) { ?>
          <option value="<?php echo $m ?>">
            <?php echo date('h:i a', mktime(0, $m)) ?>
          </option>
<?php } ?>          
        </select>
      </td>
    </tr>        
    <tr>
      <td align="right">Hora de devolución:</td>
      <td>
        <select name="hora_final">
<?php for($m = 420; $m <= 1200; $m += 30) { ?>
          <option value="<?php echo $m ?>">
            <?php echo date('h:i a', mktime(0, $m)) ?>
          </option>
<?php } ?>          
        </select>
      </td>
    </tr>            
    <tr valign="top">
      <td align="right">Fecha:</td>
      <td>
        <div id="date">
      </td>
    </tr>                
    <tr valign="top">
      <td align="right">Equipo deseado:</td>
      <td>
        <div class="check1"><input type="checkbox" name="canon" />&nbsp;Cañon</div>
        <div class="check2"><input type="checkbox" name="laptop" />&nbsp;Laptop</div>
      </td>
    </tr>                
    <tr>
      <td align="right">Local:</td>
      <td><input class="input" type="text" name="local" value="" /></td>
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
