<?php
/**
 * Una clase de utilidad para hacer querys a la base de datos sin tanta 
 * complicación. Esta diseñada como un Singleton, pero no esta hecha para ser
 * usada directamente.
 *
 * Se debe de usar la función query() para cualquier cosa, y no directamente
 * la clase.
 */
 
 query('select * from `usuarios`', array());

/* Esta funcion es auxiliar y es una mezcla de mysql_query() con sprintf(), una
 * forma de usarlo sería por ejemplo:
 *
 *   query("select * from `usuarios` where `user` = ':user'", 
 *     array(":user" => 'walter.sanchez'));
 *
 * Sustituiría todas las ocurrencias de ':user' con 'walter.sanchez'.
 */
function query($str, $datos) {
  $bd = BaseDeDatos::getInstancia();    
  foreach ($datos as $viejo => $nuevo) {
    $str = str_replace($viejo, $nuevo, $str);
  }  
  $qr = $bd->query($str);
  if (!$qr) {
    die(mysql_error());
  }
  print 'hola';
  return $qr;
}

class BaseDeDatos {
  /* La instancia ya creada */
  private static $instancia;
  
  /* La conexion con la base de datos */
  private $bd;
  
  /* La informacion general para conectarse a la base de datos:
   *   - El nombre de usuario
   *   - La contraseña
   *   - La direccion de la base de datos
   *   - El nombre de la base de datos
   */
  private $user = 'admin';
  private $pass = 'secreto';
  private $host = 'localhost';
  private $name = 'reservaciones';
    
  /* El constructor, aqui nos conectamos a la base de datos */
  private function __construct() {
    $this->db = @mysql_connect($this->host, $this->user, $this->pass);
    if (!$this->db) {
      return;
    }
    if (!mysql_select_db($this->name, $this->db)) {
      return;  
    }
  }

  /* Cerramos la conexion con la base de datos */
  public function __destruct() {
    @mysql_close($this->db);
  }
  
  /* La función principal de un Singleton, que sirve para obtener la 
   * instancia, y en caso de que no exista crearla */
  public static function getInstancia() {
    if (!self::$instancia) {
      self::$instancia = new BaseDeDatos();
    }
    return self::$instancia;
  }  
  
  /* Un metodo para englobar el mysql_query() */
  public function query($str) {
    return @mysql_query($str, $this->db);      
  }
};

?>
