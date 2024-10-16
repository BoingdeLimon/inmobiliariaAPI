@extends('layouts.RentalsLayout')
@section('content')
    @livewire('rental', ['rentalId' => $rentalId])
@endsection
