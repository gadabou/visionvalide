<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer tous les commentaires
        $comments = Comment::orderBy('created_at', 'desc')->get();
        return view('article.detaille', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Afficher le formulaire de création d'un nouveau commentaire
        $articles = Article::all(); // Liste des articles pour associer le commentaire
        return view('comments.create', compact('articles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données envoyées par le formulaire
        $validatedData = $request->validate([
            'post_id' => 'required|exists:articles,id',
            'email' => 'required|email',
            'body' => 'required|string',
            'name' => 'nullable|string|max:100',
        ]);

        // Créer un nouveau commentaire avec les données validées
        Comment::create($validatedData);

        // Rediriger vers la liste des commentaires avec un message de succès
        return redirect()->route('comments.index')->with('success', 'Comment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        // Afficher les détails d'un commentaire spécifique
        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        // Afficher le formulaire d'édition d'un commentaire spécifique
        $articles = Article::all(); // Liste des articles pour associer le commentaire
        return view('comments.edit', compact('comment', 'articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        // Valider les données envoyées par le formulaire
        $validatedData = $request->validate([
            'post_id' => 'required|exists:articles,id',
            'email' => 'required|email',
            'body' => 'required|string',
            'name' => 'nullable|string|max:100',
        ]);

        // Mettre à jour le commentaire avec les nouvelles données
        $comment->update($validatedData);

        // Rediriger vers la liste des commentaires avec un message de succès
        return redirect()->route('comments.index')->with('success', 'Comment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        // Supprimer le commentaire spécifié
        $comment->delete();

        // Rediriger vers la liste des commentaires avec un message de succès
        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully.');
    }
}
