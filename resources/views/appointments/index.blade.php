<x-app-layout>  
    <x-slot name="header">  
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight" style="font-size: 1.2rem; font-weight: bold;color: white">  
            {{ __('Rendez-vous en attente') }}  
        </h2>  
    </x-slot>  

    <div class="container mx-auto mt-10">
        <h2 style="font-size: 30px; font-weight: bold; text-align: center; margin-bottom: 1rem;color: #45a049; padding-top:29px ">  
            Rendez-vous en attente  
        </h2>  
         

        @foreach ($appointments as $appointment)  
            <div class="bg-white shadow-md rounded-lg p-4 mb-4 text-center" style="background-color:#ccffcc ">  <!-- Center content -->  
                <p class="text-lg font-semibold">Patient : {{ $appointment->patient->name }}</p>  
                <p class="text-lg">Date : {{ $appointment->appointment_time }}</p>  
                <div class="mt-4 flex justify-center"> <!-- Flex container for buttons -->  
                    <form action="{{ route('doctor.appointments.accept', $appointment->id) }}" method="POST" style="margin-right: 10px;">  <!-- Adds space with margin -->  
                        @csrf  
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600" style="background-color:#45a049 ">Accepter</button>  
                    </form>  
                    <form action="{{ route('doctor.appointments.reject', $appointment->id) }}" method="POST">  
                        @csrf  
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" style="background-color:#45a049 ">Refuser</button>  
                    </form>  
                </div>  
            </div>  
        @endforeach  
    </div>  
</x-app-layout>