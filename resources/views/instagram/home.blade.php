@extends('layouts.dash')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-3 order-lg-2">
      <div class="card-profile-image">
<a href="#">
<img src="{{ $LoggedUserInfo['avatar'] }}" class="rounded-circle">
</a>
</div>
    </div>
  </div>
  <br>     <br>     <br>
  <div class="text-center mt-4">
<h3>{{ $LoggedUserInfo['username'] }} <br> <a href="/auth/logout" class="btn btn-default btn-sm">Logout</a>


</div>

<div class="card-body pt-0">
    <div class="row">
      <div class="col">
        <div class="card-profile-stats d-flex justify-content-center">

        </div>
      </div>


<div class="table-responsive">
<table class="table table-user-information">
<tbody>


<tr>
  <td style="width: 1%">ID : </td>
  <td style="width: 10%"> # {{ $LoggedUserInfo['id'] }} </td>
</tr>
<tr>

</tr>
<td>Logs: </td>
<td><a href="/dashboard/logs/{{ $LoggedUserInfo['username'] }}" class="btn btn-primary btn-sm"><i class="fas fa-server">&nbsp;  </i> Logs</a></td>
<tr>
  <td>Username: </td>
  <td><b>@ {{ $LoggedUserInfo['username'] }}</b></td>
</tr>
 <tr>
  <td>Delelet From database : </td>
  <td><a href="/dashboard/delete/{{ $LoggedUserInfo['id'] }}" class="btn btn-danger btn-sm"><i class="fas fa-trash">&nbsp;  </i> Delete</a></td>

</tbody>
</table>
</div>
</div>
</div></div>
</div> </div>
</div>
</div>


{{--

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
              <a href="/auth/login" class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="tooltip" data-original-title="Add Instagram Account">
                <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
                <span class="btn-inner--text">Add IG </span>
              </a>
              <a href="/dashboard/logs/{{ $LoggedUserInfo['username'] }}" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Server">
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

@foreach ($LoggedUserInfo as $name => $id)
<tr>
    <td># {{ $LoggedUserInfo['id'] }}</td>
    <td> <b> &nbsp; &nbsp; @ {{ $LoggedUserInfo['username'] }}</b>   </td>
    <td><span class="badge badge-success">OK</span></td>
    <td><a href="/dashboard/delete/{{ $LoggedUserInfo['id'] }}" class="btn btn-danger btn-sm"><i class="fas fa-trash">&nbsp;  </i> Delete</a></td>

  </tr>

@endforeach

</tbody>
</div>
</div>
</div>
</div> --}}

@endsection
