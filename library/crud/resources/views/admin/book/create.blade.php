@extends('admin.template')

@section('h1', 'Ajoutez un nouveau livre')
    
@section('mycontent')

<div class="formule container mt-2">
    <form action="{{ route('admin.book.store') }}" method="POST"> 
         @csrf
         
          <div class="form-group">
            <label for="nomDuLivre">Nom du livre</label>
            <input type="text" name="nomDuLivre" id="nomDuLivre" class="form-control" value="{{ old('nomDuLivre') }}"> 
            <div class="text-danger">{{ $errors->first('nomDuLivre', ':message') }}</div>
        </div>

        <div class="form-group">
            <label for="nomAuteur">Nom auteur</label>
            <input type="text" name="nomAuteur" id="nomAuteur" class="form-control" value="{{ old('nomAuteur') }}"> 
            <div class="text-danger">{{ $errors->first('nomAuteur', ':message') }}</div>
        </div>   

        <div class="form-group">
            <label for="avis">Avis</label>
            <textarea name="avis" id="avis" cols="50" rows="3"></textarea>
            <div class="text-danger">{{ $errors->first('avis', ':message') }}</div>
        </div>

        <div class="form-group">
            <label for="note">Note/20</label>
            <input type="text" name="note" id="note" class="form-control" value="{{ old('note') }}"> 
            <div class="text-danger">{{ $errors->first('note', ':message') }}</div>
        </div>
          
        <div class="form-group text-center">
            <input type="submit" class="btn btn-success" value="sauvegarder">
        </div>

    </form>
</div>

@endsection