@php
$num = 1;
@endphp

{{-- admin layout importated --}}
<x-adminLayout>
    <section class="hero-section">
        <div class="container text-center">
            @if (Session('success'))
            <div class="alert alert-success" role="alert">{{Session('success')}}</div>
            @endif
            <div class="row align-items-center mb-4">
                <div class="card card-secondary">
                    <div class="card-body">
                        <table class="table table-responsive">
                            <thead class="">
                                <th>#</th>
                                <th>icon</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($services as $service)
                                <tr>
                                    <td>{{$num}}</td>
                                    <td class="">
                                        <img src="{{asset('images/services_icons/'.$service->icon)}}" alt="" class="">
                                    </td>
                                    <td>{{$service->title}}</td>
                                    <td>{{$service->description}}</td>
                                    <td class="btn btn-group justify-content-between">
                                        <a href="{{route('services.edit',$service->id)}}"
                                            class="btn btn-info btn-sm m-2"><i class="bi bi-info"></i></a>
                                        <form action="{{route('services.destroy',$service->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm m-2">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>@php
                                $num++;
                                @endphp
                                @empty

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4"><a href={{route('services.create')}} class="btn btn-primary btn-lg">create</a>
                <div class="text-center mt-4">{{-- <a href={{route('hero-content.edit',$service->id)}} class="btn
                        btn-primary btn-lg">Update
                        Info</a> --}}

                </div>
    </section>
</x-adminLayout>