<?php

namespace App\Http\Controllers;

use App\Models\Shortener;
use Illuminate\Http\Request;
use Str;



class ShortenerController extends Controller
{
    //
    public function index()
    {
        $links = Shortener::all();
        // dd($links);
        return view('welcome', compact('links'));
    }

    public function create(Request $request)
    {

        $request->validate([
            'link' => 'required|url',
        ]);

        $shortener = new Shortener();
        $shortener->link = $request->link;
        $shortener->code = Str::random(6);
        $shortener->save();

        return redirect('/generate-link')->with('success', 'link generate successfully');
    }

    public function shortenerLink($code)
    {
        $find = Shortener::where('code', $code)->first();

        return redirect($find->link);
    }
}