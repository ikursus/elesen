<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $senarai_categories = [
            ['id' => 1, 'kod' => 'A', 'nama' => 'UMUM'],
            ['id' => 2, 'kod' => 'B', 'nama' => 'SEWA'],
            ['id' => 3, 'kod' => 'C', 'nama' => 'PERNIAGAAN']
        ];

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
        $request->validate([
            'kod' => 'required|alpha_num',
            'nama' => 'required|min:3',
        ]);

        $data = $request->all();

        return $data;
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
        return view('categories.template_edit', compact('id'));
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
