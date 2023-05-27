<form wire:submit.prevent="save" id="add_product">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" wire:model.defer="name" placeholder="Enter Name">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" wire:model.defer="description"
            placeholder="Enter Description">
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary mt-2">Save</button>
</form>

@push('scripts')
    <script>
        Livewire.on('closeModal', function() {
            $('#addProductModal').modal('hide');
        });
    </script>
@endpush
