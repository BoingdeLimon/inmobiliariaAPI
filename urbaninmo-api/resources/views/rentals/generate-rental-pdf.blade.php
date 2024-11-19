<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $rental->title }}</title>
</head>

<body>
    <h1>{{ $rental->type }} en renta ubicada en {{ $rental->address->address }}</h1>
    <img src="{{ $base64Image }}" alt="qr {{ $rental->title }}">

    <p>{{ $rental->description }}</p>
    
            <strong>Caracteristicas:</strong>
            <ul>
                <li>Size: {{ $rental->size }} m²</li>
                <li>Rooms: {{ $rental->rooms }}</li>
                <li>Bathrooms: {{ $rental->bathrooms }}</li>
                <li>Price: ${{ number_format($rental->price, 2) }}</li>
            </ul>
       

    <p>Location: {{ $rental->address->address }}, {{ $rental->address->city }}, {{ $rental->address->state }}</p>
    <p>Codigo postal: {{ $rental->address->zipcode }}</p>
    
</body>
</html>