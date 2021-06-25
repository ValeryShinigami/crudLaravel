@extends('admin.template')

@section('h1', 'Accueil')

@section('mycontent')

<div class="d-flex justify-content-center mt-3">
    <a href="{{ route('admin.books.create') }}" type="bouton" class="btn btn-primary"> Book</a>
</div>
   
@endsection