@extends('layouts.adminlayout')

@section('content')
<form action="{{ route('customers.store') }}" method="post">
@csrf
@include('layouts.form')
</form>
@endsection
