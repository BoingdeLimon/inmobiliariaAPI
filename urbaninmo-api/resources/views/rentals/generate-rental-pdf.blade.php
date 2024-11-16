<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $rental->title }}</title>
</head>
<body>
    <h1>{{ $rental->type }} en renta ubicada en {{ $rental->address->address }}</h1>
    <img src="https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=http://localhost:8000/rental/{{ $rental->id }}" alt="qr {{ $rental->title }}" class="w-16 h-16 ">
    <p>{{ $rental->description }}</p>
    <p>Size: {{ $rental->size }} m²</p>
    <p>Rooms: {{ $rental->rooms }}</p>
    <p>Bathrooms: {{ $rental->bathrooms }}</p>
    <p>Price: ${{ number_format($rental->price, 2) }}</p>
    <p>Location: {{ $rental->address->address }}, {{ $rental->address->city }}, {{ $rental->address->state }}</p>
    <p>Codigo postal: {{ $rental->address->zipcode }}</p>
</body>
</html>