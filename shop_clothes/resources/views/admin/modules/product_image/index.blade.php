<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <b>Prduct Iamge</b>
      </h2>
    </x-slot>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Action</th>

                    </tr>
                  </thead>
                  <tbody> 
                     @foreach ($product_iamges as $item)          
                      <tr>
                      <th scope="row">{{$product_iamges->firstItem()+$loop->index}}</th>
                      <td><img src="{{asset($item->path)}}" width="80" alt=""></td>
                      <td>
                        @if($item->created_at==Null)
                        <span class="text-danger">No Date Set</span>
                        @else
                        {{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}
                        @endif
                      </td>
                      <td>
                      
                        <button type="button"  data-toggle="modal" data-target="#modal_{{$item->id}}" class="btn btn-primary">Update</button>
                        <!-- Modal -->
                      <div class="modal fade" id="modal_{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{route('update.product_image',$item->id)}}" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                @csrf
                                <input type="hidden" name="old_image" value="{{$item->path}}">

                                <input type="file" name="image" class="form-control">
                            
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <input type="submit" class="btn btn-primary">
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>
                        <a href="{{route('destroy.product.image',$item->id)}}" class="btn btn-danger">Delete</a>
                      </td>
                    <tr> @endforeach
                  </tbody>
                </table>
                {{$product_iamges->links()}}
              </div>
            </div>
            <div class="col-md-4">
              
            </div>
          </div>
        </div>
      
      </div>
    </div>



  </x-app-layout>