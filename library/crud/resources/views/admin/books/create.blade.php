@extends('admin.template')

@section('h1', 'Ajoutez un nouveau livre')
    
@section('mycontent')

<div class="formule container mt-2">
    <form action="{{ route('admin.books.store')}}" method="POST"> 
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
            <input type="text" name="avis" id="avis" class="form-control" value="{{ old('avis') }}">
            <div class="text-danger">{{ $errors->first('avis', ':message') }}</div>
        </div>

        <div class="form-group">
            <label for="note">Note/20</label>
            <input type="text" name="note" id="note" class="form-control" value="{{ old('note') }}"> 
            <div class="text-danger">{{ $errors->first('note', ':message') }}</div>
        </div>
          
        <div class="form-group text-center">
            <input type="submit" class="btn btn-success" value="sauvegarder">
            <a href="{{ route('admin.index') }}" type="bouton" class="btn btn-primary"> retour</a>
           
            
        </div>

    </form>
</div>

@endsection