@extends('layouts.adminlayout')

@section('content')
@if (session('editCustomer'))
    <div class="alert alert-dismissible alert-success fade show" role="alert">
        {{ session('editCustomer') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<fieldset>
    <legend>
        <i class="fas fa-user-edit"></i> Edit Customer: <strong>{{ $customer->firstname." ".$customer->lastname }}</strong>
    </legend>
<form action="{{ route('customers.update', ['customer' => $customer->id]) }}" method="post">
    @method('PUT')
    @csrf
    @include('layouts.form')
</form>
</fieldset>
@endsection
