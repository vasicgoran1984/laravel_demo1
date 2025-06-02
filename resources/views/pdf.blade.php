<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servis</title>

    @vite('resources/css/app.css')

</head>
<style>
    .div-left{
        width: 50%;
        float:left;
        padding-left:10px;
    }
    .div-right{
        width: 50%;
        float:right;
        padding-right:10px;
        text-align: right;
    }
    .middle-container {
        margin-top: 20px;
    }
    .footer-container{
        width: 100%;
        height: 90px;
        padding-top:5px;
        border-bottom: 1px solid gray;
    }
    .footer {
        height:30px;
        line-height:30px;
        border:solid 1px #E5E5E5;
    }
    .small-service {
        border-bottom: 1px solid gray;
        padding-bottom: 5px;
    }
    .amount-container {
        margin-top: 40px;
    }
    .container-service {
        margin-top: 20px;
    }
</style>
<body class="antialiased flex flex-col h-screen  text-sm font-sans text-gray-700 tracking-tight">
    <div class="footer-container">
        <div class="div-left">
            <div class="flex flex-col justify-between text-[10px]">

                <span class="flex flex-col font-bold">
                    <span class="text-3xl">Auto Servis:</span>
                    <span class="font-normal text-[10px] text-gray-500">{{ $data['user']->name_service }}</span>
                </span>
                <div class="flex">
                    <span class="font-light">Grad: {{ $data['user']->city }}</span>
                </div>
                <div class="flex">
                    <span class="font-light">Adresa: {{ $data['user']->address }}</span>
                </div>
{{--                <div class="flex">--}}
{{--                    <span class="font-light">Email: {{ $data['user']->email }}</span>--}}
{{--                </div>--}}
                <div class="flex">
                    <span class="font-light">Telefon: {{ $data['user']->phone }}</span>
                </div>

                {{-- Contacts --}}
    {{--            <div class="flex flex-col">--}}
    {{--                <p>Address: Address</p>--}}
    {{--                <p>Phone: PHone</p>--}}
    {{--                <p>Email: Email</p>--}}
    {{--            </div>--}}
            </div>
        </div>
        <div class="div-right">
            <div class="flex flex-col justify-between text-[10px]">
                <div class="flex">
                    <span class="font-light">Vlasnik: {{ $data['owner']->first_name . ' ' . $data['owner']->last_name }}</span>
                </div>
                <div class="flex">
                    <span class="font-light">Grad: {{ $data['owner']->city }}</span>
                </div>
                <div class="flex">
                    <span class="font-light">Adresa: {{ $data['owner']->address }}</span>
                </div>
    {{--            <div class="flex">--}}
    {{--                <span class="font-light">Email: {{ $data['owner']->email }}</span>--}}
    {{--            </div>--}}
                <div class="flex">
                    <span class="font-light">Telefon: {{ $data['owner']->phone }}</span>
                </div>

                {{-- Contacts --}}
    {{--            <div class="flex flex-col">--}}
    {{--                <p>Address: Address</p>--}}
    {{--                <p>Phone: PHone</p>--}}
    {{--                <p>Email: Email</p>--}}
    {{--            </div>--}}
            </div>
        </div>
    </div>


    <div class="w-full bg-gradient-to-t via-white middle-container">
    </div>

    <div class="container mx-auto">
        <div class="border-collapse w-full text-[12px]">
            <div>
            <div class="text-left">
                <div><b>Vozilo: {{ $data['producer']->name }} {{ $data['type']->name }}</b></div>
                <div><b>Broj Šasije: {{ $data['car']->chassis_number }}</b></div>
                <div><b>Servis uradjen na: {{ $data['service']->kilometers }} kilometara</b></div>
                <div><b>Datum: {{ date('d-m-Y', strtotime($data['service']->created_at)) }}</b></div>
            </div>
            </div>
        </div>
    </div>


    <!-- Small Service -->
    @if($data['service']->oil)
        <div class="container-service">
            <span class="flex flex-col font-bold">
                <span class="text-base"><b>Mali Servis:</b></span>
            </span>
            <div class="w-full small-service">
                <div class="container mx-auto p-8">
                    <table class="border-collapse w-full text-[12px]">
                        <tbody class=" divide-gray-200">
                            @if($data['service']->oil_name)
                                <tr>
                                    <td class="">
                                        <input type="checkbox" id="vehicle1" checked>
                                    </td>
                                    <td>
                                        {{ $data['service']->oil_name }}
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td class="">
                                        <input type="checkbox" id="vehicle1">
                                    </td>
                                    <td>
                                        Ulje
                                    </td>
                                </tr>
                            @endif

                            @if($data['service']->oil_filter)
                                <tr>
                                    <td class="">
                                        <input type="checkbox" id="vehicle1" checked>
                                    </td>
                                    <td>
                                        Filter Ulja
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td class="">
                                        <input type="checkbox" id="vehicle1">
                                    </td>
                                    <td>
                                        Filter Ulja
                                    </td>
                                </tr>
                            @endif

                            @if($data['service']->air_filter)
                                <tr>
                                    <td class="">
                                        <input type="checkbox" id="vehicle1" checked>
                                    </td>
                                    <td>
                                        Filter Vazduha
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td class="">
                                        <input type="checkbox" id="vehicle1">
                                    </td>
                                    <td>
                                        Filter Vazduha
                                    </td>
                                </tr>
                            @endif

                            @if($data['service']->inner_filter)
                                <tr>
                                    <td class="">
                                        <input type="checkbox" id="vehicle1" checked>
                                    </td>
                                    <td>
                                        Filter Kabine
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td class="">
                                        <input type="checkbox" id="vehicle1">
                                    </td>
                                    <td>
                                        Filter Kabine
                                    </td>
                                </tr>
                            @endif

                            @if($data['service']->fuel_filter)
                                <tr>
                                    <td class="">
                                        <input type="checkbox" id="vehicle1" checked>
                                    </td>
                                    <td>
                                        Filter Goriva
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td class="">
                                        <input type="checkbox" id="vehicle1">
                                    </td>
                                    <td>
                                        Filter Goriva
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    <!-- Big Service -->
    @if($data['service']->belt)
        <div class="container-service">
            <span class="flex flex-col font-bold">
                <span class="text-base"><b>Veliki Servis:</b></span>
            </span>
            <div class="w-full small-service">
                <div class="container mx-auto p-8">
                    <table class="border-collapse w-full text-[12px]">
                        <tbody class=" divide-gray-200">

                        @if($data['service']->belt)
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1" checked>
                                </td>
                                <td>
                                    Remen zupcasti
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1">
                                </td>
                                <td>
                                    Remen zupcasti
                                </td>
                            </tr>
                        @endif

                        @if($data['service']->water_pump)
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1" checked>
                                </td>
                                <td>
                                    Vodena Pumpa
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1">
                                </td>
                                <td>
                                    Vodena Pumpa
                                </td>
                            </tr>
                        @endif

                        @if($data['service']->spanner)
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1" checked>
                                </td>
                                <td>
                                    Španer Zupcastog Remena
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1">
                                </td>
                                <td>
                                    Španer Zupcastog Remena
                                </td>
                            </tr>
                        @endif

                        @if($data['service']->roll)
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1" checked>
                                </td>
                                <td>
                                    Španer Rolna
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1">
                                </td>
                                <td>
                                    Španer Rolna
                                </td>
                            </tr>
                        @endif

                        @if($data['service']->outside_belt)
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1" checked>
                                </td>
                                <td>
                                    Trakasti Remen
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1">
                                </td>
                                <td>
                                    Trakasti Remen
                                </td>
                            </tr>
                        @endif

                        @if($data['service']->alt_pulley)
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1" checked>
                                </td>
                                <td>
                                    Remenica Alternatora
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1">
                                </td>
                                <td>
                                    Remenica Alternatora
                                </td>
                            </tr>
                        @endif

                        @if($data['service']->outside_spanner)
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1" checked>
                                </td>
                                <td>
                                    Španer Trakastog Remena
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1">
                                </td>
                                <td>
                                    Španer Trakastog Remena
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    <!-- Brakes Service -->
    @if($data['service']->brake_pads_front ||
        $data['service']->brake_pads_rear ||
        $data['service']->front_left_cylinder ||
        $data['service']->front_right_cylinder ||
        $data['service']->rear_left_cylinder ||
        $data['service']->rear_right_cylinder )
        <div class="container-service">
            <span class="flex flex-col font-bold">
                <span class="text-base"><b>Kocnice:</b></span>
            </span>
            <div class="w-full small-service">
                <div class="container mx-auto p-8">
                    <table class="border-collapse w-full text-[12px]">
                        <tbody class=" divide-gray-200">

                        @if($data['service']->brake_pads_front)
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1" checked>
                                </td>
                                <td>
                                    Prednje Plocice
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1">
                                </td>
                                <td>
                                    Prednje Plocice
                                </td>
                            </tr>
                        @endif

                        @if($data['service']->disc_front)
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1" checked>
                                </td>
                                <td>
                                    Prednji Diskovi
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1">
                                </td>
                                <td>
                                    Prednji Diskovi
                                </td>
                            </tr>
                        @endif

                        @if($data['service']->brake_pads_rear)
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1" checked>
                                </td>
                                <td>
                                    Zadnje Plocice
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1">
                                </td>
                                <td>
                                    Zadnje Plocice
                                </td>
                            </tr>
                        @endif

                        @if($data['service']->disc_rear)
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1" checked>
                                </td>
                                <td>
                                    Zadnji Diskovi
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1">
                                </td>
                                <td>
                                    Zadnji Diskovi
                                </td>
                            </tr>
                        @endif

                        @if($data['service']->front_left_cylinder)
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1" checked>
                                </td>
                                <td>
                                    Prednja Lijeva Kliješta
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1">
                                </td>
                                <td>
                                    Prednja Lijeva Kliješta
                                </td>
                            </tr>
                        @endif

                        @if($data['service']->front_right_cylinder)
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1" checked>
                                </td>
                                <td>
                                    Prednja Desna Kliješta
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1">
                                </td>
                                <td>
                                    Prednja Desna Kliješta
                                </td>
                            </tr>
                        @endif

                        @if($data['service']->rear_left_cylinder)
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1" checked>
                                </td>
                                <td>
                                    Zadnja Lijeva Kliješta
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1">
                                </td>
                                <td>
                                    Zadnja Lijeva Kliješta
                                </td>
                            </tr>
                        @endif


                        @if($data['service']->rear_right_cylinder)
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1" checked>
                                </td>
                                <td>
                                    Zadnja Densa Kliješta
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td class="">
                                    <input type="checkbox" id="vehicle1">
                                </td>
                                <td>
                                    Zadnja Densa Kliješta
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif


    @if($data['service']->description)
        <div class="w-full middle-container small-service">
            <b>Napomena:</b>

                <div class="flex justify-between">
                    <span>{{ $data['service']->description }}</span>
                </div>
        </div>
    @endif

    <div class="amount-container">
        <div class="div-right">
            <div class="flex flex-col justify-between text-[10px]">
                <div class="flex">
                    <span class="font-light">Cijena: {{ $data['service']->price }}km</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
