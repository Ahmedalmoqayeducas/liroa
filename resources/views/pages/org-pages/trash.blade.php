@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <header class="card-header noborder">
            <h4 class="card-title">Trashed Pages</h4>
            <a href="{{ route('pages.index') }}" class="btn btn-primary">Back to Pages</a>
        </header>
        <div class="card-body px-6 pb-6">
            <div class="overflow-x-auto -mx-6">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                        <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                            <thead class="bg-slate-200 dark:bg-slate-700">
                                <tr>
                                    <th class="table-th">ID</th>
                                    <th class="table-th">Page Name</th>
                                    <th class="table-th">Type</th>
                                    <th class="table-th">Deleted At</th>
                                    <th class="table-th">Operations</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                @foreach ($data as $element)
                                    <tr>
                                        <td class="table-td">{{ $element->id }}</td>
                                        <td class="table-td">{{ $element->name }}</td>
                                        <td class="table-td">{{ $element->type }}</td>
                                        <td class="table-td">{{ $element->deleted_at->format('Y-m-d H:i') }}</td>
                                        <td class="table-td">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                <form action="{{ route('pages.restore', $element->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="action-btn btn-success">
                                                        <iconify-icon icon="heroicons:arrow-uturn-left"></iconify-icon>
                                                    </button>
                                                </form>
                                                <form action="{{ route('pages.force-delete', $element->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to permanently delete this page?')">
                                                        <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                    </button>
                                                </form>
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
@endsection
