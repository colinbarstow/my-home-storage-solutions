<?php

namespace App\Http\Controllers;

use App\Events\ContactCreated;
use App\Models\About;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\HomePage;
use App\Models\MarketingList;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{

    public function redirectMe()
    {
        return redirect()->route('home');
    }

    public function aoc()
    {
        $array = array("forward 2", "down 4", "down 1", "down 4", "forward 3", "down 6", "down 5", "forward 3", "forward 8", "down 2", "down 3", "up 8", "down 5", "up 7", "down 7", "forward 5", "up 2", "down 6", "forward 7", "forward 1", "forward 2", "forward 7", "up 7", "forward 6", "down 3", "down 1", "up 9", "down 2", "up 1", "down 1", "up 6", "forward 6", "down 7", "forward 6", "up 1", "down 6", "forward 2", "up 7", "forward 4", "forward 8", "forward 7", "down 7", "forward 8", "down 1", "down 6", "down 7", "forward 4", "down 3", "up 7", "down 5", "down 9", "up 8", "up 4", "down 2", "down 3", "up 7", "forward 6", "forward 6", "forward 8", "forward 2", "up 5", "down 8", "down 3", "down 3", "down 4", "down 9", "down 6", "up 6", "forward 4", "down 6", "forward 3", "forward 3", "down 4", "down 8", "down 2", "up 5", "up 5", "forward 3", "forward 5", "down 7", "forward 6", "forward 9", "forward 8", "forward 2", "down 3", "down 3", "down 7", "down 1", "down 1", "down 1", "down 2", "down 8", "down 6", "forward 6", "up 1", "up 6", "down 7", "down 1", "forward 1", "up 2", "up 8", "up 8", "forward 2", "down 1", "down 8", "down 7", "down 1", "forward 1", "down 9", "up 3", "down 3", "forward 2", "down 3", "up 6", "down 2", "forward 7", "down 9", "down 6", "down 1", "forward 6", "down 4", "down 1", "down 3", "forward 3", "down 5", "forward 9", "down 5", "down 7", "up 8", "forward 8", "forward 8", "down 6", "down 1", "forward 8", "down 4", "up 4", "up 4", "up 2", "forward 2", "forward 2", "down 1", "up 8", "down 1", "down 7", "forward 5", "down 9", "down 2", "up 3", "down 1", "down 5", "forward 6", "down 7", "up 3", "forward 7", "down 4", "down 3", "forward 4", "up 8", "down 4", "forward 4", "forward 2", "forward 5", "down 5", "up 2", "forward 4", "down 4", "forward 6", "down 4", "forward 1", "down 5", "forward 2", "forward 2", "down 8", "forward 4", "forward 7", "down 3", "up 3", "forward 2", "forward 6", "forward 8", "down 2", "forward 4", "down 2", "up 9", "down 9", "down 2", "forward 5", "up 4", "forward 2", "down 2", "down 3", "forward 1", "down 2", "forward 8", "forward 8", "down 4", "forward 6", "down 3", "down 3", "down 5", "forward 8", "forward 4", "forward 1", "up 4", "up 2", "forward 8", "down 8", "forward 2", "forward 6", "up 1", "up 5", "forward 2", "forward 4", "forward 7", "forward 8", "forward 2", "down 3", "down 1", "down 9", "down 6", "up 5", "up 6", "forward 6", "down 3", "down 2", "down 1", "forward 5", "forward 2", "forward 7", "down 8", "down 7", "forward 7", "up 8", "forward 7", "down 1", "up 4", "forward 9", "forward 4", "forward 1", "down 3", "down 9", "down 7", "forward 1", "down 3", "forward 3", "down 4", "down 7", "forward 4", "up 6", "down 8", "up 1", "forward 6", "forward 1", "down 7", "down 8", "up 9", "up 4", "down 3", "down 7", "forward 8", "up 2", "up 6", "forward 8", "down 1", "up 4", "up 4", "forward 8", "down 2", "down 4", "down 3", "forward 5", "down 8", "forward 1", "down 2", "forward 9", "forward 3", "up 6", "down 6", "forward 6", "forward 4", "down 6", "down 3", "down 3", "forward 6", "down 5", "up 4", "down 9", "down 3", "down 6", "up 9", "forward 6", "down 2", "forward 7", "up 8", "down 3", "down 7", "down 9", "forward 6", "down 1", "forward 2", "down 1", "down 3", "down 3", "forward 5", "forward 2", "up 5", "forward 4", "up 7", "down 9", "forward 7", "forward 3", "down 6", "forward 1", "down 1", "up 8", "down 9", "up 3", "down 7", "up 9", "forward 7", "down 7", "down 9", "forward 9", "forward 7", "up 9", "down 7", "down 2", "down 7", "up 2", "down 3", "down 9", "down 6", "forward 7", "forward 8", "forward 8", "forward 6", "forward 9", "forward 4", "down 4", "down 5", "down 7", "forward 6", "forward 2", "forward 4", "forward 9", "down 4", "forward 6", "down 7", "up 1", "down 7", "forward 9", "forward 7", "down 4", "down 3", "up 6", "forward 8", "forward 7", "down 8", "forward 4", "up 6", "up 4", "forward 9", "forward 4", "forward 4", "forward 7", "down 1", "up 6", "forward 8", "forward 3", "up 6", "forward 4", "down 1", "up 2", "forward 1", "down 5", "forward 5", "up 4", "down 6", "down 3", "up 8", "forward 9", "down 2", "forward 4", "forward 8", "down 9", "forward 5", "forward 2", "down 9", "down 8", "forward 8", "down 7", "up 6", "forward 1", "up 9", "up 3", "forward 9", "down 6", "forward 9", "down 3", "down 3", "forward 7", "forward 5", "down 8", "down 9", "down 3", "down 6", "up 8", "down 9", "forward 8", "down 7", "down 5", "down 1", "up 4", "down 9", "forward 6", "forward 9", "up 6", "up 4", "forward 3", "forward 2", "forward 1", "down 1", "down 2", "forward 8", "up 6", "forward 5", "up 4", "down 1", "forward 5", "down 3", "down 6", "up 7", "forward 2", "forward 6", "forward 7", "forward 4", "down 5", "down 4", "forward 4", "down 6", "up 2", "up 2", "forward 7", "forward 3", "down 8", "down 1", "down 8", "forward 7", "forward 7", "up 5", "forward 4", "up 8", "down 9", "down 4", "down 4", "forward 5", "down 1", "forward 2", "down 6", "up 4", "down 8", "down 1", "down 9", "down 5", "up 5", "forward 4", "down 2", "down 8", "down 4", "forward 4", "forward 5", "down 8", "up 9", "forward 7", "forward 6", "down 8", "down 3", "up 7", "down 7", "forward 2", "forward 5", "forward 7", "down 9", "up 1", "down 6", "down 2", "forward 6", "forward 3", "forward 3", "up 9", "forward 4", "down 5", "down 7", "forward 8", "forward 6", "forward 5", "down 9", "down 5", "down 1", "down 7", "forward 9", "forward 8", "down 2", "down 4", "down 1", "up 5", "up 5", "forward 5", "down 3", "down 1", "forward 8", "up 9", "up 3", "down 3", "up 3", "up 5", "forward 8", "down 3", "up 3", "down 9", "up 6", "up 8", "forward 5", "up 2", "down 6", "forward 3", "down 2", "down 4", "forward 9", "forward 6", "forward 3", "up 5", "down 9", "down 7", "forward 9", "forward 7", "forward 5", "up 5", "up 1", "down 6", "forward 4", "forward 4", "down 7", "down 1", "up 3", "forward 6", "forward 4", "down 1", "forward 5", "forward 3", "forward 1", "forward 3", "up 3", "up 9", "down 7", "down 4", "forward 8", "down 8", "down 3", "up 2", "down 8", "forward 5", "down 7", "forward 6", "down 9", "up 5", "forward 4", "down 2", "forward 6", "down 8", "down 7", "forward 8", "forward 5", "down 2", "forward 7", "forward 5", "forward 7", "down 8", "forward 5", "down 8", "down 6", "down 7", "down 9", "forward 9", "down 6", "forward 8", "up 6", "up 1", "down 5", "forward 1", "forward 7", "up 2", "up 5", "up 6", "down 5", "down 5", "forward 7", "down 9", "down 2", "forward 9", "forward 3", "down 5", "up 2", "up 8", "forward 5", "forward 8", "up 1", "forward 3", "forward 1", "up 4", "forward 1", "down 9", "down 6", "forward 1", "down 4", "down 4", "forward 9", "down 3", "up 6", "down 3", "forward 6", "forward 6", "down 3", "forward 6", "down 3", "down 1", "forward 3", "down 7", "up 9", "forward 1", "down 7", "down 2", "up 8", "down 1", "down 9", "down 1", "down 4", "down 6", "down 3", "down 7", "down 2", "down 9", "down 2", "forward 4", "up 3", "down 4", "up 4", "down 1", "forward 5", "forward 7", "down 7", "forward 9", "forward 6", "down 8", "forward 6", "forward 7", "up 3", "down 3", "up 6", "forward 7", "up 4", "forward 4", "down 1", "up 8", "forward 7", "down 2", "up 6", "forward 1", "forward 3", "up 9", "up 8", "up 5", "forward 7", "up 5", "down 6", "forward 7", "forward 7", "down 4", "down 3", "forward 2", "down 8", "up 9", "up 6", "forward 7", "forward 5", "down 9", "down 2", "up 5", "down 3", "down 3", "up 5", "down 8", "forward 7", "down 4", "down 2", "up 9", "down 5", "down 8", "down 5", "down 6", "forward 9", "down 3", "down 8", "forward 3", "down 1", "down 9", "forward 1", "down 3", "up 9", "up 3", "forward 8", "up 2", "down 4", "up 5", "up 4", "down 9", "down 5", "up 3", "forward 2", "down 8", "forward 8", "forward 7", "up 4", "down 9", "down 6", "up 1", "forward 9", "up 8", "forward 4", "up 3", "down 4", "up 2", "up 7", "down 2", "forward 3", "down 8", "down 9", "up 7", "up 8", "forward 3", "forward 1", "forward 7", "forward 5", "forward 9", "forward 2", "up 1", "down 1", "up 4", "forward 1", "up 9", "forward 7", "forward 2", "down 6", "down 5", "forward 9", "forward 4", "down 6", "down 6", "up 8", "down 3", "up 8", "down 3", "forward 2", "down 1", "down 1", "forward 5", "down 1", "forward 9", "up 8", "forward 2", "down 5", "up 8", "up 8", "forward 8", "forward 8", "forward 3", "forward 2", "forward 8", "forward 9", "forward 8", "forward 6", "forward 4", "up 7", "forward 9", "forward 8", "up 7", "forward 6", "forward 9", "forward 8", "down 7", "forward 9", "down 4", "down 1", "up 1", "up 9", "forward 2", "down 6", "down 2", "down 8", "down 6", "up 8", "forward 7", "up 9", "forward 5", "forward 4", "forward 8", "up 4", "forward 4", "up 6", "forward 7", "forward 1", "up 8", "down 6", "forward 7", "forward 3", "forward 2", "down 4", "forward 4", "down 7", "down 6", "down 2", "up 3", "up 5", "down 7", "down 9", "up 8", "down 1", "up 1", "down 8", "up 8", "forward 8", "down 6", "down 1", "down 6", "forward 3", "down 9", "down 5", "up 3", "down 1", "down 1", "forward 4", "down 4", "up 3", "forward 8", "up 4", "down 3", "down 5", "down 3", "forward 6", "forward 3", "down 2", "forward 9", "forward 3", "forward 2", "down 2", "forward 6", "down 1", "down 1", "forward 5", "forward 4", "forward 6", "down 7", "forward 7", "forward 3", "forward 1", "up 3", "down 6", "forward 1", "up 9", "forward 9", "forward 5", "forward 3", "forward 3", "down 3", "up 8", "forward 5", "up 6", "forward 2", "down 7", "forward 2", "forward 8", "forward 8", "forward 3", "up 9", "down 5", "down 3", "forward 7", "up 9", "forward 4", "down 1", "down 3", "down 5", "down 2", "forward 9", "up 6", "down 3", "down 7", "down 3", "up 6", "forward 3", "down 4", "forward 2", "down 8", "down 2", "forward 7", "down 2", "down 9", "forward 1", "down 1", "down 9", "down 6", "forward 5", "down 1", "up 1", "forward 5", "forward 4", "forward 9", "down 3", "forward 3", "forward 5", "down 9", "forward 9", "down 8", "down 2", "forward 1", "up 1", "down 5", "forward 2", "up 9", "forward 9", "forward 7", "forward 9", "forward 3", "down 7", "forward 2", "down 4", "up 3", "down 7", "down 6", "forward 2", "down 2", "forward 8", "up 9", "down 1", "forward 7", "down 8", "forward 3", "down 2", "down 5", "down 5", "down 3", "forward 1", "up 9", "up 9", "down 8", "down 6", "up 7", "forward 7", "down 4", "forward 6", "down 9", "up 5", "up 6", "forward 4", "forward 1", "forward 1", "down 7", "down 8", "down 2", "down 4", "down 3", "up 8", "down 3", "forward 3", "forward 8", "up 3", "down 2", "forward 4", "down 3", "forward 5", "up 1", "down 9", "down 1", "down 4", "forward 3", "forward 6", "forward 7", "forward 2", "forward 9", "forward 1", "forward 6", "forward 7", "forward 2", "up 1", "down 6", "down 1", "forward 6", "down 6", "down 5", "forward 1");

    }

    public function home()
    {
        $page = HomePage::find(1);
        $featuredProducts = Product::featuredItems();
        $bestSellers = Product::bestSellers();
        $categories = ProductCategory::where('active',true)->orderBy('id', 'desc')->take(4)->get();
        $blogs = Blog::where('active', true)->orderBy('id', 'desc')->take(2)->get();
        $parallax = $page->activeParallax();
        $clients = Client::all();

        return view('front.pages.home.home', compact( 'page', 'featuredProducts', 'blogs', 'categories', 'bestSellers', 'parallax', 'clients'));
    }

    public function blog()
    {

        $page = HomePage::find(1);

        return view('front.pages.blog', compact( 'page'));
    }

    public function singleBlog($slug)
    {
        $page = HomePage::find(1);
        $populars = Blog::popularPosts(4);
        $blog = Blog::where('slug', $slug)->first();
        $blog->increment('views');
        $blog->save();
        return view('front.pages.single-blog', compact( 'page', 'blog', 'populars'));
    }

    public function about()
    {
        $about = About::find(1);

        $page = HomePage::find(2);

        if($page->hasActiveParallax()){
            $parallax = $page->activeParallax();
        } else {
            $parallax = null;
        }

        $teams = Team::all();

        $clients = Client::all();

        return view('front.pages.about.about', compact( 'page', 'about', 'teams', 'clients', 'parallax'));
    }

    public function contact()
    {

        $page = HomePage::find(1);

        return view('front.pages.contact.contact', compact( 'page'));
    }

    public function contactSubmit(Request $request)
    {
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        event(new ContactCreated($contact));

        return redirect()->back();
    }

    public function cart()
    {
        $page = HomePage::find(1);
        return view('front.pages.cart', compact( 'page'));
    }

    public function checkout()
    {
        $page = HomePage::find(1);
        return view('front.pages.checkout', compact( 'page'));
    }

    public function order(Order $order)
    {
        if(Auth::user()){
            if(Auth::user()->id === $order->user_id){
                $page = HomePage::find(1);
                return view('front.pages.order', compact( 'page', 'order'));
            } else {
                return redirect()->route('home');
            }
        }
    }

    public function singleProduct($product)
    {
        $product = Product::where('slug', $product)->first();
        if($product->active){
            $page = HomePage::find(1);

            $featuredProducts = Product::featuredItems();
            return view('front.pages.single-product', compact( 'product', 'featuredProducts', 'page'));
        } else {
            return redirect()->route('home');
        }

    }

    public function subscribeToNewsletter(Request $request)
    {
        $check = MarketingList::where('email', $request->email)->first();
        if(!$check){
            MarketingList::create([
                'email' => $request->email
            ]);
            flash('You have successfully subscribed to our newsletter');
        } else {
            flash('You are already subscribed to our newsletter');
        }

    }

    public function faqs()
    {
        $faqs = Faq::all();
        $page = HomePage::find(1);
        return view('front.pages.faqs', compact( 'page', 'faqs'));
    }



    //Products
    public function singleProductCategory($productCategory)
    {
        $category = ProductCategory::where('slug', $productCategory)->first();
        $categories = ProductCategory::where('active', true)->orderBy('title', 'asc')->get();
        $products = $category->products()
            ->has('images')
            ->where('active', true)
            ->paginate(9);
        $page = HomePage::find(1);
        return view('front.pages.products.category', compact( 'category', 'page', 'products', 'categories'));
    }

    //Products
    public function products()
    {
        $categories = ProductCategory::where('active', true)->orderBy('title', 'asc')->get();
        $products = Product::has('images')
            ->where('active', true)
            ->paginate(9);
        $page = HomePage::find(1);

        return view('front.pages.products.all', compact(  'page', 'products', 'categories'));
    }
}
