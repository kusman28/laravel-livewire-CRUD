<div>
    <div class="col-md-10 mt-2">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
        @endif
    </div>
    <div class="col-md-10">
        @if(!$addProduct)
        {{-- <button wire:click="addProduct()" class="btn btn-primary btn-sm float-right mb-2">Add New Product</button> --}}
        <a href="{{ route('add_product') }}" class="btn btn-primary btn-sm float-right mb-2">Add New Product</a>
        @endif
        <div class="card">
            <div class="card-body">
                <h3>Products</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($products) > 0)
                                @foreach ($products as $product)
                                    <tr>
                                        <td width="13%">
                                            {{$product->name}}
                                        </td>
                                        <td>
                                            {{$product->description}}
                                        </td>
                                        <td width="13%">
                                            {{$product->price}}
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Actions">
                                                <button wire:click="editProduct({{$product->id}})" class="btn btn-primary btn-sm">Edit</button>
                                                <button wire:click="deleteProduct({{$product->id}})" class="btn btn-danger btn-sm">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" align="center">
                                        No Products Found.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
    <div class="col-md-10 mt-2">
        @if($addProduct)
            @include('livewire.create')
        @endif
        @if($updateProduct)
            @include('livewire.update')
        @endif
    </div>
</div>
