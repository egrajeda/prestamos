<?php if ($vista->usuario) { ?>
        <a class="button logout" href="index.php?mod=login&act=logout">
          <span>Cerrar sesión</span>
        </a>        
<?php } ?>  
<?php if ($vista->regresar) { ?>
        <a class="button regresar" href="index.php">
          <span>Regresar</span>
        </a>    
<?php } ?>        
<?php if ($vista->usuario) { ?>
      <br /><br />
<?php } ?>
      </div>      
    </div>
  </body>
</html>  
