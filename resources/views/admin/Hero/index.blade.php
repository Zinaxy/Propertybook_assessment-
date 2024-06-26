{{-- admin layout importated --}}
<x-adminLayout>
    <section class="hero-section">
        @if (DB::table('heroes')->count() >= 1)
        <div class="container text-center">
            @if (Session('success'))
            <div class="alert alert-success" role="alert">{{Session('success')}}</div>
            @endif
            <div class="row align-items-center mb-4">
                @if (DB::table('heroes')->count() >= 1)

                <div class="col-lg-6 caption mb-4">
                    <h1 class="">{{$heroContent->title}}</h1>
                    <p>
                        {{$heroContent->description}}
                    </p>
                </div>
                <div class="col-lg-6">
                    <img src="{{asset('images/hero/'.$heroContent->cover)}}" class="img-fluid page-img"
                        alt="Corporate Image" />
                </div>
                <div class="text-center mt-4">
                    <div class="text-center mt-4"><a href={{route('hero-content.edit',$heroContent->id)}} class="btn
                            btn-primary btn-lg">Update
                            Info</a>

                    </div>
                    @endif
                </div>
            </div>
            @else
            <div class="alert alert-danger text-center">No data Available</div>
            <div class="text-center mt-4">
                <a href={{route('hero-content.create')}} class="btn btn-primary btn-lg">create</a>
            </div>
            @endif


    </section>
</x-adminLayout>