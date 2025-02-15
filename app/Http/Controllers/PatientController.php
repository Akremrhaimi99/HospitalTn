<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Méthode pour afficher le tableau de bord des patients
    public function dashboard()
    {
        // Retourne la vue spécifique pour les patients (par exemple, la vue de tableau de bord)
        return view('patient.dashboard');
    }

    // Méthode pour afficher le formulaire de création d'un rendez-vous
    public function createAppointment()
    {
        // Récupère tous les médecins dans la base de données (seulement ceux avec le rôle 'doctor')
        $doctors = User::where('role', 'doctor')->get();

        // Retourne la vue pour créer un rendez-vous, en passant les médecins disponibles
        return view('appointments.create', compact('doctors'));
    }

    // Méthode pour enregistrer un rendez-vous
    public function storeAppointment(Request $request)
    {
        // Valide les données envoyées par le formulaire
        $request->validate([
            'doctor_id' => 'required|exists:users,id', // Vérifie si le médecin existe dans la base
            'appointment_time' => 'required|date|after:now', // Vérifie que la date est valide et après la date actuelle
        ]);

        // Vérifie si le médecin est déjà occupé à la date donnée
        $existingAppointment = Appointment::where('doctor_id', $request->doctor_id)
                                          ->where('appointment_time', $request->appointment_time)
                                          ->exists();

        // Si un rendez-vous existe déjà, renvoie une erreur
        if ($existingAppointment) {
            return back()->withErrors(['appointment_time' => 'Ce créneau est déjà pris']);
        }

        // Enregistre le nouveau rendez-vous dans la base de données
        Appointment::create([
            'patient_id' => auth()->id(), // L'ID du patient connecté
            'doctor_id' => $request->doctor_id, // L'ID du médecin sélectionné
            'appointment_time' => $request->appointment_time, // L'heure du rendez-vous
            'status' => 'pending', // Le statut initial du rendez-vous (par défaut "pending")
        ]);

        // Redirige vers la liste des rendez-vous avec un message de succès
        return redirect()->route('appointments.index')->with('success', 'Rendez-vous réservé avec succès');
    }
}