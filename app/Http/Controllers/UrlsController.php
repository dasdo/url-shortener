<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Urls;
use Response;

class UrlsController extends Controller
{
    /**
     * Get all url 
     * @router GET /api/urls
     * @return array
     */
    public function index()
    {
        return Urls::all();
    }

    /**
     * Get best 100 url 
     * @router GET /api/urls/best
     * @return array
     */
    public function best()
    {
        return Urls::best();
    }

    /**
     * Get url by id
     * @router GET /api/urls/{id}
     * @param int $id
     * @return array
     */
    public function get($id)
    {
        try {
            /**
             * Get first by id
             */
            $url = Urls::find($id);
            if(!$url){
                throw new \Exception("record not found", 1);
            }
            return $url;
        } catch (\Exception $e) {
            return Response::json(['exception'=>$e->getMessage()],500);
        }
    }

    /**
     * short links
     * @router POST /api/urls
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        try {
            // get url input
            $url = $request->input('url');
            //Short link
            $short = Urls::short($url);
            return $short;
        } catch (\Exception $e) {
            return Response::json(['exception'=>$e->getMessage()],500);
        }
    }

    /**
     * delete links
     * @router DELETE /api/urls/{id}
     * @param int $id
     * @return array
     */
    public function delete($id)
    {
        try {
            if(!Urls::find($id)->delete()){
                throw new \Exception("Error Processing Request", 1);
            }
            return Response::json(["url delete"],200);
        } catch (\Exception $e) {
            return Response::json(['exception'=>$e->getMessage()],500);
        }
    }
}