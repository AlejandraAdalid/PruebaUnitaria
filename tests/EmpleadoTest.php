<?php
abstract class EmpleadoTest extends \PHPUnit\Framework\TestCase{
	
	//Funcion crear crea un empleado
	public function crearDefault($nombre = "Alejandra", $apellido = "Adalid", $dni = 50123635, $salario = "50000")
	{
		$empleado = new \App\Empleado ($nombre, $apellido, $dni , $salario);
		return $empleado;
	}

	//Test para getNombreApellido
	public function testObtenerNombreApellido()
	{
		$empleado = $this-> crearDefault(); // No necesito asignarle valores porque mi función crear inicial ya los tiene por default
		$this->assertEquals("Alejandra Adalid", $empleado->getNombreApellido());
	}
