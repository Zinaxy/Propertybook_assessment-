{{-- admin layout importated --}}
<x-adminLayout>
    <div class="row justify-content-center  mt-5">
        <div class="col-lg-8">
            <div class="card card-secondary">
                <div class="card-body">
                    <h1 class="">Create New Service</h1>
                    <form method="POST" action="{{route('prices.store')}}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        @if (Session('success'))
                        <div class="alert alert-success">{{Session('success')}}</div>
                        @endif
                        <div class="mb-3">
                            <label for="heroTitle" class="form-label"> Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                id="exampleInputName1" aria-describedby="nameHelp">
                            @error('name')
                            <span class="text-danger text-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="heroTitle" class="form-label"> Title</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                                id="exampleInputTitle1" aria-describedby="titleHelp">
                            @error('title')
                            <span class="text-danger text-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="heroTitle" class="form-label"> Price</label>
                            <input type="decimal" name="price" value="{{ old('price') }}" class="form-control"
                                id="exampleInputPrice1" aria-describedby="priceHelp">
                            @error('price')
                            <span class="text-danger text-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputDescription" class="form-label">Features <small>(Use new line to add
                                    another feature)</small></label>
                            <textarea name="bullets" class="form-control" rows="4"
                                cols="8">{{old('bullets')}}</textarea>
                            @error('bullets')
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