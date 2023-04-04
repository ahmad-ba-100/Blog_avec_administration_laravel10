<x-app-layout>
    @include ('nav')
    <div></br></div>
    <div class="container ">
        <div class="card">
            <div class="card-header bg-info text-white"> Ajouter un article </div>
            <div class="card-body">
                <form action="{{route('store.post')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label class="form-label" for="name">Auteur:</label>
                        <input type="text" name="user" id="" class="form-control">
                    </div>
                    <div></br></div>

                    <div class="form-group">
                        <label for="">Titre:</label>
                        <input type="text" name="title" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Texte:</label>
                        <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div></br></div>

                    <div></br></div>
                    <div class="form-group">
                        <label for="">categories: </label>
                        <select name="category_id" class="form-select" aria-label="Default select example">
                            @foreach($category as $categories)
                            <option value="{$categories->id}}">{{$categories->name}}</option>
                            @endforeach

                        </select>
                    </div>

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