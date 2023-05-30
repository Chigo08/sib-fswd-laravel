@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Product</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-hover">
                        <thead class="table-secondary">
                            <tr>
                                <th>#</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Testing Avatar</td>
                                <td>Testing Name</td>
                                <td>Testing Email</td>
                                <td>Testing Role</td>
                                <td>Testing Phone</td>
                                <td>Testing Address</td>
                                <td>
                                    <button type="button" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
