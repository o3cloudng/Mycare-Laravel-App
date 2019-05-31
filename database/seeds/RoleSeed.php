<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget( 'spatie.permission.cache' );
		
        Role::create( [ 'name' => 'administrator' ] );
        Role::create( [ 'name' => 'doctor' ] );
        Role::create( [ 'name' => 'physical-trainer' ] );
        Role::create( [ 'name' => 'health-coach' ] ); 
        Role::create( [ 'name' => 'nutritionist' ] );
        Role::create( [ 'name' => 'subscriber' ] );
    }
}
