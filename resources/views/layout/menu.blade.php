  @if (auth()->check() && auth()->user()->role === 'admin')
      <div class="dropdown">
          <button class="dropdown-toggle">
              <span class="burger-icon"></span>
          </button>
          <ul class="dropdown-menu">
              <a href="{{ route('filiere.create') }}">Ajouter une Filière</a>
              <a href="{{ route('niveau.create') }}">Ajouter un Niveau d'étude</a> 
              <a href="{{ route('epreuve.create') }}">Ajouter une Epreuve</a> 
              <a href="{{ route('matiere.create') }}">Ajouter une Matiere</a>
          </ul>
      </div>
  @endif


             <script>
            document.addEventListener('DOMContentLoaded', function(){
                const dropdown = document.querySelector('.dropdown');
                const toggleButton = dropdown.querySelector('.dropdown-toggle');

                toggleButton.addEventListener('click', function(){
                    dropdown.classList.toggle('active');
                });
                window.addEventListener('click', function(event){
                    if(!event.target.closest('.dropdown')){
                        if(dropdown.classList.contains('active')){
                            dropdown.classList.remove('active');
                        }
                    }
                });    

            });
           </script>
