{{-- admin layout importated --}}
<x-adminLayout>
    <div class="row justify-content-center  mt-5">
        <div class="col-lg-8">
            <div class="card card-secondary">
                <div class="card-body">
                    <h1 class="">Update hero section Info</h1>
                    <form method="POST" action="{{route('hero-content.update', $heroContent->id)}}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if (Session('success'))
                        <div class="alert alert-success">{{Session('success')}}</div>
                        @endif
                        <div class="mb-3">
                            <label for="heroTitle" class="form-label"> Title</label>
                            <input type="text" name="title" value="{{$heroContent->title}}" class="form-control"
                                id="exampleInputTitle1" aria-describedby="titleHelp">
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="heroTitle" class="form-label">Hero Image</label>
                            <input type="file" name="cover" class="form-control" id="exampleInputFile"
                                aria-describedby="fileHelp" value="{{$heroContent->cover}}">
                            @error('cover') <span class="text-danger text-weight-bold">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <div class="col-lg-6">
                                <img src="{{asset('images/hero/'.$heroContent->cover)}}" class="img-fluid page-img"
                                    alt="Corporate Image {{$heroContent->cover}}" width="200" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputDescription" class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="4"
                                cols="8">{{$heroContent->description}}</textarea>
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