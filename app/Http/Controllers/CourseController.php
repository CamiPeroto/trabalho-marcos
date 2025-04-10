<?php
namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Exception;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('id', 'ASC')
            ->paginate(10);

        return view('courses.index', ['menu' => 'courses', 'courses' => $courses]);
    }
    
    public function show(Course $course)
    {
        return view('courses.show', ['menu' => 'courses', 'course' => $course]);
    }

    public function create()
    {
        return view('courses.create', ['menu' => 'courses']);
    }

    public function store(CourseRequest $request)
    {
        $request->validated();
        DB::beginTransaction();
        try {

            $course = Course::create([
                'name' => $request->name,
            ]);

            DB::commit();

            return redirect()->route('course.show', ['course' => $course->id])->with('success', 'Curso cadastrado com sucesso!');
        } catch (Exception $e) {
            DB::rollBack();

            return back()->withInput()->with('error', 'Curso não cadastrado!');
        }
    }
    public function edit(Course $course)
    {

        return view('courses.edit', ['menu' => 'courses', 'course' => $course]);
    }

    public function update(CourseRequest $request, Course $course)
    {
        $request->validated();

        DB::beginTransaction();

        try {
            $course->update([
                'name' => $request->name,
            ]);

            DB::commit();

            return redirect()->route('course.show', ['course' => $course->id])
                ->with('success', 'Curso editado com sucesso!');
        } catch (Exception $e) {
            DB::rollBack();

            return back()->withInput()->with('error', 'Curso não editado!');
        }
    }

    public function destroy(Course $course)
    {
        try {
            $course->delete();

            return redirect()->route('course.index')->with('success', 'Curso excluído com sucesso!');

        } catch (Exception $e) {
            return redirect()->route('course.index')
                ->with('error', 'Curso não foi excluído!');
        }
    }
}
