<!DOCTYPE html>  
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">  
<head>  
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Laravel</title>  

    <link rel="preconnect" href="https://fonts.bunny.net">  
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />  

    <style>  
        body {  
            background-color: #e8f5e9; /* Couleur de fond plus claire */  
            display: flex;  
            align-items: center;  
            justify-content: center;  
            height: 100vh; /* Prend toute la hauteur de la fenêtre */  
            margin: 0; /* Supprime les marges par défaut */  
            font-family: 'Figtree', sans-serif; /* Application de la police */  
        }  

        form {  
            background-color: white; /* Couleur de fond du formulaire */  
            padding: 30px; /* Augmente le padding pour un meilleur espacement */  
            border-radius: 10px; /* Coins arrondis */  
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Ombre douce du formulaire */  
            width: 400px; /* Largeur fixe du formulaire */  
            box-sizing: border-box; /* Inclut le padding dans la largeur totale */  
        }  

        h2 {  
            text-align: center; /* Centre le titre du formulaire */  
            margin-bottom: 20px; /* Espacement sous le titre */  
            color: #4CAF50; /* Couleur du titre */  
        }  

        .form-group {  
            margin-bottom: 15px; /* Espacement entre les champs du formulaire */  
        }  

        label {  
            display: block; /* Nouvelle ligne pour le label */  
            margin-bottom: 5px; /* Espacement sous le label */  
            color: #333; /* Couleur du texte du label */  
        }  

        .text-input {  
            width: 100%; /* Champs prennent toute la largeur */  
            padding: 10px; /* Espacement interne */  
            border: 1px solid #ccc; /* Bordure grise */  
            border-radius: 5px; /* Coins arrondis */  
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1); /* Ombre interne */  
        }  

        .primary-button {  
            background-color: #4CAF50; /* Couleur du bouton */  
            color: white; /* Couleur du texte du bouton */  
            border: none; /* Pas de bordure */  
            padding: 10px; /* Espacement interne du bouton */  
            border-radius: 5px; /* Coins arrondis du bouton */  
            cursor: pointer; /* Curseur de type pointer */  
            width: 100%; /* Bouton prend toute la largeur */  
            margin-top: 10px; /* Marge au-dessus du bouton */  
        }  

        .primary-button:hover {  
            background-color: #45a049; /* Changement de couleur au survol */  
        }  

        .error {  
            color: red; /* Couleur rouge pour les messages d'erreur */  
            font-size: 0.875em; /* Taille de police plus petite */  
        }  
    </style>  
</head>  
<body>  

    <form method="POST" action="{{ route('register') }}">  
        @csrf  
        
        <h2>{{ __('Register') }}</h2> <!-- Titre du formulaire -->  

        <div class="form-group">  
            <label for="name">{{ __('Name') }}</label>  
            <x-text-input id="name" class="text-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />  
            <x-input-error :messages="$errors->get('name')" class="error" />  
        </div>  

        <div class="form-group">  
            <label for="email">{{ __('Email') }}</label>  
            <x-text-input id="email" class="text-input" type="email" name="email" :value="old('email')" required autocomplete="username" />  
            <x-input-error :messages="$errors->get('email')" class="error" />  
        </div>  

        <div class="form-group">  
            <label for="password">{{ __('Password') }}</label>  
            <x-text-input id="password" class="text-input" type="password" name="password" required autocomplete="new-password" />  
            <x-input-error :messages="$errors->get('password')" class="error" />  
        </div>  

        <div class="form-group">  
            <label for="password_confirmation">{{ __('Confirm Password') }}</label>  
            <x-text-input id="password_confirmation" class="text-input" type="password" name="password_confirmation" required autocomplete="new-password" />  
            <x-input-error :messages="$errors->get('password_confirmation')" class="error" />  
        </div>  

        <div class="form-group">  
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>  
            <select id="role" name="role" required class="text-input">  
                <option value="patient">Patient</option>  
                <option value="doctor">Doctor</option>  
                <option value="admin">Admin</option>  
            </select>  
        </div>  

        <div class="flex items-center justify-end mt-4">  
            <a class="underline text-sm text-gray-600 hover:text-gray-900" style="color: #45a049" href="{{ route('login') }}">  
                {{ __('Already registered?') }}  
            </a>  
            <button type="submit" class="primary-button">  
                {{ __('Register') }}  
            </button>  
        </div>  
    </form>  

</body>  
</html>