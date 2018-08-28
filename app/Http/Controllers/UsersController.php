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

    # Method untuk terima data dari borang tambah users
    # dan kemudian simpan rekod baru user ke dalam DB
    public function store(Request $request)
    {
        # validate 1 (laravel 5.4 dan ke bawah)
        // $this->validate( $request, [
        //     'nama' => 'required|min:3'
        // ]);

        # validate 2 (laravel 5.5 dan ke atas)
        $request->validate([
            'nama' => 'required|min:3',
            'username' => 'required|alpha_num',
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed',
            'role' => 'in:ADMIN,USER,STAFF'
        ]);

        $data = $request->except('nama', 'username');

        return $data;
    }


    # Papar borang edit user
    public function edit($id)
    {

        $page_title = 'Halaman Edit User';

        return view('users.template_edit', compact('page_title', 'id'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'username' => 'required|alpha_num',
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed',
            'role' => 'in:ADMIN,USER,STAFF'
        ]);
        
        $data = $request->all();

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }





}
