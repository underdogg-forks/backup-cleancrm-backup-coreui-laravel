@extends('layouts.master')

@section('content')
    <menu-index :menus="{{ $menus }}"></menu-index>
@endsection