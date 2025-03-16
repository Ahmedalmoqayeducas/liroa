@extends('layouts.dashboard')
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ __('admin.updated_at') }}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    {{-- <form method="POST" action="{{ route('Ticket.update', $ticket->id) }}"> --}}
        <form id="form">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group mb-3">

                    <div class="form-group">
                        <label>user</label>
                        <select class="form-control" id="guard_name" name="guard_name">

                            <option value="admin" @checked($role->guard_name='admin')>Admin</option>
                            <option value="user"@checked($role->guard_name='user')>User</option>

                        </select>
                    </div>
                </div>
                <div class="form-group mb-3">


                    <div class="form-group">
                        <label>name</label>
                        <input id="name" name="name" value="{{ $role->name }}" type="text" class="form-control"
                            placeholder="Enter name">
                    </div>


                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="button" onclick="update({{ $role->id }})" class="btn btn-primary">Submit</button>
            </div>
        </form>
</div>

@endsection

@section('script')
<script>
    function update(id) {

            axios.put(`/dashboard/role/${id}`, {
                name: document.getElementById('name').value,
                guard_name: document.getElementById('guard_name').value,
            }).then(function(response) {
                toastr.success(response.data.message);
                window.location.href = '{{ route('role.index') }}';
            }).catch(function(error) {
                toastr.error(error.response.data.message);
            });
        }
</script>
@endsection
