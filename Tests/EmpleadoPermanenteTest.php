
<?php
require_once 'EmpleadoTest.php';

class EmpleadoPermanenteTest extends EmpleadoTest{
    
    public function crearDefault($nombre = "Alejandra", $apellido = "Adalid", $dni = 50123635, $salario = "50000", $fechaIngreso=null){
        $fecha = new \DateTime();
        $empleadoPe = new \App\EmpleadoPermanente($nombre, $apellido, $dni, $salario, $fechaIngreso);
        return $empleadoPe;
    }


//Probar que el método getFechaIngreso() funciona como se espera. (Leer la documentación para el objeto DateTime de php.net).

public function testCrearIngreso(){
    $fechaActual = new DateTime(); 
    $empleadoPe= $this->crearDefault(); 
    $this->assertEquals($fechaActual->format('Y-m-d'), $empleadoPe->getFechaIngreso()->format('Y-m-d'));
}


}