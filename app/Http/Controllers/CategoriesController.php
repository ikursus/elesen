<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $senarai_categories = [
        //     ['id' => 1, 'kod' => 'A', 'nama' => 'UMUM'],
        //     ['id' => 2, 'kod' => 'B', 'nama' => 'SEWA'],
        //     ['id' => 3, 'kod' => 'C', 'nama' => 'PERNIAGAAN']
        // ];
        # Dapatkan SEMUA rekod dari table categories dan rename column kod kepada kod_kategori
        // $senarai_categories = DB::table('categories')
        // ->select('id', 'kod as kod_kategori', 'nama')
        // ->get();
        # Dapatkan rekod daripada table kategori dan set pagination kepada 2 rekod setiap satu halaman
        $senarai_categories = DB::table('categories')
        //->where('id', '<=', 3)
        ->select('id', 'kod as kod_kategori', 'nama')
        ->orderBy('id', 'desc') // asc atau desc
        ->paginate(2);

        # Beri response paparkan template_index dari folder categories
        return view('categories.template_index', compact('senarai_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        # Beri response paparkan template_create dari folder categories
        return view('categories.template_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # Validate data
        $request->validate([
            'kod' => 'required|alpha_num',
            'nama' => 'required|min:3',
        ]);

        # Dapatkan data dari borang
        $data = $request->only('kod', 'nama');

        # Simpan data ke dalam table categories
        DB::table('categories')->insert($data);

        # Redirect client ke senarai categories dan sertakan ayat sukses menerusi flash messaging
        return redirect()->route('categories.index')->with('alert-success', 'Data berjaya ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        # Dapatkan rekod dari table categories berdasarkan ID
        $category = DB::table('categories')
        ->where('id', '=', $id)
        ->first();
        # Bagi respon papar borang edit
        return view('categories.template_edit', compact('category'));
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
            'kod' => 'required|alpha_num',
            'nama' => 'required|min:3',
        ]);

        # Dapatkan data dari borang
        $data = $request->only('kod', 'nama');

        # Kemaskini data berdasarkan ID ke dalam table categories
        DB::table('categories')
        ->where('id', '=', $id)
        ->update($data);

        # Redirect client ke halaman sebelum (halaman yang sedang di edit)
        return redirect()->back()->with('alert-success', 'Data berjaya dikemaskini.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        # Dapatkan rekod berdasarkan ID dan hapuskan ia
        $category = DB::table('categories')
        ->where('id', '=', $id)
        ->delete();

        # Redirect client ke senarai categories dan sertakan ayat sukses menerusi flash messaging
        return redirect()->route('categories.index')->with('alert-success', 'Data berjaya dihapuskan.');
    }
}
