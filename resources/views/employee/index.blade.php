<style>
    table
    {
        width: 100%;
        border-collapse: collapse
    }
    table,tr
    {
        border-bottom:1px solid lightgray;
    }
    td
    {
        text-align: center;
        padding: 10px;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Employee') }}
        </h2>
    </x-slot>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h3><a href="{{route('employeecreate')}}">Create New Employee</a></h3>
        <br>
        <table>
            <tr>
                <th>S.No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Comapny</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            @php
                $no =1;
            @endphp
            @foreach ($employee as $row)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$row->first_name}}</td>
                <td>{{$row->last_name}}</td>
                <td>{{$row->company->name}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->phone}}</td>
                <td><a href="employee/update/{{$row->id}}">Update</a> | <a href="employee/delete/{{$row->id}}">Delete</a></td>
            </tr>
            @endforeach
        </table>
        <br>
        {{ $employee->links() }}
      </div>
      
    </div>
</x-app-layout>
