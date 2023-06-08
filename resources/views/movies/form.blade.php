@include('html-start')

@if ($movie->id)

    <form action="{{route('movies.update',$movie->id)}}" method="post">
        @method('put')

@else
    <form action="{{route('movies.store')}}" method="post">

@endif
        <label>Name:</label>
        <input type="text" id="name" name="name" value="{{$movie->name}}"/>

        <br/>

        <label for="year">Year:</label>
        <input type="text" id="year" name="year" value="{{$movie->year}}"/>

        <br/>

        <button>Submit:</button>  
    @csrf 
    </form>
    <br/>

@include('html-end')