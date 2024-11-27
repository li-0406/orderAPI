@extends('layouts.home')

@section('somethingCool', 'Blade Syntax')

@section('header')
@parent

<p>Hello I'm the friend of header section!</p>
@endsection

@section('myContent')
<p>Hahaha here comes content again!</p>
@endsection