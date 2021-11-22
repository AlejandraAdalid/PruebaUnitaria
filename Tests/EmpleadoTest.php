<?php

class EmpleadoTest extends \PHPUnit\Framework\TestCase{
	
	//Funcion crear crea un empleado
	public function crearDefault($nombre = "Alejandra", $apellido = "Adalid", $dni = "50123635", $salario = "50000")
	{
		$empleado = new \App\Empleado ($nombre, $apellido, $dni , $salario);
		return $empleado;
	}

	//Test para getNombreApellido
	public function testObtenerNombreApellido()
	{
		$empleado = $this-> crearDefault(); 
		$this->assertEquals("Alejandra Adalid", $empleado->getNombreApellido());
	}

         //Test para getDni
    public function testFuncionaObtenerDni()
    {
	     $empleado = $this-> crearDefault(); 
	    $this->assertEquals( 50123635 $empleado->getDni());
    }
    
	//Test para getSalario
	public function testFuncionaObtenerSalario()
	{
		$empleado = $this-> crearDefault(); 
		$this->assertEquals("50000", $empleado->getSalario());
	} 

    // Test para setSector y getSector

	{
		$empleado = $this->crearDefault(); 
		$this->assertEquals("No especificado", $empleado->getSector());
		
		$empleado->setSector("Backend"); 
		$this->assertEquals("Backend", $empleado->getSector());
	}

	//Test para ToString
	public function testFuncionaToString()
	{
		$empleado = $this->crearDefault(); 
		$this->assertEquals("Alejandra adalid 50123635 50000", $empleado);
	
		$this->assertEquals("Alejandra adalid 50123635 50000", $empleado->__toString()); 
	
		$this->assertEquals("Alejandra adalid 50123635 50000", $empleado . ""); 
	
		$this->assertEquals("Alejandra adalid 50123635 50000", strval($empleado)); /
	}

    //Probar que si intento construir un empleado con el nombre vacío, lanza una excepción.
    
	 public function testNombreVacio()
	{
		$this->expectException(\Exception::class); 
		$this-> crearDefault("", "adalid", 50123635, "50000"); 
	}
	
	//Probar que si intento construir un empleado con el apellido vacío, lanza una excepción.

	public function testApellidoVacio()
	{
		$this->expectException(\Exception::class); 
		$this-> crearDefault("Alejandra", "", 50123635, "50000"); 
	}

	//Probar que si intento construir un empleado con el dni vacío, lanza una excepción.

	public function testDNIVacio()
	{
		$this->expectException(\Exception::class); 
		$this-> crearDefault("Alejandra", "Adalid", null, "50000"); 
	}

    //Probar que si intento construir un empleado con el salario vacío, lanza una excepción.

	public function testSalarioVacio()
	{
		$this->expectException(\Exception::class);
		$this-> crearDefault("Alejandra", "Adalid", "50123635", ""); 
		
	}

	//Probar que si intento construir un empleado cuyo DNI contenga letras o caracteres no numéricos, lanza una excepción.

       
	public function testDniValoresNoNumericos()
	{
		$this->expectException(\Exception::class);
		$this-> crearDefault("Alejandra", "Adalid", "52123635-", "50000"); 
	}

	//Probar que si, al intentar construir un empleado, no se especifica el sector, el método getSector debe devolver la cadena “No especificado”.

	public function testNoSeIdentificaSector()
	{
		$empleado = $this-> crearDefault("Alejandra", "Adalid", "50123635", "50000"); // Creo una nueva instancia para no enviar sector por default
		$this->assertEquals("No especificado", $empleado->getSector());
	}

}