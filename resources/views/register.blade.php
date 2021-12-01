@extends('master')
@section("content")
<h1>Registration Page</h1>
<form action="" method="POST">
    @csrf
    @if (Session::get('success'))
    <div class="alert alert-success text-center">{{Session::get('success')}}</div>
    @endif

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="password">
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @endsection
