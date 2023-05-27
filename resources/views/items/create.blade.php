@extends('layouts.app')

@section('title', 'Create new item')

@section('content')
    <!-- Main content -->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Create new item</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('items.index') }}">Items</a></li>
                    <li class="breadcrumb-item active">Create new item</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">New item form</h5>

                        @include('layouts.alerts')
                        <!-- item Create Livewire content here --->
                        <livewire:item.create-new-item />

                        <!-- Add Product Modal -->
                        <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addProductModalLabel">Add Products</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Add modal content here -- Livewire modal -->
                                        <livewire:item.add-product-modal />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </main>
@endsection
@livewireScripts
<script>
    document.addEventListener('livewire:load', function() {
        Livewire.on('productGroupAdded', function() {
            Livewire.emit('pollRefreshProductGroups');
        });
    });
</script>
