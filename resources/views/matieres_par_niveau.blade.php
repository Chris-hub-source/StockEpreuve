@extends('layout.main')
@section('titre_onglet', 'Matiere')
@section('titre', 'Matiere du niveau ' . $niveau->nom)

@section('content')
    <h2>Matières pour le niveau : {{ $niveau->nom }}</h2>
    <table class="list">
        <thead>
            <tr>
                <th>Noms</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matieres as $matiere)
                <tr>
                    <td><a href="{{ route('epreuves.parMatiere', ['matiere_id' => $matiere->id]) }}">
                            {{ $matiere->nom }}
                        </a></td>
                </tr>
        </tbody>
        @endforeach
    </table>

@endsection
