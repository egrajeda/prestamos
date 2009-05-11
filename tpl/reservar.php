<?php
$dia=date("l");
if($dia=="Saturday"||$dia=="Friday"||$dia='Sunday'){
    ?>
<center><h2>SOLICITUD DE RECURSO AUDIOVISUAL</h2></center>
<br>
<form action="reservacion.php" method="post">
    <table class="" border="2">
        <tr>
            <td>Descripcion de uso de Recurso</td>
            <td>Hora</td>
            <td>Fecha</td>
            <td>Ca&ntilde;on</td>
            <td>Laptop</td>
            <td>Local</td>
            <td></td>
        </tr>
        <tr>
            <td><input type="text" name="descripcion"></td>
            <td>
                <select name="inicio_hora">
                    <option value="7">7 am
                    <option value="8">8 am
                    <option value="9">9 am
                    <option value="10">10 am
                    <option value="11">11 am
                    <option value="1">1 pm
                    <option value="2">2 pm
                    <option value="3">3 pm
                    <option value="4">4 pm
                    <option value="5">5 pm
                    <option value="6">6 pm
                    <option value="7">7 pm
                </select>

                <select name="inicio_final">
                    <option value="8">8 am
                    <option value="9">9 am
                    <option value="10">10 am
                    <option value="11">11 am
                    <option value="12">12 am
                    <option value="2">2 pm
                    <option value="3">3 pm
                    <option value="4">4 pm
                    <option value="5">5 pm
                    <option value="6">6 pm
                    <option value="7">7 pm
                    <option value="8">8 pm
                </select>
            </td>
            <td>
                JAVASCRIPT
            </td>
            <td>
            <input type="checkbox" name="canon">
            </td>
            <td>
            <input type="checkbox" name="laptop">
            </td>
            <td>
            <input type="text" name="local">
            </td>
            <td>MODIFICAR</td>
            <td>BORRAR</td>
        </tr>
    </table>
    <input type="submit" value="Reservar">
</form>
<?php
}
else{
echo "LAS RESERVACIONES SOLO SE PUEDEN REALIZAR LOS VIERNES O SABADOS";
}
?>
<a class="button logout" href="index.php?mod=login&act=logout">
  <span>Cerrar sesión</span>
</a>
<div class="clear"></div>
