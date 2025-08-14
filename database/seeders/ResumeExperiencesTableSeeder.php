<?php

namespace Database\Seeders;

use App\Models\Resume;
use App\Models\ResumeExperience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResumeExperiencesTableSeeder extends Seeder
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
                'company'     => 'Maker Media Group',
                'role'        => 'Backend Developer (Laravel)',
                'start_date'  => '2024-10-01',
                'end_date'    => null,
                'is_current'  => true,
                'location'    => 'Remoto',
                'description' => 'Desarrollo de APIs, reportes y auth.',
                'highlights'  => [
                    'REST con Sanctum y policies.',
                    'Optimización de consultas en Postgres.',
                ],
                'order_index' => 1,
            ],
            [
                'company'     => 'EGIS Infraestructura',
                'role'        => 'Full-Stack (Laravel · Vue)',
                'start_date'  => '2024-04-01',
                'end_date'    => '2024-10-01',
                'is_current'  => false,
                'location'    => 'CDMX',
                'description' => 'Modernización de módulo de gestión.',
                'highlights'  => [
                    'Paginación avanzada y filtros.',
                    'Refactor a Vue 3 con composición.',
                ],
                'order_index' => 2,
            ],
        ];

        foreach ($items as $i) {
            ResumeExperience::firstOrCreate(
                [
                    'resume_id'  => $resume->id,
                    'company'    => $i['company'],
                    'role'       => $i['role'],
                    'start_date' => $i['start_date'],
                ],
                $i + ['resume_id' => $resume->id]
            );
        }
    }
}
