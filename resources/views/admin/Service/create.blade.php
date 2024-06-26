{{-- admin layout importated --}}
<x-adminLayout>
    <div class="row justify-content-center  mt-5">
        <div class="col-lg-8">
            <div class="card card-secondary">
                <div class="card-body">
                    <h1 class="">Create New Service</h1>
                    <form method="POST" action="{{route('services.store')}}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        @if (Session('success'))
                        <div class="alert alert-success">{{Session('success')}}</div>
                        @endif
                        <div class="mb-3">
                            <label for="heroTitle" class="form-label"> Title</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                                id="exampleInputTitle1" aria-describedby="titleHelp">
                            @error('title')
                            <span class="text-danger text-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="heroTitle" class="form-label">Icon SVG Image</label>
                            <input type="file" name="icon" class="form-control" id="exampleInputFile"
                                aria-describedby="fileHelp" accept="*/images">
                            @error('icon')
                            <span class="text-danger text-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputDescription" class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="4"
                                cols="8">{{old('description')}}</textarea>
                            @error('description')
                            <span class="text-danger text-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-adminLayout>