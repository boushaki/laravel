@extends('layouts.adminlayout')

@section('content')


    <a href="{{ route('customers.create') }}"><button type="button" class="btn btn-sm btn-outline-primery float-right">Ajout customer</button></a>
 
    @if (session('deleteCustomer'))
    <div class="alert alert-dismissible alert-success fade show" role="alert">
        {{ session('deleteCustomer') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th><i class="fa fa-id-card"></i> Name</th>
          <th><i class="fa fa-at"></i>Email</th>
          <th><i class="fa fa-phone"></i>Phone</th>
          <th><i class="fa fa-cogs"></i>Operations</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($customers as $customer)
          <tr>
            <td>{{$customer->id}}</td>
            <td>{{ $customer->firstname.' '.$customer->lastname }}</td>
            <td>{{$customer->email}}</td>
            <td>{{$customer->phone}}</td>
            <td>
                <a href="{{ route('customers.show' , ['customer'=> $customer->id])}}" class="btn btn-outline-info"><i class="fa fa-eye"></i></a>
                <a href="{{ route('customers.edit' , ['customer'=> $customer->id])}}" class="btn btn-outline-warning"><i class="fa fa-edit"></i></a>
                <a href="{{ route('customers.destroy',['customer'=> $customer->id]) }}" class="btn btn-outline-danger"  onclick="event.preventDefault(); document.getElementById('delete-form').submit();"><i class="fa fa-trash"></i></a>
                <form id="delete-form" action="{{ route('customers.destroy',['customer'=> $customer->id] ) }}" method="POST" style="display: none;">
                  @method('DELETE')
                  @csrf
              </form> 
              </td>
          </div>  
          @endforeach
        </tbody>
    </table>
    <div class="float-right mr-3">
        {{$customers->links()}}
    </div>
     
@endsection