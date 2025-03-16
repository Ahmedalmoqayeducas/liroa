@extends('layouts.dashboard')
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Contacts DataTable</h3>
        </div>
        <div class="card-body px-6 pb-6">
            <div class="overflow-x-auto -mx-6">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden">
                        <table id="contactTable"
                            class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                            <thead class="bg-slate-200 dark:bg-slate-700">
                                <tr>
                                    <th scope="col" class="table-th"> # </th>
                                    <th scope="col" class="table-th"> name </th>
                                    <th scope="col" class="table-th"> email </th>
                                    <th scope="col" class="table-th"> subject </th>
                                    <th scope="col" class="table-th"> message </th>
                                    <th scope="col" class="table-th"> send Date </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                @foreach ($data as $contact)
                                    <tr id="contact_{{ $contact->id }}">
                                        <td class="table-td">{{ $loop->iteration }}</td>
                                        <td class="table-td">{{ $contact->name }}</td>
                                        <td class="table-td">{{ $contact->email }}</td>
                                        <td class="table-td">{{ $contact->subject }}</td>
                                        <td class="table-td">{{ $contact->message }}</td>
                                        <td class="table-td">{{ $contact->created_at }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Laravel pagination links -->
                        <div class="container mt-3">
                            {{ $data->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
