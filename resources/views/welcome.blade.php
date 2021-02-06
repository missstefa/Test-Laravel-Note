@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
            <div class="row">
                <div class="col-8 px-0">

                    <h1 class="display-4 font-italic">Стефания</h1>
                    <p class="lead my-3">Backend PHP</p>
                    <p class="lead my-3"></p>
                </div>

                <div class="col">

                </div>

                <div class="col">
                    <a href="{{ route('articles.create')}}">
                        <button type="button" class="btn btn-light">
                            {{ __('Create New') }}
                        </button>
                    </a>
                </div>
            </div>

        </div>

        @foreach($articles->chunk(2) as $chunk)
            <div class="row mb-2">
                @foreach($chunk as $article)
                    <div class="col-md-6">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-primary">Hashtag</strong>
                                <h3 class="mb-0">
                                    <a class="text-dark" href="#">{{ $article->title }}</a>
                                </h3>
                                <div class="mb-1 text-muted">{{ $article->created_at }}</div>
                                <p class="card-text mb-auto">{{ $article->short_body }}</p>
                                <a href="{{ route('article.show',['article' => $article->id]) }}">Continue reading</a>
                            </div>
                            <img class="card-img-right flex-auto d-none d-md-block"
                                 data-src="holder.js/200x250?theme=thumb"
                                 alt="Thumbnail [200x250]" style="width: 200px; height: 250px;"
                                 src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_176dca45b4e%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_176dca45b4e%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.1953125%22%20y%3D%22131%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                                 data-holder-rendered="true">
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
        Holder.addTheme('thumb', {
            bg: '#55595c',
            fg: '#eceeef',
            text: 'Thumbnail'
        });
    </script>


    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="250" viewBox="0 0 200 250" preserveAspectRatio="none"
         style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;">
        <defs>
            <style type="text/css"></style>
        </defs>
        <text x="0" y="13" style="font-weight:bold;font-size:13pt;font-family:Arial, Helvetica, Open Sans, sans-serif">
            Thumbnail
        </text>
    </svg>
@endsection