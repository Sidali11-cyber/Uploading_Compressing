<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;




class ProductController extends Controller
{
    public function geust()
    {
        $allProducts = Product::all();
        return view('layout.geust')->with('allProduits',$allProducts);
    }

    public function edit(string $id)
    {
        $Produit = Product::where('id', $id)->first();
        return view('produits.edit')->with('Produit',$Produit);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function allProducts()
    {
        $allProducts = Product::all();
        return view('produits.Allproducts')->with('allProduits',$allProducts);
    }
    
    public function myProducts(Request $request)
    {
        $myProducts = Product::where('user_id',$request->id)->get();
        return view('produits.myProducts')->with('myProducts',$myProducts);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produits.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'Prix' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'Description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
            
            // Charger l'image depuis le chemin temporaire
            $imgPath = storage_path('app/public/' . $imagePath);
            $img = imagecreatefromstring(file_get_contents($imgPath));
            
            // Définir la nouvelle largeur et hauteur pour le redimensionnement
            $newWidth = 250;
            $newHeight = 250; 

            // Créer une image vide pour redimensionner
            $newImg = imagescale($img, $newWidth, $newHeight);

            // Compresser et sauvegarder l'image en JPEG (ou format souhaité)
            imagejpeg($newImg, $imgPath, 75); // 75 est la qualité de compression

            // Libérer la mémoire
            imagedestroy($img);
            imagedestroy($newImg);
        } else {
            return back()->withErrors(['image' => 'L\'image n\'a pas été uploadée correctement.']);
        }

        $Produit = new Product();
        $Produit->nom = $request->nom;
        $Produit->prix = $request->Prix;
        $Produit->image_path = $imagePath;
        $Produit->description = $request->Description;
        $Produit->user_id = (int)$request->id;
        $Produit->save();

        return redirect()->route('dashboard');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Produit = Product::where('id', $id)->first();
        $request->validate([
            'nom' => 'required|string|max:255',
            'Prix' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'Description' => 'nullable|string',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
        } else {
            return back()->withErrors(['image' => 'L\'image n\'a pas été uploadée correctement.']);
        }
        $Produit->nom = $request->nom;
        $Produit->prix = $request->Prix;
        $Produit->image_path = $imagePath;
        $Produit->description = $request->Description;
        $Produit->save();
        $myProducts = Product::where('user_id',$request->id)->get();
        return view('produits.myProducts')->with('myProducts',$myProducts);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id,Request $request)
    {
        $Produit = Product::where('id', $id)->first();
        $Produit->delete();
        $myProducts = Product::where('user_id',$request->id)->get();
        return view('produits.myProducts')->with('myProducts',$myProducts);
    }
}
