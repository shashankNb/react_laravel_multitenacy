<x-admin-layout title="App Dashboard">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <!--        <div class="container-fluid">-->
        <!--            <div class="row mb-2">-->
        <!--                <div class="col-sm-6">-->
        <!--                    <h1 class="m-0">Starter Page</h1>-->
        <!--                </div>-->
        <!--                <div class="col-sm-6">-->
        <!--                    <ol class="breadcrumb float-sm-right">-->
        <!--                        <li class="breadcrumb-item"><a href="#">Home</a></li>-->
        <!--                        <li class="breadcrumb-item active">Starter Page</li>-->
        <!--                    </ol>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0 float-left">Manage Customers</h5>
                            <a href="{{ route('tenant', 0) }}" class="btn btn-primary btn-flat float-right">Add</a>
                            <div class="clearfix"></div>
                        </div>
                        @php($id = isset($data) ? $data['id'] : 0)
                        <form action="{{ route('tenant', $id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                @include('_partials.session')
                                @include('_partials.errors')
                                <div class="form-group row">
                                    <label for="inputCustomer" class="col-sm-2 col-form-label">Company Name *</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                               class="form-control"
                                               name="inputCustomer" id="inputCustomer"
                                               placeholder="Enter Company Name"
                                               value="{{ $data['name'] ?? request()->old('inputCustomer') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAccessDomain" class="col-sm-2 col-form-label">Domain</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                               class="form-control"
                                               name="inputAccessDomain"
                                               id="inputAccessDomain"
                                               placeholder="Enter Access Domain"
                                               value="{{ $data['domain'] ?? request()->old('inputAccessDomain') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputDB" class="col-sm-2 col-form-label">Database</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                               class="form-control"
                                               name="inputDB"
                                               id="inputDB"
                                               placeholder="Enter Database"
                                               value="{{ $data['database'] ?? request()->old('inputDB') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExpiryDate" class="col-sm-2 col-form-label">Expiry</label>
                                    <div class="col-sm-4">
                                        <input type="date"
                                               class="form-control"
                                               name="inputExpiryDate"
                                               id="inputExpiryDate"
                                               value="{{ $data['expiry'] ?? request()->old('inputExpiryDate') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputCompanyLogo" class="col-sm-2 col-form-label">Company Logo</label>
                                    <div class="col-sm-4">
                                        <div class="custom-file">
                                            <input type="file" name="inputCompanyLogo" id="inputCompanyLogo">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputCompanyLogo" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-4">
                                        <select name="inputStatus" id="status" class="form-control">
                                            <option value="0" @if(isset($data) && $data['status'] == 0) selected @endif>Inactive</option>
                                            <option value="1" @if(isset($data) && $data['status'] == 1) selected @endif>Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputNoOfUsers" class="col-sm-2 col-form-label">No Of Users</label>
                                    <div class="col-sm-1">
                                        <input type="text"
                                               class="form-control"
                                               name="inputNoOfUsers"
                                               id="inputNoOfUsers"
                                               value="{{ $data['no_of_users'] ?? request()->old('inputNoOfUsers') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info btn-flat">{{ isset($data) ? 'Update' : 'Add' }} Customer</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</x-admin-layout>
