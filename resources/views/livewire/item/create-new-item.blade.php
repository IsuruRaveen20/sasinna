<form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-7">
            <div class="form-group">
                <strong>Code:</strong><span class="text-danger">*</span>
                <input type="text" name="code" class="form-control" placeholder="Code of the item" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-7">
            <div class="form-group">
                <strong>Name:</strong><span class="text-danger">*</span>
                <input type="text" name="name" class="form-control" placeholder="Name of the item" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-7">
            <div class="form-group">
                <strong>Description:</strong><span class="text-danger">*</span>
                <input type="text" name="description" class="form-control" placeholder="Description of the item"
                    required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-7">
            <div class="form-group">
                <strong>Average Cost:</strong><span class="text-danger">*</span>
                <input type="number" name="avg_cost" class="form-control" placeholder="Average Cost of the item"
                    required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-7">
            <div class="form-group">
                <strong>Product Group:</strong><span class="text-danger">*</span> <a class="btn text-primary"
                    href="#" data-bs-toggle="modal" data-bs-target="#addProductModal"><i class="bi bi-plus"></i>
                    Add
                    products</a>
                <select name="product_group" class="form-select" aria-label="Default select example">
                    @forelse ($product_groups as $product_group)
                        <option value="{{ $product_group->id }}">{{ $product_group->name }}</option>
                    @empty
                        <option value="">N/A</option>
                    @endforelse
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-7">
            <div class="form-group">
                <strong>Unit of Measurement:</strong><span class="text-danger">*</span>
                <select name="unit_of_measurement" class="form-select" aria-label="Default select example">
                    <option selected value="0">Kilograms</option>
                    <option value="1">Meters</option>
                    <option value="2">Liters</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-7">
            <div class="form-group">
                <strong>Product Type</strong><span class="text-danger">*</span>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="product_type" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Spare Parts
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="product_type" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Product
                    </label>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-7">
            <div class="form-group">
                <strong>Free Issue:</strong><span class="text-danger">*</span>
                <select name="free_issue" class="form-select" aria-label="Default select example">
                    <option selected value="0">No free issue</option>
                    <option value="1">Value 1</option>
                    <option value="2">Value 2</option>
                </select>
            </div>
        </div>

        <div class="col-md-12 mt-4">

            <button class="btn btn-primary" type="submit"><i class="bi bi-person"></i> Create
                item</button>
            <a class="btn btn-danger" href="{{ url()->previous() }}" title="Cancel & go back"><i
                    class="bi bi-x-square"></i></a>
        </div>
    </div>
</form>
