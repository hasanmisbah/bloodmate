@extends('admin.layout')
@section('title', 'Blood Mate || Dashboard')
@section('content')

<div class="container mb-2">
    <div class="row">
        @foreach ($counts as $count)
        <div class="col-sm-3">
            <div class="card bg-info text-white text-center mb-1">
                {{$count['title']}}<br>
                {{$count['count']}}
            </div>
        </div>
        @endforeach
    </div>
</div>
@isset($donors[0])
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <table class="table ">
                    <thead class="bg-info text-white text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{__('Name')}}</th>
                            <th scope="col">{{__('Location')}}</th>
                            <th scope="col">{{__('City')}}</th>
                            <th scope="col">{{__('Blood Group')}}</th>
                            <th scope="col">{{__('E-mail')}}</th>
                            <th scope="col">{{__('Mobile')}}</th>
                            <th colspan="3" scope="col">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donors as $donor)
                        <tr>
                            <th scope="row">{{$donor->id}}</th>
                            <td>{{$donor->name}}</td>
                            <td>{{$donor->location}}</td>
                            <td>{{$donor->city}}</td>
                            <td>{{$donor->blood_group}}</td>
                            <td>{{$donor->email}}</td>
                            <td>{{$donor->mobile}}</td>
                            <td><a href="admin/{{$donor->id}}/edit" class="btn btn-info">Edit</a></td>
                            <td><form action="/admin/{{$donor->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete </button>
                                    </form>
                                </td>
                            @if($donor->confirmed == 0)
                            <td><form action="/admin/{{$donor->id}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <button name="confirmed" value="1" type="submit" class="btn btn-danger">Approve </button>
                                    </form>
                                </td>
                            @endif
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endisset




{{-- Modal --}}
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="donormodal" tabindex="-1" role="dialog" aria-labelledby="donorModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="/admin" method="POST">
            @method('post')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add donor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="location">Location</label>
                        <div class="col-sm-10">
                            <input type="text" name="location" id="location" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="city">City</label>
                        <div class="col-sm-10">
                            <input type="text" name="city" id="city" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="email">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="mobile">Phone</label>
                        <div class="col-sm-10">
                            <input type="tel" name="mobile" id="mobile" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="group">Blood Group</label>
                        <div class="col-sm-10">
                            <select name="blood_group" id="b-group" class="select form-control">
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info">Add Donor</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- End modal --}}


@if($errors->any())
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <ul>
    @foreach ($errors->all() as $error)
  <li><strong>{{ $error }}</strong></li>
    @endforeach
  </ul>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
    <strong>{{ session('success') }}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
@endsection