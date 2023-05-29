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
          <h3><a href="{{route('employee')}}">View All Employees</a></h3><br>
          <form action="{{route('updateemployee')}}" method="POST">
            @csrf
            <div class="form-group">
               <input type="hidden" name="id" value="{{$employee['id']}}"> 
              <label>First Name:</label>
              <input type="text" name="FirstName" class="block mt-1 w-full" value="{{$employee['first_name']}}">
              @error('FirstName')
                  <p>{{$message}}</p>
              @enderror
            </div>
            
            <div class="form-group">
              <label>Last Name:</label>
              <input type="text" name="LastName" class="block mt-1 w-full" value="{{$employee['last_name']}}">
              @error('LastName')
                  <p>{{$message}}</p>
              @enderror
            </div>
            <div class="form-group">
              <label>Company:</label><br>
              <select name="company" style="width:100%">
                <option value="{{$employee['company']['id']}}">{{$employee['company']['name']}}</option>
                
              </select>
              @error('company')
                  <p>{{$message}}</p>
              @enderror
            </div>
            <div class="form-group">
              <label>Email:</label>
              <input type="email" name="Email" class="block mt-1 w-full" value="{{$employee['email']}}">
              @error('Email')
                  <p>{{$message}}</p>
              @enderror
            </div>
            <div class="form-group">
              <label>Phone:</label>
              <input type="tel" name="Phone" class="block mt-1 w-full" value="{{$employee['phone']}}">
              @error('Phone')
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
  