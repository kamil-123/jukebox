@extends('admin.layout')

@section('title')
  List of authors  
@endsection

@section('headline')
    List of authors
@endsection

@section('content')
  @if(Session::has('success_message'))    {{--show the success message if validation is ok and data is saved--}}
  <div class="alert alert-success">
    {{ Session::get('success_message') }}
  </div>
  @endif
    <table>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      <tbody>
        @foreach ($authors as $author)
          <tr>
            <th>{{$author->id}}</th>
            <th>{{$author->name}}</th>
            <th><a href="{{action('AuthorController@update', ['id' => $author->id])}}/edit">Edit</a></th>
            <th>
              <form action="/author/delete" method="post">
              @method('delete')
              @csrf
              <input type="hidden" name="authorid" value="{{$author->id}}">
              <input type="submit" value="delete">
              </form>
            </th>
          </tr>
        @endforeach
      </tbody>
    </table>
@endsection

