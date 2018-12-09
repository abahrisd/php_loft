<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProductsController extends Controller
{
    /**
     * View all products
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

        return $this->index();
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'product' => $product,
        ]);
    }

    /**
     * View single product
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Product $product)
//    public function view(Product $product)
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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function buy(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required',
            'product_id' => 'required|numeric',
        ]);

        $user = Auth::user();
        $admin = User::query()->where('is_admin', 1)->first();

        $formData = [
            'userId' => $user->id,
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'productId' => $request->get('product_id'),
        ];

        Order::create([
            'name_from_form' => $formData['name'],
            'product_id' => $formData['productId'],
            'email' => $formData['email'],
            'user_id' => $user->id,
        ]);

        $mailSetting = Setting::query()->where('code', 'notifyEmail')->first();
        $admin->notifyEmail = $mailSetting->value;

        Mail::send('emails.buy', $formData, function ($m) use ($admin) {
            $m->from('abakhrisd@mail.ru', 'Gamemagaz');
            $m->to($admin->notifyEmail, $admin->name)->subject('Заказ с сайта');
        });

        return redirect(route('products.index', ['success' => true]));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('products.index'));
    }
}
