<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File System | {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dashboard/fa/css/all.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        body {
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #f8f9fa;
            position: fixed;
            padding-top: 20px;
        }

        .content {
            margin-left: 260px;
            padding: 20px;
        }

        .file-card {
            cursor: pointer;
            transition: 0.3s;
        }

        .file-card:hover {
            background: #e9ecef;
        }

        .search-box {
            max-width: 300px;
        }

        .modal-backdrop {
            display: none !important;
        }

        .file-card:hover {
            background: none !important;
        }

        .file-card .card:hover {
            background: rgb(238, 238, 238) !important;
            transition: 0.5s;
        }

        /* التنسيق الأساسي للقائمة المنسدلة */
        .dropdown-menu23 {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            /* width: 150px; */
            padding: 0;
        }

        .dropdown-item {
            padding: 10px;
            cursor: pointer;
            color: #333;
        }

        .dropdown-item:hover {
            background-color: #f1f1f1;
        }
    </style>
    @livewireStyles

</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->

        <!-- Main Content -->
        <div class="content flex-grow-1">
            @livewire('navbar')

            <h5>Files</h5>
            @livewire('file-list')
        </div>
        @livewire('sidebar')
    </div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('dashboard/fa/js/all.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            window.addEventListener('open-create-folder-modal', event => {
                var myModal = new bootstrap.Modal(document.getElementById('createFolderModal'), {
                    keyboard: false
                });
                myModal.show();
            });

            window.addEventListener('close-create-folder-modal', event => {
                var myModal = bootstrap.Modal.getInstance(document.getElementById('createFolderModal'));
                myModal.hide();
            });

            window.addEventListener('open-create-file-modal', event => {
                var myModal = new bootstrap.Modal(document.getElementById('createFileModal'), {
                    keyboard: false
                });
                myModal.show();
            });

            window.addEventListener('close-create-file-modal', event => {
                var myModal = bootstrap.Modal.getInstance(document.getElementById('createFileModal'));
                myModal.hide();
            });

        });
    </script>
    <script src="{{ asset('dashboard/js/fileSystem.js') }}"></script>
</body>

</html>
