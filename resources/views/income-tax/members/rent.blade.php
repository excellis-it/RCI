<div class="tab-pane fade" id="rents" role="tabpanel" aria-labelledby="rent-tab">
    <div class="credit-frm">
        <div class="row mb-3">
            <div class="col-md-7">
                <div class="recov-table">
                    <table class="table customize-table mb-0 align-middle bg_tbody" id="loan-table">
                        <thead class="text-white fs-4 bg_blue">
                            <tr>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Rent</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="rent-table-body" class="tbody_height_scroll">
                            @if ($rents->isNotEmpty())
                                @foreach ($rents as $rent)
                                    <tr class="edit-route-loan" data-id="{{ $rent->id }}">
                                        <td>{{ \Carbon\Carbon::createFromFormat('m', $rent->month)->format('F') }}
                                        </td>
                                        <td>{{ $rent->year }}</td>
                                        <td>{{ formatIndianCurrency($rent->rent, 2) }}</td>
                                        <td class="sepharate">
                                            <button class="edit_pencil edit-rent border-0"
                                                data-id="{{ $rent->id }}" data-month="{{ $rent->month }}"
                                                data-year="{{ $rent->year }}" data-rent="{{ $rent->rent }}">
                                                <i class="ti ti-pencil"></i>
                                            </button>
                                            <button class="delete delete-rent border-0"
                                                data-id="{{ $rent->id }}">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="col-md-5" id="loan-form">
                <form id="rentForm">
                    @csrf
                    <input type="hidden" name="member_id" value="{{ $member->id }}">
                    <input type="hidden" name="rent_id" id="rent_id" value="">
                    <div class="row">
                        <div class="form-group col-md-6 mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Month</label>
                                </div>
                                <div class="col-md-12">
                                    <select class="form-select" name="month" id="month">
                                        <option value="">Select Month</option>

                                    </select>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6 mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Year</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="year" id="year">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6 mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Rent</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="rent" id="rent">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-md-12">
                            <div class="row justify-content-end">
                                <div class="form-group col-md-4 mb-2" id="saveButtonArea">
                                    <button type="submit" class="listing_add" id="saveButton">Save</button>
                                </div>
                                <div class="form-group col-md-4 mb-2" id="cancelButtonArea" style="display: none;">
                                    <button type="button" class="listing_exit" id="cancelButton">Cancel</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <div class="row justify-content-end mt-4">
        <div class="col-auto mb-2">
            <button type="button" class="another-btn">Report</button>
        </div>
        <div class="col-auto mb-2">
            <button type="button" class="another-btn">FORM16</button>
        </div>
        <div class="col-auto mb-2">
            Recovey Form
            <select class="p-2 rounded">
                <option>Jan</option>
                <option>Feb</option>
                <option>Mar</option>
                <option>Apr</option>
                <option>May</option>
                <option>Jun</option>
                <option>Jul</option>
                <option>Aug</option>
                <option>Sep</option>
                <option>Oct</option>
                <option>Nov</option>
                <option>Dec</option>
            </select>
        </div>
    </div> --}}
</div>

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function loadRentTable(financialYear) {
                if (!financialYear) return;

                $.ajax({
                    url: "{{ route('income-tax.members-income-tax.rent.data') }}",
                    type: "GET",
                    data: {
                        financial_year: financialYear,
                        member_id: "{{ $member->id }}"
                    },
                    beforeSend: function() {
                        $("#rent-table-body").html(
                            '<tr><td colspan="4" class="text-center">Loading...</td></tr>');
                    },
                    success: function(response) {
                        let tbody = $("#rent-table-body");
                        tbody.empty();

                        if (response.rents.length > 0) {
                            $.each(response.rents, function(index, rent) {
                                let monthName = new Date(2000, rent.month - 1, 1)
                                    .toLocaleString('en-US', {
                                        month: 'long'
                                    });

                                tbody.append(`
                    <tr class="edit-route-loan" data-id="${rent.id}">
                        <td>${monthName}</td>
                        <td>${rent.year}</td>
                        <td>${parseFloat(rent.rent).toFixed(2)}</td>
                        <td class="sepharate">
                            <button class="edit_pencil edit-rent border-0" data-id="${rent.id}"
                                    data-month="${rent.month}" data-year="${rent.year}"
                                    data-rent="${rent.rent}">
                                <i class="ti ti-pencil"></i>
                            </button>
                            <button class="delete delete-rent border-0" data-id="${rent.id}">
                                <i class="ti ti-trash"></i>
                            </button>
                        </td>
                    </tr>
                `);
                            });
                        } else {
                            tbody.html(
                                '<tr><td colspan="4" class="text-center">No rent data available</td></tr>'
                            );
                        }
                    },
                    error: function() {
                        $("#rent-table-body").html(
                            '<tr><td colspan="4" class="text-center text-danger">Error loading data</td></tr>'
                        );
                    }
                });
            }

            // When financial year is changed
            $(document).on("change", "#financial_year", function() {
                let selectedYear = $(this).val();
                loadRentTable(selectedYear);
            });

            // Load rent table when the page loads if a financial year is selected
            let preSelectedYear = $("#financial_year").val();
            if (preSelectedYear) {
                loadRentTable(preSelectedYear);
            }

            // Reset form to create mode
            function resetForm() {
                $("#rentForm")[0].reset();
                $("#rent_id").val("");
                $("#month").prop("disabled", false);
                $("#year").prop("readonly", false);
                $("#saveButton").text("Save");
                $("#cancelButtonArea").hide();
            }

            // Edit rent button click
            $(document).on("click", ".edit-rent", function() {
                let id = $(this).data('id');
                let month = $(this).data('month');
                let year = $(this).data('year');
                let rent = $(this).data('rent');

                // Populate form with data
                $("#rent_id").val(id);
                $("#month").val(month).prop("disabled", true);
                $("#year").val(year).prop("readonly", true);
                $("#rent").val(rent);

                // Change button text and show cancel button
                $("#saveButton").text("Update");
                $("#cancelButtonArea").show();

                // Scroll to form
                $('html, body').animate({
                    scrollTop: $("#rentForm").offset().top - 100
                }, 500);
            });

            // Cancel button click
            $(document).on("click", "#cancelButton", function() {
                resetForm();
            });

            // Form submission - handles both create and update
            $(document).on("submit", "#rentForm", function(e) {
                e.preventDefault();

                let formData = $(this).serialize();
                let rentId = $("#rent_id").val();
                let url = rentId ?
                    "{{ route('income-tax.members-income-tax.rent.update') }}" :
                    "{{ route('income-tax.members-income-tax.rent') }}";
                let method = rentId ? "PUT" : "POST";

                $.ajax({
                    url: url,
                    type: method,
                    data: formData,
                    beforeSend: function() {
                        $(".text-danger").text(""); // Clear previous errors
                    },
                    success: function(response) {
                        if (response.success) {
                            // Get selected financial year
                            let selectedYear = $("#financial_year").val();

                            // Reload the table with current financial year
                            loadRentTable(selectedYear);

                            // Reset the form
                            resetForm();

                            // Show success message
                            toastr.success(rentId ? "Rent updated successfully!" :
                                "Rent added successfully!");
                        }
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        if (errors) {
                            $.each(errors, function(key, value) {
                                $(`input[name="${key}"], select[name="${key}"]`).next(
                                    ".text-danger").text(value[0]);
                            });
                        }
                    }
                });
            });

            // Delete rent
            $(document).on("click", ".delete-rent", function() {
                let id = $(this).data('id');

                swal({
                        title: "Are you sure?",
                        text: "To delete this rent!",
                        type: "warning",
                        confirmButtonText: "Yes",
                        showCancelButton: true
                    })
                    .then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: "{{ route('income-tax.members-income-tax.rent.delete') }}",
                                type: "DELETE",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    id: id
                                },
                                success: function(response) {
                                    if (response.success) {
                                        // Get selected financial year
                                        let selectedYear = $("#financial_year").val();

                                        // Reload the table with current financial year
                                        loadRentTable(selectedYear);

                                        // Reset form if we were editing this record
                                        if ($("#rent_id").val() == id) {
                                            resetForm();
                                        }

                                        swal("Deleted!", "Rent record has been deleted.!",
                                            "success");
                                    } else {
                                        swal("Error!",
                                            "An error occurred. Please try again.",
                                            "error");
                                    }
                                }
                            });
                        } else if (result.dismiss === 'cancel') {
                            swal(
                                'Cancelled',
                                'Your stay here :)',
                                'error'
                            )
                        }
                    });
            });
        });
    </script>
@endpush
