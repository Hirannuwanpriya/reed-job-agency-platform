<?php

namespace App\Models;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CurriculumVitae extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'first_name', 'last_name',
        'designation', 'img', 'dob',
        'gender', 'nationality', 'status',
        'nic', 'address', 'mobile', 'email',
        'website', 'linked_in', 'git_hub', 'twitter',
        'summary', 'p_qualification', 'p_strengths',
        'p_skills', 'personal_skills', 'eduction_qualification',
        'employemnt_history', 'gcse_a_level', 'gcse_o_level',
        'interests', 'achievements', 'references'
    ];

//    /**
//     * The attributes that should be hidden for arrays.
//     *
//     * @var array
//     */
//    protected $hidden = [
//        'password', 'remember_token',
//    ];

//    /**
//     * The attributes that should be cast to native types.
//     *
//     * @var array
//     */
//    protected $casts = [
//        'email_verified_at' => 'datetime',
//    ];

//    public function vacancy()
//    {
//        return $this->belongsToMany(Vacancy::class);
//    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vacancy()
    {
        return $this->hasMany(Vacancy::class);
    }

}
