<?php
  use Illuminate\Database\Seeder;
  use App\Role;
  use App\User;

  class UserTableSeeder extends Seeder
  {
    public function run()
    {
      // register default mananger user
      $role_manager = Role::where('name', 'mananger')->first();
      $manager = new User();
      $manager->name = 'Admin';
      $manager->email = 'admin@admin.com';
      $manager->password = bcrypt('admin');
      $manager->save();
      $manager->roles()->attach($role_manager);
    }
  }
