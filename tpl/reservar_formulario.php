<center>
  <form method="post" action="index.php?mod=reservar&act=<?php echo $vista->accion ?>">
  <input type="hidden" name="backend" value="1" />
  <input type="hidden" name="id" value="<?php echo $vista->id ?>" />
  <input id="fini" type="hidden" value="<?php echo $vista->fecha_inicial ?>" />
  <input id="ffin" type="hidden" value="<?php echo $vista->fecha_final ?>" />  
  <input id="fecha" type="hidden" name="fecha" value="<?php echo $vista->fecha ?>" />
  <table class="form" cellpadding="8" cellspacing="0" border="0">
    <tr>
      <td width="40%" align="right">Descripción del uso:</td>
      <td width="60%">
        <input class="input" type="text" name="descripcion" value="<?php echo @$vista->descripcion ?>" />
      </td>
    </tr>
    <tr>
      <td align="right">Hora de préstamo:</td>
      <td>
        <select name="hora_inicio">
<?php for ($m = 420; $m <= 1200; $m += 30) { ?>
<?php if ($m == $vista->hora_inicio) { ?>
          <option value="<?php echo $m ?>" selected="selected">
<?php } else { ?>
          <option value="<?php echo $m ?>">
<?php } ?>
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
<?php for ($m = 420; $m <= 1200; $m += 30) { ?>
<?php if ($m == $vista->hora_final) { ?>
          <option value="<?php echo $m ?>" selected="selected">
<?php } else { ?>
          <option value="<?php echo $m ?>">
<?php } ?>
            <?php echo date('h:i a', mktime(0, $m)) ?>
          </option>
<?php } ?>          
        </select>
      </td>
    </tr>            
    <tr valign="top">
      <td align="right">Fecha:</td>
      <td>
        <div id="date"></div>
      </td>
    </tr>                
    <tr valign="top">
      <td align="right">Equipo deseado:</td>
      <td>
        <div class="check1">
<?php if (@$vista->canon) { ?>
          <input type="checkbox" name="canon" checked="checked" />
<?php } else { ?>        
          <input type="checkbox" name="canon" />          
<?php } ?>          
        Cañon</div>
        <div class="check2">
<?php if (@$vista->laptop) { ?>        
          <input type="checkbox" name="laptop" checked="checked" />        
<?php } else { ?>          
          <input type="checkbox" name="laptop" />
<?php } ?>          
        Laptop</div>
      </td>
    </tr>                
    <tr>
      <td align="right">Local:</td>
      <td><input class="input" type="text" name="local" value="<?php echo @$vista->local ?>" /></td>
    </tr>                    
    <tr>
      <td></td>
      <td>
        <span class="button">
          <button type="submit" value="<?php echo $vista->boton ?>"><?php echo $vista->boton ?></button>
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
