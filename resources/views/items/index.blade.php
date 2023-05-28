@extends('layouts.app')

@section('title', 'All items')

@section('content')
    <!-- Main Content -->
    <main id="main" class="main">

        <!-- Include Alerts -->
        {{-- @include('layouts.alerts') --}}

        <div class="container">
            <!-- Livewire Component - Item Table -->
            <livewire:item.item-table />
        </div>

    </main>
@endsection
<script>
    public $page = 1;

    public
    function nextPage() {
        $this - > page++;
    }

    public
    function previousPage() {
        $this - > page--;
    }
</script>
