<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeBasic extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'resume_id',
        'full_name',
        'headline',
        'email',
        'phone',
        'location',
        'website',
        'summary',
        'social_links'
    ];

    protected $casts = [
        'social_links' => 'array',
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
