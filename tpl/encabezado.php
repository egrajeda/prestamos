<html>
  <head>
    <title><?php echo $vista->titulo ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <link href="css/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />          
    <link href="css/estilo.css" rel="stylesheet" type="text/css" />
    <link href="css/round-button.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>                        
    <script type="text/javascript" src="js/efectos.js"></script>
  </head>
  <body>
    <div id="contenedor">   
      <div id="encabezado">
        <div id="logo"></div>        
      </div>
      <div id="contenido">
<?php if ($vista->usuario) { ?>      
        <div id="info">
          <span class="facultad">Facultad de Ingeniería</span><br />
          <span class="usuario"><?php echo $vista->usuario ?></span>
        </div>      
<?php } ?>        
        <h1><?php echo $vista->encabezado ?></h1>
