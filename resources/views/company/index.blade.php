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
          {{ __('Create Company') }}
      </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h3><a href="{{route('companycreate')}}">Create New Company</a></h3>
      <br>
      <table>
          <tr>
              <th>S.No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Logo</th>
              <th>Website</th>
              <th>Action</th>
          </tr>
          @php
              $no =1;
          @endphp
          @foreach ($company as $row)
          <tr>
              <td>{{$no++}}</td>
              <td>{{$row->name}}</td>
              <td>{{$row->email}}</td>
              <td><img width="50" src='storage/uploads/{{$row->logo}}'/></td>
              <td>{{$row->website}}</td>
              <td><a href="company/update/{{$row->id}}">Update</a> | <a href="company/delete/{{$row->id}}">Delete</a></td>
          </tr>
          @endforeach
      </table>
        <br>
        {{ $company->links() }}

    </div>
  </div>
</x-app-layout>
