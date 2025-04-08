<?php
namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Course;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderBy('id')->paginate(10);
        return view('users.index', [
            'menu'  => 'users',
            'users' => $users,
            'name'  => $request->name,
            'email' => $request->email,
            'ra'    => $request->ra,

        ]);
    }
    public function show(User $user)
    {
        return view('users.show', ['menu' => 'users', 'user' => $user]);
    }

    public function create(Course $course)
    {
        $courses = Course::all();

        return view('users.create', ['menu' => 'users', 'courses' => $courses]);
    }

    public function store(UserRequest $request)
    {
        $request->validated();

        DB::beginTransaction();

        try {
            $raClear = str_replace('-', '', $request->ra);

            $user = User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'ra'        => $raClear,
                'course_id' => $request->course_id,
            ]);

            DB::commit();

            return redirect()->route('user.show',
                ['user'  => $user->id,
                    'course' => $user->course_id])
                ->with('success', 'Usuário cadastrado com sucesso!');
        } catch (Exception $e) {

            DB::rollBack();

            return back()->withInput()->with('error', 'Usuário não cadastrado!');
        }
    }

    public function edit(User $user)
    {
        $courses = Course::all();
        return view('users.edit',
            ['user'   => $user,
                'menu'    => 'users',
                'courses' => $courses]);
    }

    public function update(UserRequest $request, User $user)
    {
        $request->validated();

        DB::beginTransaction();
        try {
            $raClear = str_replace('-', '', $request->ra);

            $user->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'ra'        => $raClear,
                'course_id' => $request->course_id,
            ]);

            DB::commit();

            return redirect()->route('user.show', ['user' => $request->user, 'course' => $user->course_id])->with('success', 'Usuário editado com sucesso!');
        } catch (Exception $e) {
            DB::rollBack();

            return back()->withInput()->with('error', 'Usuário não editado!');
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();

            return redirect()->route('user.index')->with('success', 'Usuário excluído com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('user.index')->with('error', 'Usuário não excluído!');
        }
    }
}
