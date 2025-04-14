<div class="row">
    <div class="col-lg-12">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Create New Arrears Name</h5>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('arrears-name.store') }}" method="POST">
                    @csrf
                    <div class="mb-3 col-md-4">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check col-md-4">
                        <input type="checkbox" class="form-check-input" id="status" name="status" checked
                            value="1">
                        <label class="form-check-label" for="status">Active</label>
                    </div>



                    <div class="row justify-content-between mt-3">



                        <div class="col-md-2 ">

                            <a href="{{ route('arrears-name.index') }}" type="button" class="listing_exit">Back</a>

                        </div>

                        <div class="col-md-2 text-end">

                            <button type="submit" class="listing_add" id="advfund_save_btn">Save</button>

                        </div>

                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
