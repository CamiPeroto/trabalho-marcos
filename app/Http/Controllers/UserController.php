<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
    //Recuperar os registros do banco     
    $users = User::orderBy('id')->paginate(10);
    return view(   'users.index',[
        'users' => $users,
        'name' => $request->name,
        'email' => $request->email,
        'ra' => $request->ra,

    ]);
    }
    public function show(User $user)
    {
        return view ('users.show', ['user' => $user]);  
    }

    public function create()
    {
    
        return view ('users.create');
    }

    public function store(UserRequest $request)
    {
        //Validar o formulário
        $request ->validated();
        // Marca o ponto inicial da transação
        DB::beginTransaction();

        try {
            // Cadastrar no banco de dados na tabela usuários
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'ra' => $request->ra,
            ]);

            // Operação é concluída com êxito
            DB::commit();

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('user.show', ['user' => $user->id])->with('success', 'Usuário cadastrado com sucesso!');
        } catch (Exception $e) {

            // Operação não é concluída com êxito
            DB::rollBack();

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Usuário não cadastrado!');
        }
    }
     // Carregar o formulário editar usuário
     public function edit(User $user)
     { 
        return view('users.edit', [ 'user' => $user]);
     }

     public function update(UserRequest $request, User $user)
     {
         // Validar o formulário
         $request->validated();
         // Marca o ponto inicial de uma transação
         DB::beginTransaction();
         try {
             // Editar as informações do registro no banco de dados
             $user->update([
                 'name' => $request->name,
                 'email' => $request->email,
                 'ra' => $request->ra,
             ]);
             // Operação é concluída com êxito
             DB::commit();
             // Redirecionar o usuário, enviar a mensagem de sucesso
             return redirect()->route('user.show', ['user' => $request->user])->with('success', 'Usuário editado com sucesso!');
         } catch (Exception $e) {
             // Operação não é concluída com êxito
             DB::rollBack();
             // Redirecionar o usuário, enviar a mensagem de erro
             return back()->withInput()->with('error', 'Usuário não editado!');
         }
     }
       // Excluir o usuário do banco de dados
    public function destroy(User $user)
    {
        try {
            // Excluir o registro do banco de dados
            $user->delete();
            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('user.index')->with('success', 'Usuário excluído com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro
            return redirect()->route('course.index')->with('error', 'Usuário não excluído!');
        }
    }
}
