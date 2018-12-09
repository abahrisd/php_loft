<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class TestViewComposer
{

    public function compose(View $view)
    {
        $view->with('categories', Category::all());
        $view->with('user', Auth::user());
    }
}
