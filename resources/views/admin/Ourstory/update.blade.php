{{-- admin layout importated --}}
<x-adminLayout>
    <div class="row justify-content-center  mt-5">
        <div class="col-lg-8">
            <div class="card card-secondary">
                <div class="card-body">
                    <h1 class="">Update hero section Info</h1>
                    <form method="POST" action="{{route('about-us.update', $aboutInfo->id)}}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if (Session('success'))
                        <div class="alert alert-success">{{Session('success')}}</div>
                        @endif
                        <div class="mb-3">
                            <label for="heroTitle" class="form-label"> Heading</label>
                            <input type="text" name="heading" value="{{$aboutInfo->heading}}" class="form-control"
                                id="exampleInputHeading1" aria-describedby="headingHelp">
                            @error('heading')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="heroTitle" class="form-label">Cover Image</label>
                            <input type="file" name="cover" class="form-control" id="exampleInputFile"
                                aria-describedby="fileHelp" value="{{$aboutInfo->cover}}">
                            @error('cover') <span class="text-danger text-weight-bold">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <div class="col-lg-6">
                                <img src="{{asset('images/about_us/'.$aboutInfo->cover)}}" class="img-fluid page-img"
                                    alt="Corporate Image {{$aboutInfo->cover}}" width="200" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputDescription" class="form-label">Our Story</label>
                            <textarea name="aboutUs" class="form-control" rows="4"
                                cols="8">{{$aboutInfo->about_us}}</textarea>
                            @error('aboutUs') <span class="text-danger text-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputDescription" class="form-label">Vision</label>
                            <textarea name="vision" class="form-control" rows="4"
                                cols="8">{{$aboutInfo->vision}}</textarea>
                            @error('vision') <span class="text-danger text-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputDescription" class="form-label">History</label>
                            <textarea name="history" class="form-control" rows="4"
                                cols="8">{{$aboutInfo->history}}</textarea>
                            @error('history') <span class="text-danger text-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-adminLayout>