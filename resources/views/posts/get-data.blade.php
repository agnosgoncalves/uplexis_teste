@extends('layouts.app')

@section('content')
<div class="container" data-js="page-get-posts">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <header class="card-header">
                <span>Encontre os artigos na página principal do blog <a href="http://www.uplexis.com.br/blog">uplexis</a>.</span>
                <br/>
                <form-get-posts/>
              </header>
              <div class="card-body" data-js="search-posts-result"> 
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
