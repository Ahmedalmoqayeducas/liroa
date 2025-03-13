@extends('layouts.dashboard')
{{-- find a way to active a number of rows in the one page, and the --}}
@section('content')
    <div class="card">
        <header class=" card-header noborder">
            <h4 class="card-title">{{ __('dashboard.table') }}</h4>
        </header>
        <div class="card-body px-6 pb-6">
            <div class="overflow-x-auto -mx-6 dashcode-data-table">
                <span class=" col-span-8  hidden"></span>
                <span class="  col-span-4 hidden"></span>
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">

                            <div class="min-w-full">
                                <table
                                    class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table dataTable no-footer "
                                    id="DataTables_Table_0">
                                    <thead class=" bg-slate-200 dark:bg-slate-700">
                                        <tr>
                                            <th scope="col" class="table-th sorting sorting_asc" tabindex="0"
                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                aria-sort="ascending" aria-label=" Id : activate to sort column descending"
                                                style="width: 23.0625px;">
                                                {{ __('dashboard.id') }}
                                            </th>

                                            <th scope="col" class="table-th sorting" tabindex="0"
                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                aria-label="  Customer  : activate to sort column ascending"
                                                style="width: 143.438px;">
                                                title
                                            </th>
                                            <th scope="col" class="table-th sorting" tabindex="0"
                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                aria-label=" Action : activate to sort column ascending"
                                                style="width: 113.016px;">
                                                {{ __('dashboard.operations') }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                        @foreach ($data as $element)
                                            <tr class="even" id="element_{{ $element->id }}">
                                                <td class="table-td sorting_1">{{ $loop->index + 1 }}</td>

                                                <td class="table-td ">{{ $element->title }}</td>

                                                <td class="table-td ">
                                                    <div class="flex space-x-3 rtl:space-x-reverse">
                                                        <a href="{{ route('posts.show', $element->id) }}"
                                                            class="btn btn-success">Show</a>
                                                        <a class="action-btn edit"
                                                            href="{{ route('posts.edit', $element->id) }}">
                                                            <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                        </a>
                                                        <button type="button" onclick="destroy({{ $element->id }})"
                                                            class="action-btn delete">
                                                            <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="container">
                                    {{ $data->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function destroy(id) {
            axios.delete(`/dash/posts/trash/${id}`).then(function(response) {
                // document.getElementById(`user_${id}`).remove();
                document.getElementById(`element_${id}`).remove();
                toastr.success(response.data.message);
            }).catch(function(info) {
                toastr.info(info.response.data.message);
            });
        }
    </script>
@endsection
