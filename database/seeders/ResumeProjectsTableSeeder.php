<?php

namespace Database\Seeders;

use App\Models\Resume;
use App\Models\ResumeProject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResumeProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private const RESUME_SLUG = 'cv-fullstack-demo';

    public function run(): void
    {
        $resume = Resume::where('slug', self::RESUME_SLUG)->firstOrFail();

        $items = [
            [
                'name'        => 'CV Builder',
                'link'        => 'https://cv-demo.example.com',
                'description' => 'Generador de CV con Nuxt + Laravel + Supabase.',
                'stack'       => ['Laravel','Nuxt','Tailwind','Supabase'],
                'highlights'  => ['Exportación a PDF CSS', 'Vista pública por slug'],
                'order_index' => 1,
            ],
            [
                'name'        => 'Viaja Segura',
                'link'        => 'https://viaja-segura.example.com',
                'description' => 'Simulador tipo Uber con tracking.',
                'stack'       => ['Spring Boot','Flutter','PostgreSQL'],
                'highlights'  => ['Tiempo real con WebSocket', 'Arquitectura modular'],
                'order_index' => 2,
            ],
        ];

        foreach ($items as $i) {
            ResumeProject::firstOrCreate(
                [
                    'resume_id' => $resume->id,
                    'name'      => $i['name'],
                ],
                $i + ['resume_id' => $resume->id]
            );
        }
    }
}
