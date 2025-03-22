@include('admin.layouts.header')
@include('admin.layouts.nav')



<div class="card mb-3">
    <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-5.png);">
    </div>
    <!--/.bg-holder-->
    <div class="card-body position-relative">
        <div class="row g-2 align-items-sm-center">
            <div class="col-auto"><img src="../assets/img/icons/connect-circle.png" alt="" height="20" /></div>
            <div class="col">
                <div class="row align-items-center">
                    <div class="col col-lg-11">
                        <h5 class="fs-0 mb-10 mb-sm-0 text-primary">Branch List</h5>
                    </div>

                    <div class="col col-lg-1">
                        <h5 class="fs-0 mb-3 mb-sm-0 text-primary">
                            <button class="btn btn-falcon-primary me-1 mb-1" type="button" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">Add</button>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="card mb-3 col-lg-12">
    <div class="bg-holder d-none d-lg-block bg-card"
        style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);"></div> <!--/.bg-holder-->
    <div class="card-body position-relative">
        <div class="row">
            <div class="col-lg-12">

                <table class="table mb-0 data-table fs--1">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th class="sort">id</th>
                            <th class="sort">Branch</th>
                            <th class="sort align-right">Action</th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($branches as $x)
                            <tr>
                                <td class="align-middle subject py-2 pe-4 fw-semi-bold">{{ $x->id }}</td>



                                <td class="align-middle subject py-2 pe-4 fw-semi-bold">{{ $x->branch_name }}</td>


                                <td>
                                    <form action="{{ route('branch.destroy', $x->id) }}" method="POST">
                                        <button class="btn btn-falcon-primary me-1 mb-1" type="button"
                                            data-bs-toggle="modal" data-bs-target="#bra{{ $x->id }}">Edit</button>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>





                            <!-- Add Modal -->

                            <div class="modal fade" id="bra{{ $x->id}}" data-bs-keyboard="false"
                                data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg mt-6" role="document">
                                    <div class="modal-content border-0">
                                        <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1"><button
                                                class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                data-bs-dismiss="modal" aria-label="Close"></button></div>
                                        <div class="modal-body p-0">
                                            <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                                                <h4 class="mb-1" id="staticBackdropLabel">Edit Branch</h4>
                                            </div>
                                            <div class="p-4">
                                                <div class="row">
                                                    <div class="col-lg-12">

                                                        <form action="{{ route('branch.update', $x->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <strong>Branch Name:</strong>
                                                                        <input type="text" name="branch_name"
                                                                            class="form-control"
                                                                            placeholder="{{ $x->branch_name }}"
                                                                            value="{{ $x->branch_name }}">
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-xs-12 col-sm-12 col-md-12 text-left mt-4">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Save</button>
                                                                </div>
                                                            </div>

                                                        </form>



                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Add Modal -->
                        @endforeach


                    </tbody>


            </div>
        </div>
    </div>
</div>





<!-- Add Modal -->

<div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg mt-6" role="document">
        <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1"><button
                    class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal"
                    aria-label="Close"></button></div>
            <div class="modal-body p-0">
                <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                    <h4 class="mb-1" id="staticBackdropLabel">Add Branch</h4>
                </div>
                <div class="p-4">
                    <div class="row">
                        <div class="col-lg-12">

                            <form action="{{ route('branch.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Branch Name:</strong>
                                            <input type="text" name="branch_name" class="form-control"
                                                placeholder="Enter branch name">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 text-left mt-4">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </div>

                            </form>



                        </div>

                    </div>



                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Add Modal -->




<!-- end Modal -->


<!-- End edit Modal -->




@include('admin.layouts.footer')
