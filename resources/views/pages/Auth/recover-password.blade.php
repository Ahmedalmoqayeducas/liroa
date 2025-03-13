@extends('layouts.auth')
@section('form')
    <div class="text-center 2xl:mb-10 mb-4">
        <h4 class="font-medium">{{__('auth.recover')}}</h4>
        <div class="text-slate-500 text-base">
            {{__('auth.recover_title')}}
        </div>
    </div>
    <!-- BEGIN: Login Form -->
    <form class="space-y-4">
        <div class="fromGroup">
            <label class="block capitalize form-label  ">{{__('dashboard.password')}}</label>
            <div class="relative "><input type="password" name="password" id="password" class=" form-control py-2   "
                    placeholder="{{__('auth.password_ctr')}}" >
            </div>
        </div>
        <div class="fromGroup">
            <label class="block capitalize form-label  ">{{__('auth.confirm')}}</label>
            <div class="relative "><input type="password" name="password" id="password_confirmation"
                    class="  form-control py-2   " placeholder="{{__('auth.password_ctr')}}" >
            </div>
        </div>

        <button onclick="resetPassword()" type="button" class="btn btn-dark block w-full text-center">{{__('auth.change_submit')}}</button>
    </form>
    <!-- END: Login Form -->
    <div class="relative border-b-[#9AA2AF] border-opacity-[16%] border-b pt-6">
        <div
            class="absolute inline-block bg-white dark:bg-slate-800 dark:text-slate-400 left-1/2 top-1/2 transform -translate-x-1/2
                                    px-4 min-w-max text-sm text-slate-500 font-normal">

        </div>
    </div>
    <div class="max-w-[242px] mx-auto mt-8 w-full">

        <!-- BEGIN: Social Log in Area -->

        <!-- END: Social Log In Area -->
    </div>
    <div class="md:max-w-[345px] mx-auto font-normal text-slate-500 dark:text-slate-400 mt-12 uppercase text-sm">
        Back to
        <a href="{{ route('auth.show-login', ['guard' => session('guard')]) }}"
            class="text-slate-900 dark:text-white font-medium hover:underline">
            Sign in Page
        </a>
    </div>
@endsection
@section('script')
    <script>
        function resetPassword() {
            axios.post('{{ route('password.recover') }}', {
                email: `{{ $email }}`,
                password: document.getElementById('password').value,
                password_confirmation: document.getElementById('password_confirmation').value,
                token: `{{ $token }}`,

            }).then(function(response) {

                toastr.success(response.data.message);
                window.location.href = '{{ route('auth.show-login',['guard'=>session('guard')]) }}';
            }).catch(function(error) {

                toastr.error(error.response.data.message);
            });
        }
    </script>
@endsection
