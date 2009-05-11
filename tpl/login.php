<center>
  <form id="form" method="post" action="index.php">
  <input type="hidden" name="backend" value="1" />
  <table class="form" cellpadding="8" cellspacing="0" border="0">
    <tr>
      <td width="30%" align="right">Usuario:</td>
      <td width="70%">
        <input class="input" type="text" name="usuario" value="" />
      </td>
    </tr>
    <tr>
      <td align="right">Contraseña:</td>
      <td><input class="input" type="password" name="password" value="" /></td>
    </tr>        
    <tr>
      <td></td>
      <td>
        <a class="button submit" href="#"><span>Iniciar sesión</span></a> 
      </td>
    </tr>
  </table>
  </form>
  <div class="error">
    <span>La información introducida es incorrecta.</span>
  </div>        
</center>
