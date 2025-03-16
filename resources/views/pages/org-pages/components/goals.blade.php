<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Manage Goals</h3>
        <button id="showCreateGoal" class="btn btn-primary float-end">Add New Goal</button>
    </div>
    <div class="card-body px-6 pb-6">
        <div class="overflow-x-auto -mx-6">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-slate-100 table-fixed">
                        <thead class="bg-slate-200">
                            <tr>
                                <th class="table-th">#</th>
                                <th class="table-th">Title</th>
                                <th class="table-th">Description</th>
                                <th class="table-th">Icon
                                    <a href="https://fontawesome.com/">(from this page)</a>
                                </th>
                                <th class="table-th">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y">
                            @foreach ($goals as $goal)
                                <tr id="goal_{{ $goal->id }}">
                                    <td class="table-td">{{ $loop->iteration }}</td>
                                    <td class="table-td">{{ $goal->title }}</td>
                                    <td class="table-td">{{ Str::limit($goal->description, 50) }}</td>
                                    <td class="table-td"><i icon="{{ $goal->icon }}"></i></td>
                                    <td class="table-td">
                                        <div class="flex space-x-3">
                                            <button onclick="editGoal({{ $goal->id }})"
                                                class="btn btn-warning btn-sm">
                                                Edit
                                            </button>
                                            <button onclick="deleteGoal({{ $goal->id }})"
                                                class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $goals->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.getElementById('showCreateGoal').addEventListener('click', () => {
        Swal.fire({
            title: 'Create New Goal',
            html: `
                <div class="swal2-form-group">
                    <input type="text" id="title"
                        class="swal2-input custom-swal-input"
                        placeholder="Goal Title">
                </div>
                <div class="swal2-form-group">
                    <input type="text" id="icon"
                        class="swal2-input custom-swal-input"
                        placeholder="Font Awesome Icon (e.g. fa-user)">
                </div>
                <div class="swal2-form-group">
                    <textarea id="description"
                        class="swal2-textarea custom-swal-textarea"
                        placeholder="Description"></textarea>
                </div>
                <div class="swal2-form-group">
                    <input type="url" id="link"
                        class="swal2-input custom-swal-input"
                        placeholder="Link URL">
                </div>
            `,
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: 'Create',
            cancelButtonText: 'Cancel',
            background: '#ffffff',
            customClass: {
                popup: 'custom-swal-popup',
                title: 'custom-swal-title',
                htmlContainer: 'custom-swal-text',
                input: 'custom-swal-input',
                textarea: 'custom-swal-textarea',
                confirmButton: 'custom-swal-confirm',
                cancelButton: 'custom-swal-cancel'
            },
            preConfirm: () => {
                const data = {
                    title: document.getElementById('title').value.trim(),
                    icon: document.getElementById('icon').value.trim(),
                    description: document.getElementById('description').value.trim(),
                    link: document.getElementById('link').value.trim()
                };

                let errors = [];
                if (!data.title) errors.push('Title is required');
                if (!data.icon) errors.push('Icon class is required');
                if (!data.description) errors.push('Description is required');
                if (!data.link) errors.push('Link is required');

                if (errors.length > 0) {
                    Swal.showValidationMessage(errors.join('<br>'));
                    return false;
                }

                return data;
            }
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('{{ route('goals.store') }}', result.value, {
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
                        const errorMsg = error.response?.data?.message || 'Server error';
                        Swal.fire({
                            title: 'Error!',
                            text: errorMsg,
                            icon: 'error',
                            background: '#ffffff',
                            customClass: {
                                popup: 'custom-swal-popup',
                                title: 'custom-swal-title',
                                text: 'custom-swal-text'
                            }
                        });
                    });
            }
        });
    });

    // Edit Goal Modal
    function editGoal(id) {
        axios.get(`/dash/goals/${id}/edit`)
            .then(response => {
                const goal = response.data;
                Swal.fire({
                    title: 'Edit Goal',
                    html: `
                    <div class="swal2-form-group">
                        <input type="text" id="title"
                            class="swal2-input custom-swal-input"
                            value="${goal.title}">
                    </div>
                    <div class="swal2-form-group">
                        <input type="text" id="icon"
                            class="swal2-input custom-swal-input"
                            value="${goal.icon}">
                    </div>
                    <div class="swal2-form-group">
                        <textarea id="description"
                            class="swal2-textarea custom-swal-textarea">${goal.description}</textarea>
                    </div>
                    <div class="swal2-form-group">
                        <input type="url" id="link"
                            class="swal2-input custom-swal-input"
                            value="${goal.link}">
                    </div>
                `,
                    focusConfirm: false,
                    showCancelButton: true,
                    confirmButtonText: 'Update',
                    cancelButtonText: 'Cancel',
                    background: '#ffffff',
                    customClass: {
                        popup: 'custom-swal-popup',
                        title: 'custom-swal-title',
                        htmlContainer: 'custom-swal-text',
                        input: 'custom-swal-input',
                        textarea: 'custom-swal-textarea',
                        confirmButton: 'custom-swal-confirm',
                        cancelButton: 'custom-swal-cancel'
                    },
                    preConfirm: () => {
                        const data = {
                            title: document.getElementById('title').value.trim(),
                            icon: document.getElementById('icon').value.trim(),
                            description: document.getElementById('description').value.trim(),
                            link: document.getElementById('link').value.trim()
                        };

                        let errors = [];
                        if (!data.title) errors.push('Title is required');
                        if (!data.icon) errors.push('Icon class is required');
                        if (!data.description) errors.push('Description is required');
                        if (!data.link) errors.push('Link is required');

                        if (errors.length > 0) {
                            Swal.showValidationMessage(errors.join('<br>'));
                            return false;
                        }

                        return data;
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.put(`/dash/goals/${id}`, result.value, {
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
                                const errorMsg = error.response?.data?.message || 'Server error';
                                Swal.fire({
                                    title: 'Error!',
                                    text: errorMsg,
                                    icon: 'error',
                                    background: '#ffffff',
                                    customClass: {
                                        popup: 'custom-swal-popup',
                                        title: 'custom-swal-title',
                                        text: 'custom-swal-text'
                                    }
                                });
                            });
                    }
                });
            })
            .catch(error => {
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to load goal data',
                    icon: 'error',
                    background: '#ffffff',
                    customClass: {
                        popup: 'custom-swal-popup',
                        title: 'custom-swal-title',
                        text: 'custom-swal-text'
                    }
                });
            });
    }

    // Delete Confirmation
    function deleteGoal(id) {
        Swal.fire({
            title: 'Delete Goal?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
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
                axios.delete(`/dash/goals/${id}`, {
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => {
                        Swal.fire({
                            title: response.data.status ? 'Deleted!' : 'Error!',
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
                                document.getElementById(`goal_${id}`)?.remove();
                            }
                        });
                    })
                    .catch(error => {
                        const errorMsg = error.response?.data?.message || 'Server error';
                        Swal.fire({
                            title: 'Error!',
                            text: errorMsg,
                            icon: 'error',
                            background: '#ffffff',
                            customClass: {
                                popup: 'custom-swal-popup',
                                title: 'custom-swal-title',
                                text: 'custom-swal-text'
                            }
                        });
                    });
            }
        });
    }
</script>
<style>
    .custom-swal-popup {
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    }

    .custom-swal-title {
        font-size: 1.5rem;
        color: #2d3748;
        font-weight: 600;
    }

    .custom-swal-text {
        color: #4a5568;
        font-size: 1rem;
    }

    .swal2-form-group {
        margin-bottom: 1rem;
    }

    .custom-swal-input,
    .custom-swal-textarea {
        width: 89%;
        padding: 0.7rem;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        transition: border-color 0.3s ease;
    }

    .custom-swal-input:focus,
    .custom-swal-textarea:focus {
        border-color: #4299e1;
        outline: none;
    }

    .custom-swal-confirm {
        background-color: #4299e1 !important;
        padding: 0.5rem 1.5rem !important;
        border-radius: 6px !important;
    }

    .custom-swal-cancel {
        background-color: #e2e8f0 !important;
        color: #2d3748 !important;
        padding: 0.5rem 1.5rem !important;
        border-radius: 6px !important;
    }
</style>
