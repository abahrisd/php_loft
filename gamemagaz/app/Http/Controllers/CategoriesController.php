<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{

    private function validateAndReturnCategory($request)
    {
        $this->validate($request, [
            'name' => 'required|min:1',
            'description' => 'required|min:1',
        ]);

        $name = $request->get('name');
        $description = $request->get('description');
        $user_id = Auth::user()->id;

        return ['name' => $name, 'description' => $description, 'user_id' => $user_id];
    }

    public function index()
    {
        $data['categories'] = Category::all();
        return view('categories.index', $data);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $params = $this->validateAndReturnCategory($request);
        Category::create($params);
        return redirect(route('categories.index'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function view(Category $category)
    {
        return view('categories.view', [
            'category' => $category
        ]);
    }

    /**
     * @param Category $category
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Category $category, Request $request)
    {
        $params = $this->validateAndReturnCategory($request);
        $category->update($params);
        return redirect(route('categories.index'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('categories.index'));
    }
}
