<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
     // Listar os cursos
     public function index(){
        //Recuperar os registros do banco de dados
        $courses = Course::orderBy('id','ASC' )
        ->paginate(10);

        return view('courses.index', ['courses'=> $courses]);
    }
     // Visualizar os cursos
     public function show(Course $course){
           
            return view('courses.show', [ 'course' => $course]);
        }
        
    // Carregar o formulário cadastrar curso
    public function create(){

            return view('courses.create');
        }

    // Cadastrar o novo curso no banco de dados
    public function store(CourseRequest $request){
        // Validar o formulário
        $request ->validated();

        //Marca o ponto inicial da transação
        DB::beginTransaction();

        try{

        $course = Course::create([
            'name' => $request->name,
        ]);

        DB::commit();
      
        //Redirecionar o usuário para página de cadastro, mensagem de sucesso
        return redirect()->route('course.show', ['course' =>$course->id])->with('success', 'Curso cadastrado com sucesso!');
        }catch(Exception $e){
            //Operação não é concluída com êxito
            DB::rollBack();
            
            //Redirecionar o usuário 
            return back()->withInput()->with('error', 'Curso não cadastrado!');
        }
    }
       public function edit(Course $course){
    
        return view('courses.edit', [ 'course' => $course]);
    }

    // Editar o registro no banco de dados
    public function update (CourseRequest $request, Course $course){
        // Validar o formulário
        $request ->validated();

        DB::beginTransaction();

        try{
            
        //Editar as informações do registro
        $course->update([
            'name' =>$request->name,
        ]);

        DB::commit();

       return redirect()->route('course.show', ['course' =>$course->id])
       ->with('success', 'Curso editado com sucesso!');
    }
    catch(Exception $e){
        //Operação não é concluída com êxito
        DB::rollBack();
        //Redirecionar o usuário e enviar mensagem de erro
        return back()->withInput()->with('error', 'Curso não editado!');
        }
    }
    
    // Excluir o curso do banco de dados
    public function destroy(Course $course){

        try{

            $course->delete();

            return redirect()->route('course.index')->with('success', 'Curso excluído com sucesso!');
        
        } catch(Exception $e){
            
            //Redirecionar o usuário e enviar mensagem de erro
            return redirect()->route('course.index')
            ->with('error', 'Curso não foi excluído!');

        }

    
    
    }
}
