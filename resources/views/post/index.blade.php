<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>


    <!doctype html>
    <html lang="en" data-bs-theme="auto">



    <body>

        <main>

            <section class="py-3 text-center container">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light">Mon Blog Tech</h1>
                        <p class="lead text-body-secondary">Le BlogNT est dédié aux amateurs de nouvelles technologies, de mobile, d'objets connectés, ou encore aux développeurs, avec des tutoriels, des tests et de</p>
                        <p>
                            <a href="#" class="btn btn-primary my-2">Main call to action</a>
                            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                        </p>
                    </div>
                </div>
            </section>


            <div class="album py-3 bg-body-tertiary">
                <div class="container">

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        @foreach($posts as $post)
                        </br>
                        <div class="col">
                            <div class="card shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">

                                    <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text>
                                </svg>
                                <div class="card-body">

                                    <h5>{{Str::limit($post->title,25)}}</h5>
                                    <p class="card-text">{{Str::limit($post->content,125)}}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                        </div>
                                        <small class="text-body-secondary">{{$post->created_at->format('D M Y')}}</small>
                                    </div>
                                    <div><br></div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <strong> {{$post->category->name}}</strong>
                                        </div>
                                        <small class="text-body-secondary">
                                            <strong>{{$post->user->name}}</strong>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>


        </main>
        <div><br></div>
        <div class="row  d-flex justify-content-center">
            {{$posts->links()}}

        </div>

        @include('layouts.footer');


        <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>


    </body>

    </html>


</x-app-layout>