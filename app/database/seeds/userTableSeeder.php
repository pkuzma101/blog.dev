<?php

class UserTableSeeder extends DatabaseSeeder {
	public function run() {
		$user = new User();
		$user->email = 'gogojones@gmail.com';
		$user->password = Hash::make('password123');
		$user->save();
	}
}


?>