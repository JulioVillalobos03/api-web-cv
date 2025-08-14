<?php

namespace Database\Seeders;

use App\Models\Resume;
use App\Models\ResumeEducation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResumeEducationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private const RESUME_SLUG = 'cv-fullstack-demo';

    public function run(): void
    {
        $resume = Resume::where('slug', self::RESUME_SLUG)->firstOrFail();

        $row = [
            'institution' => 'Universidad Tecnológica',
            'degree'      => 'Ing. en Desarrollo y Gestión de Software',
            'start_date'  => '2021-09-01',
            'end_date'    => null,
            'is_current'  => true,
            'description' => 'Énfasis en backend, patrones y BD.',
            'order_index' => 1,
        ];

        ResumeEducation::firstOrCreate(
            [
                'resume_id'   => $resume->id,
                'institution' => $row['institution'],
                'degree'      => $row['degree'],
            ],
            $row + ['resume_id' => $resume->id]
        );
    }
}
