@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if ($errors->any())
        <div class="alert alert-danger" style="text-align: left;">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit User</h2>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Name :
                        @foreach($users as $user)
                        {{$user->name}}
                        @endforeach
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <br>
    @foreach($users as $user)
    <form action="{{ route('users.update' ,$user->id) }}" method="post" id="apply-inquiry"
        enctype="multipart/form-data">
        @csrf
        <div class="row text-center">
            <div class="card" style="padding: 10px 0;">
                <div class="container">
                    <div class="card  align-items-center" style="width: 100%;padding:10px 0;">
                        @if($user->avatar != '')
                        <div class="imgs" style="width: 200px; height: auto;">
                            <img class="img-thumbnail" src="{{ asset('/img/'.$user->avatar) }}" alt="" title="" />
                        </div>
                        @else
                        <div class="imgs">
                            <img class="figure-img" src="{{ asset('/img/download.png') }}" alt="">
                        </div>
                        @endif

                        <div style="margin-top:10px;">
                            <input type="file" name="avatar">
                        </div>
                        <input type="hidden" name="hidden_image" value="{{$user->avatar}}">
                    </div>
                    <div class="form-group">
                        <div class="form-row" style="margin-top:10px;">
                            <div class="col-md-6 mb-3">
                                <label><strong>Name</strong></label>
                                @if(Auth::user()->role == 1)
                                <div class="border-danger-cus">
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                                        placeholder="{{ $user->name }}">
                                </div>
                                @else
                                <div class="border-danger-cus">
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                                        placeholder="{{ $user->name }}" readonly>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><strong>Phone</strong></label>
                                <input type="text" name="phone" value="{{ $user->phone }}" class="form-control"
                                    placeholder="Phone">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" name="email" value="{{ $user->email }}" class="form-control"
                            placeholder="Email" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="text" name="password" value="{{ $user->password }}" class="form-control"
                            placeholder="Password" readonly>

                        @if( Auth::user() )
                        <a href="{{route('resset.password.new', $user->id)}}" class="btn btn-primary"
                            style="margin-top:10px;">Đổi Password</a>
                        @endif

                    </div>
                    <div class="form-group">
                        <strong>Address:</strong>
                        <div class="border-danger-cus">
                            <input type="text" name="address" value="{{ $user->address }}" class="form-control"
                                placeholder="Address">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary input-lg" id="btnsubmit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endforeach

@endsection