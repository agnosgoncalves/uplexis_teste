@extends('layouts.app')

@section('content')
<div class="container" data-js="page-get-posts">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <page-get-posts />
        </div>
    </div>
    <notifications group="message" />
</div>
@endsection
