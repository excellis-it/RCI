<div class="tab-pane fade show active" id="pay_details" role="tabpanel" aria-labelledby="pay_details-tab">
    <form id="salaryForm">
        @csrf
        <input type="hidden" name="member_id" value="{{ $member->id }}">
        <div class="row">
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Month Year</label>
                    </div>
                    <div class="col-md-12">
                        <select class="form-select month_year" name="month_year" id="month_year">
                            <option value="">Select
                                Month Year</option>
                        </select>
                        <span class="text-danger error-month_year"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12"><label>Var
                            Incr</label></div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="var_incr" value="">
                        <span class="text-dang ererror-var_incr" ></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Misc</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="misc" value="">
                        <span class="text-danger error-misc" ></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>PTax</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="p_tax" value="">
                        <span class="text-danger error-p_tax" ></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>HDFC</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="hdfc" value="">
                        <span class="text-danger error-hdfc" ></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Basic</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="basic" value="">
                        <span class="text-danger error-basic" ></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>DA</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="da" value="">
                        <span class="text-danger error-da" ></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>OT</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="ot" value="">
                        <span class="text-danger error-ot" ></span>
                    </div>
                </div>
            </div>


            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>ITax</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_tax" value="">
                        <span class="text-danger error-i_tax" ></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>DMisc</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="d_misc" value="">
                        <span class="text-danger error-d_misc" ></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>D.Pay</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="d_pay" value="">
                        <span class="text-danger error-d_pay" ></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>HRA</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="hra" value="">
                        <span class="text-danger error-hra" ></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Arrears</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="arrears" value="">
                        <span class="text-danger error-arrears" ></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>HBA</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="hba" value="">
                        <span class="text-danger error-hba" ></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>GMC</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="gmc" value="">
                        <span class="text-danger error-gmc" ></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>S.Pay</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="s_pay" value="">
                        <span class="text-danger error-s_pay" ></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CCA</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="cca" value="">
                        <span class="text-danger error-cca" ></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>GPF</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="gpf" value="">
                        <span class="text-danger error-gpf" ></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>PLI</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="pli" value="">
                        <span class="text-danger error-pli"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>E.Pay</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="e_pay" value="">
                        <span class="text-danger error-e_pay"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>TPT</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="tpt" value="">
                        <span class="text-danger error-var_incr" ></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CGEIS</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="cgeis" value="">
                        <span class="text-danger error-cgeis"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>LIC</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="lic" value="">
                        <span class="text-danger error-lic" ></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Add Incr</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="add_incr" value="">
                        <span class="text-danger error-add_incr" ></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Wash AJW</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="wash_ajw" value="">
                        <span class="text-danger error-wash_ajw" ></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CGHS</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="cghs" value="">
                        <span class="text-danger error-cghs" ></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>EOL/HPL</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="eol_hpl" value="">
                        <span class="text-danger error-eol_hpl" ></span>
                    </div>
                </div>
            </div>


        </div>
        <div class="row justify-content-end mt-4">
            <div class="col-auto mb-2">
                <button type="submit" class="listing_add">Save</button>
            </div>
            {{-- <div class="col-auto mb-2">
            <button type="button"
                class="another-btn">Another</button>
        </div> --}}
            <div class="col-auto mb-2">
                <button type="reset" class="listing_exit">Cancel</button>
            </div>
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
        </div>
    </form>
</div>


@push('scripts')
<script>
    $(document).ready(function() {
        $('#salaryForm').on('submit', function(e) {
            e.preventDefault();

            $('.text-danger').text(''); // Clear previous errors

            let formData = $(this).serialize();

            $.ajax({
                url: "{{route('income-tax.members-income-tax.saving.pay-details')}}", // Laravel route for form submission
                type: "POST",
                data: formData,
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message)
                    }
                },
                error: function(xhr) {
                    $('.text-danger').text(''); // Clear previous errors
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('.error-' + key).text(value[0]); // Show validation errors
                    });
                }
            });
        });
    });
</script>

@endpush