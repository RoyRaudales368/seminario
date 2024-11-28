<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use App\Models\Alumno;
use App\Http\Controllers\AlumnoController;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Tests\TestCase;
class AlumnoContollerUnitTest extends TestCase
{
    /**test */
    public function test_probar_validacion_falla_para_crear_Alumnos():void
    {
        //variable para el controlador, aqui se crea 
        $controller= new AlumnoController();
        $request=Request::create('/alumnos','POST',[
            'name' => '',
            'apellido' => '',
            'email' => '',
            'edad' => ''
        ]);
        $this->expectException(ValidationException::class);
        // Se espera que falle la validación
        $controller->store($request);
    }

    /**test */
    public function test_probar_validacion_correcta_para_crear_Alumnos():void
    {
        //variable para el controlador, aqui se crea 
        $controller= new AlumnoController();
        $request=Request::create('/alumnos','POST',[
            'name' => 'Kevin',
            'apellido' => 'Calix',
            'mail' => 'kCalix@unicah.edu',
            'edad' => '20'
        ]);

        $this->expectException(ValidationException::class);
        // Se espera que falle la validación
        $controller->store($request);
        $this-assertTrue($response->isRedirect(route('alumnos.index')));
    }

}
