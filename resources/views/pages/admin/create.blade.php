@extends('layouts.dashboard')
@section('content')
    <div class="card">

        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">{{ __('dashboard.create_title') }}</div>
                </div>
            </header>
            <div class="card-text h-full ">
                <form class="space-y-4" id="form" enctype="multipart/form-data">
                    @csrf
                    <div class="input-area relative">
                        <label for="largeInput" class="form-label">{{ __('dashboard.create_label') }}</label>
                        <div class="relative">
                            <input id="name" type="text" class="form-control !pl-9" placeholder="Full Name">
                            <iconify-icon icon="heroicons-outline:user"
                                class="absolute left-2  top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                        </div>
                    </div>
                    <div class="input-area relative">
                        <label for="largeInput" class="form-label">{{ __('dashboard.email') }}</label>
                        <div class="relative">
                            <input id="email" type="email" class="form-control !pl-9" placeholder="Your Email">
                            <iconify-icon icon="heroicons-outline:mail"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                        </div>
                    </div>
                    <div class="input-area relative">
                        <label for="largeInput" class="form-label">{{ __('dashboard.phone') }}</label>
                        <div class="relative">
                            <input id="phone" type="tel" class="form-control !pl-9" placeholder="Phone Number"
                                pattern="[0-9]">
                            <iconify-icon icon="heroicons-outline:phone"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                        </div>
                    </div>
                    <div class="input-area relative">
                        <label for="largeInput" class="form-label">{{ __('dashboard.password') }}</label>
                        <div class="relative">
                            <input id="password" type="password" class="form-control !pl-9"
                                placeholder="{{ __('auth.password_ctr') }}">
                            <iconify-icon icon="heroicons-outline:lock-closed"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                        </div>
                    </div>
                    <input type="file" id="image" name="image">


                    <button type="button" onclick="store()" id="submit-btn"
                        class="btn inline-flex justify-center btn-dark">{{ __('dashboard.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function store() {
            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('phone', document.getElementById('phone').value);
            formData.append('image', document.getElementById('image').files[0]);
            formData.append('password', document.getElementById('password').value);
            axios.post('{{ route('admin.store') }}', formData).then(function(response) {
                toastr.success(response.data.message);
                document.getElementById('form').reset();
            }).catch(function(error) {
                toastr.error(error.response.data.message);

            });
        }
    </script>
@endsection
@section('style')
    {{-- <link rel="stylesheet" href="{{ asset('dashboard/css/rt-plugins.css') }}"> --}}
@endsection
