<?php

namespace Database\Seeders;

use App\Models\Resume;
use App\Models\ResumeLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResumeLinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private const RESUME_SLUG = 'cv-fullstack-demo';

    public function run(): void
    {
        $resume = Resume::where('slug', self::RESUME_SLUG)->firstOrFail();

        $items = [
            ['type'=>'github','label'=>'Repositorio CV Builder','url'=>'https://github.com/julio/cv-builder','order_index'=>1],
            ['type'=>'portfolio','label'=>'Portafolio','url'=>'https://portfolio.example.com','order_index'=>2],
        ];

        foreach ($items as $i) {
            ResumeLink::firstOrCreate(
                [
                    'resume_id' => $resume->id,
                    'label'     => $i['label'],
                ],
                $i + ['resume_id' => $resume->id]
            );
        }
    }
}
