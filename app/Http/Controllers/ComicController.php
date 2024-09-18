<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use App\Functions\Helper;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::orderBy('name')->get();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'description' => 'required|min:3|max:255',
            'thumb' => 'required|min:3|max:250',
            'price' => 'required|numeric',
            'series' => 'required|min:3|max:100',
            'sale_date' => 'required|date',
            'type' => 'required|min:3|max:100'
        ],
        [
            'name.required' => 'Il nome è un campo obbligatorio',
            'name.min' => 'Il nome deve avere almeno :min caratteri',
            'name.max' => 'Il nome deve avere massimo :max caratteri',
            'description.required' => 'La descrizione è un campo obbligatorio',
            'description.min' => 'La descrizione deve avere almeno :min caratteri',
            'description.max' => 'La descrizione deve avere massimo :max caratteri',
            'thumb.required' => 'L\'immagine è un campo obbligatorio',
            'thumb.min' => 'L\'immagine deve avere almeno :min caratteri',
            'thumb.max' => 'L\'immagine deve avere massimo :max caratteri',
            'price.required' => 'Il prezzo è un campo obbligatorio',
            'price.numeric' => 'Il prezzo deve essere un numero',
            'series.required' => 'La serie è un campo obbligatorio',
            'series.min' => 'La serie deve avere almeno :min caratteri',
            'series.max' => 'La serie deve avere massimo :max caratteri',
            'sale_date.required' => 'La data di vendita è un campo obbligatorio',
            'sale_date.date' => 'La data di vendita di essere una data',
            'type.required' => 'Il tipo è un campo obbligatorio',
            'type.min' => 'Il tipo deve avere almeno :min caratteri',
            'type.max' => 'Il tipo deve avere massimo :max caratteri',
        ]);

        $data = $request->all();

        $newComic = new Comic();
        $newComic->name = $data['name'];
        $newComic->slug = Helper::generateSlug($data['name'], Comic::class);
        $newComic->description = $data['description'];
        $newComic->thumb = $data['thumb'];
        $newComic->price = $data['price'];
        $newComic->series = $data['series'];
        $newComic->sale_date = $data['sale_date'];
        $newComic->type = $data['type'];
        $newComic->save();

        return redirect()->route('comics.show', $newComic->id);

    }
    

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comic = Comic::find($id);
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $comic = Comic::find($id);

        if($data['name'] === $comic->name) {
            $data['slug'] = $comic->slug;
        }else{
            $data['slug'] = Helper::generateSlug($data['name'], Comic::class);
        }

        $comic->update($data);
        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comic = Comic::find($id);
        $comic->delete();
        
        return redirect()->route('comics.index');
    }
}
