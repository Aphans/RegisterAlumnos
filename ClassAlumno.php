<?php
class Alumno{
    private $nif,$nombre,$primerApellido,$segundoApellido,$email;
    static $numeroAlumnos=0;
    function __construct(){
        global $numeroAlumnos;
        $numeroAlumnos+1;
    }
    public function __get( string $var )
        {
                return $this->$var;
        }
    public function __set( string $var, $val )
    {
            $this->$var = $val;
    }
    public function __destruct() {
        global $numeroAlumnos;
        $numeroAlumnos--;
     }
     static function getNumeroAlumnos(){
        global $numeroAlumnos;
        echo 'Hay '.$numeroAlumnos.' alumnos';
     }
     function pinta_Alumno() {
		echo "Nif:$this->nif";
        echo "<br>";
        echo "<br>";
		echo "Nombre:$this->nombre";
        echo "<br>";
        echo "<br>";
		echo "primerApellido:$this->primerApellido";
        echo "<br>";
        echo "<br>";
		echo "segundoApellido:$this->segundoApellido";
        echo "<br>";
        echo "<br>";
        echo "email:$this->email";
        echo "<hr>";
     }
}
?>