<x-app-layout>
    @include ('nav')
    <div></br></div>
    <div class="container mt-3">
        @if(session('success'))
        <div class="alert alert-success mt-3">
            {{session('seccess')}}

        </div>
        @endif
        <table class="table">
            <div class="card">
                <div class="card-hearder bg-dark text-center text-white"> LISTE DES CATEGORIES </div>
                <br>
                <div class="col-md-8 py-2">
                    <a href="#" class="btn btn-danger " id="deleteAllSelectedRecord"> Tout Supprimer</a>

                </div>

                <thead>
                    <tr>
                        <th><input type="checkbox" id="select_all_ids"></th>
                        <th>#</th>

                        <th>Nom</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $categories)
                    <tr id="category_ids{{$categories->id}}">
                        <td><input type="checkbox" name="ids" class="checkbox_ids" id="" value="{{$categories->id}}"></td>
                        <td> {{$categories->id}}</td>

                        <td> {{$categories->name}}</td>

                        <td>
                            <a href="{{route('edit.category',$categories->id)}}" class="btn btn-warning">Modifier</a>
                            <a onclick="return confirm('voulez-vous vraiment supprimer ce candidat ?');" href="{{route('delete.category',$categories->id)}}" class="btn btn-success">Supprimer</a>

                        </td>
                    </tr>
                    @endforeach

                </tbody>

            </div>

        </table>




        <table classe="table">




    </div>
    </div>
    </table>
    </div>


    @include('layouts.footer');

    <script>
        $(function(e) {
            $('#select_all_ids').click(function() {
                $('.checkbox_ids').prop('checked', $(this).prop('checked'));

            });
            $('#deleteAllSelectedRecord').click(function(e) {
                e.preventDefault();
                var all_ids = [];
                $('input:checkbox[name=ids]:checked').each(function() {
                    all_ids.push($(this).val());
                });

                $.ajax({
                    url: "{{route('deleteall.category')}}",
                    type: "DELETE",
                    data: {
                        ids: all_ids,
                        _token: '{{csrf_token()}}'
                    },
                    success: function(response) {
                        $.each(all_ids, function(key, val) {
                            $('#category_ids', +val).remove();
                        })
                    }
                });

            });

        });
    </script>
</x-app-layout>