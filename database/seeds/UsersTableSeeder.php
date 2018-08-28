<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Sample data user 1
        DB::table('users')->insert([
            'nama' => 'The Admin',
            'username' => 'admin',
            'ic' => '808080-08-0808',
            'role' => 'ADMIN',
            'email' => 'admin@gmail.com',
            'alamat' => 'Contoh Alamat 1',
            'password' => bcrypt('admin')
        ]);

        # Sample data user 2
        DB::table('users')->insert([
            'nama' => 'The Staff',
            'username' => 'staff',
            'ic' => '808181-08-1818',
            'role' => 'STAFF',
            'email' => 'staff@gmail.com',
            'alamat' => 'Contoh Alamat 2',
            'password' => bcrypt('test')
        ]);

        # Sample data user 3
        DB::table('users')->insert([
            'nama' => 'The User',
            'username' => 'user',
            'ic' => '828282-08-0808',
            'role' => 'USER',
            'email' => 'user@gmail.com',
            'alamat' => 'Contoh Alamat 3',
            'password' => bcrypt('user')
        ]);
    }
}
