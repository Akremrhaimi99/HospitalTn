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
    <form method="POST" action="{{ route('login') }}">  
        @csrf  

        <h2>{{ __('Log in') }}</h2> <!-- Titre du formulaire -->  

        <!-- Email Address -->  
        <div class="form-group">  
            <x-input-label for="email" :value="__('Email')" />  
            <x-text-input id="email" class="text-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />  
            <x-input-error :messages="$errors->get('email')" class="error" />  
        </div>  

        <!-- Password -->  
        <div class="form-group mt-4">  
            <x-input-label for="password" :value="__('Password')" />  
            <x-text-input id="password" class="text-input" type="password" name="password" required autocomplete="current-password" />  
            <x-input-error :messages="$errors->get('password')" class="error" />  
        </div>  

        <!-- Remember Me -->  
        <div class="block mt-4">  
            <label for="remember_me" class="inline-flex items-center">  
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">  
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>  
            </label>  
        </div>  

        <div class="flex items-center justify-end mt-4">  
            @if (Route::has('password.request'))  
                <a class="underline text-sm text-gray-600 hover:text-gray-900" style="color: #45a049" href="{{ route('password.request') }}">  
                    {{ __('Forgot your password?') }}  
                </a>  
            @endif  

            
            <button type="submit" class="primary-button">  
                {{ __('Log in') }} 
            </button>  
        </div>  
    </form>  
</body>  
</html>