<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }
    public function index()
    {   
        $menu=menu::all();
        return view('Tmeal.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return view ('Tmeal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type_name' => 'required'
        ]);

        $menu = new menu;

        $menu->type_name = $request->type_name;

        $menu->save();


        return redirect('/Tmeal')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $menu = menu::findOrFail($id);
        return view('Tmeal.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
 
     public function update(Request $request, $id)
     {
         $request->validate([
             'type_name' => 'required'
         ]);
 
         $menu = menu::findOrFail($id);
         $menu->type_name = $request->type_name;
         $menu->save();
 
         return redirect('/Tmeal')->with('success', 'Data berhasil diperbarui');
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = menu::findOrFail($id);
        $menu->delete();

        return redirect('/Tmeal')->with('success', 'Data berhasil dihapus');
    }
}
