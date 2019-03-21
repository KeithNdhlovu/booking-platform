@extends('layouts.app')

@section('template_title', 'Showing Users')

@section('css')
    <style>
        .dataTables_wrapper .dt-buttons a.dt-button {
            background-color: #607D8B;
            color: #fff;
            padding: 7px 12px;
            margin-right: 5px;
            text-decoration: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.16), 0 2px 10px rgba(0, 0, 0, 0.12);
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            -ms-border-radius: 2px;
            border-radius: 2px;
            border: none;
            font-size: 13px;
            outline: none;
        }
    </style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Users List</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active">Users List</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-block">
            <div class="table-responsive">
            <table class="table table-striped data-table dataTable js-exportable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Role</th>
                        <th>ID Number</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Actions</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if($users->isEmpty())
                        <tr>
                            <td colspan="10"><h4>No User yet.</h4></td>
                        </tr>
                    @endif
                    @foreach($users as $index => $user)
                        @if (Auth::user()->id === $user->id)
                            @continue
                        @endif
                        
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><a href="mailto:{{ $user->email }}" title="email {{ $user->email }}">{{ $user->email }}</a></td>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>
                                @if ($user->isAdministrator())
                                    <span class="badge badge-danger">Admin</span>
                                @elseif ($user->isUser())
                                    <span class="badge badge-success">User</span>
                                @elseif ($user->isAirportAdmin())
                                    <span class="badge badge-primary">Air Admin</span>
                                @endif
                                
                            </td>
                            <td>{{ $user->id_number ? $user->id_number : 'N/A' }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td>
                                {!! Form::open(array('url' => 'users/' . $user->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    {!! Form::button('<i class="mdi mdi-delete"></i>', array('class' => 'btn btn-icons btn-rounded btn-danger','type' => 'button','data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user ?')) !!}
                                {!! Form::close() !!}
                            </td>
                            <td>
                                <a class="btn btn-icons btn-rounded btn-success" 
                                    href="{{ URL::to('users/' . $user->id) }}" 
                                    data-toggle="tooltip" title="Show">
                                    <i class="mdi mdi-eye"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-icons btn-rounded btn-warning" 
                                    href="{{ URL::to('users/' . $user->id . '/edit') }}" 
                                    data-toggle="tooltip" 
                                    title="Edit">
                                    <i class="mdi mdi-pencil"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>

    @include('modals.modal-delete')
</div>
@endsection
    
@section('scripts')
        
        @include('scripts.delete-modal-script')
        @include('scripts.save-modal-script')
    
        <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
    
    <!-- Custom Js -->
    <script>
    $(function () {

        //Exportable table
        $('.js-exportable').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            paging: false,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
    </script>

@endsection