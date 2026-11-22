<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        if (Project::count() > 0) {
            return;
        }

        $projects = [
            [
                'title'       => 'FlashCard Game',
                'description' => 'Game interaktif menggunakan HTML, CSS, dan JavaScript.',
                'category'    => 'Web Application',
                'image'       => 'images/projects/flashcard.png',
            ],
            [
                'title'       => 'Aplikasi Zikir',
                'description' => 'Aplikasi Counter Sederhana (Increment Dan Decrement).',
                'category'    => 'Web Application',
                'image'       => 'images/projects/zikir.png',
            ],
            [
                'title'       => 'Login Page',
                'description' => 'Web halaman Login menggunakan HTML, JavaScript, Dan CSS.',
                'category'    => 'Web Page',
                'image'       => 'images/projects/login.png',
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
