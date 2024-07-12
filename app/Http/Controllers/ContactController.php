<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class ContactController
 * @package App\Http\Controllers
 */

class ContactController extends Controller
{

    /**
     * Display the specified contact resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('contact');
    }
    /**
     * Store a newly created contact resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'message' => 'required',
            ],

            //Cette ligne de code valide les données du formulaire et personnalise les messages d'erreur pour chaque champ
            [
                'name.required' => 'Le champ nom est obligatoire.',
                'name.max' => 'Le champ nom ne peut pas dépasser 255 caractères.',
                'email.required' => 'Le champ email est obligatoire.',
                'email.email' => 'Le champ email doit avoir une adresse email valide.',
                'message.required' => 'Le champ message est obligatoire.',
            ]
        );

        // Valider et Traiter les données du formulaire
        return redirect()->route('contact')->with('success', 'Votre message a été envoyé avec succès !');
    }
}