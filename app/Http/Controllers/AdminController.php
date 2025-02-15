<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    
   
        public function manageUsers()
        {
            $users = User::all(); // Récupère tous les utilisateurs
            return view('admin.manage_users', compact('users'));
        }
    
        // Dans app/Http/Controllers/AdminController.php
// Méthode pour afficher le formulaire d'édition d'un utilisateur
public function edit(User $user) {
    // Retourne la vue 'admin.users.edit' avec les informations de l'utilisateur
    // Le 'compact('user')' envoie l'objet $user à la vue
    return view('admin.edit', compact('user'));
}

// Méthode pour mettre à jour un utilisateur dans la base de données
public function update(Request $request, User $user) {
    // Validation des données envoyées dans la requête
    $request->validate([
        // Le champ 'name' est requis, doit être une chaîne de caractères et avoir une longueur maximale de 255 caractères
        'name' => 'required|string|max:255',

        // Le champ 'email' est requis, doit être une adresse email valide, 
        // et doit être unique dans la table 'users', à l'exception de l'email de l'utilisateur actuel (pour éviter la duplication)
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,

        // Le champ 'role' est requis et doit être soit 'admin', soit 'patient'
        'role' => 'required|in:admin,patient,doctor',
    ]);

    // Mise à jour des données de l'utilisateur avec les données envoyées dans la requête
    // $request->all() récupère toutes les données de la requête, telles que 'name', 'email', 'role'
    $user->update($request->all());

    // Une fois l'utilisateur mis à jour, redirige vers la liste des utilisateurs (admin.users.index)
    // Avec un message flash 'success' pour indiquer que la mise à jour a été réussie
    return redirect()->route('admin.manage_users')->with('success', 'User updated successfully.');
    
}
public function destroy(User $user) {
    // Suppression de l'utilisateur
    $user->delete();

    // Redirection avec message de succès
    return redirect()->route('admin.manage_users')->with('success', 'User deleted successfully.');
}
    
}