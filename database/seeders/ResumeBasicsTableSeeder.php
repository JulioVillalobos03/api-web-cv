<?php

namespace Database\Seeders;

use App\Models\Resume;
use App\Models\ResumeBasic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResumeBasicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private const RESUME_SLUG = 'cv-fullstack-demo';

    public function run(): void
    {
        $resume = Resume::where('slug', self::RESUME_SLUG)->firstOrFail();

        ResumeBasic::updateOrCreate(
            ['resume_id' => $resume->id],
            [
                'full_name'   => 'Julio Villalobos',
                'headline'    => 'Backend/Full-Stack (Laravel · Nuxt · Postgres)',
                'email'       => 'julio@example.com',
                'phone'       => '+52 312 000 0000',
                'location'    => 'Cuernavaca, Morelos, MX',
                'website'     => 'https://portfolio.example.com',
                'summary'     => 'Desarrollador con foco en Laravel, Nuxt y Postgres.',
                'social_links'=> [
                    ['type'=>'github','label'=>'GitHub','url'=>'https://github.com/julio'],
                    ['type'=>'linkedin','label'=>'LinkedIn','url'=>'https://linkedin.com/in/julio'],
                ],
            ]
        );
    }
}
