<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="row bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="col-md-4">
                        <img src="https://image.tmdb.org/t/p/w220_and_h330_face{{ $movie->backdrop_path }}" alt="..." class="sm:rounded-lg shadow-xl mt-4 mb-4 mx-4">
                    </div>
                    <div class="col-md-8 p-5">
                        <h3 class="font-semibold text-gray-800 text-xl">{{ $movie->title }}</h3>

                        <div class="facts">
                            <span class="release me-3">
                               {{ $movie->release_date }}
                            </span>
                            <span class="media_type">
                               {{ $movie->media_type }}
                            </span>
                            <span class="adult">
                              {{ $movie->adult? 'For Adult': 'For all' }}
                            </span>
                        </div>
                        <div class="overview mt-4 mb-3" dir="auto">
                            <p>
                               {{ $movie->overview }}
                            </p>
                        </div>
                        <div class="mx-5">
                            <ul>
                                <li>popularity: {{ $movie->popularity }}</li>
                                <li>vote_count: {{ $movie->vote_count }}</li>
                                <li>vote_average: {{ $movie->vote_average }}</li>
                            </ul>
                        </div>
                    </div>

                    <div class="float-right">
                        <a class="btn btn-primary float-right mb-3" href="{{ route('dashboard') }}">
                            <i class="fa-solid fa-backward"></i> Back
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    

</x-app-layout>