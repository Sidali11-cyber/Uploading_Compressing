<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Afficher la page de connexion
    public function showLogin()
    {
        return view('auth.login');
    }

    // Afficher la page d'inscription
    public function showRegister()
    {
        return view('auth.register');
    }

    // Inscription d'un utilisateur
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
            
            // Obtenir le chemin absolu de l'image stockée
            $imgPath = storage_path('app/public/' . $imagePath);
    
            // Charger l'image en utilisant GD
            $img = imagecreatefromstring(file_get_contents($imgPath));
    
            // Définir la nouvelle largeur tout en maintenant le ratio d'aspect
            $newWidth = 960;
            $newHeight = 960; 
    
            // Redimensionner l'image
            $resizedImg = imagescale($img, $newWidth, $newHeight);
    
            // Compresser l'image et la sauvegarder avec une qualité de 75%
            imagejpeg($resizedImg, $imgPath, 75); // Enregistrer l'image en JPEG avec une qualité de 75%
    
            // Libérer la mémoire
            imagedestroy($img);
            imagedestroy($resizedImg);
        } else {
            return back()->withErrors(['image' => 'L\'image n\'a pas été uploadée correctement.']);
        }
    
        // Création de l'utilisateur
        $User = new User();
        $User->name = $request->name;
        $User->email = $request->email;
        $User->image_path = $imagePath;
        $User->password = Hash::make($request->password);
        $User->save();
    
        return redirect()->route('login')->with('success', 'Inscription réussie. Veuillez vous connecter.');
    }
    
    // Connexion d'un utilisateur
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard')->with('success', 'Connexion réussie.');
        }

        return back()->withErrors(['email' => 'Les informations de connexion sont incorrectes.']);
    }

    // Déconnexion d'un utilisateur
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Vous êtes déconnecté.');
    }
}
