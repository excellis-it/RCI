<div class="tab-pane fade" id="savings" role="tabpanel" aria-labelledby="savings-tab">
    <form id="savingsForm">
        @csrf
        <input type="hidden" name="member_id" value="{{ $member->id }}">
        <div class="row">
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Month Year</label>
                    </div>
                    <div class="col-md-12">
                        <select class="form-select month_year" name="month_year" id="savings_month_year">
                            <option value="">Select Month Year</option>
                        </select>
                        <span class="text-danger month_year_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Var Incr</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="var_incr" id="savings_var_incr" value="">
                        <span class="text-danger var_incr_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Misc</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="misc" id="savings_misc" value="">
                        <span class="text-danger misc_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>PTax</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="p_tax" id="savings_p_tax" value="">
                        <span class="text-danger p_tax_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>HDFC</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="hdfc" id="savings_hdfc" value="">
                        <span class="text-danger hdfc_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Basic</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="basic" id="savings_basic" value="">
                        <span class="text-danger basic_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>DA</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="da" id="savings_da" value="">
                        <span class="text-danger da_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>OT</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="ot" id="savings_ot" value="">
                        <span class="text-danger ot_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>ITax</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="i_tax" id="savings_i_tax" value="">
                        <span class="text-danger i_tax_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>DMisc</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="d_misc" id="savings_d_misc"
                            value="">
                        <span class="text-danger d_misc_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>D.Pay</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="d_pay" id="savings_d_pay"
                            value="">
                        <span class="text-danger d_pay_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>HRA</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="hra" id="savings_hra" value="">
                        <span class="text-danger hra_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Arrears</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="arrears" id="savings_arrears"
                            value="">
                        <span class="text-danger arrears_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>HBA</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="hba" id="savings_hba" value="">
                        <span class="text-danger hba_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>GMC</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="gmc" id="savings_gmc" value="">
                        <span class="text-danger gmc_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>S.Pay</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="s_pay" id="savings_s_pay"
                            value="">
                        <span class="text-danger s_pay_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CCA</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="cca" id="savings_cca" value="">
                        <span class="text-danger cca_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>GPF</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="gpf" id="savings_gpf" value="">
                        <span class="text-danger gpf_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>PLI</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="pli" id="savings_pli" value="">
                        <span class="text-danger pli_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>E.Pay</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="e_pay" id="savings_e_pay"
                            value="">
                        <span class="text-danger e_pay_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>TPT</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="tpt" id="savings_tpt" value="">
                        <span class="text-danger tpt_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CGEIS</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="cgeis" id="savings_cgeis"
                            value="">
                        <span class="text-danger cgeis_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>LIC</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="lic" id="savings_lic" value="">
                        <span class="text-danger lic_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Add Incr</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="add_incr" id="savings_add_incr"
                            value="">
                        <span class="text-danger add_incr_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Wash AJW</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="wash_ajw" id="savings_wash_ajw"
                            value="">
                        <span class="text-danger wash_ajw_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CGHS</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="cghs" id="savings_cghs" value="">
                        <span class="text-danger cghs_error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>EOL/HPL</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="eol_hpl" id="savings_eol_hpl"
                            value="">
                        <span class="text-danger eol_hpl_error"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-4 mb-3">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Med Ins ( 80 D ) Sr. Citizen
                            Dependent Inclided</label>
                    </div>
                    <div class="col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="med_ins" id="savings_med_ins1"
                                value="Yes">
                            <label class="form-check-label" for="savings_med_ins1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="med_ins" id="savings_med_ins2"
                                value="No" checked="">
                            <label class="form-check-label" for="savings_med_ins2">No</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-4 mb-3">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Cancer ( 80 DDB ) Sr. Citizen
                            Dependent Included</label>
                    </div>
                    <div class="col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cancer" id="savings_cancer1"
                                value="Yes">
                            <label class="form-check-label" for="savings_cancer1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cancer" id="savings_cancer2"
                                value="No" checked="">
                            <label class="form-check-label" for="savings_cancer2">No</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-4 mb-3">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Med Tri ( 80 DD ) Severe
                            Disability</label>
                    </div>
                    <div class="col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="med_tri" id="savings_med_tri1"
                                value="Yes">
                            <label class="form-check-label" for="savings_med_tri1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="med_tri" id="savings_med_tri2"
                                value="No" checked="">
                            <label class="form-check-label" for="savings_med_tri2">No</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-4 mb-3">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>PH /Disable ( 80 U ) Severe
                            Disability</label>
                    </div>
                    <div class="col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="server_dis"
                                id="savings_server_dis1" value="Yes">
                            <label class="form-check-label" for="savings_server_dis1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="server_dis"
                                id="savings_server_dis2" value="No" checked="">
                            <label class="form-check-label" for="savings_server_dis2">No</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-4 mb-3">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>IT Rules</label>
                    </div>
                    <div class="col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="it_rules" id="savings_it_rules1"
                                value="Yes">
                            <label class="form-check-label" for="savings_it_rules1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="it_rules" id="savings_it_rules2"
                                value="No" checked="">
                            <label class="form-check-label" for="savings_it_rules2">No</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-end mt-4">
            <div class="col-auto mb-2">
                <button type="submit" id="saveSavingsBtn" class="listing_add">Save</button>
            </div>
            <div class="col-auto mb-2">
                <button type="button" id="anotherSavingsBtn" class="another-btn">Another</button>
            </div>
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


            // Add event listener for the savings month/year dropdown
            $("#savings_month_year").change(function() {
                let monthYear = $(this).val();
                if (monthYear) {
                    fetchSavingData(monthYear);
                } else {
                    resetSavingsForm();
                }
            });

            // Function to fetch saving data
            function fetchSavingData(monthYear) {
                $.ajax({
                    url: "{{ route('income-tax.saving.get-data') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        member_id: "{{ $member->id }}",
                        month_year: monthYear
                    },
                    beforeSend: function() {
                        // Show loading indicator
                        $("#loading").show();
                    },
                    success: function(response) {
                        if (response.status) {
                            // Populate form with data
                            populateSavingsForm(response.data);
                        } else {
                            // Reset form if no data found
                            resetSavingsForm();
                            // Optionally show message
                            // alert(response.message);
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        alert("Error fetching data. Please try again.");
                    },
                    complete: function() {
                        // Hide loading indicator
                        $("#loading").hide();
                    }
                });
            }

            // Function to populate the savings form with data
            function populateSavingsForm(data) {
                $("#savings_var_incr").val(data.var_incr || '');
                $("#savings_misc").val(data.misc || '');
                $("#savings_p_tax").val(data.p_tax || '');
                $("#savings_hdfc").val(data.hdfc || '');
                $("#savings_basic").val(data.basic || '');
                $("#savings_da").val(data.da || '');
                $("#savings_ot").val(data.ot || '');
                $("#savings_i_tax").val(data.i_tax || '');
                $("#savings_d_misc").val(data.d_misc || '');
                $("#savings_d_pay").val(data.d_pay || '');
                $("#savings_hra").val(data.hra || '');
                $("#savings_arrears").val(data.arrears || '');
                $("#savings_hba").val(data.hba || '');
                $("#savings_gmc").val(data.gmc || '');
                $("#savings_s_pay").val(data.s_pay || '');
                $("#savings_cca").val(data.cca || '');
                $("#savings_gpf").val(data.gpf || '');
                $("#savings_pli").val(data.pli || '');
                $("#savings_e_pay").val(data.e_pay || '');
                $("#savings_tpt").val(data.tpt || '');
                $("#savings_cgeis").val(data.cgeis || '');
                $("#savings_lic").val(data.lic || '');
                $("#savings_add_incr").val(data.add_incr || '');
                $("#savings_wash_ajw").val(data.wash_ajw || '');
                $("#savings_cghs").val(data.cghs || '');
                $("#savings_eol_hpl").val(data.eol_hpl || '');

                // Radio buttons
                if (data.med_ins_80d) {
                    $("#savings_med_ins1").prop('checked', true);
                } else {
                    $("#savings_med_ins2").prop('checked', true);
                }

                if (data.cancer_80ddb_senior_dependent) {
                    $("#savings_cancer1").prop('checked', true);
                } else {
                    $("#savings_cancer2").prop('checked', true);
                }

                if (data.med_tri_80dd_disability) {
                    $("#savings_med_tri1").prop('checked', true);
                } else {
                    $("#savings_med_tri2").prop('checked', true);
                }

                if (data.ph_disable_80u_disability) {
                    $("#savings_server_dis1").prop('checked', true);
                } else {
                    $("#savings_server_dis2").prop('checked', true);
                }

                if (data.it_rules) {
                    $("#savings_it_rules1").prop('checked', true);
                } else {
                    $("#savings_it_rules2").prop('checked', true);
                }
            }

            // Function to reset the savings form
            function resetSavingsForm() {
                // Save the month_year value before resetting
                let monthYear = $("#savings_month_year").val();

                // Reset the form
                $("#savingsForm")[0].reset();

                // Restore the month_year value
                $("#savings_month_year").val(monthYear);
            }

            // Handle form submission
            $("#savingsForm").submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('income-tax.saving.store') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    beforeSend: function() {
                        // Show loading indicator
                        $("#loading").show();
                        // Reset error messages
                        $(".text-danger").text("");
                    },
                    success: function(response) {
                        if (response.status) {
                            // Show success message
                            alert(response.message);
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $("." + key + "_error").text(value[0]);
                            });
                        } else {
                            alert("Error saving data. Please try again.");
                        }
                    },
                    complete: function() {
                        // Hide loading indicator
                        $("#loading").hide();
                    }
                });
            });

            // Another button click handler - resets form for new entry
            $("#anotherSavingsBtn").click(function() {
                resetSavingsForm();
            });

            // Tab click handlers to ensure proper loading of data
            $('#savings-tab').on('shown.bs.tab', function(e) {
                // If month year is already selected, fetch the data
                let monthYear = $("#savings_month_year").val();
                if (monthYear) {
                    fetchSavingData(monthYear);
                }
            });
        });
    </script>
@endpush
