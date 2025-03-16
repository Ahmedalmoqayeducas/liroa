@extends('layouts.dashboard')
{{-- @section('title', 'Add New User') --}}

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('auth.edit_table') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        {{-- <form method="POST" action="{{ route('auth.edit-password') }}" enctype="multipart/form-data"> --}}
        <div class="card-text h-full">
            <form class="space-y-4">
                @csrf
                {{-- @method('PUT') --}}
                {{-- @if ($errors->any())
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
                @endif --}}

                <div class="card-body">
                    <div class="input-area relative">
                        <label for="current-Password" class="form-label">{{__('auth.current_password')}}</label>
                        <div class="relative">
                            <input name="current-password" value="{{ old('current-password') }}" type="password"
                                class="form-control !pl-9" placeholder="Current Password" id="current-password">
                            <iconify-icon icon="heroicons-outline:lock-closed"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                        </div>
                    </div>
                    <div class="input-area relative">
                        <label for="new-Password" class="form-label">{{__('auth.new')}}</label>
                        <div class="relative">
                            <input name="new-password" value="{{ old('new-password') }}" type="password"
                                class="form-control !pl-9" placeholder="New Password" id="new_password">
                            <iconify-icon icon="heroicons-outline:lock-closed"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                        </div>
                    </div>

                    <div class="input-area relative">
                        <label for="new-Password-confrimation" class="form-label">{{__('auth.confirm')}}</label>
                        <div class="relative">
                            <input name="new-password-confirmation" value="{{ old('new-password-confrimation') }}"
                                type="password" class="form-control !pl-9" placeholder="New Password Confirmation"
                                id="new_password_confirmation">
                            <iconify-icon icon="heroicons-outline:lock-closed"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="updatePassword()" class="btn btn-primary">{{__('dashboard.submit')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function updatePassword() {
            return console.log('hello');
            // toastr.success('hello world');
            // axios.patch('{{ route('password.update') }}', {
            //     current_password: document.getElementById('current-password').value,
            //     new_password: document.getElementById('new_password').value,
            //     new_password_confirmation: document.getElementById('new_password_confirmation').value,
            // }).then(function(response) {
            //     toastr.success(response.data.message);
            // }).catch(function(error) {
            //     toastr.error(error.response.data.message);

            // });
        }
    </script>
@endsection
