<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{

    public function index()
    {
        $data['settings'] = Setting::all();
        return view('admin.settings.index', $data);
    }

    public function update(Setting $setting, Request $request)
    {
        $this->validate($request, [
            'value' => 'required',
        ]);

        $userId = Auth::user()->id;
        $setting->update([ 'value' => $request->get('value'), 'user_id' => $userId]);

        return $this->index();
    }
}
