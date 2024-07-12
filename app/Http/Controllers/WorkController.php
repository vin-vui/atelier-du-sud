<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Artist;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Class WorkController
 * @package App\Http\Controllers
 */
class WorkController extends Controller
{
    /**
     * Display a listing of the work resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
         // la methode orderby récupère et trie les données des oeuvres de la base de données par la date de création et dans l'ordre décroissant  et les stocke dans une variable $works
        $works = Work::orderBy('created_at' , 'desc')->get();

        // Renvoie la vue avec toute les données de ma table Work
        return view('atelierdusud.works.index', ['works' => $works]);
    }


    /**
     * Display the form to create a new work resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        $artists = Artist::all();
        // Retourne une vue nommée works.create, donc un formulaire
        return view('atelierdusud.works.create', compact('categories', 'artists'));
    }

    /**
     * Store a newly created work resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // la méthode validate vérifie les données que l'utilisateur à envoyé à partir d'un formulaire
        // Ma variable validated retourne un tableau
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required',
            'artists' => 'required|array',
            'status' => 'required|boolean',
            'url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Crée une représentation d'un enregistrement dans une table de donnée, remplissage de champ
        // Je crée un nouvel objet de type work
        $work = new Work;

        // On assigne à chaque colonne de ma table artist les données de mon validate qui est un tableau
        // Attention comme c'est un tableau  que l'on récupère donc on met entre crochet ['name...']
        $work->title = $validated['title'];
        $work->description = $validated['description'];
        $work->category_id = $validated['category_id'];
        $work->status = $validated['status'];

        //on récupère l'image et on la stocke
        $imageName = time() . '.' . $request->url->extension();
        $request->url->move(public_path('works_img'), $imageName);
        $work->url = './works_img/' . $imageName;


        // Sauvegarde dans la base de donnée
        $work->save();

        $work->artists()->sync($validated['artists']);

        // Redirige l'utilisateur vers la page d'index des oeuvres
        return redirect()->route('works.index');
    }

    /**
     * Display the specified work resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\View\View
     */
    public function show(Work $work)
    {
        // Renvoie une vue de l'oeuvre demandé
        return view('atelierdusud.works.show', compact('work'));
    }

    /**
     * Display the form to edit a specified work resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\View\View
     */
    public function edit(Work $work)
    {
        $categories = Category::all();
        $artists = Artist::all();
        // Renvoie une vue de l'artiste demandé
        return view('atelierdusud.works.edit', compact('work', 'categories', 'artists'));
    }

    /**
     * Update the specified work resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Work $work)
    {
        // Vérifie les données que l'utilisateur à envoyé à partir d'un formulaire
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required',
            'artists' => 'required|array',
            'status' => 'required|boolean',
            'url' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Mette à jour les propriétés de l'artiste avec les données soumises
        $work->title = $validated['title'];
        $work->description = $validated['description'];
        $work->category_id = $validated['category_id'];
        $work->status = $validated['status'];

        if ($request->hasFile('url')) {
            $imageName = time() . '.' . $request->url->extension();
            $request->url->move(public_path('works_img'), $imageName);
            $work->url = './works_img/' . $imageName;
        }

        $work->artists()->sync($validated['artists']);

        // Sauvegarde dans la base de donnée
        $work->save();

        // Redirige l'utilisateur vers la page d'index des oeuvres
        return redirect('works');
    }

    /**
     * Remove the specified work resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Work $work)
    {
        $work->delete();
        return redirect('works');
    }
}