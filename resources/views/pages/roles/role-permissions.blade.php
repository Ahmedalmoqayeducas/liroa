@extends('layouts.dashboard')
@section('content')
    <div class="card-body px-6 pb-6">
        <div class="overflow-x-auto -mx-6">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden ">
                    <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                        <thead class="bg-slate-200 dark:bg-slate-700">
                            <tr>

                                <th scope="col" class=" table-th ">
                                    id
                                </th>

                                <th scope="col" class=" table-th ">
                                    Permission Name
                                </th>

                                <th scope="col" class=" table-th ">
                                    guard name
                                </th>
                                <th scope="col" class=" table-th ">
                                    Selecting
                                </th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                            @foreach ($permission as $ticket)
                                <tr id="role_{{ $ticket->id }}">
                                    <td class="table-td">{{ $loop->index + 1 }}</td>
                                    <td class="table-td">{{ $ticket->name }}</td>
                                    <td class="table-td">{{ $ticket->guard_name }}</td>
                                    <td class="table-td">
                                        <div class="flex space-x-3 rtl:space-x-reverse">
                                            {{-- @dd($ticket->id) --}}
                                            <input type="checkbox" id="permission_{{ $ticket->id }}"
                                                onclick="updatePermission('{{ $ticket->id }}')"
                                                @checked($ticket->assigned)>
                                            <label for="permission_{{ $ticket->id }}">
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="container">
                    {{-- {{ $data->links() }} --}}
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <script>
        function updatePermission(id) {
            axios.put('/dash/role/{{ $role->id }}/permissions', {
                permission_id: id
            }
            ).then(function(response) {
                toastr.success(response.data.message);
            }).catch(function(error) {

                toastr.error(error.response.data.message || "حدث خطأ.");
            });
        }
    </script>
@endsection
@section('script')
    <script src="{{ asset('dashboard/toastr/toastr.min.js') }}"></script>

@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('dashboard/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection
