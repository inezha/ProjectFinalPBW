<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CategoryName;

class CategoryNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_name = CategoryName::all();
        return view('categoriName.index', ['category_name' => $category_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoriName.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'category' => 'required',
            'description' => 'required'
        ]);

        //inser data to database
        $category_name = new CategoryName;

        $category_name->category = $request->category;
        $category_name->description = $request->description;

        $category_name->save();

        Alert::success('Berhasil', 'Berhasil Menambah Category');
        return redirect('/category_name');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category_name = CategoryName::find($id);
        return view('categoriName.show', ['category_name' => $category_name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_name = CategoryName::find($id);
        return view('categoriName.edit', ['category_name' => $category_name]);
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
        //validate
        $request->validate([
            'category' => 'required',
            'description' => 'required',
        ]);

        //update to
        $category_name = CategoryName::find($id);

        $category_name->category = $request->category;
        $category_name->description = $request->description;
        
        $category_name->save();

        Alert::success('Berhasil', 'Berhasil Update Category');
        return redirect('/category_name');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $category_name = CategoryName::find($id);
 
        $category_name->delete();

        Alert::success('Berhasil', 'Berhasil Hapus Category');
        return redirect('/category_name');
    }
}
