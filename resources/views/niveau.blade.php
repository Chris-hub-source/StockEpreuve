@extends('layout.main')
@section('titre_onglet', 'Niveau d/étude')
@section('titre_page', 'niveau d/étude')


@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Liste de nos Niveaux d'études</h1>
    <table class="list">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($niveauEtudes as $niveau)
                <tr>
                    <td>{{ $niveau->nom }}</td>
                    <td>
                        <form action="{{ route('niveau.destroy', $niveau->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
        </tbody>
        @endforeach
    </table>







    <h1>Ajouter un Niveau</h1>
    <form action="{{ route('niveau.store') }}" method="post">
        @csrf
        <select name="filiere_id" id="filiere_id" required>
            @foreach ($filieres as $filiere)
                <option value="{{ $filiere->id }}">{{ $filiere->nom }}</option>
            @endforeach
        </select>
        <label for="nom">Niveau d'étude:</label>
        <input type="text" name="nom" id="nom" required>
        <input type="submit" value="Enregistrer">
    </form>


@endsection
