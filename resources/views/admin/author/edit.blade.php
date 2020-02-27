@extends('admin.layout')

@section('title')
    Create the new Author
@endsection

@section('headline')
    Create the new Author
@endsection

@section('content')
  @if (count($errors) > 0)                    {{-- show what was wrong--}}
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @if(Session::has('success_message'))    {{--show the success message if validation is ok and data is saved--}}
    <div class="alert alert-success">
        {{ Session::get('success_message') }}
    </div>

  @endif

  @if ($author->id !== null)
    <form action="{{action('AuthorController@update', ['id' => $author->id])}}" method="post">
    @method('put')
  @else
    <form action="{{action('AuthorController@store')}}" method="post">
  @endif

      @csrf
      <label for="authorname">Name of the author</label>
      @if($errors->has('name'))                     {{-- show the list of the errors belongs to this value --}}
        <ul>
          @foreach ($errors->get('name') as $error)
            <li>{{$error}}</li>   
          @endforeach
        </ul>
      @endif  


      <input type="text" name="name" value="{{old('name',$author->name)}}">   {{--//if wrong value is inserted the value is set from the error the user see what was wrong --}}
      <input type="submit" value="Save">
    </form>

@endsection