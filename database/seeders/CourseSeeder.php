<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!Course::where('name','Agronomia' )->first()){
        Course::create([
            'name' => 'Agronomia',
        ]);
    }
    if(!Course::where('name','Engenharia Civil' )->first()){
        Course::create([
            'name' => 'Engenharia Civil',
        ]);
    }
   if(!Course::where('name','Engenharia de Software' )->first()){
        Course::create([
            'name' => 'Engenharia de Software',
        ]);
    }
    if(!Course::where('name','Medicina' )->first()){
        Course::create([
            'name' => 'Medicina',
        ]);
    }
    if(!Course::where('name','Direito' )->first()){
        Course::create([
            'name' => 'Direito',
        ]);
    }
    if(!Course::where('name','Enfermagem' )->first()){
        Course::create([
            'name' => 'Enfermagem',
        ]);
    }
}

}
