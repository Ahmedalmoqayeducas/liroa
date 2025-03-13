<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Slides</h3>
        <button id="showCreateSlide" class="btn btn-primary float-end">Add a New Slide</button>
    </div>
    <div class="card-body px-6 pb-6">
        <div class="overflow-x-auto -mx-6">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden">
                    <table id="slidesTable" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                        <thead class="bg-slate-200 dark:bg-slate-700">
                            <tr>
                                <th scope="col" class="table-th"> # </th>
                                <th scope="col" class="table-th"> Title </th>
                                <th scope="col" class="table-th"> Description </th>
                                <th scope="col" class="table-th"> Image </th>
                                <th scope="col" class="table-th"> Operations </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-slate-700">
                            @foreach($slides as $slide)
                                <tr id="slide_{{ $slide->id }}">
                                    <td class="table-td">{{ $loop->iteration }}</td>
                                    <td class="table-td">{{ $slide->title }}</td>
                                    <td class="table-td">{{ Str::limit($slide->description, 50) }}</td>
                                    <td class="table-td">
                                        @if($slide->image)
                                            <img src="{{ asset($slide->image) }}" alt="Slide Image" style="width: 100px;">
                                        @else
                                            No image
                                        @endif
                                    </td>
                                    <td class="table-td">
                                        <div class="flex space-x-3 rtl:space-x-reverse">
                                            <!-- Edit Button -->
                                            <button
                                                onclick="editSlide({{ $slide->id }}, '{{ addslashes($slide->title) }}', `{{ addslashes($slide->description) }}`, '{{ $slide->image }}')"
                                                class="action-btn btn-warning"
                                                title="Edit Slide">
                                                <iconify-icon icon="heroicons-outline:pencil-alt"></iconify-icon>
                                            </button>
                                            <!-- Delete Button -->
                                            <button
                                                onclick="deleteSlide({{ $slide->id }})"
                                                class="action-btn btn-danger"
                                                title="Delete Slide">
                                                <iconify-icon icon="heroicons-outline:trash"></iconify-icon>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Pagination (if using paginate) --}}
                    <div class="container mt-3">
                        {{ $slides->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    /**********************************************
     * SLIDES CRUD with File Upload + Pastel Design
     **********************************************/

    // CREATE Slide
    document.getElementById('showCreateSlide').addEventListener('click', function() {
        Swal.fire({
            title: 'Add New Slide',
            html: `
                <label class="my-swal2-label" for="slideTitle">Title</label>
                <input type="text" id="slideTitle" class="swal2-input my-swal2-input" placeholder="Enter slide title">

                <label class="my-swal2-label" for="slideDescription">Description</label>
                <textarea id="slideDescription" class="swal2-input my-swal2-textarea"
                          placeholder="Enter a detailed description..."></textarea>

                <label class="my-swal2-label" for="slideImage">Image</label>
                <input type="file" id="slideImage" class="swal2-input my-swal2-input" accept="image/*">
            `,
            showCancelButton: true,
            confirmButtonText: 'Submit',
            cancelButtonText: 'Cancel',

            /* Apply our custom classes for styling */
            customClass: {
                popup: 'my-swal2-popup',
                title: 'my-swal2-title',
                confirmButton: 'my-swal2-confirm',
                cancelButton: 'my-swal2-cancel'
            },

            // Validate fields before sending
            preConfirm: () => {
                const title       = document.getElementById('slideTitle').value.trim();
                const description = document.getElementById('slideDescription').value.trim();
                const fileInput   = document.getElementById('slideImage').files[0];

                if (!title) {
                    Swal.showValidationMessage('Please enter a title!');
                    return false;
                }
                return { title, description, fileInput };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const { title, description, fileInput } = result.value;

                // Prepare multipart/form-data
                let formData = new FormData();
                formData.append('title', title);
                formData.append('description', description);
                if (fileInput) {
                    formData.append('image', fileInput);
                }

                axios.post(`{{ route('slides.store') }}`, formData, {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(response => {
                    Swal.fire({
                        title: response.data.status ? 'Success!' : 'Error!',
                        text: response.data.message,
                        icon: response.data.status ? 'success' : 'error',
                        customClass: {
                            popup: 'my-swal2-popup',
                            title: 'my-swal2-title',
                            confirmButton: 'my-swal2-confirm'
                        }
                    }).then(() => {
                        if (response.data.status) {
                            location.reload();
                        }
                    });
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error!',
                        text: error.response?.data?.message ?? 'Server error',
                        icon: 'error',
                        customClass: {
                            popup: 'my-swal2-popup',
                            title: 'my-swal2-title',
                            confirmButton: 'my-swal2-confirm'
                        }
                    });
                    console.error(error);
                });
            }
        });
    });


    // EDIT Slide
    function editSlide(id, currentTitle, currentDescription, currentImage) {
        // If there's a stored image path, show a small preview
        let currentImageHTML = '';
        if (currentImage) {
            currentImageHTML = `
                <div style="margin-top:8px;">
                    <strong>Current Image:</strong><br>
                    <img src="${currentImage}" alt="Slide Image"
                         style="max-width:120px; margin-top:4px; border:1px solid #ccc; border-radius:4px;">
                </div>
            `;
        }

        Swal.fire({
            title: 'Edit Slide',
            html: `
                <label class="my-swal2-label" for="slideTitle">Title</label>
                <input type="text" id="slideTitle" class="swal2-input my-swal2-input"
                       placeholder="Enter slide title" value="${currentTitle}">

                <label class="my-swal2-label" for="slideDescription">Description</label>
                <textarea id="slideDescription" class="swal2-input my-swal2-textarea"
                          placeholder="Update description...">${currentDescription}</textarea>

                <label class="my-swal2-label" for="slideImage">Replace Image</label>
                <input type="file" id="slideImage" class="swal2-input my-swal2-input" accept="image/*">

                ${currentImageHTML}
            `,
            showCancelButton: true,
            confirmButtonText: 'Update',
            cancelButtonText: 'Cancel',

            customClass: {
                popup: 'my-swal2-popup',
                title: 'my-swal2-title',
                confirmButton: 'my-swal2-confirm',
                cancelButton: 'my-swal2-cancel'
            },

            preConfirm: () => {
                const title       = document.getElementById('slideTitle').value.trim();
                const description = document.getElementById('slideDescription').value.trim();
                const fileInput   = document.getElementById('slideImage').files[0];

                if (!title) {
                    Swal.showValidationMessage('Please enter a title!');
                    return false;
                }
                return { title, description, fileInput };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const { title, description, fileInput } = result.value;

                let formData = new FormData();
                formData.append('title', title);
                formData.append('description', description);
                if (fileInput) {
                    formData.append('image', fileInput);
                }

                // _method=PUT approach for FormData
                axios.post(`/slides/${id}?_method=PUT`, formData, {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(response => {
                    Swal.fire({
                        title: response.data.status ? 'Success!' : 'Error!',
                        text: response.data.message,
                        icon: response.data.status ? 'success' : 'error',
                        customClass: {
                            popup: 'my-swal2-popup',
                            title: 'my-swal2-title',
                            confirmButton: 'my-swal2-confirm'
                        }
                    }).then(() => {
                        if (response.data.status) {
                            location.reload();
                        }
                    });
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error!',
                        text: error.response?.data?.message ?? 'Server error',
                        icon: 'error',
                        customClass: {
                            popup: 'my-swal2-popup',
                            title: 'my-swal2-title',
                            confirmButton: 'my-swal2-confirm'
                        }
                    });
                    console.error(error);
                });
            }
        });
    }


    // DELETE Slide
    function deleteSlide(id) {
        Swal.fire({
            title: 'Delete Slide?',
            text: 'Are you sure you want to delete this record?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: 'Cancel',

            customClass: {
                popup: 'my-swal2-popup',
                title: 'my-swal2-title',
                confirmButton: 'my-swal2-confirm',
                cancelButton: 'my-swal2-cancel'
            },
            // If you want a red confirm button for "Delete":
            confirmButtonColor: '#dc3545',

        }).then((result) => {
            if (result.isConfirmed) {
                axios.delete(`/slides/${id}`, {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    if (response.data.status) {
                        // Remove the row from the table if your row has id="slide_{id}"
                        const row = document.getElementById(`slide_${id}`);
                        if (row) row.remove();
                    }
                    Swal.fire({
                        title: response.data.status ? 'Success!' : 'Error!',
                        text: response.data.message,
                        icon: response.data.status ? 'success' : 'error',
                        customClass: {
                            popup: 'my-swal2-popup',
                            title: 'my-swal2-title',
                            confirmButton: 'my-swal2-confirm'
                        }
                    });
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error!',
                        text: error.response?.data?.message ?? 'Server error',
                        icon: 'error',
                        customClass: {
                            popup: 'my-swal2-popup',
                            title: 'my-swal2-title',
                            confirmButton: 'my-swal2-confirm'
                        }
                    });
                    console.error(error);
                });
            }
        });
    }
</script>
