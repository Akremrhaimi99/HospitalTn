<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    // Méthode pour afficher le formulaire de création d'un rendez-vous
    public function create()
    {
        // Récupère tous les médecins dans la base de données. Assurez-vous que vous n'ayez pas de médecins déjà supprimés
        $doctors = User::where('role', 'doctor')->get();

        // Retourne la vue pour créer un rendez-vous avec les médecins récupérés
        return view('appointments.create', compact('doctors'));
    }

    // Méthode pour enregistrer un rendez-vous
    public function store(Request $request)
    {
      
        // Valide les données envoyées par le formulaire
        $request->validate([
            'doctor_id' => 'required|exists:users,id', // Vérifie si le médecin existe dans la table 'users'
            'appointment_time' => 'required|date|after:now', // Vérifie que la date du rendez-vous est valide
            
        ]);
        
        // Vérifie si le créneau est déjà réservé pour ce médecin
        $existingAppointment = Appointment::where('doctor_id', $request->doctor_id)
                                          ->where('appointment_time', $request->appointment_time)
                                          ->exists();

        if ($existingAppointment) {
        return redirect()->back()->withErrors(['appointment_time' => 'Ce créneau est déjà réservé pour ce médecin.']);
        }

        // Crée un nouveau rendez-vous avec les données validées
        Appointment::create([
            'patient_id' => auth()->id(), // L'ID du patient connecté
            'doctor_id' => $request->doctor_id, // L'ID du médecin sélectionné
            'appointment_time' => $request->appointment_time, // L'heure du rendez-vous
            'status' =>'pending', // Forcer "pending" 
        ]);

        // Redirige l'utilisateur vers le formulaire avec un message de succès
        return redirect()->back()->with('success', 'Rendez-vous demandé avec succès');
    }

    // Méthode pour afficher les rendez-vous d'un patient
    public function index()
    {
        // Récupère les rendez-vous du patient authentifié
        $appointments = Appointment::where('patient_id', auth()->id())->get();

        // Retourne la vue avec les rendez-vous du patient
        return view('patients.appointments', compact('appointments'));
    }
}