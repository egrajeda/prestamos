<center>
  <form method="post" action="index.php?mod=login">
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
      <td><input class="input" type="password" name="clave" value="" /></td>
    </tr>        
    <tr>
      <td></td>
      <td>
        <span class="button">
          <button type="submit" value="Iniciar sesión">Iniciar sesión</button>
        </span>
      </td>
    </tr>
  </table>
  </form>
<?php
/* Si hay un error, mostramos el mensaje, sino no */
if ($vista->error) {
  $estilo = 'style="visibility: visible"';
} else {
  $estilo = '';
}
?>   
  <div class="error" <?php echo $estilo ?>>
    <span>La información introducida es incorrecta.</span>
  </div>        
</center>
