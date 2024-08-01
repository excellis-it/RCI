@if (isset($edit))
    <form action="{{ route('rules.update', $rule->id) }}" method="POST" id="rule-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Rule Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="rule_name" id="rule_name" value="{{ $rule->rule_name}}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Month</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="month" id="month">
                                    <option value="Jan"  {{ $rule->month == 'Jan' ? 'selected':''}}>January</option>
                                    <option value="Feb" {{ $rule->month == 'jan' ? 'selected':''}}>February</option>
                                    <option value="Mar" {{ $rule->month == 'jan' ? 'selected':''}}>March</option>
                                    <option value="Apr" {{ $rule->month == 'jan' ? 'selected':''}}>April</option>
                                    <option value="May" {{ $rule->month == 'jan' ? 'selected':''}}>May</option>
                                    <option value="June" {{ $rule->month == 'jan' ? 'selected':''}}>June</option>
                                    <option value="July" {{ $rule->month == 'jan' ? 'selected':''}}>July</option>
                                    <option value="Aug" {{ $rule->month == 'jan' ? 'selected':''}}>August</option>
                                    <option value="Sep" {{ $rule->month == 'jan' ? 'selected':''}}>September</option>
                                    <option value="Oct" {{ $rule->month == 'jan' ? 'selected':''}}>October</option>
                                    <option value="Nov" {{ $rule->month == 'jan' ? 'selected':''}}>November</option>
                                    <option value="Dec" {{ $rule->month == 'jan' ? 'selected':''}}>December</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Year</label>
                            </div>
                            <div class="col-md-12">
                                <select name="year" class="form-select" id="year">
                                    <option value="">Select Year</option>
                                    @for ($i = date('Y'); $i >= 1950; $i--)
                                        <option value="{{ $i }}" {{ $rule->year == $i}}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>From Basic</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="f_basic" id="f_basic" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>To Basic</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="t_basic" id="t_basic" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Percent</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="percent" id="percent" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="amount" id="amount" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>From Gross</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="f_gross" id="f_gross" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>To Gross</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="t_gross" id="t_gross" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>From Scale</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="f_scale" id="f_scale" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>To Scale</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="t_scale" id="t_scale" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>More Info</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="more_info" id="more_info" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Add</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>
@else
    <form action="{{ route('rules.store') }}" method="POST" id="rule-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Rule Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="rule_name" id="rule_name" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Month</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="month" id="month">
                                    <option value="">Select month</option>
                                    <option value="Jan">January</option>
                                    <option value="Feb">February</option>
                                    <option value="Mar">March</option>
                                    <option value="Apr">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="Aug">August</option>
                                    <option value="Sep">September</option>
                                    <option value="Oct">October</option>
                                    <option value="Nov">November</option>
                                    <option value="Dec">December</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Year</label>
                            </div>
                            <div class="col-md-12">
                                <select name="year" class="form-select" id="year">
                                    <option value="">Select Year</option>
                                    @for ($i = date('Y'); $i >= 1950; $i--)
                                        <option value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>From Basic</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="f_basic" id="f_basic" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>To Basic</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="t_basic" id="t_basic" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Percent</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="percent" id="percent" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="amount" id="amount" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>From Gross</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="f_gross" id="f_gross" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>To Gross</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="t_gross" id="t_gross" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>From Scale</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="f_scale" id="f_scale" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>To Scale</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="t_scale" id="t_scale" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>More Info</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="more_info" id="more_info" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Add</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>
@endif
