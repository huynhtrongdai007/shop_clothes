<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <b>Edit Category</b>
      </h2>
    </x-slot>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-body">
                  @if (session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                <div class="card-header"> Update Category </div>
                    <form action="{{route('update.category',$category->id)}}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control" name="name" value="{{$category->name}}">
                        @error('name')
                            <span class="text-class text-danger">{{$message}}</span>
                        @enderror
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
                </div>
              
            </div>
            <div class="col-md-4">
         
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-app-layout>