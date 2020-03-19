<?php 
include('../../Config/Config.php');
$alumno = new alumno($conexion);

$proceso = '';
if( isset($_GET['proceso']) && strlen($_GET['proceso'])>0 ){
	$proceso = $_GET['proceso'];
}
$alumno->$proceso( $_GET['alumno'] );
print_r(json_encode($alumno->respuesta));

class alumno{
    private $datos = array(), $db;
    public $respuesta = ['msg'=>'correcto'];
    
    public function __construct($db){
        $this->db=$db;
    }
    public function recibirDatos($alumno){
        $this->datos = json_decode($alumno, true);
        $this->validar_datos();
    }
    private function validar_datos(){
        if( empty($this->datos['CODIGO']) ){
            $this->respuesta['msg'] = 'por favor ingrese el CODIGO del estudiante';
        }
        if( empty($this->datos['NOMBRE']) ){
            $this->respuesta['msg'] = 'por favor ingrese el NOMBRE del estudiante';
        }
        if( empty($this->datos['DIRECCION']) ){
            $this->respuesta['msg'] = 'por favor ingrese la DIRECCION del estudiante';
        }
        $this->almacenar_alumno();
    }
    private function almacenar_alumno(){
        if( $this->respuesta['msg']==='correcto' ){
            if( $this->datos['accion']==='nuevo' ){
                $this->db->consultas('
                    INSERT INTO alumnos (CODIGO,NOMBRE,DIRECCION,telefono) VALUES(
                        "'. $this->datos['CODIGO'] .'",
                        "'. $this->datos['NOMBRE'] .'",
                        "'. $this->datos['DIRECCION'] .'",
                        "'. $this->datos['telefono'] .'"
                    )
                ');
                $this->respuesta['msg'] = 'Registro insertado correctamente';
            }
        }
    }
}
?>