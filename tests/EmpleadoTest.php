<?php

 class EmpleadoTest extends \PHPUnit\Framework\TestCase{

	//Funcion crear crea un empleado
	public function crear ($nombre = "Alejandra", $apellido = "Adalid", $dni = 50123635, $salario = "50000")
	{
		$empleado = new \App\Empleado ($nombre, $apellido, $dni , $salario);
		return $empleado;
	}

	/** @test */
	public function testObtenerNombreApellido()
	{
		$empleado = $this-> crear(); 
		$this->assertEquals("Alejandra Adalid", $empleado->getNombreApellido());
	}

   


}