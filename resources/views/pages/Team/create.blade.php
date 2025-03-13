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
                            <input id="emp_name" name="name" type="text" class="form-control !pl-9"
                                placeholder="Full Name" value="{{ old('name') }}">
                            <iconify-icon icon="heroicons-outline:user"
                                class="absolute left-2 right-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                        </div>
                    </div>
                    <div class="input-area relative">
                        <label for="largeInput" class="form-label">{{ __('dashboard.email') }}</label>
                        <div class="relative">
                            <input id="email" name="email" type="email" class="form-control !pl-9"
                                placeholder="Your Email" value="{{ old('email') }}">
                            <iconify-icon icon="heroicons-outline:mail"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                        </div>
                    </div>
                    <div class="input-area relative">
                        <label for="largeInput" class="form-label">description</label>
                        <div class="relative">
                            <input id="description" name="description" type="text" class="form-control !pl-9"
                                placeholder="description" value="{{ old('description') }}">
                            <iconify-icon icon="heroicons-outline:user"
                                class="absolute left-2 right-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                        </div>
                    </div>
                    <div class="input-area relative">
                        <label for="largeInput" class="form-label">department or employment name</label>
                        <div class="relative">
                            <input id="department" name="department" type="text" class="form-control !pl-9"
                                placeholder="department" value="{{ old('department') }}">
                            <iconify-icon icon="heroicons-outline:user"
                                class="absolute left-2 right-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                        </div>
                    </div>
                    <div class="input-area relative">
                        <label for="largeInput" class="form-label">{{ __('dashboard.phone') }}</label>
                        <div class="relative">
                            <input id="phone" name="phone" type="tel" class="form-control !pl-9"
                                placeholder="Phone Number" pattern="[0-9]" value="{{ old('phone') }}">
                            <iconify-icon icon="heroicons-outline:phone"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                        </div>
                    </div>
                    <div class="input-area relative">
                        <label for="largeInput" class="form-label">facebook</label>
                        <div class="relative">
                            <input id="facebook" name="facbook"type="text" class="form-control !pl-9"
                                placeholder="facebook" value="{{ old('facebook') }}">
                            <iconify-icon icon="heroicons-outline:user"
                                class="absolute left-2 right-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                        </div>
                    </div>
                    <div class="input-area relative">
                        <label for="largeInput" class="form-label">linked in</label>
                        <div class="relative">
                            <input id="linked-in" name="linked-in" type="text" class="form-control !pl-9"
                                placeholder="linked in" value={{ old('linked-in') }}>
                            <iconify-icon icon="heroicons-outline:user"
                                class="absolute left-2 right-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                        </div>
                    </div>
                    <input type="file" id="picture" name="picture" value="{{ old('picture') }}">


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
            formData.append('emp_name', document.getElementById('emp_name').value);
            formData.append('employment_name', document.getElementById('department').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('description', document.getElementById('description').value);
            formData.append('picture', document.getElementById('picture').files[0]);
            formData.append('phone', document.getElementById('phone').value);
            formData.append('facebook', document.getElementById('facebook').value);
            formData.append('linked_in', document.getElementById('linked-in').value);

            axios.post('{{ route('team.store') }}', formData).then(function(response) {
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
