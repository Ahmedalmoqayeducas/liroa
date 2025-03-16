<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Accordions</h3>
        <button id="showCreateAccordion" class="btn btn-primary float-end">Add a New Accordion</button>
    </div>
    <div class="card-body px-6 pb-6">
        <div class="overflow-x-auto -mx-6">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden">
                    <table id="accordionsTable" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                        <thead class="bg-slate-200 dark:bg-slate-700">
                            <tr>
                                <th scope="col" class="table-th"> # </th>
                                <th scope="col" class="table-th"> Title </th>
                                <th scope="col" class="table-th"> Description </th>
                                <th scope="col" class="table-th"> Operations </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-slate-700">
                            @foreach($accordians as $acc)
                                <tr id="accordion_{{ $acc->id }}">
                                    <td class="table-td">{{ $loop->iteration }}</td>
                                    <td class="table-td">{{ $acc->title }}</td>
                                    <td class="table-td">{{ Str::limit($acc->description, 50) }}</td>
                                    <td class="table-td">
                                        <div class="flex space-x-3 rtl:space-x-reverse">
                                            <!-- Edit Button -->
                                            <button
                                                onclick="editAccordion({{ $acc->id }}, '{{ addslashes($acc->title) }}', `{{ addslashes($acc->description) }}`)"
                                                class="action-btn btn-warning"
                                                title="Edit Accordion">
                                                <iconify-icon icon="heroicons-outline:pencil-alt"></iconify-icon>
                                            </button>
                                            <!-- Delete Button -->
                                            <button
                                                onclick="deleteAccordion({{ $acc->id }})"
                                                class="action-btn btn-danger"
                                                title="Delete Accordion">
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
                        {{ $accordians->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script>

    /**********************************************
     * ACCORDION CRUD (Large Textarea for Description)
     **********************************************/

    // CREATE
    document.getElementById('showCreateAccordion').addEventListener('click', function() {
        Swal.fire({
            title: 'Add New Accordion',
            html: `
                <input type="text" id="accTitle" class="swal2-input custom-swal-input" placeholder="Title">
                <textarea id="accDescription"
                          class="swal2-input custom-swal-input custom-swal-textarea"
                          placeholder="Description"></textarea>
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
                const title       = document.getElementById('accTitle').value.trim();
                const description = document.getElementById('accDescription').value.trim();
                if (!title) {
                    Swal.showValidationMessage('Please enter a title!');
                    return false;
                }
                return { title, description };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const { title, description } = result.value;
                axios.post(`{{ route('accordians.store') }}`, { title, description }, {
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
    function editAccordion(id, currentTitle, currentDescription) {
        Swal.fire({
            title: 'Edit Accordion',
            html: `
                <input type="text" id="accTitle"
                       class="swal2-input custom-swal-input"
                       placeholder="Title" value="${currentTitle}">
                <textarea id="accDescription"
                          class="swal2-input custom-swal-input custom-swal-textarea"
                          placeholder="Description">${currentDescription}</textarea>
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
                const title       = document.getElementById('accTitle').value.trim();
                const description = document.getElementById('accDescription').value.trim();
                if (!title) {
                    Swal.showValidationMessage('Please enter a title!');
                    return false;
                }
                return { title, description };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const { title, description } = result.value;
                axios.put(`/dash/accordians/${id}`, { title, description }, {
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
        function deleteAccordion(id) {
        Swal.fire({
            title: 'Delete Accordion?',
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
                axios.delete(`/dash/accordians/${id}`, {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    // If successful, remove the row if you have an element with ID "accordion_{id}"
                    if (response.data.status) {
                        document.getElementById(`accordion_${id}`)?.remove();
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
