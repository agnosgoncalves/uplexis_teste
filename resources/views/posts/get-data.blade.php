@extends('layouts.app')

@section('content')
<div class="container" data-js="page-get-posts">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <header class="card-header">
                <span>Encontre os artigos na página principal do blog <a href="http://www.uplexis.com.br/blog">uplexis</a>.</span>
                <br/>
                <form class="row" data-js="form-search-posts">
                  <div class="col-12 col-md-10 justify-content-center">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text" id="">Buscar</div>
                      </div>
                      <input type="text" class="form-control" placeholder="Buscar artigos..." name="search">
                    </div>
                  </div>
                  <div class="col-12 col-md-2">
                    <button class="btn btn-primary btn-large btn-block btn-block">Capturar</button>
                  </div>
                </form>
              </header>
              <div class="card-body" data-js="search-posts-result"> 
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
