@extends('layout.main')
@section('titre_onglet', 'Matiere')
@section('titre_page', 'Matiere')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Liste de nos matières</h1>
    <table class="list">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matieres as $matiere)
                <tr>
                    <td>{{ $matiere->nom }}</td>
                    <td>
                        <form action="{{ route('matiere.destroy', $matiere->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
        </tbody>
        @endforeach
    </table>







    <h1> Ajouter une Matiere</h1>
    <form action="{{ route('matiere.store') }}" method="post">
        @csrf
        <select name="filiere_id" id="filiere_id" required>
            <option value="">Choisir une Matiere</option>
            @foreach ($filieres as $filiere)
                <option value="{{ $filiere->id }}">{{ $filiere->nom }}</option>
            @endforeach
        </select>
        <select name="niveau_etude_id" id="niveau_etude_id" required>
            <option value="">Choisir un niveau</option>
        </select>

        <label for="nom">Nom de la matière</label>
        <input type="text" name='nom' id='nom' required>
        <input type="submit" value="Enregistrer">
    </form>

    <script>
        document.getElementById('filiere_id').addEventListener('change', function() {
            var filiereId = this.value;
            var niveauSelect = document.getElementById('niveau_etude_id');
            niveauSelect.innerHTML = '<option value="">Chargement...</option>';

            fetch('/niveau-etudes-by-filiere/' + filiereId)
                .then(response => response.json())
                .then(data => {
                    let options = '<option value="">Choisir un niveau</option>';
                    data.forEach(function(niveau) {
                        options += `<option value="${niveau.id}">${niveau.nom}</option>`;
                    });
                    niveauSelect.innerHTML = options;
                });
        });
    </script>

@endsection
