@extends('admin.template')

@section('h1', 'Accueil')

@section('mycontent')

<div class="d-flex justify-content-center mt-3">
    <a href="{{ route('admin.books.create') }}" type="bouton" class="btn btn-primary"> Book</a>
</div>

@if (session('success'))
<div class="alert alert-success text-center alert-dismissible fade show mt-2" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('warning'))
<div class="alert alert-warning text-center alert-dismissible fade show mt-2" role="alert">
    {{!! session('warning') !!}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


<div class="table-responsive">
    <table class="text-center table table-striped table-hover my-5">
        <thead class="bg-ocean text-black">
            <tr>
                <th>Id</th>
                <th>Nom Livre</th>
                <th>Nom Auteur</th>
                <th>Avis</th>
                <th>Note</th>
                <th>Date de création</th>
                <th>Date de modif</th>
                <th>Paramètres</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id}}</td>
                    <td>{{ $book->nomDuLivre}}</td>
                    <td>{{ $book->nomAuteur}}</td>
                    <td>{{ $book->avis}}</td>
                    <td>{{ $book->note}}</td>
                    <td>{{ $book->created_at}}</td>
                    <td>{{ $book->updated_at}}</td>
                    <td>
                        <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-sm btn-secondary">Modifier</a>
                        <form action="{{ route('admin.books.delete', $book->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <input type="submit" value="supprimer" class="btn btn-sm btn-danger" onclick="return confirm('confirmer la suppression ?')">
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection