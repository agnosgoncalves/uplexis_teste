<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $role_mananger = new Role();
    $role_mananger->name = 'mananger';
    $role_mananger->description = 'is type administrator system';

    $role_mananger->save();
  }
}
