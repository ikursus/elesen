<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\License;
use App\Models\Category;

class LicensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $senarai_licenses = License::all();

        return view('licenses/template_index', compact('senarai_licenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        # $senarai_kategori = Category::pluck('nama', 'id');
        $senarai_kategori = Category::select('nama', 'id')->get();
        $senarai_status = [
            ['status' => 'BATAL'],
            ['status' => 'AKTIF'],
        ];

        return view('licenses.template_create', compact('senarai_kategori', 'senarai_status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tarikh_mula' => 'required|date',
            'tarikh_tamat' => 'required|date',
            'category_id' => 'required',
            'status' => 'required',
            'provider' => 'required'
        ]);

        # Dapatkan SEMUA data dari borang
        $data = $request->all();

        # Simpan data ke dalam table licenses
        License::create($data);
        # Redirect ke senarai licenses
        return redirect()->route('licenses.index')->with('alert-success', 'Rekod berjaya ditambah!');

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
        //
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
        //
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
