<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer toutes les catégories
        //$categories = Categorie::orderBy('created_at', 'desc')->get();
        //return view('categories.index', compact('categories'));
        return view('categories');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Afficher le formulaire de création d'une nouvelle catégorie
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données envoyées par le formulaire
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Créer une nouvelle catégorie avec les données validées
        Categorie::create($validatedData);

        // Rediriger vers la liste des catégories avec un message de succès
        return redirect()->route('categories.index')->with('success', 'Categorie created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        // Afficher les détails d'une catégorie spécifique
        return view('categories.show', compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        // Afficher le formulaire d'édition d'une catégorie spécifique
        return view('categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        // Valider les données envoyées par le formulaire
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Mettre à jour la catégorie avec les nouvelles données
        $categorie->update($validatedData);

        // Rediriger vers la liste des catégories avec un message de succès
        return redirect()->route('categories.index')->with('success', 'Categorie updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        // Supprimer la catégorie spécifiée
        $categorie->delete();

        // Rediriger vers la liste des catégories avec un message de succès
        return redirect()->route('categories.index')->with('success', 'Categorie deleted successfully.');
    }
}
