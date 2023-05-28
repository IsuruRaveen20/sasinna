<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">List of items</h5>
                <div class="card-tools mt-2">
                    <!-- Search Form -->
                    <div class="input-group input-group-sm position-relative">
                        <form wire:submit.prevent="search"
                            class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    wire:model.debounce.300ms="search" placeholder="item name ..." aria-label="Search"
                                    aria-describedby="basic-addon2" required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i> Search
                                    </button>
                                </div>
                            </div>
                            @if (!empty($this->search) && count($this->getSuggestions()) > 0)
                                <div class="suggestions mt-2 mb-2 card">
                                    <div class="card-body p-0">
                                        @foreach ($this->getSuggestions() as $suggestion)
                                            <div class="suggestion-item p-2">{{ $suggestion }}</div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </form>
                    </div>
                    <!-- Searched Results -->
                    @if ($search)
                        <h6 class="mt-2 float-right">Searched Results for "<i
                                class="font-weight-bold">{{ $search }}</i>"
                            <a class="text-info" wire:click="resetSearch" title="clear filter"><i
                                    class="fa fa-times"></i></a>
                        </h6>
                    @endif
                    <!-- End of Searched Results -->
                </div>

                <!-- Item Table -->
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-striped table-hover text-nowrap" id="itemTable"
                        width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Average Cost</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td><a href="{{ route('items.show', $item->id) }}"><b>{{ $item->code }}</b></a>
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>Rs. {{ number_format($item->avg_cost, 2) }}</td>
                                    <td>
                                        <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                                            @can('item-edit')
                                                <a class="btn btn-primary" href="{{ route('items.edit', $item->id) }}"
                                                    title="Edit">
                                                    <i class="bi bi-pen"></i>
                                                </a>
                                            @endcan
                                            @can('item-delete')
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this item?');"
                                                    title="Delete">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4"><i class='badge bg-secondary mb-2'>Data Not Available</i></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- End of Item Table -->

                <div class="d-flex justify-content-center mt-3">
                    {{ $items->links('livewire.item.pagination-links') }}
                </div>
                <!-- Pagination Links -->
                {{-- <div class="d-flex justify-content-center mt-3">
                    {!! $items->links('pagination::bootstrap-5') !!}
                </div> --}}
            </div>
        </div>
    </div>
</section>
{{-- @push('styles')
    <style>
        .suggestions {
            position: absolute;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 0;
            z-index: 9999;
        }

        .suggestion-item {
            padding: 8px;
            cursor: pointer;
        }

        .suggestion-item:hover {
            background-color: #020f1b;
        }
    </style>
@endpush --}}
