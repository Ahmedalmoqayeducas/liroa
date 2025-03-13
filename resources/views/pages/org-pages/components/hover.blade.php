<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Hover Contents</h3>
        <button id="showCreateHover" class="btn btn-primary float-end">Add a New Hover Content</button>
    </div>
    <div class="card-body px-6 pb-6">
        <div class="overflow-x-auto -mx-6">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden">
                    <table id="hoverTable" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                        <thead class="bg-slate-200 dark:bg-slate-700">
                            <tr>
                                <th scope="col" class="table-th"> # </th>
                                <th scope="col" class="table-th"> Content </th>
                                <th scope="col" class="table-th"> Operations </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-slate-700">
                            @foreach($hoverContents as $hover)
                                <tr id="hover_{{ $hover->id }}">
                                    <td class="table-td">{{ $loop->iteration }}</td>
                                    <td class="table-td">{{ Str::limit($hover->content, 50) }}</td>
                                    <td class="table-td">
                                        <div class="flex space-x-3 rtl:space-x-reverse">
                                            <!-- Edit Button -->
                                            <button
                                                onclick="editHover({{ $hover->id }}, `{{ addslashes($hover->content) }}`)"
                                                class="action-btn btn-warning"
                                                title="Edit Hover Content">
                                                <iconify-icon icon="heroicons-outline:pencil-alt"></iconify-icon>
                                            </button>
                                            <!-- Delete Button -->
                                            <button
                                                onclick="deleteHover({{ $hover->id }})"
                                                class="action-btn btn-danger"
                                                title="Delete Hover Content">
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
                        {{ $hoverContents->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    /**********************************************
     * HOVER CONTENTS CRUD (Large Textarea)
     **********************************************/

    // CREATE
    document.getElementById('showCreateHover').addEventListener('click', function() {
        Swal.fire({
            title: 'Add New Hover Content',
            html: `
                <textarea id="hoverContent"
                          class="swal2-input custom-swal-input custom-swal-textarea"
                          placeholder="Enter content here..."></textarea>
            `,
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: 'Submit',
            cancelButtonText: 'Cancel',
            background: '#ffffff',
            customClass: {
                popup: 'custom-swal-popup',
                title: 'custom-swal-title',
                text: 'custom-swal-text',
                input: 'custom-swal-input',
                confirmButton: 'custom-swal-confirm',
                cancelButton: 'custom-swal-cancel'
            },
            preConfirm: () => {
                const content = document.getElementById('hoverContent').value.trim();
                if (!content) {
                    Swal.showValidationMessage('Please enter some content!');
                    return false;
                }
                return { content };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const { content } = result.value;
                axios.post(`{{ route('hovers.store') }}`, { content }, {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    Swal.fire({
                        title: response.data.status ? 'Success!' : 'Error!',
                        text: response.data.message,
                        icon: response.data.status ? 'success' : 'error',
                        background: '#ffffff',
                        customClass: {
                            popup: 'custom-swal-popup',
                            title: 'custom-swal-title',
                            text: 'custom-swal-text'
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
                        background: '#ffffff',
                        customClass: {
                            popup: 'custom-swal-popup',
                            title: 'custom-swal-title',
                            text: 'custom-swal-text'
                        }
                    });
                    console.error(error);
                });
            }
        });
    });

    // EDIT
    function editHover(id, currentContent) {
        Swal.fire({
            title: 'Edit Hover Content',
            html: `
                <textarea id="hoverContent"
                          class="swal2-input custom-swal-input custom-swal-textarea"
                          placeholder="Enter content...">${currentContent}</textarea>
            `,
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: 'Update',
            cancelButtonText: 'Cancel',
            background: '#ffffff',
            customClass: {
                popup: 'custom-swal-popup',
                title: 'custom-swal-title',
                text: 'custom-swal-text',
                input: 'custom-swal-input',
                confirmButton: 'custom-swal-confirm',
                cancelButton: 'custom-swal-cancel'
            },
            preConfirm: () => {
                const content = document.getElementById('hoverContent').value.trim();
                if (!content) {
                    Swal.showValidationMessage('Please enter some content!');
                    return false;
                }
                return { content };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const { content } = result.value;
                axios.put(`/dash/hovers/${id}`, { content }, {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    Swal.fire({
                        title: response.data.status ? 'Success!' : 'Error!',
                        text: response.data.message,
                        icon: response.data.status ? 'success' : 'error',
                        background: '#ffffff',
                        customClass: {
                            popup: 'custom-swal-popup',
                            title: 'custom-swal-title',
                            text: 'custom-swal-text'
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
                        background: '#ffffff',
                        customClass: {
                            popup: 'custom-swal-popup',
                            title: 'custom-swal-title',
                            text: 'custom-swal-text'
                        }
                    });
                    console.error(error);
                });
            }
        });
    }


       // DELETE
       function deleteHover(id) {
        Swal.fire({
            title: 'Delete Hover Content?',
            text: 'Are you sure you want to delete this record?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: 'Cancel',
            background: '#ffffff',
            customClass: {
                popup: 'custom-swal-popup',
                title: 'custom-swal-title',
                text: 'custom-swal-text',
                confirmButton: 'custom-swal-confirm',
                cancelButton: 'custom-swal-cancel'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                axios.delete(`/dash/hovers/${id}`, {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    // If successful, remove the corresponding row from the DOM if it exists
                    if (response.data.status) {
                        document.getElementById(`hover_${id}`)?.remove();
                    }
                    Swal.fire({
                        title: response.data.status ? 'Success!' : 'Error!',
                        text: response.data.message,
                        icon: response.data.status ? 'success' : 'error',
                        background: '#ffffff',
                        customClass: {
                            popup: 'custom-swal-popup',
                            title: 'custom-swal-title',
                            text: 'custom-swal-text'
                        }
                    });
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error!',
                        text: error.response?.data?.message ?? 'Server error',
                        icon: 'error',
                        background: '#ffffff',
                        customClass: {
                            popup: 'custom-swal-popup',
                            title: 'custom-swal-title',
                            text: 'custom-swal-text'
                        }
                    });
                    console.error(error);
                });
            }
        });
    }
</script>
