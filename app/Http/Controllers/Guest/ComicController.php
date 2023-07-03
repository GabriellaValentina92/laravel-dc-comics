<?php

namespace App\Http\Controllers\Guest;

use App\Models\Comic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComicController extends Controller
{  
    //Metodo 2: spostare l'array rendendo il tutto dinamico 
    // private $validation = [
    //     'title'=> 'required|string|max:100',
    //     'thumb'=> 'required|url',
    //     'description' => 'required|string',
    //     'series' => 'required|string|max:50',
    //     'type' => 'required|string|max:30',
    //     'sale_date'=> 'required|date',
    //     'price' => 'required|decimal:2',
        
    // ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all(); //oppure per la paginazione Comic::paginate(n. di elementi che si voglono mostrare)
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validare i dati metodo 1
        $request ->validate([
            'title'=> 'required|string|max:100',
            'thumb'=> 'required|url',
            'description' => 'required|string',
            'series' => 'required|string|max:50',
            'type' => 'required|string|max:30',
            'sale_date'=> 'required|date',
            'price' => 'required|decimal:2',
            
        ]);

        //metodo 2
        // $request->validate($this->validation);

        $data = $request->all();
        // salvare i dati nel db (questo metodo anche se è più lungo è il più sicuro)
        $newComic = new Comic();
        $newComic->title = $data['title'];
        $newComic->thumb = $data['thumb'];
        $newComic->description = $data['description'];
        $newComic->series = $data['series'];
        $newComic->type = $data['type'];
        $newComic->sale_date = $data['sale_date'];
        $newComic->price = $data['price'];
        $newComic-> save();

        //serve per togliere il token per metterlo dentro l'array se lo facciamo in automatico e non come sopra
        unset($data['_token']);
        return redirect()-> route('comics.show', ['comic'=> $newComic->id]);

        //metodo 2 
        //Comic::create($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show( Comic $comic) //dependecy injections
    {
        // $comic = Comic::findorfail($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        //validare i dati metodo 1
        $request ->validate([
            'title'=> 'required|string|max:100',
            'thumb'=> 'required|url',
            'description' => 'required|string',
            'series' => 'required|string|max:50',
            'type' => 'required|string|max:30',
            'sale_date'=> 'required|date',
            'price' => 'required|decimal:2',
            
        ]);

        //metodo 2
        // $request->validate($this->validation);

        //aggiornare i dati
        $data= $request->all();

        $comic->title = $data['title'];
        $comic->thumb = $data['thumb'];
        $comic->description = $data['description'];
        $comic->series = $data['series'];
        $comic->type = $data['type'];
        $comic->sale_date = $data['sale_date'];
        $comic->price = $data['price'];
        $comic->update();

        //fare il redirect
        return to_route('comics.show', ['comic'=> $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return to_route('comics.index')->with('delete_success', "The comic \"{$comic->title}\" has been deleted");
    }
}
