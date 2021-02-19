@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div  style="text-align: center" class="card">
                <div class="card-header">
                    Login
                </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Já efetuou login!!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
