<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Animal;  
use App\Models\Especie;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{ 
    public function __construct()
        {
        $this->middleware('auth')->only(['create', 'update', 'destroy']);
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    { 
        $title = 'Animais registrados:';
        $animal= new Animal();
        $animais = $animal->searchAnimais()->paginate(4);
        return view('listAnimal', compact('animais', 'title'));
    }  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $especies = Especie::all();
        return view("createAnimal", compact('especies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = $request->except("_token"); 
        $animal = new Animal; 

        $this->validate($request, $animal->rules, $animal->messages);

        if ($request->hasFile('foto')){
            $rename = $request->file('foto')->store('fotos', 'public');
        }
        $data['foto'] = $rename;    
        $insert = Animal::create($data);
        if($insert)
            return redirect()->route('list');
        else
            return redirect()->route('create');
    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     
    public function show() 
    {
        //
    } 

     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $animal = Animal::find($id);
        $especies = Especie::all();  

        return view('editAnimal', compact('animal', 'especies'));   

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
        $data =$request->except('_token');   
        $animal = Animal::find($id);
 
        if ($request->hasFile('foto')){
            $rename = $request->file('foto')->store('fotos', 'public');
        } 
        $data['foto'] = $rename;  
        $update = $animal->update($data); 
        
        if($update)
            return redirect()->route('list');
        else
            return redirect()->route('edit', $id);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal = Animal::find($id);
        Storage::disk('public')->delete($animal->getAttributes()['foto']);
        $delete = $animal->delete();
        if($delete)
            return redirect()->route('list');
        else
            return redirect()->route('list');
    } 
}
