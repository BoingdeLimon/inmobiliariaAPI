<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $rental->title }}</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Helvetica", "Arial", sans-serif;
            color: #333;
            
        }

        .container {
            max-width: 700px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #2e2e2e;
        }

        .subtitle {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
        }

        .header-line {
            width: 100%;
            height: 1px;
            background: #dedede;
            margin-bottom: 20px;
        }
        .qr-container {
            display: 'flex';
            flex-direction: 'row';
            justify-content: 'center';
            marginBottom: 20;
            
            
        }

        .qr-image {
           
            margin: 0 auto 30px auto;
            width: 120px;
            height: 120px;
           
        }

        .description {
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #000;
        }

        .details {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 40px;
        }

        .detail-column {
            flex: 1;
            margin-right: 10px;
        }

        .detail-column ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .detail-column li {
            margin-bottom: 10px;
            font-size: 14px;
        }

        .label {
            font-weight: bold;
        }

        .highlight {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #666;
            margin-top: 40px;
        }

       
        @media (max-width: 600px) {
            .details {
                flex-direction: column;
            }
        }

    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <div class="title">{{ $rental->title }}</div>
        <div class="subtitle">{{ $rental->type }} en renta ubicada en {{ $rental->address->address }}</div>
        <div class="header-line"></div>
    </div>

    
    <div class="qr-container">
        <img class="qr-image" src="{{ $base64Image }}" alt="qr {{ $rental->title }}">
    </div>
    <p class="description">{{ $rental->description }}</p>

    <div class="section-title">Detalles del inmueble</div>
    <div class="details">
        <div class="detail-column">
            <ul>
                <li><span class="label">Size:</span> {{ $rental->size }} m²</li>
                <li><span class="label">Rooms:</span> {{ $rental->rooms }}</li>
                <li><span class="label">Bathrooms:</span> {{ $rental->bathrooms }}</li>
                <li><span class="label">Price:</span> <span class="highlight">${{ number_format($rental->price, 2) }}</span></li>
            </ul>
        </div>
        <div class="detail-column">
            <ul>
                <li><span class="label">Location:</span> {{ $rental->address->address }}, {{ $rental->address->city }}, {{ $rental->address->state }}</li>
                <li><span class="label">Codigo postal:</span> {{ $rental->address->zipcode }}</li>
            </ul>
        </div>
    </div>

    <div class="footer">
        Escanea el código QR para más información.
    </div>
</div>

</body>
</html>
