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
                        <div class="card-body">
                            @include('_partials.session')
                            <table id="tenant" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Company Name</th>
                                    <th>Domain</th>
                                    <th>Database</th>
                                    <th>Expiry Date</th>
                                    <th>No. of Users (Allowed)</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tenants as $rowIndex => $tenant)
                                <tr id="row-{{ $rowIndex }}">
                                    <td>{{ $tenant->id }}</td>
                                    <td>{{ $tenant->name }}</td>
                                    <td>{{ $tenant->domain }}</td>
                                    <td>{{ $tenant->database }}</td>
                                    <td>{{ $tenant->expiry }}</td>
                                    <td>{{ $tenant->no_of_users }}</td>
                                    <td>
                                        <div class="d-flex align-content-between">
                                            <a href="{{ route('tenant', $tenant->id) }}" class="btn btn-default btn-sm btn-flat mr-1"><i
                                                    class="fa fa-pencil-alt"></i> Edit</a>
                                            <form action="{{ route('delete.tenant', $tenant->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i> Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</x-admin-layout>
