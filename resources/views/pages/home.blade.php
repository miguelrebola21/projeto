@extends ('main')

@section ('content')
 @if (Session::has('flash_notification.message'))

        <p style="color:red;">{{ Session::get('flash_notification.message') }}</p>

@endif
  <h1> Bem vindo! </h1>
  @stop