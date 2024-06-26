{{-- admin layout importated --}}
<x-adminLayout>
    <div class="row justify-content-center  mt-5">
        <div class="col-lg-8">
            <div class="card card-secondary">
                <div class="card-body">
                    <h1 class="">Update {{$service->title}}</h1>
                    <form method="POST" action="{{route('services.update', $service->id)}}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if (Session('success'))
                        <div class="alert alert-success">{{Session('success')}}</div>
                        @endif
                        <div class="mb-3">
                            <label for="heroTitle" class="form-label"> Title</label>
                            <input type="text" name="title" value="{{$service->title}}" class="form-control"
                                id="exampleInputTitle1" aria-describedby="titleHelp">
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="heroTitle" class="form-label">Hero Image</label>
                            <input type="file" name="icon" class="form-control" id="exampleInputFile"
                                aria-describedby="fileHelp" value="{{$service->icon}}">
                            @error('icon') <span class="text-danger text-weight-bold">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <div class="col-lg-6">
                                <img src="{{asset('images/services_icons/'.$service->icon)}}" class="img-fluid page-img"
                                    alt="Corporate Image {{$service->icon}}" width="100" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputDescription" class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="4"
                                cols="8">{{$service->description}}</textarea>
                            @error('description') <span class="text-danger text-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-adminLayout>