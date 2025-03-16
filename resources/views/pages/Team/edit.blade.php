@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">Vertical Form With Icons</div>
                </div>
            </header>
            <div class="card-text h-full ">


                <form method="POST" action="{{ route('team.update', $data->id) }}" class="space-y-4" id="form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if (session('message'))
                        <div
                            class="py-[18px] px-6 font-normal font-Inter text-sm rounded-md bg-{{ session('alert') }}-500 text-white dark:bg-danger-500 dark:text-slate-300">
                            <div class="input-area relative">
                                <div class="flex items-start space-x-3 rtl:space-x-reverse">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>


                                    <ul class="flex-1">
                                        @foreach ($errors as $error)
                                            <li>
                                                <h6>
                                                    {{ $error }}
                                                </h6>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="input-area relative">
                        <label for="largeInput" class="form-label">{{ __('dashboard.create_label') }}</label>
                        <div class="relative">
                            <input id="emp_name" name="emp_name" type="text" class="form-control !pl-9"
                                placeholder="Full Name" value="{{ $data->emp_name }}">
                            <iconify-icon icon="heroicons-outline:user"
                                class="absolute left-2 right-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                        </div>
                    </div>
                    <div class="input-area relative">
                        <label for="largeInput" class="form-label">{{ __('dashboard.email') }}</label>
                        <div class="relative">
                            <input id="email" name="email" type="email" class="form-control !pl-9"
                                placeholder="Your Email" value="{{ $data->email }}">
                            <iconify-icon icon="heroicons-outline:mail"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                        </div>
                    </div>
                    <div class="input-area relative">
                        <label for="largeInput" class="form-label">description</label>
                        <div class="relative">
                            <input id="description" name="description" type="text" class="form-control !pl-9"
                                placeholder="description" value="{{ $data->description }}">
                            <iconify-icon icon="heroicons-outline:user"
                                class="absolute left-2 right-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                        </div>
                    </div>
                    <div class="input-area relative">
                        <label for="largeInput" class="form-label">department or employment name</label>
                        <div class="relative">
                            <input id="department" name="employment_name" type="text" class="form-control !pl-9"
                                placeholder="department" value="{{ $data->employment_name }}">
                            <iconify-icon icon="heroicons-outline:user"
                                class="absolute left-2 right-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                        </div>
                    </div>
                    <div class="input-area relative">
                        <label for="largeInput" class="form-label">{{ __('dashboard.phone') }}</label>
                        <div class="relative">
                            <input id="phone" name="phone" type="tel" class="form-control !pl-9"
                                placeholder="Phone Number"  value="{{ $data->phone }}">
                            <iconify-icon icon="heroicons-outline:phone"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                        </div>
                    </div>
                    <div class="input-area relative">
                        <label for="largeInput" class="form-label">facebook</label>
                        <div class="relative">
                            <input id="facebook" name="facbook"type="text" class="form-control !pl-9"
                                placeholder="facebook" value="{{ $data->facebook }}">
                            <iconify-icon icon="heroicons-outline:user"
                                class="absolute left-2 right-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                        </div>
                    </div>
                    <div class="input-area relative">
                        <label for="largeInput" class="form-label">linked in</label>
                        <div class="relative">
                            <input id="linked-in" name="linked_in" type="text" class="form-control !pl-9"
                                placeholder="linked in" value={{ $data->linked_in }}>
                            <iconify-icon icon="heroicons-outline:user"
                                class="absolute left-2 right-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                        </div>
                    </div>
                    <input type="file" id="picture" name="picture" value="{{ $data->picture }}">
                    <button type="submit" id="submit-btn" class="btn inline-flex justify-center btn-dark">
                        {{ __('dashboard.submit') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
{{-- @section('scripts')
    <script>
        function update(id) {
            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('phone', document.getElementById('phone').value);
            if (document.getElementById('image').files[0]) {
                formData.append('image', document.getElementById('image').files[0]);
            }

            axios.put(`/dash/admin/${id}`, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    },
                })
                .then(function(response) {
                    toastr.success(response.data.message);
                    document.getElementById('form').reset();
                })
                .catch(function(error) {
                    console.error(error.response);
                    toastr.error(error.response.data.message || 'Failed to update');
                });
        }0
    </script>
    {{-- <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script> --}}
{{-- <script>
    $(function() {
        bsCustomFileInput.init();
    });
</script> --}}
{{-- @endsection --}}
