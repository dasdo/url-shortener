<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Urls;
use Response;

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
        try {
            $url = Urls::find($id);
            if(!$url){
                throw new \Exception("record not found", 1);
            }
            return $url;
        } catch (\Exception $e) {
            return Response::json(['exception'=>$e->getMessage()],500);
        }
    }

    public function store(Request $request)
    {
        try {
            $url = $request->input('url');
            $short = Urls::short($url);
            return $short;
        } catch (\Exception $e) {
            return Response::json(['exception'=>$e->getMessage()],500);
        }
    }

    public function delete($id)
    {
        return Urls::find($id);
    }
}