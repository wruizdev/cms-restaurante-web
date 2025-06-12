@extends('layouts.app')

@section('content')
    <h1>Bienvenido al Dashboard</h1>
    <p>Usuario: {{ Auth::user()->nick }}</p>
@endsection
