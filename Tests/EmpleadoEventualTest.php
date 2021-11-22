<?php
require_once "EmpleadoTest.php";
class EmpleadoEventualTest extends EmpleadoTest

{
	public function crearDefault ($nombre = "Alejandra", $apellido = "Adalid", $dni = 50123635, $salario = "50000", $montos=array(400,500,1300,250))
	{
		$empleadoEventual = new \App\EmpleadoEventual($nombre, $apellido, $dni, $salario, $montos);
		return $empleadoEventual;
	}

    //Probar que el método calcularComision() funciona como se espera.
	public function testCalcularComision()
    {
        $empleadoEv= $this->crearDefault(); 
        $this->assertEquals(58100, $empleadoEv->calcularComision());
    }

   // Probar que el método calcularIngresoTotal() funciona como se espera.
    public function testFuncionaMetodoCalcularIngresoTotal()
    {
        $empleadoEv = $this->crearDefault();
        $this->assertEquals(581000, $empleadoEv->calcularIngresoTotal());
    }
     
    //Probar que si intento construir un empleado proporcionando algún monto de venta negativo o cero, lanza una excepción.
    public function testMontoInvalido()
    {
        $this->expectException(\Exception::class);
        $empleadoEv = $this->crearDefault("Alejandra", "adalid", 50123635, 50000, $array = array(10, 20, 50,-80));
    }
}