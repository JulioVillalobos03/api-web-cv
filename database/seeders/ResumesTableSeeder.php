<?php

namespace Database\Seeders;

use App\Models\Resume;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResumesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private const EMAIL_DEMO = 'demo@cvapp.test';
    private const RESUME_SLUG = 'cv-fullstack-demo';

    public function run(): void
    {
        $user = User::where('email', self::EMAIL_DEMO)->firstOrFail();

        Resume::firstOrCreate(
            ['slug' => self::RESUME_SLUG],
            [
                'user_id'        => $user->id,
                'title'          => 'CV Full-Stack Developer',
                'is_public'      => true,
                'template_key'   => 'clean',
                'theme_primary'  => 'indigo',
                'theme_font_size'=> 'base',
                'theme_density'  => 'comfortable',
                'print_options'  => ['margin' => '12mm', 'showPhoto' => false],
            ]
        );
    }
}
