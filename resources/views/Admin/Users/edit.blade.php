@extends('layouts.main')

@section('content')

    <main>
        <div class="container-fluid">
            <h1 class="mt-4">User</h1>
            <hr>

            <div class="card mb-4">
                <div class="card-header"></div>
                <div class="card-body">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">

                                @if ($message = session()->get('status'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif

                                <form  action="{{route('users.update', [$user->id])}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Name</label>
                                        <input name="name" value="{{$user->name}}" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Email</label>
                                        <input type="email" value="{{$user->email}}" type="email" class="form-control" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="disabledTextInput">Created at</label>
                                        <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$user->created_at}}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Example textarea</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>

                                    <input type="submit" class="btn btn-primary" value="Update">
                                </form>
                            </div>
                            <div class="col-lg-6">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

@endsection
