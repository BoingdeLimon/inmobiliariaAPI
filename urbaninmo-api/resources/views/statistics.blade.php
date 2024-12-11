@extends('layouts.RentalsLayout')
@section('content')
    @livewire('stats', ['rentalID' => $rentalID])
@endsection
