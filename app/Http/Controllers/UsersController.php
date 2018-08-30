<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\User;

class UsersController extends Controller
{
    # Senarai users
    public function index()
    {
        # Dapatkan rekod dari table users
        // $senarai_users = DB::table('users')->get(); // Tukar ke datatables

        # Beri response paparkan template_index dari folder users
        // return view('users.template_index', compact('senarai_users'));
        return view('users.template_index');
    }

    # AJAX Request untuk datatables
    public function datatables()
    {
        # Query rekod users dari DB
        $query = User::select('id', 'nama', 'email', 'ic', 'role');
        # Beri response datatables beserta query
        return DataTables::of($query)
        ->addColumn('action', function ($item) {
            return '

<a class="btn btn-sm btn-info" href="' . route('users.edit', ['id' => $item->id ]) . '">EDIT</a>

<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-'. $item->id .'">
	DELETE
</button>

<!-- Modal -->
<form method="POST" action="'. route('users.destroy', ['id' => $item->id ]) .'">
' . csrf_field() . '
<input type="hidden" name="_method" value="delete">

<div class="modal fade" id="modal-delete-'. $item->id .'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Pengesahan</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	  <div class="modal-body">
		Adakah anda bersetuju untuk menghapuskan data berikut:

		<p>Nama: '. $item->nama .'</p>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-danger">Confirm</button>
	  </div>
	</div>
  </div>
</div>

</form>

            ';
        })
        ->make(true);
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
            'username' => 'required|alpha_num|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'ic' => 'required|unique:users,ic',
            'password' => 'required|min:3|confirmed',
            'role' => 'in:ADMIN,USER,STAFF'
        ]);
        # Dapatkan SEMUA data yang perlu diisi ke dalam table users
        $data = $request->only([
            'username',
            'nama',
            'role',
            'alamat',
            'ic',
            'email'
        ]);
        # Encrypt password
        $data['password'] = bcrypt($request->input('password'));

        # Simpan data ke dalam table users
        DB::table('users')->insert($data);
        # Beri respon redirect ke halaman senarai users
        return redirect()->route('users.index')->with('alert-success', 'Data berjaya ditambah!');
    }


    # Papar borang edit user
    public function edit($id)
    {
        # Dapatkan rekod user berdasarkan ID
        $user = DB::table('users')
        ->where('id', $id)
        ->first();
        # Bagi respon papar borang edit
        return view('users.template_edit', compact('user'));
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
        # Validasi data
        $request->validate([
            'nama' => 'required|min:3',
            'username' => 'required|alpha_num|unique:users,username,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            'ic' => 'required|unique:users,ic,'.$id,
            'role' => 'in:ADMIN,USER,STAFF'
        ]);
        # Dapatkan SEMUA data yang perlu diisi ke dalam table users
        $data = $request->only([
            'username',
            'nama',
            'role',
            'alamat',
            'ic',
            'email'
        ]);
        # Semak jika password wujud?
        if (!empty($request->input('password')) AND !is_null($request->input('password')))
        {
            $data['password'] = bcrypt($request->input('password'));
        }

        # Kemaskini data ke dalam table users berdasarkan ID user
        DB::table('users')
        ->where('id', $id)
        ->update($data);

        # Beri respon redirect ke halaman senarai users
        return redirect()->back()->with('alert-success', 'Data berjaya dikemaskini!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        # Kemaskini data ke dalam table users berdasarkan ID user
        DB::table('users')
        ->where('id', $id)
        ->delete();

        # Beri respon redirect ke halaman senarai users
        return redirect()->back()->with('alert-success', 'Data berjaya dihapuskan!');
    }

}
