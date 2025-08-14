<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResumeExperience extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'resume_id',
        'company',
        'role',
        'start_date',
        'end_date',
        'is_current',
        'location',
        'description',
        'highlights',
        'order_index'
    ];

    protected $casts = [
        'is_current' => 'boolean',
        'start_date' => 'date',
        'end_date'   => 'date',
        'highlights' => 'array',
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
