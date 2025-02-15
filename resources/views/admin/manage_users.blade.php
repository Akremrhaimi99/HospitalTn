<x-app-layout>  
    <x-slot name="header">  
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight" style="font-size: 1.2rem; font-weight: bold;color: white">   
            {{ __('Utilisateur liste') }}  
        </h2>  
    </x-slot>  

    <div class="container mx-auto mt-10">  
        <h2 style="font-size: 30px; font-weight: bold; text-align: center; margin-bottom: 1rem;color: #45a049; padding-top:29px ">  
            Gérer les Utilisateurs 
        </h2>
         
        <p class="text-lg text-center mb-4" style="color: #45a049">Ici, vous pouvez gérer tous les utilisateurs du système.</p> <!-- Centered Paragraph -->  

        <div class="overflow-x-auto">  
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden mx-auto w-3/4" >  
                <thead>  
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">  
                        <th class="py-3 px-6 text-black text-lg">Nom</th> <!-- Text increased size and color -->  
                        <th class="py-3 px-6 text-black text-lg">Email</th> <!-- Text increased size and color -->  
                        <th class="py-3 px-6 text-black text-lg">Rôle</th> <!-- Text increased size and color -->  
                        <th class="py-3 px-6 text-black text-lg">Actions</th> <!-- Text increased size and color -->  
                    </tr>  
                </thead>  
                <tbody class="text-gray-600 text-sm font-light" style="background-color:  #ccffcc ">  
                    @foreach ($users as $user)  
                        <tr class="border-b border-gray-200 hover:bg-gray-100">  
                            <td class="py-4 px-6 text-black text-lg">{{ $user->name }}</td> <!-- Text increased size and color -->  
                            <td class="py-4 px-6 text-black text-lg">{{ $user->email }}</td> <!-- Text increased size and color -->  
                            <td class="py-4 px-6 text-black text-lg">{{ $user->role }}</td> <!-- Text increased size and color -->  
                            <td class="py-4 px-6 flex justify-center space-x-2">  
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600" style="color:#45a049 ">Editer l'Utilisateur</a>  
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">  
                                    @csrf  
                                    @method('DELETE')  
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" style="color:#45a049 ">Supprimer</button>  
                                </form>  
                            </td>  
                        </tr>  
                    @endforeach  
                </tbody>  
            </table>  
        </div>  
    </div>  
</x-app-layout>