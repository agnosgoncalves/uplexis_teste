@extends('layouts.app')

@section('content')
<div class="container" data-js="page-list-posts">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card">
            <header class="card-header">
              <h5>Artigos</h5>
            </header>
            <list-posts :get_db_posts="true" />
          </div>
        </div>
    </div>
    <notifications group="message" />
</div>
@endsection
