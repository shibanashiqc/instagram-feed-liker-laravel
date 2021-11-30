@extends('layouts.log')
@section('logs')
 <!-- Page content -->
 <div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Logs</h3>
                </div>
                <div class="col text-right">

                </div>
              </div>
            </div>


               <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
    <tr>


                            <th scope="col" class="sort" data-sort="name">Username</th>
                            <th scope="col" class="sort" data-sort="budget">Media</th>
                            <th scope="col" class="sort" data-sort="budget">Action</th>
                            <th scope="col" class="sort" data-sort="status">Time</th>

      </tr>
  </thead>

  @foreach ($stmt as $media)

  <tbody>

      <tr>


        <td>@ {{$media->username}}</td>
        <td> {{$media->media_id}}</td>
    <td>{{$media->status}}</td>
    <td>{{$media->created_at}}</td>
        <td></td>

      </tr>
         </tbody>
@endforeach

</table>

          </div>
              </div>
            </div>

      <br>
@endsection
