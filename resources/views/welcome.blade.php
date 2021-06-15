

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
                    @include('bootstrap.article', ['article' => $article])
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