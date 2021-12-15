<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StorageConfiguratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $materials = Material::all();
        return view('pages.storage-configurator.index', compact('materials'));
    }

    public function storeMaterial(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'ambient_occlusion_map'  => 'required',
            'height_map' => 'required',
            'normal_map' => 'required',
            'roughness_map' => 'required',
            'colour_map' => 'required'
        ]);

        $material = Material::create([
            'title' => $request->title,
            'ambient_occlusion_map' => $request->file('ambient_occlusion_map')->storeAs("public/assets/materials/{$request->title}/material-files", str_replace($request->title, ' ', '-') . '-ambient-occlusion-map.' . $request->ambient_occlusion_map->getClientOriginalExtension()),
            'height_map' => $request->file('height_map')->storeAs("public/assets/materials/{$request->title}/material-files", str_replace($request->title, ' ', '-') . '-height-map.' . $request->height_map->getClientOriginalExtension()),
            'normal_map' => $request->file('normal_map')->storeAs("public/assets/materials/{$request->title}/material-files", str_replace($request->title, ' ', '-') . '-normal-map.' . $request->normal_map->getClientOriginalExtension()),
            'roughness_map' => $request->file('roughness_map')->storeAs("public/assets/materials/{$request->title}/material-files", str_replace($request->title, ' ', '-') . '-roughness-map.' . $request->roughness_map->getClientOriginalExtension()),
            'colour_map' => $request->file('colour_map')->storeAs("public/assets/materials/{$request->title}/material-files", str_replace($request->title, ' ', '-') . '-colour-map.' . $request->colour_map->getClientOriginalExtension()),
        ]);

        return back();
    }

    public function getMaterials()
    {
        $materials = Material::all();
        return $materials->toJson(JSON_PRETTY_PRINT);
    }

}
