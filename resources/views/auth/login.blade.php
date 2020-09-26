@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">



            <form method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="flex items-center justify-center h-full my-12">
                        <div class="flex max-w-3xl">
                          <div class="bg-white w-1/2 p-8">
                            <h1 class="text-gray-700 text-3xl text-center mb-4">
                                se connecter</h1>
                            <form action="" class="text-gray-600">
                              <div class="my-3">
                                <input type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" class="border rounded w-full py-2 px-4 outline-none focus:shadow-outline" name="email" value="{{ old('email') }}" required autofocus/>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                              </div>
                              <div class="my-3">
                                <input type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" class="border rounded w-full py-2 px-4 outline-none focus:shadow-outline"  name="password" required/>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                              </div>
                              <div class="my-3 flex justify-between">
                                <label><input type="checkbox" id="remember" {{ old('remember') ? 'checked' : ''}}/> Remember me</label>
                                {{-- <a href="" class="text-blue-500">Forgot email or password?</a> --}}
                              </div>
                              <div class="my-6 flex">

                                <button class="border rounded w-1/2 py-2 border-blue-700 bg-blue-600 text-white ml-2 m-auto"> {{ __('
                                    se connecter') }}</button>

                              </div>
                              Pas un membre? <a class="rounded w-1/2 py-2 text-center" href="{{ route('register') }}">S'inscrire maintenant</a>
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

                    {{-- <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form> --}}

            </div>
        </div>
    </div>
</div>
@endsection
