<?php
require_once "EmpleadoTest.php";
class EmpleadoEventualTest extends EmpleadoTest

{
	public function crearDefault ($nombre = "Alejandra", $apellido = "Adalid", $dni = 50123635, $salario = "50000", $montos=array(400,500,1300,250))
	{
		$empleadoEventual = new \App\EmpleadoEventual($nombre, $apellido, $dni, $salario, $montos);
		return $empleadoEventual;
	}

    //Test para calcular comisión
	public function testCalcularComision()
    {
        $empleadoEv= $this->crearDefault(); 
        $this->assertEquals(106.875, $empleadoEv->calcularComision());
    }
}