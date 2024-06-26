{{-- admin layout importated --}}
<x-adminLayout>
    <div class="row justify-content-center  mt-5">
        <div class="col-lg-8">
            <div class="card card-secondary">
                <div class="card-body">
                    <h1 class="">Create hero section Info</h1>
                    <form method="POST" action="{{route('about-us.store')}}" enctype="multipart/form-data">
                        @csrf
                        {{-- success message --}}
                        @if (Session('success'))
                        <div class="alert alert-success">{{Session('success')}}</div>
                        @endif
                        {{-- success message end--}}
                        <div class="mb-3">
                            <label for="heroTitle" class="form-label"> Heading</label>
                            <input type="text" name="heading" value="{{ old('heading') }}" class="form-control"
                                id="exampleInputHeading1">
                            @error('heading')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="heroTitle" class="form-label">Cover Image</label>
                            <input type="file" name="cover" value="{{old('cover')}}" class="form-control"
                                id="exampleInputFile">
                            @error('cover') <span class="text-danger text-weight-bold">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputDescription" class="form-label">About Us</label>
                            <textarea name="aboutUs" class="form-control" rows="4"
                                cols="8">{{old('aboutUs')}}</textarea>
                            @error('aboutUs') <span class="text-danger text-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputDescription" class="form-label">Vision</label>
                            <textarea name="vision" class="form-control" rows="4" cols="8">{{old('vision')}}</textarea>
                            @error('vision') <span class="text-danger text-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputDescription" class="form-label">History</label>
                            <textarea name="history" class="form-control" rows="4"
                                cols="8">{{old('history')}}</textarea>
                            @error('history') <span class="text-danger text-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-adminLayout>