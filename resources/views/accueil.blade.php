@extends('layout.main')
@section('titre_onglet', 'Page Accueil')
@section('titre', 'Accueil')

@section('content')
    <div class="container">
        <div class="sidebar">
            <h3>Nos Filières</h3>
            <ul class="menu">
                @foreach ($filieres as $filiere)
                    <li class="item">
                        <span class="toggle">{{ $filiere->nom }} ({{ $filiere->niveaux->count() }})</span>
                        <ul class="submenu">
                            @foreach ($filiere->niveaux as $niveau)
                                <li>
                                    <a href="{{ route('matieres.parNiveau', ['niveau_id' => $niveau->id]) }}">
                                        {{ $niveau->nom }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>

           <script>     
            document.addEventListener('DOMContentLoaded', function() {
                const toggles = document.querySelectorAll('.toggle');

                toggles.forEach(toggle => {
                    toggle.addEventListener('click', function() {
                        const parentItem = this.closest('.item');
                        parentItem.classList.toggle('active');
                    });
                });
            });
           </script>










        <section class="second">
            <h1>Listes des Epreuves</h1>
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
        </section>
    </div>

@endsection
