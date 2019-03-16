@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Get all the urls : GET /api/urls
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <p class="request">GET /api/urls</p>
                            <p class="sample">**Sample response:**</p>
                            <code> 
                            [
                                {
                                    "id":1,
                                    "short_url": "http://localhost/7f6d604f",
                                    "url": "https://www.google.com/maps",
                                    "hits": 0
                                },
                                {
                                    "id":2,
                                    "short_url": "http://127.0.0.1:8000/4332eda7",
                                    "url": "http://mcanime.net",
                                    "hits": 1
                                }
                            ]
                            </code>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            Get url by id : GET /api/urls/<id>
                            </button>
                        </h5>
                    </div>

                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <p class="request">GET /api/urls/<id></p>
                            <p class="sample">**Sample response:**</p>
                            <code> 
                                {
                                    "id":1,
                                    "short_url": "http://localhost/7f6d604f",
                                    "url": "https://www.google.com/maps",
                                    "hits": 0
                                }
                            </code>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            Get best `100` urls : GET /api/urls/best
                            </button>
                        </h5>
                    </div>

                    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <p class="request">GET /api/urls/best</p>
                            <p class="sample">**Sample response:**</p>
                            <code> 
                            [
                                {
                                    "id":1,
                                    "short_url": "http://localhost/7f6d604f",
                                    "url": "https://www.google.com/maps",
                                    "hits": 0
                                },
                                {
                                    "id":2,
                                    "short_url": "http://127.0.0.1:8000/4332eda7",
                                    "url": "http://mcanime.net",
                                    "hits": 1
                                }
                            ]
                            </code>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                            Short a link : POST /api/urls  {url:"http://example.com"}
                            </button>
                        </h5>
                    </div>

                    <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordion">
                        <div class="card-body">
                            <p class="request">POST /api/urls  {url:"http://example.com"}</p>
                            <p class="sample">**Sample response:**</p>
                            <code>
                                {
                                    "id":1,
                                    "short_url": "http://localhost/7f6d604f",
                                    "url": "https://www.google.com/maps",
                                    "hits": 0
                                }
                            </code>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
