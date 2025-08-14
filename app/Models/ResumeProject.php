<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResumeProject extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'resume_id',
        'name',
        'link',
        'description',
        'stack',
        'highlights',
        'order_index'
    ];

    protected $casts = [
        'stack'      => 'array',
        'highlights' => 'array',
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
