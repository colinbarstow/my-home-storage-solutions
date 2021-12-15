<?php

namespace App\Http\Controllers;

use App\Events\ContactCreated;
use App\Http\Resources\UnitStyleResource;
use App\Models\About;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\HomePage;
use App\Models\MarketingList;
use App\Models\Material;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Team;
use App\Models\UnitStyle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class StorageConfiguratorController extends Controller
{

    public function view()
    {
        $materials       = Material::all();
        $defaultMaterial = Material::find(3);
        $unitStyles      = UnitStyle::all();
        return view('front.pages.storage-configurator.view', compact('defaultMaterial', 'materials', 'unitStyles'));
    }

    public function getMaterial(Material $material)
    {
        return json_encode($material);
    }

    public function loadUnitStyle(UnitStyle $unitStyle)
    {
        return UnitStyleResource::make($unitStyle);
    }
}
