<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Mentor;
use App\Models\Subject;

class MentorSeeder extends Seeder
{
    public function run()
    {
        // Crear temas SIN faculty_id (nullable)
        Subject::create([
            'name' => 'Programación',
            'code' => 'PROG101',
            'description' => 'Fundamentos de programación',
            'faculty_id' => null
        ]);
        Subject::create([
            'name' => 'Algoritmos',
            'code' => 'ALGO101',
            'description' => 'Diseño de algoritmos',
            'faculty_id' => null
        ]);
        Subject::create([
            'name' => 'Estructuras de Datos',
            'code' => 'ESTR101',
            'description' => 'Estructuras y algoritmos',
            'faculty_id' => null
        ]);
        Subject::create([
            'name' => 'Cálculo I',
            'code' => 'CALC101',
            'description' => 'Cálculo diferencial',
            'faculty_id' => null
        ]);
        Subject::create([
            'name' => 'Álgebra',
            'code' => 'ALG101',
            'description' => 'Álgebra lineal',
            'faculty_id' => null
        ]);
        Subject::create([
            'name' => 'Ecuaciones Diferenciales',
            'code' => 'ECUA101',
            'description' => 'Ecuaciones diferenciales',
            'faculty_id' => null
        ]);
        Subject::create([
            'name' => 'Contabilidad',
            'code' => 'CONT101',
            'description' => 'Fundamentos de contabilidad',
            'faculty_id' => null
        ]);
        Subject::create([
            'name' => 'Finanzas',
            'code' => 'FIN101',
            'description' => 'Finanzas corporativas',
            'faculty_id' => null
        ]);
        Subject::create([
            'name' => 'Costos',
            'code' => 'COST101',
            'description' => 'Contabilidad de costos',
            'faculty_id' => null
        ]);

        // ========== MENTOR 1: Carlos Mendoza ==========
        $user1 = User::create([
            'name' => 'Carlos Mendoza',
            'email' => 'carlos.mendoza@unab.edu.co',
            'password' => bcrypt('password123'),
            'program' => 'Ingeniería de Sistemas',
            'bio' => 'Estudiante de 8° semestre apasionado por la programación',
        ]);

        $mentor1 = Mentor::create([
            'user_id' => $user1->id,
            'faculty_id' => null,
            'program' => 'Ingeniería de Sistemas',
            'bio' => 'Tutor experimentado en programación',
            'available' => true,
            'average_rating' => 4.5,
            'total_sessions' => 24,
        ]);

        $mentor1->subjects()->attach([
            Subject::where('name', 'Programación')->first()->id,
            Subject::where('name', 'Algoritmos')->first()->id,
            Subject::where('name', 'Estructuras de Datos')->first()->id,
        ]);

        // ========== MENTOR 2: Dra. María Rodríguez ==========
        $user2 = User::create([
            'name' => 'Dra. María Rodríguez',
            'email' => 'maria.rodriguez@unab.edu.co',
            'password' => bcrypt('password123'),
            'program' => 'Facultad de Ingeniería',
            'bio' => 'Profesora con 12 años de experiencia',
        ]);

        $mentor2 = Mentor::create([
            'user_id' => $user2->id,
            'faculty_id' => null,
            'program' => 'Facultad de Ingeniería',
            'bio' => 'Docente UNAB especializada en cálculo',
            'available' => true,
            'average_rating' => 4.8,
            'total_sessions' => 41,
        ]);

        $mentor2->subjects()->attach([
            Subject::where('name', 'Cálculo I')->first()->id,
            Subject::where('name', 'Álgebra')->first()->id,
            Subject::where('name', 'Ecuaciones Diferenciales')->first()->id,
        ]);

        // ========== MENTOR 3: Laura García ==========
        $user3 = User::create([
            'name' => 'Laura García',
            'email' => 'laura.garcia@unab.edu.co',
            'password' => bcrypt('password123'),
            'program' => 'Administración de Empresas',
            'bio' => 'Estudiante de 9° semestre especializada en finanzas',
        ]);

        $mentor3 = Mentor::create([
            'user_id' => $user3->id,
            'faculty_id' => null,
            'program' => 'Administración de Empresas',
            'bio' => 'Tutora en contabilidad y finanzas',
            'available' => true,
            'average_rating' => 4.6,
            'total_sessions' => 18,
        ]);

        $mentor3->subjects()->attach([
            Subject::where('name', 'Contabilidad')->first()->id,
            Subject::where('name', 'Finanzas')->first()->id,
            Subject::where('name', 'Costos')->first()->id,
        ]);
    }
}
