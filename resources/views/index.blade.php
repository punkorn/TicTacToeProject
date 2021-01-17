@extends('template')
    @section('content')
         
    <h4 class="mb-3 mt-5">Tic Tac Toe Game</h4>
    <form class="form-setsize"  method="POST" action="{{route('playNewGame')}}">
        @csrf
        <div class="form-group row">
            <div class="col-md-12 text-left mb-2">
                <label for="tictactoeSize">Size Of Table</label>
            </div>
            <div class="col-md-12  mb-2">
                <input type="number" class="form-control" id="tictactoeSize" name="tictactoeSize" min="3"
                max="100" value="4" required>
                <div class="invalid-feedback"> Please provide a valid size of table.</div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Play Game</button>
    </form>
             
@endsection