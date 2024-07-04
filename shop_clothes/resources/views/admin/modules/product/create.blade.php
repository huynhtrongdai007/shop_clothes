<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      <b>Create Product</b>
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            
            <div class="card">
              @if (session('success')) 
              <div class="alert alert-success alert-dismissible fade show" role="alert">
               <strong>{{session('success')}}</strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div> 
             @endif 
              <div class="card-body">
                <form action="{{route('store.product')}}" method="POST" enctype="multipart/form-data"> @csrf <div class="form-row">
           
                    <div class="form-group col-md-6">
                      <label for="category">Category</label>
                      <select class="form-control" name="category_id" id="category_id">
                        <option value="">Choose category</option> @foreach ($categories as $item) <option value="{{$item->id}}">{{$item->name}}</option> @endforeach
                      </select> @error('category_id') <span class="text-class text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                      <label for="brand_id">Brand</label>
                      <select class="form-control" name="brand_id">
                        <option value="">Choose brand</option> @foreach ($brands as $item) <option value="{{$item->id}}">{{$item->name}}</option> @endforeach
                      </select> @error('brand_id') <span class="text-class text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name" value=""> @error('name') <span class="text-class text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                      <label>price</label>
                      <input type="text" class="form-control" name="price" value=""> @error('price') <span class="text-class text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Discount</label>
                      <input type="text" class="form-control" name="discount" value=""> @error('discount') <span class="text-class text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                      <label>Weight</label>
                      <input type="text" class="form-control" name="weight" value=""> @error('weight') <span class="text-class text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group  col-md-6">
                      <label>SKU</label>
                      <input type="text" class="form-control" name="sku" value=""> @error('sku') <span class="text-class text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                      <label>Tag</label>
                      <input type="text" class="form-control" name="tag" value=""> @error('tag') <span class="text-class text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Qty</label>
                      <input type="text" class="form-control" name="qty" value=""> @error('qty') <span class="text-class text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Featured</label>
                    <input type="checkbox" class="form-control" name="featured" value="">
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" class="form-control" name="description" id="description"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary w-100">Submit</button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                Add images
              </div>
              <div class="card-body">
                <input type="file" name="images[]" multiple class="form-control">
              </div>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('description')
  </script>
</x-app-layout>