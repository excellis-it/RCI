<div class="row">
    <div class="col-lg-12">
        <div class="card w-100">
            <div class="card-body">
                <div id="form">


                    <form action="" method="post" id="searchAdv-form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-3 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Adv No</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="adv_no"
                                            value="{{ old('adv_no') ?? '' }}" placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-3 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Adv Date</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="date" class="form-control" name="adv_date"
                                            value="{{ old('adv_date') ?? '' }}" placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-3 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label></label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary" id="searchAdv" value="Search">

                                    </div>
                                </div>
                            </div>


                        </div>
                    </form>



                    <div id="advDataDiv">



                    </div>


                </div>


            </div>
        </div>
    </div>
</div>
