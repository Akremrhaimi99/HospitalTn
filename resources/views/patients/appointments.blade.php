<!-- resources/views/appointments/index.blade.php -->  
<x-app-layout>  
    <x-slot name="header" >  
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight" style="font-size: 1.2rem; font-weight: bold;color: white">  
            {{ __('Mes Rendez-vous') }}  
        </h2>  
    </x-slot>  

    <div class="container mx-auto mt-10">   
        <h2 style="font-size: 30px; font-weight: bold; text-align: center; margin-bottom: 1rem;color: #45a049; padding-top:29px ">  
            Mes Rendez-vous  
        </h2>
        <!-- Vérifiez si le patient a des rendez-vous -->   
        @if($appointments->isEmpty())  
            <p class="text-center text-gray-600 mt-4" style="color:#45a049;  ">Aucun rendez-vous à afficher.</p>  
        @else  
            <div class="overflow-x-auto" style="padding: 50px">  
                <table class="min-w-full bg-white shadow-md rounded-lg mx-auto" style="background-color: #ccffcc;">  
                    <thead class="bg-gray-100">  
                        <tr>  
                            <th class="py-4 px-6 border-b text-left text-gray-600 text-lg">Médecin</th>  
                            <th class="py-4 px-6 border-b text-left text-gray-600 text-lg">Date</th>  
                            <th class="py-4 px-6 border-b text-left text-gray-600 text-lg">Statut</th>  
                        </tr>  
                    </thead>  
                    <tbody>  
                        @foreach($appointments as $appointment)  
                            <tr class="hover:bg-gray-50">  
                                <td class="py-4 px-6 border-b text-lg">
                                    {{ $appointment->doctor?->name ?? 'Non assigné' }}
                                </td>  
                                <td class="py-4 px-6 border-b text-lg">{{ $appointment->appointment_time }}</td>  
                                <td class="py-4 px-6 border-b text-lg">{{ $appointment->status }}</td>  
                            </tr>  
                        @endforeach  
                    </tbody>  
                </table>  
            </div>  
        @endif  
    </div>  
</x-app-layout>