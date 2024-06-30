{{-- admin layout importated --}}
<x-adminLayout>
    <div class="jumbotron text-center">
        <h1 class="">You are loged In !</h1>
        <p class="btn btn-outline-primary btn-lg">{{Auth::user()->name}}</p>
    </div>
    <div class="container">
        <card class="card-secondary">
            <div class="card-body">
                <h1 class="">Manage Website</h1>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="btn-group">
                            <a href="{{route('hero-content.index')}}" class="btn btn-outline-info">Hero Section</a>
                            <a href="{{route('about-us.index')}}" class="btn btn-outline-info">Our Story Section</a>
                            <a href="{{route('services.index')}}" class="btn btn-outline-info">Services</a>
                            <a href="{{route('prices.index')}}" class="btn btn-outline-info">Pricing</a>
                        </div>
                    </div>
                </div>
            </div>
        </card>
    </div>
</x-adminLayout>