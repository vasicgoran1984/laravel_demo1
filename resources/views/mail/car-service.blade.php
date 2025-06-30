<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>Servisna Knjiga</title>
</head>
<body class="bg-slate-800 text-white">

<!-- Mobile -->
<div id="mobile-table" class="hidden p-4 space-y-6">

    {{--Small Service--}}
    @if($carServices->contains(function($item) {
        return !empty($item->small_service_name);
    }))
        @foreach($carServices as $service)
            @if(!empty($service->small_service_name))
            <div class="bg-slate-700 p-5 rounded-md shadow-md border-2 border-gray-600">
                <div class="bg-slate-700 p-5 rounded-md shadow-md border-2 mb-6 border-gray-600">
                    <div class="flex justify-between py-1 text-base "><span class="text-gray-300 font-bold text-2xl">Mali Servis</span></div>
                    <div class="flex justify-between py-1 text-base "><span class="text-gray-300 font-bold">Datum</span>{{$service['created_at'] ? \Carbon\Carbon::parse($service['created_at'])->format('d-m-Y') : ''}}</div>
                    <div class="flex justify-between py-1 text-base "><span class="text-gray-300 font-bold">Kilometri</span>{{$service['kilometers'] ? $service['kilometers'] : ''}}</div>
                </div>
                <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Ulje</span>{{$service['oil_name'] ? $service['oil_name'] : ''}}</div>
                <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Filter Ulja</span>{{$service['oil_filter'] ? '✅' : '❌'}}</div>
                <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Filter Vazduha</span>{{$service['air_filter'] ? '✅' : '❌'}}</div>
                <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Filter Kabine</span>{{$service['inner_filter'] ? '✅' : '❌'}}</div>
                <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Filter Goriva</span>{{$service['fuel_filter'] ? '✅' : '❌'}}</div>
            </div>
           @endif
        @endforeach
    @endif

    {{--Big Service--}}
    @if($carServices->contains(function($item) {
        return empty($item->big_service_name);
    }))
        @foreach($carServices as $service)
            @if(!empty($service->big_service_name))
                <div class="bg-slate-700 p-5 rounded-md shadow-md border-2 border-gray-600">
                    <div class="bg-slate-700 p-5 rounded-md shadow-md border-2 mb-6 border-gray-600">
                        <div class="flex justify-between py-1 text-base "><span class="text-gray-300 font-bold text-2xl">Veliki Servis</span></div>
                        <div class="flex justify-between py-1 text-base "><span class="text-gray-300 font-bold">Datum</span>{{$service['created_at'] ? \Carbon\Carbon::parse($service['created_at'])->format('d-m-Y') : ''}}</div>
                        <div class="flex justify-between py-1 text-base "><span class="text-gray-300 font-bold">Kilometri</span>{{$service['kilometers'] ? $service['kilometers'] : ''}}</div>
                    </div>
                    <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Zupčasti Kaiš</span>{{$service['belt'] ? '✅' : ''}}</div>
                    <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Vodena Pumpa</span>{{$service['water_pump'] ? '✅' : '❌'}}</div>
                    <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Španer Z. Remena</span>{{$service['spanner'] ? '✅' : '❌'}}</div>
                    <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Španer Rolna</span>{{$service['roll'] ? '✅' : '❌'}}</div>
                    <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Trakasti Remen</span>{{$service['outside_belt'] ? '✅' : '❌'}}</div>
                    <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Španer Trak. Remena</span>{{$service['outside_spanner'] ? '✅' : '❌'}}</div>
                    <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Španer Alternatora</span>{{$service['alt_pulley'] ? '✅' : '❌'}}</div>
                </div>
            @endif
        @endforeach
    @endif

    {{--Brakes Service--}}
    @if($carServices->contains(function($item) {
        return empty($item->brakes_service_name);
    }))
        @foreach($carServices as $service)
            @if(!empty($service->brakes_service_name))
                <div class="bg-slate-700 p-5 rounded-md shadow-md border-2 border-gray-600">
                    <div class="bg-slate-700 p-5 rounded-md shadow-md border-2 mb-6 border-gray-600">
                        <div class="flex justify-between py-1 text-base "><span class="text-gray-300 font-bold text-2xl">Kočnice</span></div>
                        <div class="flex justify-between py-1 text-base "><span class="text-gray-300 font-bold">Datum</span>{{$service['created_at'] ? \Carbon\Carbon::parse($service['created_at'])->format('d-m-Y') : ''}}</div>
                        <div class="flex justify-between py-1 text-base "><span class="text-gray-300 font-bold">Kilometri</span>{{$service['kilometers'] ? $service['kilometers'] : ''}}</div>
                    </div>
                    <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Prednje Pločice</span>{{$service['brake_pads_front'] ? '✅' : ''}}</div>
                    <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Prednji Diskovi</span>{{$service['disc_front'] ? '✅' : '❌'}}</div>
                    <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Zadnje Pločice</span>{{$service['brake_pads_rear'] ? '✅' : '❌'}}</div>
                    <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Zadnji Diskovi</span>{{$service['disc_rear'] ? '✅' : '❌'}}</div>
                    <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Prednja Lijeva Kliješta</span>{{$service['front_left_cylinder'] ? '✅' : '❌'}}</div>
                    <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Prednja Desna Kliješta</span>{{$service['front_right_cylinder'] ? '✅' : '❌'}}</div>
                    <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Zadnja Lijeva Kliješta</span>{{$service['rear_left_cylinder'] ? '✅' : '❌'}}</div>
                    <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Zadnja Desna Kliješta</span>{{$service['rear_right_cylinder'] ? '✅' : '❌'}}</div>
                </div>
            @endif
        @endforeach
    @endif

{{--        <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Ulje:</span> ✅</div>--}}
{{--        <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Filter Ulja:</span> ✅</div>--}}
{{--        <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Filter Vazduha:</span> ✅</div>--}}
{{--        <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Filter Goriva:</span> ✅</div>--}}
{{--        <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Filter Kabine:</span> ✅</div>--}}
{{--        <div class="flex justify-between py-1 text-base border-b border-gray-500"><span class="text-gray-300">Filter Klime:</span> ✅</div>--}}
{{--        <div class="flex justify-between py-1 text-base"><span class="text-gray-300">Filter Pylena:</span> ✅</div>--}}


</div>

<!-- Desktop tabela -->
<div id="detailed-pricing" class="w-full overflow-x-auto hidden">
    <div class="bg-slate-800 p-6">
        @if($carServices->contains(function($item) {
            return !empty($item->small_service_name);
        }))
            <table class="w-full bg-slate-800 text-sm shadow-md border-separate border-spacing-x-2 border-spacing-y-4">
                <caption class="mb-4 ml-2 text-left text-lg text-gray-200 caption-top">
                    <h2>Mali Servis</h2>
                </caption>

                <thead class="bg-slate-700">
                <tr>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Ulje
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Filter Ulja
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Filter Vazduha
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Filter Kabine
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Filter Goriva
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Datum
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Kilometri
                    </th>
                </tr>
                </thead>

                <tbody>
                    @foreach($carServices as $service)
                        @if($service['small_service_name'])
                            <tr>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['oil_name'] ? $service['oil_name'] : ''}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['oil_filter'] ? '✅' : '❌'}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['air_filter'] ? '✅' : '❌'}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['inner_filter'] ? '✅' : '❌'}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['fuel_filter'] ? '✅' : '❌'}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['created_at'] ? \Carbon\Carbon::parse($service['created_at'])->format('d-m-Y') : ''}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['kilometers'] ?$service['kilometers'] : ''}}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div class="bg-slate-800 p-6">
        @if($carServices->contains(function($item) {
            return !empty($item->big_service_name);
        }))
            <table class="w-full bg-slate-800 text-sm shadow-md border-separate border-spacing-x-2 border-spacing-y-4">
                <caption class="mb-4 ml-2 text-left text-lg text-gray-200 caption-top">
                    <h2>Veliki Servis</h2>
                </caption>

                <thead class="bg-slate-700">
                <tr>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Zupčasti Kaiš
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Vodena Pumpa
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Španer Z. Remena
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Španer Rolna
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Trakasti Remen
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Španer Trak. Remena
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Španer Alternatora
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Datum
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Kilometri
                    </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($carServices as $service)
                        @if($service['big_service_name'])
                            <tr>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['belt'] ? '✅' : ''}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['water_pump'] ? '✅' : '❌'}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['spanner'] ? '✅' : '❌'}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['roll'] ? '✅' : '❌'}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['outside_belt'] ? '✅' : '❌'}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['outside_spanner'] ? '✅' : '❌'}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['alt_pulley'] ? '✅' : '❌'}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['created_at'] ? \Carbon\Carbon::parse($service['created_at'])->format('d-m-Y') : ''}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['kilometers'] ?$service['kilometers'] : ''}}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div class="bg-slate-800 p-6">
        @if($carServices->contains(function($item) {
            return !empty($item->brakes_service_name);
        }))
            <table class="w-full bg-slate-800 text-sm shadow-md border-separate border-spacing-x-2 border-spacing-y-4">
                <caption class="mb-4 ml-2 text-left text-lg text-gray-200 caption-top">
                    <h2>Kocnice</h2>
                </caption>

                <thead class="bg-slate-700">
                <tr>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Prednje Pločice
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Prednji Diskovi
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Zadnje Pločice
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Zadnji Diskovi
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Prednja Lijeva Kliješta
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Prednja Desna Kliješta
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Zadnja Lijeva Kliješta
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Zadnja Desna Kliješta
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Datum
                    </th>
                    <th class="font-semibold p-4 text-slate-200 text-left border border-slate-600">
                        Kilometri
                    </th>
                </tr>
                </thead>

                <tbody>
                    @foreach($carServices as $service)
                        @if($service['brakes_service_name'])
                            <tr>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['brake_pads_front'] ? '✅' : '❌'}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['disc_front'] ? '✅' : '❌'}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['brake_pads_rear'] ? '✅' : '❌'}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['disc_rear'] ? '✅' : '❌'}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['front_left_cylinder'] ? '✅' : '❌'}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['front_right_cylinder'] ? '✅' : '❌'}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['rear_left_cylinder'] ? '✅' : '❌'}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['rear_right_cylinder'] ? '✅' : '❌'}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['created_at'] ? \Carbon\Carbon::parse($service['created_at'])->format('d-m-Y') : ''}}</td>
                                <td class="p-4 text-gray-200 border border-slate-700">{{$service['kilometers'] ?$service['kilometers'] : ''}}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

<script>
    function toggleTableView() {
        if ($(window).width() < 1024) {
            $('#mobile-table').show();
            $('#detailed-pricing').hide();
        } else {
            $('#mobile-table').hide();
            $('#detailed-pricing').show();
        }
    }

    // Run on page load
    $(document).ready(toggleTableView);

    // Run on window resize
    $(window).resize(toggleTableView);
</script>

</body>
</html>
