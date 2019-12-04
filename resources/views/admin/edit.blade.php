@extends('admin.layout')
@section('title', 'Blood Mate || Edit Donor Information')
@section('content')

<div class="container">
    <form action="/admin/{{$donor->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="name">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" id="name" class="form-control" value="{{$donor->name}}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="location">Location</label>
            <div class="col-sm-10">
                <input type="text" name="location" id="location" class="form-control" value="{{$donor->location}}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="city">City</label>
            <div class="col-sm-10">
                <input type="text" name="city" id="city" class="form-control" value="{{$donor->city}}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="email">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" id="email" class="form-control" value="{{$donor->email}}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="mobile">Phone</label>
            <div class="col-sm-10">
                <input type="tel" name="mobile" id="mobile" class="form-control" value="{{$donor->mobile}}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="group">Blood Group</label>
            <div class="col-sm-10">
                <select name="blood_group" id="b-group" class="select form-control">
                    <option @if ($donor->blood_group == 'A+') selected @endif value="A+">A+</option>
                    <option @if ($donor->blood_group == 'A-') selected @endif value="A-">A-</option>
                    <option @if ($donor->blood_group == 'B+') selected @endif value="B+">B+</option>
                    <option @if ($donor->blood_group == 'B-') selected @endif value="B-">B-</option>
                    <option @if ($donor->blood_group == 'O+') selected @endif value="O+">O+</option>
                    <option @if ($donor->blood_group == 'O-') selected @endif value="O-">O-</option>
                    <option @if ($donor->blood_group == 'AB+') selected @endif value="AB+">AB+</option>
                    <option @if ($donor->blood_group == 'AB-') selected @endif value="AB-">AB-</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-auto">
                <button type="submit" class="btn btn-success">Update Information</button>
            </div>
    </form>
            <div class="col-auto">
                <form action="/admin/{{$donor->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Donor</button>
                </form>
            </div>
        </div>    
</div>
</div>
@endsection