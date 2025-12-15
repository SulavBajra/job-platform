@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">All Employees</h1>

    <table class="table-auto w-full border">
        <thead>
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Location</th>
                <th class="border px-4 py-2">Skills</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td class="border px-4 py-2">{{ $employee->id }}</td>
                <td class="border px-4 py-2">{{ $employee->name }}</td>
                <td class="border px-4 py-2">{{ $employee->email }}</td>
                <td class="border px-4 py-2">{{ $employee->location }}</td>
                <td class="border px-4 py-2">{{ $employee->skills }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
