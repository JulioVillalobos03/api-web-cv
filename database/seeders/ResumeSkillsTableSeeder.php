<?php

namespace Database\Seeders;

use App\Models\Resume;
use App\Models\ResumeSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResumeSkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private const RESUME_SLUG = 'cv-fullstack-demo';

    public function run(): void
    {
        $resume = Resume::where('slug', self::RESUME_SLUG)->firstOrFail();

        $skills = [
            ['label'=>'Laravel','level'=>5,'category'=>'Backend'],
            ['label'=>'PHP','level'=>5,'category'=>'Backend'],
            ['label'=>'PostgreSQL','level'=>4,'category'=>'DB'],
            ['label'=>'MySQL','level'=>4,'category'=>'DB'],
            ['label'=>'Vue 3','level'=>4,'category'=>'Frontend'],
            ['label'=>'Nuxt','level'=>4,'category'=>'Frontend'],
            ['label'=>'Tailwind','level'=>4,'category'=>'Frontend'],
            ['label'=>'Docker','level'=>3,'category'=>'DevOps'],
        ];

        $i = 1;
        foreach ($skills as $s) {
            ResumeSkill::firstOrCreate(
                [
                    'resume_id' => $resume->id,
                    'label'     => $s['label'],
                ],
                $s + ['resume_id' => $resume->id, 'order_index' => $i++]
            );
        }
    }
}
