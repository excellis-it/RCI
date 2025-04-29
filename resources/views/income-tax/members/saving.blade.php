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
                        <label for="savings_annual_rent">Annual Rent</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="annual_rent"
                            id="savings_annual_rent" value="{{ old('annual_rent', $model->annual_rent ?? '') }}">
                        <span class="text-danger">{{ $errors->first('annual_rent') }}</span>
                    </div>
                </div>
            </div>

            {{-- ph_disable --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_ph_disable">PH Disable</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="ph_disable"
                            id="savings_ph_disable" value="{{ old('ph_disable', $model->ph_disable ?? '') }}">
                        <span class="text-danger">{{ $errors->first('ph_disable') }}</span>
                    </div>
                </div>
            </div>

            {{-- fd_int --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_fd_int">FD Interest</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="fd_int" id="savings_fd_int"
                            value="{{ old('fd_int', $model->fd_int ?? '') }}">
                        <span class="text-danger">{{ $errors->first('fd_int') }}</span>
                    </div>
                </div>
            </div>

            {{-- nsc_ctd --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_nsc_ctd">NSC CTD</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="nsc_ctd" id="savings_nsc_ctd"
                            value="{{ old('nsc_ctd', $model->nsc_ctd ?? '') }}">
                        <span class="text-danger">{{ $errors->first('nsc_ctd') }}</span>
                    </div>
                </div>
            </div>

            {{-- t_fee --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_t_fee">T. Fee</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="t_fee" id="savings_t_fee"
                            value="{{ old('t_fee', $model->t_fee ?? '') }}">
                        <span class="text-danger">{{ $errors->first('t_fee') }}</span>
                    </div>
                </div>
            </div>

            {{-- hba_int --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_hba_int">HBA Interest</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="hba_int" id="savings_hba_int"
                            value="{{ old('hba_int', $model->hba_int ?? '') }}">
                        <span class="text-danger">{{ $errors->first('hba_int') }}</span>
                    </div>
                </div>
            </div>

            {{-- edu_loan_int --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_edu_loan_int">Education Loan Interest</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="edu_loan_int"
                            id="savings_edu_loan_int" value="{{ old('edu_loan_int', $model->edu_loan_int ?? '') }}">
                        <span class="text-danger">{{ $errors->first('edu_loan_int') }}</span>
                    </div>
                </div>
            </div>

            {{-- nscint --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_nscint">NSC Interest</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="nscint"
                            id="savings_nscint" value="{{ old('nscint', $model->nscint ?? '') }}">
                        <span class="text-danger">{{ $errors->first('nscint') }}</span>
                    </div>
                </div>
            </div>

            {{-- hba_prncpl --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_hba_prncpl">HBA Principal</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="hba_prncpl"
                            id="savings_hba_prncpl" value="{{ old('hba_prncpl', $model->hba_prncpl ?? '') }}">
                        <span class="text-danger">{{ $errors->first('hba_prncpl') }}</span>
                    </div>
                </div>
            </div>

            {{-- ohters_s --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_ohters_s">Others (Savings)</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="ohters_s"
                            id="savings_ohters_s" value="{{ old('ohters_s', $model->ohters_s ?? '') }}">
                        <span class="text-danger">{{ $errors->first('ohters_s') }}</span>
                    </div>
                </div>
            </div>

            {{-- hba_int_80ee --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_hba_int_80ee">HBA Int. (80EE)</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="hba_int_80ee"
                            id="savings_hba_int_80ee" value="{{ old('hba_int_80ee', $model->hba_int_80ee ?? '') }}">
                        <span class="text-danger">{{ $errors->first('hba_int_80ee') }}</span>
                    </div>
                </div>
            </div>

            {{-- others_d --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_others_d">Others (Deduction)</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="others_d"
                            id="savings_others_d" value="{{ old('others_d', $model->others_d ?? '') }}">
                        <span class="text-danger">{{ $errors->first('others_d') }}</span>
                    </div>
                </div>
            </div>

            {{-- letout --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_letout">Let Out</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="letout"
                            id="savings_letout" value="{{ old('letout', $model->letout ?? '') }}">
                        <span class="text-danger">{{ $errors->first('letout') }}</span>
                    </div>
                </div>
            </div>

            {{-- pli --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_pli">PLI</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="pli" id="savings_pli"
                            value="{{ old('pli', $model->pli ?? '') }}">
                        <span class="text-danger">{{ $errors->first('pli') }}</span>
                    </div>
                </div>
            </div>

            {{-- infa_bond --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_infa_bond">Infa Bond</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="infa_bond"
                            id="savings_infa_bond" value="{{ old('infa_bond', $model->infa_bond ?? '') }}">
                        <span class="text-danger">{{ $errors->first('infa_bond') }}</span>
                    </div>
                </div>
            </div>

            {{-- ac_int_80tta --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_ac_int_80tta">Acc. Int. (80TTA)</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="ac_int_80tta"
                            id="savings_ac_int_80tta" value="{{ old('ac_int_80tta', $model->ac_int_80tta ?? '') }}">
                        <span class="text-danger">{{ $errors->first('ac_int_80tta') }}</span>
                    </div>
                </div>
            </div>

            {{-- pension --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_pension">Pension</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="pension"
                            id="savings_pension" value="{{ old('pension', $model->pension ?? '') }}">
                        <span class="text-danger">{{ $errors->first('pension') }}</span>
                    </div>
                </div>
            </div>

            {{-- js_sukanya --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_js_sukanya">JS Sukanya</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="js_sukanya"
                            id="savings_js_sukanya" value="{{ old('js_sukanya', $model->js_sukanya ?? '') }}">
                        <span class="text-danger">{{ $errors->first('js_sukanya') }}</span>
                    </div>
                </div>
            </div>

            {{-- nsdl --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_nsdl">NSDL</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="nsdl" id="savings_nsdl"
                            value="{{ old('nsdl', $model->nsdl ?? '') }}">
                        <span class="text-danger">{{ $errors->first('nsdl') }}</span>
                    </div>
                </div>
            </div>

            {{-- med_trt --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_med_trt">Medical Treatment</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="med_trt"
                            id="savings_med_trt" value="{{ old('med_trt', $model->med_trt ?? '') }}">
                        <span class="text-danger">{{ $errors->first('med_trt') }}</span>
                    </div>
                </div>
            </div>

            {{-- equity_mf --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_equity_mf">Equity MF</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="equity_mf"
                            id="savings_equity_mf" value="{{ old('equity_mf', $model->equity_mf ?? '') }}">
                        <span class="text-danger">{{ $errors->first('equity_mf') }}</span>
                    </div>
                </div>
            </div>

            {{-- ppf --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_ppf">PPF</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="ppf" id="savings_ppf"
                            value="{{ old('ppf', $model->ppf ?? '') }}">
                        <span class="text-danger">{{ $errors->first('ppf') }}</span>
                    </div>
                </div>
            </div>

            {{-- lic --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_lic">LIC</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="lic" id="savings_lic"
                            value="{{ old('lic', $model->lic ?? '') }}">
                        <span class="text-danger">{{ $errors->first('lic') }}</span>
                    </div>
                </div>
            </div>

            {{-- sec_89 --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_sec_89">Section 89</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="sec_89"
                            id="savings_sec_89" value="{{ old('sec_89', $model->sec_89 ?? '') }}">
                        <span class="text-danger">{{ $errors->first('sec_89') }}</span>
                    </div>
                </div>
            </div>

            {{-- cancer --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_cancer">Cancer</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="cancer_amount"
                            id="savings_cancer_amount" value="{{ old('cancer_amount', $model->cancer_amount ?? '') }}">
                        <span class="text-danger">{{ $errors->first('cancer_amount') }}</span>
                    </div>
                </div>
            </div>

            {{-- cea --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_cea">CEA</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="cea" id="savings_cea"
                            value="{{ old('cea', $model->cea ?? '') }}">
                        <span class="text-danger">{{ $errors->first('cea') }}</span>
                    </div>
                </div>
            </div>

            {{-- bonds --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_bonds">Bonds</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="bonds" id="savings_bonds"
                            value="{{ old('bonds', $model->bonds ?? '') }}">
                        <span class="text-danger">{{ $errors->first('bonds') }}</span>
                    </div>
                </div>
            </div>

            {{-- ulip --}}
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_ulip">ULIP</label>
                    </div>
                    <div class="col-md-12">
                        <input type="number" step="any" class="form-control" name="ulip" id="savings_ulip"
                            value="{{ old('ulip', $model->ulip ?? '') }}">
                        <span class="text-danger">{{ $errors->first('ulip') }}</span>
                    </div>
                </div>
            </div>

            {{-- ph --}}
            <div class="form-group col-md-9 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="savings_ph">PH</label>
                    </div>
                    <div class="col-md-12">
                        <select class="form-control" name="ph" id="savings_ph">
                            <option value="">--Select--</option>
                            <option value="yes" {{ old('ph', $model->ph ?? '') == 'yes' ? 'selected' : '' }}>Yes
                            </option>
                            <option value="no" {{ old('ph', $model->ph ?? '') == 'no' ? 'selected' : '' }}>No
                            </option>
                        </select>
                        <span class="text-danger">{{ $errors->first('ph') }}</span>
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
            {{-- <div class="col-auto mb-2">
                <button type="button" id="anotherSavingsBtn" class="another-btn">Another</button>
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
                $("#savings_annual_rent").val(data.annual_rent || 0);
                $("#savings_ph_disable").val(data.ph_disable || 0);
                $("#savings_fd_int").val(data.fd_int || 0);
                $("#savings_nsc_ctd").val(data.nsc_ctd || 0);
                $("#savings_t_fee").val(data.t_fee || 0);
                $("#savings_hba_int").val(data.hba_int || 0);
                $("#savings_edu_loan_int").val(data.edu_loan_int || 0);
                $("#savings_nscint").val(data.nscint || 0);
                $("#savings_hba_prncpl").val(data.hba_prncpl || 0);
                $("#savings_ohters_s").val(data.ohters_s || 0);
                $("#savings_hba_int_80ee").val(data.hba_int_80ee || 0);
                $("#savings_others_d").val(data.others_d || 0);
                $("#savings_letout").val(data.letout || 0);
                $("#savings_infa_bond").val(data.infa_bond || 0);
                $("#savings_ac_int_80tta").val(data.ac_int_80tta || 0);
                $("#savings_pension").val(data.pension || 0);
                $("#savings_js_sukanya").val(data.js_sukanya || 0);
                $("#savings_nsdl").val(data.nsdl || 0);
                $("#savings_med_trt").val(data.med_trt || 0);
                $("#savings_equity_mf").val(data.equity_mf || 0);
                $("#savings_ppf").val(data.ppf || 0);
                $("#savings_sec_89").val(data.sec_89 || 0);
                $("#savings_cancer").val(data.cancer || 0);
                $("#savings_cancer_amount").val(data.cancer_amount || 0);

                $("#savings_cea").val(data.cea || 0);
                $("#savings_bonds").val(data.bonds || 0);
                $("#savings_ulip").val(data.ulip || 0);
                $("#savings_ph").val(data.ph || 0);
                $("#savings_lic").val(data.lic || 0);
                $("#savings_pli").val(data.pli || 0);
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
                            toastr.success(response.message)
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
