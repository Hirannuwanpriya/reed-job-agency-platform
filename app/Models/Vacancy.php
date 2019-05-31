<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vacancy extends Model
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','company_id', 'title', 'description', 'created_at', 'updated_at'
    ];
    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    
    public function cv()
    {
        return $this->belongsToMany(CurriculumVitae::class);
    }
}
