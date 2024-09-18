<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use App\Functions\Helper;
use App\Http\Requests\ComicRequest;

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
    public function store(ComicRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Helper::generateSlug($data['name'], Comic::class);

        $newComic = Comic::create($data);

        return redirect()->route('comics.show', $newComic);
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
    public function update(ComicRequest $request, Comic $comic)
    {
        $data = $request->all();

        if($data['name'] === $comic->name) {
            $data['slug'] = $comic->slug;
        }else{
            $data['slug'] = Helper::generateSlug($data['name'], Comic::class);
        }

        $comic->update($data);
        return redirect()->route('comics.show', $comic)->with('edited', 'Modifica avvenuta con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comic = Comic::find($id);
        $comic->delete();
        
        return redirect()->route('comics.index')->with('deleted', 'Cancellazione avvenuta con successo');
    }
}
