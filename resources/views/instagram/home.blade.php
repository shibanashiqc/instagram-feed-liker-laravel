@extends('layouts.dash')
@section('content')

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Active Accounts  </h3>
                </div>
              <div class="col-12 text-right">
              <a href="/login" class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="tooltip" data-original-title="Add Instagram Account">
                <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
                <span class="btn-inner--text">Add IG </span>
              </a>
              <a href="/logs" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Server">
                <span class="btn-inner--icon"><i class="ni ni-spaceship"></i></span>
                <span class="btn-inner--text">Logs</span>
              </a>
            </div>
              </div>
            </div>
<div class="table-responsive">
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
<tr>
    <th scope="col" class="sort" data-sort="id">Id</th>
    <th scope="col" class="sort" data-sort="name">Username</th>
    <th scope="col" class="sort" data-sort="status">Status</th>
    <th scope="col" class="sort" data-sort="manage">Manage</th>

</tr>
</thead>
<tbody>

@foreach ($stm as $name => $id)
<tr>
    <td>#{{$id}}</td>
    <td> <b> &nbsp; &nbsp; @ {{$name}}</b>   </td>
    <td><span class="badge badge-success">OK</span></td>
    <td><a href="/delete/{{$id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash">&nbsp;  </i> Delete</a></td>

  </tr>

@endforeach

</tbody>
</div>
</div>
</div>
</div>

@endsection
