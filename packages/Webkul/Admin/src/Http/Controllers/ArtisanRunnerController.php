<?php

namespace Webkul\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanRunnerController extends Controller
{
    public function index()
    {
        return view('admin::artisan-runner.index');
    }

    public function run(Request $request)
    {
        $request->validate([
            'command' => 'required|string',
        ]);

        try {
            Artisan::call($request->command);
            $output = Artisan::output();
        } catch (\Exception $e) {
            $output = $e->getMessage();
        }

        return back()->with('output', $output);
    }
}
