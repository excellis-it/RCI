<form id="search_cda_form" method="POST">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group mb-2">
                <div class="row align-items-center">

                    @csrf
                    <div class="form-group col-md-4">
                        <label for="">CDA Bill No</label>
                        <input type="number" class="form-control" name="adv_no" id="adv_no"
                          >
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">CDA Bill Date</label>
                        <input type="date" class="form-control" name="adv_date" id="adv_date"
                           >
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">&nbsp;</label>
                        <button type="submit" class="btn btn-primary" id="search_cda">
                            Search
                        </button>

                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

<div id="cda_data">

</div>


@push('scripts')
    <script>
        $(document).ready(function() {

            $("#search_cda_form").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    type: "post",
                    url: "{{ route('cda-bills.get-cda') }}",
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        if (response.view && response.view.trim() !== '') {

                            $("#cda_data").html(response.view);
                        } else {
                            toastr.error('CDA Bill Not found');
                        }
                    }
                });

            });








        });
    </script>
@endpush
