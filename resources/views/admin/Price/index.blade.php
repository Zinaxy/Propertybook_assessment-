@php
$num = 1;
@endphp

{{-- admin layout importated --}}
<x-adminLayout>
    <!-- Pricing Section -->
    <section class="pricing-section page-section bg-light" id="pricing">
        {{-- session messages --}}
        <div class="container text-center">
            @if (Session('success'))
            <div class="alert alert-success" role="alert">{{Session('success')}}</div>
            @endif
        </div>
        {{-- info --}}
        <div class="container text-center">
            <div class="text-center m-4">
                <a href={{route('prices.create')}} class="btn btn-primary btn-lg">Create New</a>
            </div>
            <div class="row">
                @forelse ($prices as $price)
                <div class="col-md-4 mb-2">
                    <div class="card border-0">
                        <div class="card-body">
                            <h5 @if ($num==2) class="card-title btn btn-primary text-white btn-sm" @else
                                class="card-title btn btn-outline-primary btn-sm" @endif>
                                {{$price->name}}
                            </h5>
                            <p class="card-text">
                                {{$price->title}}
                            </p>
                            <h3><sup>$</sup>{{$price->price}}<span>/mo</span></h3>
                            <a href="#" @if ($num==2) class="btn btn-primary" @else class="btn btn-outline-primary"
                                @endif>Start Free Trial</a>
                            <div class="list">
                                <ul>
                                    @forelse ($price->bullets as $item)
                                    <li>
                                        <div class="item text-success">
                                            <i class="bi bi-check-circle text-primary"></i><span>{{$item}}</span>
                                        </div>
                                    </li>
                                    @empty

                                    @endforelse
                                </ul>
                            </div>
                            <div class="">
                                <div class="btn btn-group">
                                    <a href="{{route('prices.edit',$price->id)}}"
                                        class="btn btn-info btn-sm m-2">Edit</a>
                                    <form action="{{route('prices.destroy',$price->id)}}" method="post" class="">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm m-2">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                $num++;
                @endphp
                @empty
                <div class="alert alert-danger text-center">No data Available</div>
                @endforelse
            </div>
        </div>
    </section>
</x-adminLayout>