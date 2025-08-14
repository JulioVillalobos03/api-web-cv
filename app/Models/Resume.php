<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resume extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'user_id','title','slug','is_public','template_key',
        'theme_primary','theme_font_size','theme_density','print_options',
    ];

    protected $casts = [
        'is_public'     => 'boolean',
        'print_options' => 'array',
    ];

    // Relaciones
    public function user()        { return $this->belongsTo(User::class); }
    public function basics()      { return $this->hasOne(ResumeBasic::class); }
    public function experiences() { return $this->hasMany(ResumeExperience::class)->orderBy('order_index'); }
    public function education()   { return $this->hasMany(ResumeEducation::class)->orderBy('order_index'); }
    public function projects()    { return $this->hasMany(ResumeProject::class)->orderBy('order_index'); }
    public function skills()      { return $this->hasMany(ResumeSkill::class)->orderBy('order_index'); }
    public function links()       { return $this->hasMany(ResumeLink::class)->orderBy('order_index'); }

}
