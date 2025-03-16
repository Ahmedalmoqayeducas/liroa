@extends('layouts.dashboard')

@section('content')
    {{--
        ========================
        1) Accordions Section
        ========================
    --}}
    {{-- @include('pages.org-pages.components.accordian') --}}

    {{--
        ========================
        2) Hover Contents Section
        ========================
    --}}

    @include('pages.org-pages.components.goals')


    {{--
        ========================
        3) Slides Section
        ========================
    --}}
    @include('pages.org-pages.components.slides')

    {{-- =============================================
         SCRIPTS (SweetAlert2 + Axios) + Logic
    ============================================== --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <style>
        /* Popup design */
        .custom-swal-popup {
            border: 2px solid #6c757d;
            /* gray border */
            border-radius: 10px;
            background-color: #ffffff;
        }

        /* Title */
        .custom-swal-title {
            color: #007bff;
            /* blue color */
            font-weight: bold;
        }

        /* Text */
        .custom-swal-text {
            color: #000;
            /* black color */
        }

        /* Input field */
        .custom-swal-input {
            border: 1px solid #6c757d;
            /* gray border for input */
        }

        /* Confirm button */
        .custom-swal-confirm {
            background-color: #007bff;
            /* blue */
            color: #fff;
        }

        /* Cancel button */
        .custom-swal-cancel {
            background-color: #6c757d;
            /* gray */
            color: #fff;
        }

        .custom-swal-textarea {
            height: 120px !important;
            resize: none;
        }
    </style>
@endsection
