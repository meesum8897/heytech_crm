<style>
  input[type="submit"]
  {
    background-color: black;
    padding: 10px;
    margin-top: 10px;
    color:white;
    border-radius: 15px;
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
        <h3><a href="{{route('company')}}">View All Companies</a></h3><br>
        <form action="{{route('addcompany')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Company Name:</label>
            <input type="text" name="company" class="block mt-1 w-full" value="{{old('company')}}">
            @error('company')
                <p>{{$message}}</p>
            @enderror
          </div>
          
          <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="block mt-1 w-full" value="{{old('Email')}}">
            @error('email')
                <p>{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <label>Logo:</label><br>
            <input type="file" name="image">
            @error('image')
                <p>{{$message}}</p>
            @enderror
          </div>
          <div class="form-group">
            <label>Website:</label>
            <input type="text" name="website" class="block mt-1 w-full" value="{{old('website')}}">
            @error('website')
                <p>{{$message}}</p>
            @enderror
          </div>
          
          
          <input type="submit" name="btnsub">
        </form>
        @if (Session::has('success'))
            <p>{{Session::get('success')}}</p>
        @endif
        
        @if (Session::has('fail'))
            <p>{{Session::get('fail')}}</p>
        @endif
      </div>
  </div>
</x-app-layout>
