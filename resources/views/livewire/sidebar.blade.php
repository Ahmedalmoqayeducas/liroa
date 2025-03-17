<div class="sidebar p-3 d-flex flex-column bg-light">
    <!-- Modal for folder creation -->
    <div class="modal fade" id="createFolderModal" tabindex="-1" aria-labelledby="createFolderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content box-shadow shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="createFolderModalLabel">Create New Folder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="folderName" class="form-label">Folder Name</label>
                        <input type="text" class="form-control" id="folderName" wire:model="folderName" placeholder="Enter folder name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="createFolder">Create Folder</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for file creation -->
    <div class="modal fade" wire:ignore id="createFileModal" tabindex="-1" aria-labelledby="createFileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content box-shadow shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="createFileModalLabel">Create New File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="fileName" class="form-label">File Name</label>
                        <input type="text" class="form-control" id="fileName" wire:model="fileName" placeholder="Enter file name">
                    </div>
                    <div class="mb-3">
                        <label for="fileUpload" class="form-label">Upload File</label>
                        <input id="inputFile" wire:ignore type="file" multiple class="form-control" id="fileUpload" wire:model.lazy="files" accept="image/*,application/pdf,.docx,.txt">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="createFile">Create File</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Buttons for Creating File or Folder -->
    <div class="d-flex flex-column mb-3">
        <!-- Button to create folder -->
        <button class="btn btn-success mb-2" wire:click="openCreateFolderModal">
            <i class="fas fa-folder-plus"></i> &ThinSpace; Create Folder
        </button>
        <!-- Button to create file -->
        <button class="btn btn-primary" wire:click="openCreateFileModal">
            <i class="fas fa-file-alt"></i> &ThinSpace; Create File
        </button>
    </div>

    <!-- List of Sidebar Items -->
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-dark border-0 rounded-0 w-100 text-left d-flex align-items-center justify-content-start">
                <i class="fas fa-dashboard"></i> &ThinSpace; Dashboard
            </a>
        <li class="nav-item">
            <a wire:click='home' class="btn btn-outline-dark border-0 rounded-0 w-100 text-left d-flex align-items-center justify-content-start">
                <i class="fas fa-home"></i> &ThinSpace; Home
            </a>
        </li>
        {{-- <li class="nav-item">
            <a href="#" class="btn btn-outline-dark border-0 rounded-0 w-100 text-left d-flex align-items-center justify-content-start">
                <i class="fas fa-folder"></i> &ThinSpace; My Drive
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="btn btn-outline-dark border-0 rounded-0 w-100 text-left d-flex align-items-center justify-content-start">
                <i class="fas fa-desktop"></i> &ThinSpace; Computers
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="btn btn-outline-dark border-0 rounded-0 w-100 text-left d-flex align-items-center justify-content-start">
                <i class="fas fa-share"></i> &ThinSpace; Shared with me
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="btn btn-outline-dark border-0 rounded-0 w-100 text-left d-flex align-items-center justify-content-start">
                <i class="fas fa-clock"></i> &ThinSpace; Recent
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="btn btn-outline-dark border-0 rounded-0 w-100 text-left d-flex align-items-center justify-content-start">
                <i class="fas fa-star"></i> &ThinSpace; Starred
            </a>
        </li>--}}
        <li class="nav-item">
            <a wire:click='trash' class="btn btn-outline-dark border-0 rounded-0 w-100 text-left d-flex align-items-center justify-content-start">
                <i class="fas fa-trash"></i> &ThinSpace; Trash
            </a>
        </li>
    </ul>

    <!-- Flash message for user feedback -->
    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif


</div>
