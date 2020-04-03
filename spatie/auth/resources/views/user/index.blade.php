@extends('layouts.app')
@section('content')

<div class="container">  

<h1> Home Page </h1> 

@if (session('successMsg'))

<div class="alert alert-success" role="alert">
{{ session('successMsg') }}
</div>

@endif

<table class="table">
 <thead class="black white-text">
   <tr>
     <th scope="col">#</th>
     <th scope="col">Nom</th>
     <th scope="col">Prenom</th>
     <th scope="col">Email</th>
     <th scope="col">Télephone</th>
     <th scope="col">Service</th>
     <th scope="col">Role</th>
     <th scope="col">Action </th>
   </tr>
 </thead>
 <tbody>
   @foreach($users as $user)
   <tr>
     <th scope="row">{{ $user->id }}</th>
     <td>{{ $user->nom }}</td>
     <td>{{ $user->prenom }}</td>
     <td>{{ $user->email }}</td>
     <td>{{ $user->numero_tel }}</td>
     <td>{{ $user->service }}</td>
     <td>{{ $user->role->nom }}</td>
     <td> <a class="btn btn-raised btn-primary btn-sm" href="{{ route('user.edit', $user->id) }}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
         
      || 
   <form method="POST" id="delete-form-{{ $user->id }}" action="{{ route('user.delete', $user->id) }}" style="display: none;">
   {{ csrf_field() }}
   {{ method_field('delete') }} 
   </form>   

  <button onclick="if (confirm('Are you sure to delete this data?')) {
  event.preventDefault();
  document.getElementById('delete-form-{{ $user->id }}').submit();

  }else{
   event.preventDefault();
  }

  "  class="btn btn-raised btn-danger btn-sm" href=" "><i class="fa fa-trash" aria-hidden="true"></i>  

      </button>

       </td>
   </tr>
  
  @endforeach
 </tbody>
</table>

 {{ $users->links()  }}

</div>


@endsection
