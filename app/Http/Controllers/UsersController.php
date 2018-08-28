<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    # Senarai users
    public function index()
    {

        $senarai_users = [
            ['id' => 1, 'nama' => 'Ahmad', 'email' => 'ahmad@gmail.com'],
            ['id' => 2, 'nama' => 'John', 'email' => 'john@gmail.com'],
            ['id' => 3, 'nama' => 'Muthu', 'email' => 'muthu@gmail.com']
        ];

        # Beri response paparkan template_index dari folder users
        return view('users.template_index', compact('senarai_users'));
    }

    # Papar borang tambah user
    public function create()
    {
        # Beri response paparkan template_create dari folder users
        return view('users.template_create');
    }


    # Papar borang edit user
    public function edit($id)
    {

        $page_title = 'Halaman Edit User';

        return view('users.template_edit', compact('page_title', 'id'));

    }
}
