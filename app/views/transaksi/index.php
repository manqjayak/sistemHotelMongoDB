<div class="container ml-4 pt-5">
    <div class="row justify-content-center">
        <div class="col-7">
            <div class="container border p-2">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="booking-form">
                            <div class="form-header">
                                <h1 class="text-center my-3">Check In</h1>
                            </div>
                            <form>
                                <div class="form-group">
                                    <span class="form-label">No KTP</span>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" autocomplete='off' id="noktp" name="noktp" placeholder="noktp" required="">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" id="cekButton" type="button">Cek</button>
                                        </div>
                                    </div>
                                    <div id="tempatktp"> <small class="ml-2" style="display:none" id="tempatktp2"></small> </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="form-label">Check In</span>
                                            <input class="form-control" type="date" required="">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="form-label">Check out</span>
                                            <input class="form-control" type="date" required="">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <span class="form-label">Kamar</span>
                                            <select class="form-control" required="">
                                                <option value="" selected="" hidden="">jumlah kamar</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                            <span class="select-arrow"></span>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="form-label">Orang</span>
                                            <select class="form-control" required="">
                                                <option value="" selected="" hidden="">jumlah orang</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                            <span class="select-arrow"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="form-btn text-center">
                                    <button class="submit-btn">Next</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>