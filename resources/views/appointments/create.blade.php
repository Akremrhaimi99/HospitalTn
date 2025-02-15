<!-- resources/views/appointments/create.blade.php -->  
<x-app-layout>  
    <x-slot name="header">  
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight" style="font-size: 1.2rem; font-weight: bold;color: white">  
            {{ __('Rendez-vous creation') }}  
        </h2>  
    </x-slot>  

    <div class="container mx-auto mt-10" >  
        <h2 style="font-size: 30px; font-weight: bold; text-align: center; margin-bottom: 1rem;color: #45a049; padding-top:29px ">  
            Formulaire de Rendez-vous  
        </h2>
        
        <form method="POST" action="{{ route('patient.appointments.store') }}" class="bg-white shadow-md rounded-lg p-8 mb-6" style="background-color: #ccffcc">  
            @csrf  

            <div class="mb-4">  
                <label for="doctor_id" class="block text-gray-700 text-sm font-semibold mb-2" style="padding-top: 30px">Sélectionnez un médecin:</label>  
                <select name="doctor_id" id="doctor_id" required class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">  
                    @foreach($doctors as $doctor)  
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>  
                    @endforeach  
                </select>  
            </div>  

            <div class="mb-4">  
                <label for="appointment_time" class="block text-gray-700 text-sm font-semibold mb-2">Date et heure du rendez-vous:</label>  
                <input type="datetime-local" name="appointment_time" id="appointment_time" required class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">  
                @if ($errors->has('appointment_time'))  
                    <div class="text-red-500 text-sm mt-1">  
                        {{ $errors->first('appointment_time') }}  
                    </div>  
                @endif  
            </div>  

            <!-- Centering the button -->  
            <div class="flex justify-center" style="padding: 30px">  
                <button type="submit" 
                style="background-color:#45a049" class="bg-[#45a049] hover:bg-green-600 text-white font-semibold py-2 px-6 rounded focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-200">  
                    Prendre rendez-vous  
                </button>  
            </div>  
        </form>
        </div>  
      
</x-app-layout>