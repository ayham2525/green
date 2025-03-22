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
                        <h5 class="fs-0 mb-10 mb-sm-0 text-primary">Programe List</h5>
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
                            <th class="sort">Program Name</th>
                            <th class="sort">Academy Name</th>

                            <th class="sort align-right">Action</th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($programs as $x)
                            <tr>
                                <td class="align-middle subject py-2 pe-4 fw-semi-bold">{{ $x->id }}</td>



                                <td class="align-middle subject py-2 pe-4 fw-semi-bold">{{ $x->programe_name }}</td>

                                <td class="align-middle subject py-2 pe-4 fw-semi-bold">
                                    {{ $x->academy_program->academy_name }}</td>

                                <td>
                                    <form action="{{ route('programs.destroy', $x->id) }}" method="POST">
                                        <button class="btn btn-falcon-primary me-1 mb-1" type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#pro{{$x->id}}">Edit</button>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>





                            <!-- Add Modal -->

                            <div class="modal fade" id="pro{{$x->id}}" data-bs-keyboard="false"
                                data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl  mt-6" role="document">
                                    <div class="modal-content border-0">
                                        <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1"><button
                                                class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                data-bs-dismiss="modal" aria-label="Close"></button></div>
                                        <div class="modal-body p-0">
                                            <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                                                <h4 class="mb-1" id="staticBackdropLabel">Edit programs</h4>
                                            </div>
                                            <div class="p-4">
                                                <div class="row">
                                                    <div class="col-lg-12">

                                                        <form action="{{ route('programs.update', $x->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="row">


                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <strong>Academy Name:</strong>
                                                                        <select name="academy_id" class="form-select">
                                                                            @foreach ($academy as $y)
                                                                                <option value="{{ $y->id }}">
                                                                                    {{ $y->academy_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>



                                                                <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                                                                    <div class="form-group">
                                                                        <strong>program Name:</strong>
                                                                        <input type="text" name="programe_name"
                                                                            class="form-control"
                                                                            placeholder="{{ $x->programe_name }}"
                                                                            value="{{ $x->programe_name }}">
                                                                    </div>
                                                                </div>



                                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                                    <div class="form-group">
                                                                        <strong>days:</strong>
                                                                        <input type="text" name="days"
                                                                            class="form-control"
                                                                            placeholder="{{ $x->days }}"
                                                                            value="{{ $x->days }}">
                                                                    </div>
                                                                </div>



                                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                                    <div class="form-group">
                                                                        <strong>classes:</strong>
                                                                        <input type="text" name="classes"
                                                                            class="form-control"
                                                                            placeholder="{{ $x->classes }}"
                                                                            value="{{ $x->classes }}">
                                                                    </div>
                                                                </div>



                                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                                    <div class="form-group">
                                                                        <strong>price:</strong>
                                                                        <input type="text" name="price"
                                                                            class="form-control"
                                                                            placeholder="{{ $x->price }}"
                                                                            value="{{ $x->price }}">
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

<div class="modal fade " id="staticBackdrop" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl mt-6" role="document">
        <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1"><button
                    class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal"
                    aria-label="Close"></button></div>
            <div class="modal-body p-0">
                <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                    <h4 class="mb-1" id="staticBackdropLabel">Add Program</h4>
                </div>
                <div class="p-4">
                    <div class="row">
                        <div class="col-lg-12">

                            <form action="{{ route('programs.store') }}" method="POST">
                                @csrf

                                <div class="row">



                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Academy Name:</strong>
                                            <select name="academy_id" class="form-select">
                                                @foreach ($academy as $y)
                                                    <option value="{{ $y->id }}">{{ $y->academy_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12 mb-2 mt-2">
                                        <div class="form-group">
                                            <strong>program Name:</strong>
                                            <input type="text" name="programe_name" class="form-control"
                                                placeholder="Enter program  name">
                                        </div>
                                    </div>



                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <strong>days:</strong>
                                            <input type="text" name="days" class="form-control"
                                                placeholder="Enter days">
                                        </div>
                                    </div>



                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <strong>classes:</strong>
                                            <input type="text" name="classes" class="form-control"
                                                placeholder="Enter classes">
                                        </div>
                                    </div>



                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <strong>price:</strong>
                                            <input type="text" name="price" class="form-control"
                                                placeholder="Enter price">
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


@include('admin.layouts.footer')
