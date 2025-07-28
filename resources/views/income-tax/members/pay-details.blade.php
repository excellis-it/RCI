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
                        <span class="text-dang ererror-var_incr"></span>
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
                        <span class="text-danger error-misc"></span>
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
                        <span class="text-danger error-p_tax"></span>
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
                        <span class="text-danger error-hdfc"></span>
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
                        <span class="text-danger error-basic"></span>
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
                        <span class="text-danger error-da"></span>
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
                        <span class="text-danger error-ot"></span>
                    </div>
                </div>
            </div>


            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>I.Tax</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_tax" value="">
                        <span class="text-danger error-i_tax"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>D.Misc</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="d_misc" value="">
                        <span class="text-danger error-d_misc"></span>
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
                        <span class="text-danger error-d_pay"></span>
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
                        <span class="text-danger error-hra"></span>
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
                        <span class="text-danger error-arrears"></span>
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
                        <span class="text-danger error-hba"></span>
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
                        <span class="text-danger error-s_pay"></span>
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
                        <span class="text-danger error-cca"></span>
                    </div>
                </div>
            </div>
            @if ($member->memberCategory->fund_type == 'GPF')
                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>GPF</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="gpf" value="">
                            <span class="text-danger error-gpf"></span>
                        </div>
                    </div>
                </div>
            @endif

            @if ($member->memberCategory->fund_type == 'NPS')
                <div class="col-md-3">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPS Rec</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="nps" id="nps"
                                    value="{{ $member_debit->nps ?? '' }}" placeholder="">
                                <span class="text-danger error-nps"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSC (14%)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsc" id="npsc"
                                    value="{{ $member_credit->npsc ?? (old('npsc') ?? '') }}" placeholder="">
                                <span class="text-danger error-npsc"></span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($member->memberCategory->fund_type == 'UPS')
                {{-- UPS Inputs --}}
                <div class="col-md-3">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>UPS Rec (10%)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="ups_10_per_rec" id="ups_10_per_rec"
                                    value="{{ $member_debit->ups_10_per_rec ?? old('ups_10_per_rec') }}"
                                    placeholder="">
                                <span class="text-danger error-ups_10_per_rec"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>UPSC (10%)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="upsc_10" id="upsc_10"
                                    value="{{ $member_credit->upsc_10 ?? old('upsc_10') }}" placeholder="">
                                <span class="text-danger error-upsc_10"></span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


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
                        <label>F.Pay</label>
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
                        <span class="text-danger error-tpt"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>DA TPT</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="da_tpt" value="">
                        <span class="text-danger error-da_tpt"></span>
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
                        <span class="text-danger error-lic"></span>
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
                        <span class="text-danger error-add_incr"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Dress Alw</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="dis_alw" value="">
                        <span class="text-danger error-dis_alw"></span>
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
                        <span class="text-danger error-cghs"></span>
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
                        <span class="text-danger error-eol_hpl"></span>
                    </div>
                </div>
            </div>


        </div>

        <div class="row justify-content-end mt-4">
            <div class="col-auto mb-2">
                <button type="submit" class="listing_add">Save</button>
            </div>
            <div class="col-auto mb-2">
                <button type="reset" class="listing_exit">Cancel</button>
            </div>
        </div>

    </form>
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
        $(document).ready(function() {
            $('#salaryForm').on('submit', function(e) {
                e.preventDefault();

                $('.text-danger').text(''); // Clear previous errors

                let formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('income-tax.members-income-tax.saving.pay-details') }}", // Laravel route for form submission
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
