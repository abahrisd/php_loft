<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index()
    {
        $data['products'] = Product::with('user')->get();
        return view('products.index', $data);
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'price' => 'required|numeric',
        ]);

        $name = $request->get('name');
        $price = $request->get('price');
        $description = $request->get('description');
        $user_id = Auth::user()->id;

        Product::create(['name' => $name, 'description' => $description, 'price' => $price, 'user_id' => $user_id]);
        return redirect(route('products.index'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'product' => $product,
        ]);
    }

    public function view(Product $product)
    {
        return view('products.view', [
            'product' => $product,
            'email' => Auth::user()->email,
        ]);
    }

    /**
     * @param Product $product
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Product $product, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'price' => 'required|numeric',
        ]);

        $name = $request->get('name');
        $price = $request->get('price');
        $description = $request->get('description');
        $user_id = Auth::user()->id;

        $product->update(['name' => $name, 'description' => $description, 'price' => $price, 'user_id' => $user_id]);
        return redirect(route('products.index'));
    }

    /**
     * @param Product $product
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function buy(Product $product, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required',
            'product_id' => 'required|numeric',
        ]);

        // TODO отправить письмо
        /*$name = $request->get('name');
        $price = $request->get('price');
        $description = $request->get('description');
        $user_id = Auth::user()->id;

        $product->update(['name' => $name, 'description' => $description, 'price' => $price, 'user_id' => $user_id]);*/
        return redirect(route('products.index'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('products.index'));
    }
}
