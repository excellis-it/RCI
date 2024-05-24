<form action="{{ route('members.debit.update') }}" id="member-debit-form" method="post">
    @csrf

    <input type="hidden" name="member_id" value="{{ $member->id }}">
    <div class="row">
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>GPF Sub</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="gpa_sub" id="gpa_sub"
                            value="{{ $member_debit->gpa_sub ?? (old('gpa_sub') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>GPF Adv</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="gpa_adv" id="gpa_adv"
                            value="{{ $member_debit->gpa_adv ?? (old('gpa_adv') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Eol/Hpl</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="eol" id="eol"
                            value="{{ $member_debit->eol ?? (old('eol') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Rent</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="rent" id="rent"
                            value="{{ $member_debit->rent ?? (old('rent') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>LF Arr</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="lf_arr" id="lf_arr"
                            value="{{ $member_debit->lf_arr ?? (old('lf_arr') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>TADA</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="tada" id="tada"
                            value="{{ $member_debit->tada ?? (old('tada') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>HBA Adv</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="hba" id="hba"
                            value="{{ $member_debit->hba ?? (old('hba') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>HBA Interest</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="hba_interest" id="hba_interest"
                            value="{{ $member_debit->hba_interest ?? (old('hba_interest') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Comp Adv</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="comp_adv" id="comp_adv"
                            value="{{ $member_debit->comp_adv ?? (old('comp_adv') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Comp Int</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="comp_int" id="comp_int"
                            value="{{ $member_debit->comp_int ?? (old('comp_int') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Leave Rec</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="leave_rec" id="leave_rec"
                            value="{{ $member_debit->leave_rec ?? (old('leave_rec') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Pension Rec</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="pension_rec" id="pension_rec"
                            value="{{ $member_debit->pension_rec ?? (old('pension_rec') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Misc 1</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="misc1" id="misc1"
                            value="{{ $member_debit->misc1 ?? (old('misc1') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>GPF Rec</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="gpf_rec" id="gpf_rec"
                            value="{{ $member_debit->gpf_rec ?? (old('gpf_rec') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>I.Tax</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_tax" id="i_tax"
                            value="{{ $member_debit->i_tax ?? (old('i_tax') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Elec</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="elec" id="elec"
                            value="{{ $member_debit->elec ?? (old('elec') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Elec Arr</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="elec_arr" id="elec_arr"
                            value="{{ $member_debit->elec_arr ?? (old('elec_arr') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Medi</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="medi" id="medi"
                            value="{{ $member_debit->medi ?? (old('medi') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Pc</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="pc" id="pc"
                            value="{{ $member_debit->pc ?? (old('pc') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Misc 2</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="misc2" id="misc2"
                            value="{{ $member_debit->misc2 ?? (old('misc2') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>GPF Arr</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="gpf_arr" id="gpf_arr"
                            value="{{ $member_debit->gpf_arr ?? (old('gpf_arr') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Edu cess</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="ecess" id="ecess"
                            value="{{ $member_debit->ecess ?? (old('ecess') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Water</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="water" id="water"
                            value="{{ $member_debit->water ?? (old('water') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Water Arr</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="water_arr" id="water_arr"
                            value="{{ $member_debit->water_arr ?? (old('water_arr') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>LTC</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="ltc" id="ltc"
                            value="{{ $member_debit->ltc ?? (old('ltc') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Fest adv</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="fadv" id="fadv"
                            value="{{ $member_debit->fadv ?? (old('fadv') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Misc3</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="misc3" id="misc3"
                            value="{{ $member_debit->misc3 ?? (old('misc3') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CGEGIS</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="cgegis" id="cgegis"
                            value="{{ $member_debit->cgegis ?? (old('cgegis') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CDA</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="cda" id="cda"
                            value="{{ $member_debit->cda ?? (old('cda') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Furn</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="furn" id="furn"
                            value="{{ $member_debit->furn ?? (old('furn') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Furn Arr</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="furn_arr" id="furn_arr"
                            value="{{ $member_debit->furn_arr ?? (old('furn_arr') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CAR Adv</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="car" id="car"
                            value="{{ $member_debit->car ?? (old('car') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CAR Interest</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="car_interest" id="car_interest"
                            value="{{ $member_debit->car_interest ?? (old('car_interest') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>HRA Rec</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="hra_rec" id="hra_rec"
                            value="{{ $member_debit->hra_rec ?? (old('hra_rec') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>TotDebits</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="tot_debits" id="tot_debits"
                            value="{{ $member_debit->tot_debits ?? (old('tot_debits') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CGHS</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="cghs" id="cghs"
                            value="{{ $member_debit->cghs ?? (old('cghs') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>P.Tax</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="ptax" id="ptax"
                            value="{{ $member_debit->ptax ?? (old('ptax') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CMG</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="cmg" id="cmg"
                            value="{{ $member_debit->cmg ?? (old('cmg') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>PL INSUR</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="pli" id="pli"
                            value="{{ $member_debit->pli ?? (old('pli') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Scooter</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="scooter" id="scooter"
                            value="{{ $member_debit->scooter ?? (old('scooter') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Scooter Interest</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="scooter_interest" id="scooter_interest"
                            value="{{ $member_debit->scooter_interest ?? (old('scooter_interest') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>TPT Rec</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="tpt_rec" id="tpt_rec"
                            value="{{ $member_debit->tpt_rec ?? (old('tpt_rec') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Net Pay</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="net_pay" id="net_pay"
                            value="{{ $member_debit->net_pay ?? (old('net_pay') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Basic</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="basics" id="basics"
                            value="{{ $member_debit->basic ?? (old('basic') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Quarter Charge</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="quarter_charge" id="quarter_charge"
                            value="{{ $member_debit->quarter_charges ?? (old('quarter_charges') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CGEIS Arr</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="cgeis_arr" id="cgeis_arr"
                            value="{{ $member_debit->cgeis_arr ?? (old('cgeis_arr') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Penal Interest</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="penal_interest" id="penal_interest"
                            value="{{ $member_debit->penal_interest ?? (old('penal_interest') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Society</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="society" id="society"
                            value="{{ $member_debit->society ?? (old('society') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Remarks</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="remarks" id="remarks"
                            value="{{ $member_debit->remarks ?? (old('remarks') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="row justify-content-end">
                <div class="col-md-6">
                    <div class="row justify-content-end">
                        <div class="form-group col-md-3 mb-2">
                            <a href="{{ route('members.create') }}"><button type="button"
                                    class="another-btn">Another</button></a>
                        </div>
                        <div class="form-group col-md-3 mb-2">
                            <button type="submit" class="listing_add">Update</button>
                        </div>
                        <div class="form-group col-md-3 mb-2">
                            <button type="reset" class="listing_exit">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
