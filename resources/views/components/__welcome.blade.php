<div class="app">

    <div class="row">

        @foreach ($movies as $movie)
        <div class="col-md-3">
            <div class="card bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <img class="card-img-top" src="https://www.themoviedb.org/t/p/w220_and_h330_face/liosTyTUf0ObasR2HLTOrHQlzth.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $movie->title }}</h5>

                    <div>
                        <a href="#" class="btn btn-outline-primary">
                            <i class="fa-solid fa-info"></i>
                        </a>
                        <a href="#" class="btn btn-outline-primary">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <a href="#" class="btn btn-outline-primary">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        @endforeach

        {!! $movies->links() !!}

    </div>

</div>