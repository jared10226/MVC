<?php
class VehiculosControler
{public function __construct(){
         require_once 'models/vehiculosModel.php';
        
    } 
    public function index()
    {
        require_once "models/VehiculosModel.php";
        $vehiculos = new Vehiculo_Model();
         $data["titulo"]="vehiculos";
        $data["vehiculos"]=$vehiculos->get_vehiculos();
        require_once 'views/vehiculos/vehiculos.php';
        
    }
    public function nuevo() {
        
        $data["titulo"]="vehiculos";
      require_once 'views/vehiculos/vehiculos_nuevo.php';
    }
    public function guarda() {
        $placa=$_POST['placa'];
        $marca=$_POST['marca'];
        $modelo=$_POST['modelo'];
        $anio=$_POST['anio'];
        $color=$_POST['color'];
        
        $vehiculos = new Vehiculo_Model();
        $vehiculos->insertar($placa, $marca, $modelo, $anio, $color);
                
        $data["titulo"]="vehiculos";
        $this->index();
    }
    public function modificar($id) {
        $vehiculos = new Vehiculo_Model();
        
        
          $data["id"]=$id;
          $data["vehiculos"]=$vehiculos->get_vehiculo($id);
        $data["titulo"]="vehiculos";
      require_once 'views/vehiculos/vehiculos_modifica.php';
    }
    public function actualizar() {
        $id=$_POST['id'];
        $placa=$_POST['placa'];
        $marca=$_POST['marca'];
        $modelo=$_POST['modelo'];
        $anio=$_POST['anio'];
        $color=$_POST['color'];
        
        $vehiculos = new Vehiculo_Model();
        $vehiculos->modificar($id,$placa, $marca, $modelo, $anio, $color);
                
        $data["titulo"]="vehiculos";
        $this->index();
    }
    public function eliminar($id) {
       
        $vehiculos = new Vehiculo_Model();
        $vehiculos->eliminar($id);
                
        $data["titulo"]="vehiculos";
        $this->index();
    }
}
?>

