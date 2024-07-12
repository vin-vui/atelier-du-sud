<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    /**
     * Display a listing of the category resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // la methode all récupère tous les données de la table Category de la base de données et les stocke dans une variable $category
        $categories = Category::all();
        //retourne la vue de l'ensemble de de la table category
        return view('atelierdusud.categories.index', compact('categories'));
    }

    /**
     * Display the form to create a new category resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //retourne une vue nommée category.create, donc un formulaire
      
        return view('atelierdusud.categories.index');
    }

    /**
     * Store a newly created category resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //la methode validate Verifie les données que l'utilisateur à envoyé à partir d'un formulaire
        //ma variable validated retourne un tableau

        $validated = $request->validate([
            'name' => 'required|max255',
            'color' => 'required',
            'status' => 'required'
        ]);

        // crée une représentation d'un enregistrement dans une table de donnée, remplissage de champ
        //je crée un nouvel objet de type category

        $category = new Category;

        //on assigne à chaque colonne de ma table category les données de mon validate qui est un tableau
        //Attention comme c'est un tableau  que l'on récupère donc on met entre crochet ['name...']

        $category->name = $validated['name'];
        $category->color = $validated['color'];
        $category->statut = $validated['status'];

        //sauvegarde dans la base de donnée

        $category->save();

        //redirige l'utilisateur vers la page d'index des categories
        return redirect('categories.index');

    }

    /**
     * Display the specified category resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function show(Category $id)
    {
        //  renvoie une vue de la catégories demandé
        return view('atelierdusud.categories.show');
    }

    /**
     * Display the form to edit a specified category resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function edit(Category $category)
    {
        //renvoie une vue de la catégorie demandé
        return view('atelierdusud.categories.edit', compact('category'));
    }


    /**
     * Update the specified category resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        //Verifie les données que l'utilisateur à envoyé à partir d'un formulaire
        $validated = $request->validate([
            'name' => 'required|max255',
            'status' => 'required'
        ]);

        $category->nom = $validated['name'];
        $category->statut = $validated['status'];

        //sauvegarde dans la base de donnée

        $category->save();

        //redirige l'utilisateur vers la page d'index des categories
        return redirect('categories.index');

    }

    /**
     * Remove the specified category resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */

    public function getCategories()
    {
        $categories = Category::all();
        return $categories;
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('categories.index');
    }

}