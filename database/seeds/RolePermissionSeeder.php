<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$admin = new Role();
    	$admin->name  = 'admin';
    	$admin->status = 1;
		$admin->save();

		$ceo = new Role();
		$ceo->name = 'ceo';
		$ceo->status = 1;
		$ceo->save();

		$cto = new Role();
		$cto->name = 'cto';
		$cto->status = 1;
		$cto->save();

		$teamleader = new Role();
		$teamleader->name = 'team-leader';
		$teamleader->status = 1;
		$teamleader->save();

		$teammember = new Role();
		$teammember->name = 'team-member';
		$teammember->status = 1;
		$teammember->save();

		$userAdmin = User::where('name', '=', 'jahid+test@itobuz.com')->first();
		$userAdmin->attachRole($admin);
		$userAdmin->roles()->attach($admin->id);

		$createPost = new Permission();
		$createPost->name         = 'create-users';
		$createPost->display_name = 'Create Posts'; // optional
		// Allow a user to...
		$createPost->description  = 'create new blog posts'; // optional
		$createPost->save();

		$editUser = new Permission();
		$editUser->name         = 'edit-user';
		$editUser->display_name = 'Edit Users'; // optional
		// Allow a user to...
		$editUser->description  = 'edit existing users'; // optional
		$editUser->save();

		$deleteUser = new Permission();
		$deleteUser->name         = 'delete-user';
		$deleteUser->display_name = 'Delete Users'; // optional
		// Allow a user to...
		$deleteUser->description  = 'delete existing users'; // optional
		$deleteUser->save();

		$admin->attachPermission($createPost, $editUser, $deleteUser);
		// equivalent to $admin->perms()->sync(array($createPost->id));
		$ceo->attachPermissions(array($createPost, $editUser, $deleteUser));
		$cto->attachPermissions(array($createPost, $editUser, $deleteUser));
		// equivalent to $owner->perms()->sync(array($createPost->id, $editUser->id));

    }
}
