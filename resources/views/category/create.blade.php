<x-app-layout>
    @include ('nav')

    <div></br></div>
    <div class="container ">
        @if(session('success'))
        <div class="alert alert-success mt-3">
            {{session('success')}}

        </div>
        @endif
        <div></br></div>
        <div class="card">
            <div class="card-header bg-info text-white"> Ajouter une categorie </div>
            <div class="card-body">
                <form action="{{route('store.category')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label class="form-label" for="name">Nom categorie:</label>
                        <input type="text" name="name" id="" class="form-control">
                    </div>
                    <div></br></div>


                    <div></br></div>

                    <div class="form-group ">
                        <button class="btn btn-success">Ajouter</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>

</x-app-layout>