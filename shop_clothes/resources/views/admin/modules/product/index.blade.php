<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <b>All Category</b>
      </h2>
    </x-slot>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container">
          @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{session('success')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
          <div class="row">
            <div class="col-md-12 ">
              <a href="{{route('create.product')}}" class="btn btn-primary ">Create</a>

              <div class="card">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">name</th>
                      <th scope="col">Category</th>
                      <th scope="col">Brand</th>
                      <th scope="col">Create by</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody> 
                     @foreach ($products as $item)          
                      <tr>
                      <th scope="row">{{$products->firstItem()+$loop->index}}</th>
                      <td>{{$item->name}}</td>
                      <td>{{$item->category->name}}</td>
                      <td>{{$item->brand->name}}</td>
                      <td>{{$item->user->name}}</td>
                      <td>{{$item->qty}}</td>
                      <td>
                        @if($item->created_at==Null)
                        <span class="text-danger">No Date Set</span>
                        @else
                        {{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}
                        @endif
                      </td>
                      <td>
                        <a href="{{route('edit.product',$item->id)}}" class="btn btn-info">Edit</a>
                        <a href="{{route('soft.delete.product',$item->id)}}" class="btn btn-danger">Delete</a>
                      </td>
                    <tr> 
                    @endforeach
                  </tbody>
                </table>
                {{$products->links()}}
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">name</th>
                      <th scope="col">Category</th>
                      <th scope="col">Brand</th>
                      <th scope="col">Create by</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody> 
                     @foreach ($trachCat as $item)          
                      <tr>
                        <th scope="row">{{$trachCat->firstItem()+$loop->index}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->brand->name}}</td>
                        <td>{{$item->user->name}}</td>
                        <td>{{$item->qty}}</td>
                        <td>
                          @if($item->created_at==Null)
                          <span class="text-danger">No Date Set</span>
                          @else
                          {{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}
                          @endif
                        </td>
                      <td>
                        <a href="{{route('restore.product',$item->id)}}" class="btn btn-info">Restore</a>
                        <a href="{{route('delete.product',$item->id)}}" class="btn btn-danger">Delete</a>
                      </td>
                       <tr>
                     @endforeach
                  </tbody>
                </table>
                {{$trachCat->links()}}
              </div>
            </div>
            <div class="col-md-4"></div>
          </div>
        
        </div>
      </div>
    </div>
  </x-app-layout>