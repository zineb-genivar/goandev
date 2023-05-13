<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">

                <div class="row">
                    <form action="{{ route('search-movie') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3" style="width: 700px;">
                            <input type="text" name="title" class="border-gray-300 shadow-sm p-1" placeholder="Title of movie ..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary bg-gray-800 border border-transparent font-semibold text-white" type="submit">Rechercher</button>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="row">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    @foreach ($movies as $movie)
                    <div class="col-md-3">
                        <div class="card bg-white overflow-hidden shadow-xl sm:rounded-lg mt-2 mb-3">
                            <img class="card-img-top" src="https://image.tmdb.org/t/p/w220_and_h330_face{{$movie->backdrop_path}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $movie->title }}</h5>

                                <form action="{{ route('destroy-movie',$movie->id) }}" method="POST">
                                    <a href="{{ route('detail-movie',$movie->id) }}" class="btn btn-outline-primary me-1">
                                        <i class="fa-solid fa-info"></i>
                                    </a>
                                    <a href="{{ route('edit-movie',$movie->id) }}" class="btn btn-outline-primary me-1">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>


                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-primary">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                    @endforeach

                    {!! $movies->links() !!}


                </div>


            </div>
        </div>
    </div>
    </div>
</x-app-layout>