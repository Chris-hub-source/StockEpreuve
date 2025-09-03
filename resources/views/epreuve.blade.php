@extends('layout.main')
@section('titre_onglet', 'Epreuve')
@section('titre_page', 'Epreuve')

@section('content')


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1> Nos epreuves </h1>

    <table class="list">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Année</th>
                <th>Fichier</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($epreuves as $epreuve)
                <tr>
                    <td> {{ $epreuve->titre }}</td>
                    <td>{{ $epreuve->annee }}</td>
                    <td><a href="{{ route('epreuve.download', $epreuve->id) }}">Télécharger</a></td>

                    <td>
                        <form action="{{ route('epreuve.destroy', $epreuve->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>




    <h1>Ajouter une Epreuve</h1>
    <form action="{{ route('epreuve.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="titre">Titre:</label>
        <input type="text" name="titre" id="titre" required>

        <label for="fichier">Fichier:</label>
        <input type="file" name="fichier" id="fichier" required>

        <label for="annee">Année:</label>
        <input type="text" name="annee" id="annee" required>


        <select name="matiere_id" required>
            @foreach ($matieres as $matiere)
                <option value="{{ $matiere->id }}">{{ $matiere->nom }}</option>
            @endforeach
        </select>
        <button type="submit">Enregistrer</button>

    </form>


@endsection
