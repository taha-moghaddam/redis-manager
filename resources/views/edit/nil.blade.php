@extends('laravel-admin-redis-manager::layout')

@section('page')

    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon far fa-warning"></i>Key [{{ request('key') }}] not exists.</h4>

    </div>
<!-- /.box-body -->

@endsection