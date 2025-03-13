@extends('layouts.dashboard')
{{-- @section('title', 'Add New User') --}}

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('admin.create') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form method="POST" action="{{ route('Roles.store') }}">
            {{-- <form id='form'> --}}
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible  card">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach

                    </ul>
                </div>
            @endif
            @if (session('message'))
                <div class="alert alert-{{ session('alert') }} alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    {{ session('message') }}
                </div>
            @endif

            <div class="card-body">
                <div class="form-group mb-3">

                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" id="guard_name" name="guard_name">
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>name</label>
                    <input id="name" name="name" value="{{ old('name') }}" type="text" class="form-control"
                        placeholder="Enter name">
                </div>


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                {{-- <button type="button" onclick="store()" class="btn btn-primary">Submit</button> --}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

@endsection
@section('script')
    <script>
        function store() {
            axios.post('{{ route('Roles.store') }}', {
                    name: document.getElementById('name').value,
                    guard_name: document.getElementById('guard_name').value,

                }).then(function(response) {
                    console.log(response);

                    toastr.success(response.data.message);
                    document.getElementById('form').reset();
                })
                .catch(function(error) {
                    console.log(error);
                    toastr.error(error.response.data.message);
                });
        }
    </script>
    {{-- <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script> --}}
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
