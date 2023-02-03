<div class="card">
    <div class="card-body">
        <h3>Update Product: {{ $name }}</h3>
        <form>
            <div class="form-group mb-3">
                <label for="name">Product Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Product" wire:model="name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="description">Description:</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" wire:model="description" placeholder="Enter Description"></textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="price">Price::</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Price" wire:model="price">
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="btn-group" role="group" aria-label="Actions">
                <button wire:click.prevent="updateProduct()" class="btn btn-success btn-block">Update</button>
                <button wire:click.prevent="cancelProduct()" class="btn btn-secondary btn-block">Cancel</button>
            </div>
        </form>
    </div>
</div>