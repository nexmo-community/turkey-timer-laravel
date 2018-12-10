<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;

class RecipeController extends Controller
{
    public function index() {
        return view('recipes/index', [
            'recipes' => Recipe::all()
        ]);
    }

    public function show(Recipe $recipe) {
        return view('recipes/show', [
            'recipe' => $recipe
        ]);
    }
}
