@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="flex items-center justify-center h-full my-12">
                <div class="flex max-w-3xl">
                  <div class="bg-white w-1/2 p-8">
                    <h1 class="text-gray-700 text-3xl text-center mb-4">
                        s'inscrire</h1>
                    <form action="" class="text-gray-600">
                      <div class="my-3">
                        <input type="text" placeholder="nom complet" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" class="border rounded w-full py-2 px-4 outline-none focus:shadow-outline" name="name" value="{{ old('name') }}" required autofocus/>
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="my-3">
                        <input type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" class="border rounded w-full py-2 px-4 outline-none focus:shadow-outline" name="email" value="{{ old('email') }}" required autofocus/>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                      </div>
                      <div class="my-3">
                        <input type="number" placeholder="telephone" class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}" class="border rounded w-full py-2 px-4 outline-none focus:shadow-outline" name="telephone" value="{{ old('telephone') }}" required autofocus/>
                        @if ($errors->has('telephone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('telephone') }}</strong>
                            </span>
                        @endif
                      </div>
                      <div class="my-3">
                        <input type="password" placeholder="mot de passe" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" class="border rounded w-full py-2 px-4 outline-none focus:shadow-outline"  name="password" required/>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                      </div>
                      <div class="my-3">
                        <input type="password" placeholder="confirmer mot de passe" class="form-control" class="border rounded w-full py-2 px-4 outline-none focus:shadow-outline"  name="password_confirmation" required/>
                      </div>

                      <div class="my-6 flex">

                            <button type="submit" class="border rounded w-1/2 py-2 border-blue-700 bg-blue-600 text-white ml-2 m-auto">
                                {{ __('s\'inscrire') }}
                            </button>

                      </div>
                      Déjà membre?<a class="rounded w-1/2 py-2 text-center" href="{{ route('login') }}"> Se connecter</a>
                      <div class="my-3 text-center text-xs text-gray-500">
                        &copy;2020 MEFTAH AGENCY.
                      </div>

                    </form>
                  </div>
                  <div class="w-1/2">
                    <img src="{{ asset('img/loginimg.jpg') }}" alt="" class="w-full h-full  object-cover" />
                  </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
