@extends('layout.main')
@section('titre_onglet', 'Filière')
@section('titre_page', 'Filière')


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Listes de nos filières</h1>
    <table class="list">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($filieres as $filiere)
                <tr>
                    <td>
                        {{ $filiere->nom }}
                    </td>
                    <td>
                        <form action="{{ route('filiere.destroy', $filiere->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>






    <form action="{{ route('filiere.store') }}" method="post">
        @csrf
        <h1>Ajouter une Filière</h1>
        <label for="nom">Nom de la Filière:</label>
        <input type="text" name="nom" id="nom" required>
        <input type="submit" value="Enregistrer">
    </form>
@endsection
