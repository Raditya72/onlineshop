<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use App\Category;
use Storage;
use App\User;

class FigmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $product = Product::latest()
            ->search($search)
            ->paginate(env('PER_PAGE'));

        return view('home',compact('product', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('product.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'category_id' => 'required',
            'imagePath' => 'required|image|mimes:jpg,jpeg,png,bmp',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required'
            ]);

        $imagePath = $request->file('imagePath')->store('imageproduct');

        // dd(auth()->user()->id);
        Product::create([
            'category_id' => request('category_id'),
            'user_id' => auth()->user()->id,
            'imagePath' => $imagePath,
            'title' =>request('title'),
            'slug' =>str_slug(request('title'),'-'),
            'description' => request('description'),
            'price' => request('price')
            ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug',$slug)->first();
        
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($product);
        $product = Product::find($id);
        $imagePath = $product->imagePath;

        // if ($product->imagePath) {
        // }

        $this->validate(request(), [
            'category_id' => 'required',
            'imagePath' => 'image|mimes:jpg,jpeg,png,bmp',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required'
            ]);

        if( $request->hasFile('imagePath') ){
            //simpan-gmbar baru
            $imagePath = $request->file('imagePath')->store('imageproduct');

            //delete-gambar-lama
            Storage::delete($product->imagePath);
        }

        $product->update([
            'category_id' => request('category_id'),
            'imagePath' => $imagePath,
            'title' =>request('title'),
            'slug' =>str_slug(request('title'),'-'),
            'description' => request('description'),
            'price' => request('price')
            ]);


        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->imagePath);
        $product->delete();

        return redirect()->route('home');
    }

    public function getAddToCart(Request $request, $id) {

        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);


        $request->session()->put('cart', $cart);

        return redirect()->route('home');
    }

    public function getCart(Product $product) {
        if (!session::has('cart')) {
            return view('product.shopping-cart');
        }

        $product = Product::all();
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('product.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice], compact('product'));
    }

    public function showProductByKategori(Request $request ,$categoryId)
    {
        $search = $request->input('search');
        $product = Product::where('category_id',$categoryId)
            ->search($search)
            ->paginate(env('PER_PAGE'));

        // dd($product);
        return view('kategori/showKategori', compact('search','product'));
    }
}
