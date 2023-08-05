<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

</head>
<body class="antialiased">
<form action="/" method="get">
    @csrf
    <select name="prefecture">
        <option selected>Total</option>
        <option>01 Hokkaido</option>
        <option>02 Aomori</option>
        <option>03 Iwate</option>
        <option>04 Miyagi</option>
        <option>05 Akita</option>
        <option>06 Yamagata</option>
        <option>07 Fukushima</option>
        <option>08 Ibaraki</option>
        <option>09 Tochigi</option>
        <option>10 Gunma</option>
        <option>11 Saitama</option>
        <option>12 Chiba</option>
        <option>13 Tokyo</option>
        <option>14 Kanagawa</option>
        <option>15 Niigata</option>
        <option>16 Toyama</option>
        <option>17 Ishikawa</option>
        <option>18 Fukui</option>
        <option>19 Yamanashi</option>
        <option>20 Nagano</option>
        <option>21 Gifu</option>
        <option>22 Shizuoka</option>
        <option>23 Aichi</option>
        <option>24 Mie</option>
        <option>25 Shiga</option>
        <option>26 Kyoto</option>
        <option>27 Osaka</option>
        <option>28 Hyogo</option>
        <option>29 Nara</option>
        <option>30 Wakayama</option>
        <option>31 Tottori</option>
        <option>32 Shimane</option>
        <option>33 Okayama</option>
        <option>34 Hiroshima</option>
        <option>35 Yamaguchi</option>
        <option>36 Tokushima</option>
        <option>37 Kagawa</option>
        <option>38 Ehime</option>
        <option>39 Kochi</option>
        <option>40 Fukuoka</option>
        <option>41 Saga</option>
        <option>42 Nagasaki</option>
        <option>43 Kumamoto</option>
        <option>44 Oita</option>
        <option>45 Miyazaki</option>
        <option>46 Kagoshima</option>
        <option>47 Okinawa</option>
    </select>
    <select name="date">
        <option selected>1935</option>
        <option>1947</option>
        <option>1950</option>
        <option>1955</option>
        <option>1960</option>
        <option>1965</option>
        <option>1970</option>
        <option>1975</option>
        <option>1980</option>
        <option>1985</option>
        <option>1990</option>
        <option>1995</option>
        <option>2000</option>
        <option>2005</option>
        <option>2010</option>
        <option>2012</option>
        <option>2013</option>
        <option>2014</option>
    </select>
    <button type="submit">Get population</button>

    @if(count($populationData) > 0)
        <table>
            <thead>
            <tr>
                <th>Prefecture</th>
                <th>Year</th>
                <th>Population</th>
            </tr>
            </thead>
            <tbody>
            @foreach($populationData as $data)
                <tr>
                    <td>{{ $data->prefecture }}</td>
                    <td>{{ $data->year }}</td>
                    <td>{{ $data->population }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>Please submit | No population data found for the selected prefecture and year.</p>
    @endif
</form>

</body>
</html>
