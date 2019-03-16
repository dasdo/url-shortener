<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Urls;

class UrlsController extends Controller
{
    public function index()
    {
        return Urls::all();
    }

    public function best()
    {
        return Urls::best();
    }

    public function get($id)
    {
        return Urls::find($id);
    }

    public function store(Request $request)
    {
        $url = $request->input('url');
        return Urls::short($url);
    }

    public function delete($id)
    {
        return Urls::find($id);
    }
}