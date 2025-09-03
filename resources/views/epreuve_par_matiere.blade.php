@extends('layout.main')
@section('Titre_onglet', 'Epreuve')
@section('Titre_Page', 'Epreuve de la Matiere')

@section('content')
    <h2>Les Epreuves de {{ $matiere->nom }}</h2>
    <table class="list">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Année</th>
                <th>Fichier</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($epreuves as $epreuve)
                <tr>
                    <td> {{ $epreuve->titre }}</td>
                    <td>{{ $epreuve->annee }}</td>
                    <td><button class="download"><a href="{{ route('epreuve.download', $epreuve->id) }}">Télécharger</a></button></td>
                </tr>
            @endforeach
        </tbody>

    </table>


@endsection
