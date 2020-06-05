@extends('layouts.main')

<style>

    .adminpost{
        position: center;
        top:10px;

    }

</style>

@section('content')
    @include('partials.Sidebar')
    <div id="design" class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1><strong>Users</strong></h1></div>
                </div>
                <br>
            </div>
        </div>

        <table class="table table-hover">

            <tbody>
            @foreach($users as $user)

                <tr>

                    <td>{{$user->name}}</td>

                </tr>
            @endforeach

            </tbody>

        </table>
    </div>


    @include('partials.Footer')

@endsection
