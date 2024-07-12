<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

/**
 * Class ArtistController
 * @package App\Http\Controllers
 */
class ArtistController extends Controller
{
    /**
     * Display a listing of the artist resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // la methode orderby récupère et trie les données des artistes de la base de données par la date de création et dans l'ordre décroissant  et les stocke dans une variable $artists
        $artists = Artist::orderby('created_at', 'desc')->get();
        // SELECT * FROM artists;

        return view('atelierdusud.artists.index', ['artists' => $artists]);
        // renvoie une vue avec toute les données de la table Artist
    }

    /**
     * Display the form to create a new artist resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //retourne une vue nommée artist.create, donc un formulaire
        return view('atelierdusud.artists.create');
    }

    /**
     * Store a newly created artist resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        //la methode validate Verifie les données que l'utilisateur à envoyé à partir d'un formulaire
        //ma variable validated retourne un tableau
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|boolean',
            'url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // crée une représentation d'un enregistrement dans une table de donnée, remplissage de champ
        //je crée un nouvel objet de type artist
        $artist = new Artist;

        //on assigne à chaque colonne de ma table artist les données de mon validate qui est un tableau
        //Attention comme c'est un tableau  que l'on récupère donc on met entre crochet ['name...']
        $artist->name = $validated['name'];
        $artist->description = $validated['description'];
        $artist->status = $validated['status'];

        //on récupère l'image et on la stocke
        $imageName = time() . '.' . $request->url->extension();
        $request->url->move(public_path('artists_img'), $imageName);
        $artist->url = './artists_img/' . $imageName;

        //sauvegarde dans la base de donnée
        $artist->save();

        //redirige l'utilisateur vers la page d'index des artistes
        return redirect('artists');
    }

    /**
     * Display the specified artist resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\View\View
     */
    public function show(Artist $artist)
    {
        //renvoie une vue de l'artiste demandé
        return view('atelierdusud.artists.show', compact('artist'));
    }

    /**
     * Display the form to edit a specified work resource.
     *
     * @param  \App\Models\Artist $artist
     * @return \Illuminate\View\View
     */
    public function edit(Artist $artist)
    {
        //renvoie une vue de l'artiste demandé
        return view('atelierdusud.artists.edit', compact('artist'));
    }

    /**
     * Update the specified artist resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artist $artist
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Artist $artist)
    {
        // Vérifie les données que l'utilisateur à envoyé à partir d'un formulaire
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|boolean',
            'url' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Met à jour les propriétés de l'artiste avec les données soumises, les règles
        $artist->name = $validated['name'];
        $artist->description = $validated['description'];
        $artist->status = $validated['status'];

        // Si l'utilisateur a fourni une URL, met à jour la propriété URL de l'artiste
        if ($request->hasFile('url')) {
            $imageName = time() . '.' . $request->url->extension();
            $request->url->move(public_path('artists_img'), $imageName);
            $artist->url = './artists_img/' . $imageName;
        }

        // sauvegarde l'artiste dans la base de données
        $artist->save();

        // redirige l'utilisateur vers la page d'index des artistes
        return redirect('artists');
    }

    /**
     * Remove the specified artist resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Artist $artist)
    {
        $artist->delete();
        return redirect('artists')->with('success', 'artiste  supprimée avec succès');
    }
}