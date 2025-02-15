<x-app-layout>  
    <x-slot name="header">  
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight" style="font-size: 1.2rem; font-weight: bold;color: white">  
            {{ __('Modifier user') }}  
        </h2>  
    </x-slot>  

    <div class="container mx-auto mt-10" style="padding-top: 29px" >  
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6 w-3/4 mx-auto" style="background-color: #ccffcc;"> <!-- Container Style -->  
            @csrf  
            @method('PUT') <!-- Cela permet de simuler la méthode PUT pour la mise à jour -->  

            <div class="mb-4">  
                <label for="name" class="block text-black text-lg font-bold mb-2">Nom</label> <!-- Styled Label -->  
                <input type="text" name="name" id="name" value="{{ $user->name }}" required class="border border-gray-300 rounded-lg w-full py-2 px-3 text-lg"> <!-- Styled Input -->  
            </div>  

            <div class="mb-4">  
                <label for="email" class="block text-black text-lg font-bold mb-2">Email</label> <!-- Styled Label -->  
                <input type="email" name="email" id="email" value="{{ $user->email }}" required class="border border-gray-300 rounded-lg w-full py-2 px-3 text-lg"> <!-- Styled Input -->  
            </div>  

            <div class="mb-4">  
                <label for="role" class="block text-black text-lg font-bold mb-2">Rôle</label> <!-- Styled Label -->  
                <select name="role" id="role" required class="border border-gray-300 rounded-lg w-full py-2 px-3 text-lg"> <!-- Styled Select -->  
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>  
                    <option value="patient" {{ $user->role == 'patient' ? 'selected' : '' }}>Patient</option>  
                    <option value="doctor" {{ $user->role == 'doctor' ? 'selected' : '' }}>Doctor</option>  
                </select>  
            </div>  

            <div class="flex justify-center"> <!-- Added container to center the button -->  
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 text-lg font-bold" style="background-color:#45a049 ">Mettre à Jour</button> <!-- Styled Button -->  
            </div>  
        </form>  
    </div>  
</x-app-layout>