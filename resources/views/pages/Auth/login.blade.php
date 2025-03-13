@extends('layouts.auth')
@section('form')
    <div class="text-center 2xl:mb-10 mb-4">
        <h4 class="font-medium">{{__('auth.login')}}</h4>
        <div class="text-slate-500 text-base">
            {{__('auth.login_title')}}
        </div>
    </div>
    <!-- BEGIN: Login Form -->
    {{-- <form method="POST" class="space-y-4" action="{{ route('auth.login') }}"> --}}
    <form id="form">
        @csrf
        <div class="fromGroup">
            <label class="block capitalize form-label">{{__('dashboard.email')}}</label>
            <div class="relative ">
                <input type="email" name="email"id="email" class="  form-control py-2" placeholder="Enter Your Email">
            </div>
        </div>
        <div class="fromGroup">
            <label class="block capitalize form-label  ">{{__('dashboard.password')}}</label>
            <div class="relative ">
                <input type="password" name="password" id="password" class="form-control py-2   "
                    placeholder="Enter Password">
            </div>
        </div>
        <div class="flex justify-between">
            <label class="flex items-center cursor-pointer 2xl:mb-10 mb-4">
                <input type="checkbox" class="hiddens 2xl:mb-10 mb-4" name="remember_token" id="remember_token">
                <span class="text-slate-500 dark:text-slate-400 text-sm leading-6 capitalize">{{__('auth.remember')}}</span>
            </label>
        </div>
        <button type="button" onclick="login()" class="btn btn-dark block w-full text-center">{{__('auth.login')}}</button>
    </form>
    <!-- END: Login Form -->
    <div class="relative border-b-[#9AA2AF] border-opacity-[16%] border-b pt-6">
        <div
            class="absolute inline-block bg-white dark:bg-slate-800 dark:text-slate-400 left-1/2 top-1/2 transform -translate-x-1/2
                                                  px-4 min-w-max text-sm text-slate-500 font-normal">
            Or continue with
        </div>
    </div>
    <div class="max-w-[242px] mx-auto mt-8 w-full">

        <!-- BEGIN: Social Log in Area -->
        <div class="md:max-w-[345px] mx-auto font-normal text-slate-500 dark:text-slate-400 mt-12 uppercase text-sm">
            Don’t remember your password?
            <a href="{{ route('password.forget') }}" class="text-slate-900 dark:text-white font-medium hover:underline">
                recover password
            </a>
        </div>
        <!-- END: Social Log In Area -->
    </div>
@endsection

<!-- scripts -->
@section('script')
    <script>
        function login() {
            axios.post('{{ route('auth.login') }}', {
                email: document.getElementById('email').value,
                password: document.getElementById('password').value,
                remember: document.getElementById('remember_token').checked,
            }).then(function(response) {
                window.location.href = "{{ route('dashboard') }}"
                toastr.success(response.data.message);
            }).catch(function(error) {
                toastr.error(error.response.data.message);
            });
        }
    </script>
@endsection
