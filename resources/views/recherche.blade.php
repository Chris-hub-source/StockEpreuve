@extends('layout.main')
@section('page_onglet', 'Recherche')
@section('titre_page', 'Recherche')

@section('content')
    @if($epreuves->isEmpty())
        <div>Aucun résultat trouvé pour "{{ request('q') }}"</div>
    @else
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
        {{ $epreuves->links() }} <!-- Pagination -->
    @endif
@endsection