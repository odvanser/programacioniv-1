<?php
/**Clase principal de conexion a las base de datos desde PHP -> MySQ */
class DB{
    private $conexion, $result;

    public function DB{$server, $user, $pass, $db}
    $this->conexion = mysqli_connect($server,$user,$pass,$db) or die(mysqli_error('No se puedo conectar '));

    public function consulta($sql){
        $this->result = mysqli_query($this->conexion, $sql) or die(mysqli_error());
}
    public function obtener_data(){
        return $this->result->fetch_all(MYSQL_ASSOC);
}
    public function obtener_respuesta(){
        return $this->result;
}
    public function id(){
        return $this->result->id();
    }
}
?>