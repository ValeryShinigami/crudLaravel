@extends('admin.template')

@section('h1', 'Modifier votre livre')
    
@section('mycontent')

<div class="formule container mt-2">
    <form action="{{ route('admin.books.update', $book->id) }}" method="POST"> 
         @csrf
         @method('patch')
         
          <div class="form-group">
            <label for="nomDuLivre">Nom du livre</label>
            <input type="text" name="nomDuLivre" id="nomDuLivre" class="form-control" value="{{ $book->nomDuLivre }}"> 
            <div class="text-danger">{{ $errors->first('nomDuLivre', ':message') }}</div>
        </div>

        <div class="form-group">
            <label for="nomAuteur">Nom auteur</label>
            <input type="text" name="nomAuteur" id="nomAuteur" class="form-control" value="{{ $book->nomAuteur}}"> 
            <div class="text-danger">{{ $errors->first('nomAuteur', ':message') }}</div>
        </div>   

        <div class="form-group">
            <label for="avis">Avis</label>
            <input type="text" name="avis" id="avis" class="form-control" value="{{ $book->avis }}">
            <div class="text-danger">{{ $errors->first('avis', ':message') }}</div>
        </div>

        <div class="form-group">
            <label for="note">Note/20</label>
            <input type="text" name="note" id="note" class="form-control" value="{{ $book->note }}"> 
            <div class="text-danger">{{ $errors->first('note', ':message') }}</div>
        </div>
          
        <div class="form-group text-center">
            <input type="submit" class="btn btn-success">
            <a href="{{ route('admin.books.index') }}" type="bouton" class="btn btn-primary"> retour</a>
        </div>

    </form>
</div>

@endsection