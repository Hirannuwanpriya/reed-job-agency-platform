<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $admin = (new \App\Models\Auth\Administrator())->create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ]);

        (new \App\Models\Auth\user())->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'email_verified_at' => now(),
            'password' => Hash::make('user'),
            'remember_token' => Str::random(10),
        ]);

        foreach (['super_admin', 'administrator', 'moderator', 'company'] as $roles) {

            (new \App\Models\UserRoles())->create([
                'name' => $roles,
                'permissions' => []
            ]);
        }

        $role = (new \App\Models\UserRoles())->find(1);

        $admin->roles()->attach($role);
    
        //insert a Company
        $company = (new \App\Models\Company())->create([
            'name' => 'Reed',
            'email' => 'reed@reed.com',
            'contact' => 'Jack',
        ]);
        
        //insert a Vacancy
         $vacancy = (new \App\Models\Vacancy())->create([
            'company_id' => 1,
            'title' => 'Web Developer',
            'description' => 'We are looking for a Web developer',
        ]);
        
        //insert a Curriculum vitae
         $cv = (new \App\Models\CurriculumVitae())->create([
            'user_id' => 1,
            'name'  => 'Hiran',
            'email' => 'hiran@gmail.com',
            'mobile'    => '+94 298456754',
            'address'   => '42 Park Avenue READING RG85 6XP',
            'website'   => 'https://www.reed.co.uk/',
            'proficiency'   => 'Web Developer',
            'experience'    => '5',
            'edu_level' => 'Bsc in IT',
            'pro_qualification' => 'Certified PHP developer',
            'skill' => 'PHP, Javascript, Mysql, Docker',
        ]);
    
        $vacancy->cv()->attach($cv);
    
        //insert a Activity
        $activity = (new \App\Models\Activity())->create([
            'administrator_id' => 1,
            'name' => 'admin',
            'log' => 'Add Web Developer Vacancy',
        ]);
    
    }
}
