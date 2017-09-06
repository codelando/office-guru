@extends('layouts.office-guru')

@section('content')
<main>
    <section class="offices pad-top">
        <div class="container">
            <h2>Oficinas encontradas</h2>
            
            @include('location._list')

            {{ $locations->links() }}
        </div>
    </section>  
</main>
@endsection