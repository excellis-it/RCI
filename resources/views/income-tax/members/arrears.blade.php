<div class="tab-pane fade" id="arrears" role="tabpanel" aria-labelledby="arrears-tab">
    <form id="arrearsForm">
        @csrf
        <input type="hidden" name="member_id" value="{{ $member->id }}">
        <input type="hidden" name="arrear_id" value="">
        <div class="credit-frm">
            <div class="row mb-3">
                <div class="col-md-7">
                    <div class="recov-table">
                        <table class="table customize-table mb-0 align-middle bg_tbody" id="arrear-table">
                            <thead class="text-white fs-4 bg_blue">
                                <tr>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Amt</th>
                                    <th>CPS</th>
                                    <th>I.Tax</th>
                                    <th>CGHS</th>
                                    <th>NPSG</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="tbody_height_scroll">
                                @foreach ($arrears as $arrear)
                                    <tr class="edit-route-arrear" data-id="{{ $arrear->id }}">
                                        <td>{{ $arrear->date ? \Carbon\Carbon::parse($arrear->date)->format('d/m/Y') : 'N/A' }}
                                        </td>
                                        <td>{{ $arrear->name ?? 'N/A' }}</td>
                                        <td>{{ formatIndianCurrency($arrear->amt ?? 0, 2) }}</td>
                                        <td>{{ formatIndianCurrency($arrear->cps ?? 0, 2) }}</td>
                                        <td>{{ formatIndianCurrency($arrear->i_tax ?? 0, 2) }}</td>
                                        <td>{{ formatIndianCurrency($arrear->cghs ?? 0, 2) }}</td>
                                        <td>{{ formatIndianCurrency($arrear->gmc ?? 0, 2) }}</td>
                                        <td class="sepharate">
                                            <a href="{{ route('income-tax.members-income-tax.arrears.edit', $arrear->id) }}"
                                                class="edit_pencil edit-route-arrear-form"><i
                                                    class="ti ti-pencil"></i></a>

                                            <a type="button" class="delete_arrear delete"
                                                data-route="{{ route('income-tax.members-income-tax.arrears.delete', $arrear->id) }}"><i
                                                    class="ti ti-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="col-md-5" id="loan-form">
                    <div class="row">
                        <div class="form-group col-md-6 mb-2">
                            <label>Date</label>
                            <input type="date" class="form-control" name="date" id="date-arr">
                            <span class="text-danger date-err"></span>
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label>Arrears Name</label>
                            <select class="form-control" name="name" id="name">
                                <option value="">Select Name</option>
                                <!-- Dynamic arrears names will be loaded here -->
                            </select>
                            <span class="text-danger name-err"></span>
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label>Amt</label>
                            <input type="text" class="form-control" name="amt">
                            <span class="text-danger amt-err"></span>
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label>CPS</label>
                            <input type="text" class="form-control" name="cps">
                            <span class="text-danger cps-err"></span>
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label>I.Tax</label>
                            <input type="text" class="form-control" name="i_tax">
                            <span class="text-danger  i_tax-err"></span>
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label>CGHS</label>
                            <input type="text" class="form-control" name="cghs">
                            <span class="text-danger cghs-err"></span>
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label>NPSG</label>
                            <input type="text" class="form-control" name="gmc">
                            <span class="text-danger gmc-err"></span>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-md-12">
                            <div class="row justify-content-end">
                                <div class="form-group col-md-4 mb-2">
                                    <button type="submit" class="listing_add">Save</button>
                                </div>
                                <div class="form-group col-md-4 mb-2">
                                    <button type="reset" class="listing_exit">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
    </form>
</div>
