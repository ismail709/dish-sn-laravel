<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{

    // index
    public function index()
    {

    }
    // create
    public function create(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|max:255",
            "description" => "required|max:25000",
            "image" => "image|max:2048"
        ]);
        $filename = pathinfo($request->file("image")->getClientOriginalName(), PATHINFO_FILENAME);
        $file_extension = $request->file("image")->getClientOriginalExtension();
        $path = $request->file("image")->storePubliclyAs("dishes", $filename . "_" . uniqid() . "." . $file_extension, "public");
        // save the dish
        $dish = Dish::create([
            'name' => $validated["name"],
            'description' => $validated["description"],
            'image' => "storage/" . $path
        ]);

        return redirect('feed');
    }
    // store
    public function store()
    {

    }
    // temp
    public function temp(Request $request)
    {
        $validated = $request->validate([
            "image" => "image|max:2048"
        ]);
        $filename = pathinfo($request->file("image")->getClientOriginalName(), PATHINFO_FILENAME);
        $file_extension = $request->file("image")->getClientOriginalExtension();
        $path = $request->file("image")->storePubliclyAs("temp", $filename . "_" . time() . "." . $file_extension, "public");

        return response()->json(['file' => 'storage/' . $path]);
    }
}
