@extends('layouts.app')
@section('main')

<div class="container pt-5">
  <h2>Edit Category</h2>           
 <div class="row">
     <div class="col-sm-4">
         <form method="POST" action="/category-update/{{ $category->id }}">
          @csrf
          @method('put')
         <label>Edit</label>
             <input type="text" name="title" class="form-control"  value="{{ $category->title }}"/>
             <button class="btn btn-info mt-4" type="submit">Update</button>
</form>
</div>


@endsection
