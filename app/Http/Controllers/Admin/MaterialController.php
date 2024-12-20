<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::all();
        return view('admin.materials.index', compact('materials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('materials', 'public');

        Material::create([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.materials.index')->with('success', 'Material added successfully!');
    }

    public function update(Request $request, Material $material)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($material->image);
            $imagePath = $request->file('image')->store('materials', 'public');
        } else {
            $imagePath = $material->image;
        }

        $material->update([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.materials.index')->with('success', 'Material updated successfully!');
    }

    public function destroy(Material $material)
    {
        Storage::disk('public')->delete($material->image);
        $material->delete();

        return redirect()->route('admin.materials.index')->with('success', 'Material deleted successfully!');
    }
}

