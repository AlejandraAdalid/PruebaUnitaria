
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

//Probar que el método calcularComision() funciona como se espera.
public function testCalcularComisionAntiguedad(){
    $ingreso = new DateTime(); 
    $ingreso->modify('-10 years'); 
    $empleadoPe= $this->crearDefault("Alejandra", "Adalid", 50123635, 50000, $ingreso); 
    $this->assertEquals("15%",$empleadoPe->calcularComision());
}
 
//Probar que el método calcularIngresoTotal() funciona como se espera.

public function testCalcularIngresoTotal(){
    $ingreso = new DateTime();
    $ingreso->modify('-5 years'); 
    $empleadoPe= $this->crearDefault("Alejandra", "Adalid", 50123635, 50000, $ingreso); 
    $this->assertEquals(50100,$empleadoPe->calcularIngresoTotal());
}


//Probar que el método calcularAntiguedad() funciona como se espera para un empleado con varios años de antigüedad.

public function testAntiguedad(){
    $ingreso = new DateTime(); 
    $ingreso->modify('-10 years'); 
    $empleadoPe= $this->crearDefault("Alejandra", "Adalid", 50123635, 50000, $ingreso); 
    $this->assertEquals(5,$empleadoPe->calcularAntiguedad());
}

//Probar que, si construyo un empleado sin proporcionar la fecha de ingreso, el método getFechaIngreso() retorna la fecha del día, y el método getAntiguedad retorna 0.

public function testFechaSinProporcionar()
{
    $empleadoPe = $this->crearDefault("Alejandra", "Adalid", 50123635, 50000, $ingreso);
    $fecha = new DateTime();
    $this->assertEquals(date_format($fecha, 'y-m-d'), date_format($empleadoPe->getFechaIngreso(), 'y-m-d')); 
    $this->assertEquals(0, $empleadoPe->calcularAntiguedad()); 

}

//Probar que, si construyo un empleado proporcionando una fecha de ingreso posterior a la de hoy, lanza una excepción.

   public function testFechaPosterior(){
    $ingreso = new DateTime(); 
    $ingreso->modify('+5 years'); 
    $this->expectException(\Exception::class); 
    $empleadoPe= $this->crearDefault("Alejandra", "Adalid", 50123635, 50000, $ingreso); 


   }
}