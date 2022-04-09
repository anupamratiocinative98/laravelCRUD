@extends('layouts.app')
@section('main')

<div class="container pt-5">
  <h2>Categories <a class="btn btn-info" href="/category-create">New Category</a></h2>           
  @if(session()->has('success'))
  <div class="alert alert-info" role="alert">
    <strong>{{ session()->get('success') }}</strong>
</div>
@endif
  <table class="table table-hover">
    <thead>
      <tr>
        <th>S.No-</th>
        <th>Title</th>
        <th>Action</th>
      </tr> 
    </thead>
    <tbody>
    @foreach($categories as $category)
      <tr>
        <td>{{ $loop->index+1 }}</td>
        <td>{{ $category->title }}</td>
        <td>
           <a href="/category-edit/{{ $category->id }}" class="btn btn-sm btn-info">Edit</a>
           
           <form method="post" action="/category-delete/{{ $category->id }}">
           @csrf 
           @method('delete')
            <button type="submit" class="btn btn-sm btn-danger">
              Delete</button>
           </form>
          </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {{ $categories->links() }}
</div>

@endsection