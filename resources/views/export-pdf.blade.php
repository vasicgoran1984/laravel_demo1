<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servis</title>

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
            </div>
        </div>
    </div>
</div>



<!-- Small Service -->
@if($data['service']->oil)
    <div class="container-small-service">
        <div class="w-full middle-container small-service">
            <span class="flex flex-col font-bold">
                <span class="text-base"><b>Mali Servis:</b></span>
            </span>
        </div>

        <div class="container flex justify-end mx-auto">
            <div class="flex flex-col">
                <div class="flex flex-col w-full mb-4">
                    <div class="flex justify-between">
                        <span>Ulje</span>
                        <span class="font-bold">{{ $data['service']->oil_name }}</span>
                    </div>

                    @if($data['service']->oil_filter)
                        <div class="flex justify-between">
                            <span>Filter Ulja:</span>
                            <span class="font-bold">Da</span>
                        </div>
                    @else
                        <div class="flex justify-between">
                            <span>Filter Ulja:</span>
                            <span class="font-bold">Ne</span>
                        </div>
                    @endif

                    @if($data['service']->air_filter)
                        <div class="flex justify-between">
                            <span>Filter Vazduha:</span>
                            <span class="font-bold">Da</span>
                        </div>
                    @else
                        <div class="flex justify-between">
                            <span>Filter Vazduha:</span>
                            <span class="font-bold">Ne</span>
                        </div>
                    @endif

                    @if($data['service']->inner_filter)
                        <div class="flex justify-between">
                            <span>Filter Kabine:</span>
                            <span class="font-bold">Da</span>
                        </div>
                    @else
                        <div class="flex justify-between">
                            <span>Filter Kabine:</span>
                            <span class="font-bold">Ne</span>
                        </div>
                    @endif

                    @if($data['service']->fuel_filter)
                        <div class="flex justify-between">
                            <span>Filter Goriva:</span>
                            <span class="font-bold">Da</span>
                        </div>
                    @else
                        <div class="flex justify-between">
                            <span>Filter Goriva:</span>
                            <span class="font-bold">Ne</span>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endif
<!-- End Small Service -->



<!-- Big Service -->
@if($data['service']->belt)
    <div class="container-small-service">
        <div class="w-full middle-container small-service">
                <span class="flex flex-col font-bold">
                    <span class="text-base"><b>Veliki Servis:</b></span>
                </span>
        </div>

        <div class="container flex justify-end mx-auto">
            <div class="flex flex-col">
                <div class="flex flex-col w-full mb-4">

                    @if($data['service']->belt)
                        <div class="flex justify-between">
                            <span>Remen zupcasti:</span>
                            <span class="font-bold">Da</span>
                            <span class="font-bold">
                                    <input type="checkbox" id="vehicle1" checked>
                                </span>

                        </div>
                    @else
                        <div class="flex justify-between">
                            <span>Remen zupcasti:</span>
                            <span class="font-bold">Ne</span>
                        </div>
                    @endif

                    @if($data['service']->water_pump)
                        <div class="flex justify-between">
                            <span>Vodena Pumpa:</span>
                            <span class="font-bold">Da</span>
                        </div>
                    @else
                        <div class="flex justify-between">
                            <span>Vodena Pumpa:</span>
                            <span class="font-bold">Ne</span>
                        </div>
                    @endif

                    @if($data['service']->spanner)
                        <div class="flex justify-between">
                            <span>Španer Z. Remena:</span>
                            <span class="font-bold">Da</span>
                        </div>
                    @else
                        <div class="flex justify-between">
                            <span>Španer Z. Remena:</span>
                            <span class="font-bold">Ne</span>
                        </div>
                    @endif

                    @if($data['service']->roll)
                        <div class="flex justify-between">
                            <span>Španer Rolna:</span>
                            <span class="font-bold">Da</span>
                        </div>
                    @else
                        <div class="flex justify-between">
                            <span>Španer Rolna:</span>
                            <span class="font-bold">Ne</span>
                        </div>
                    @endif

                    @if($data['service']->outside_belt)
                        <div class="flex justify-between">
                            <span>Trakasti Remen:</span>
                            <span class="font-bold">Da</span>
                        </div>
                    @else
                        <div class="flex justify-between">
                            <span>Trakasti Remen:</span>
                            <span class="font-bold">Ne</span>
                        </div>
                    @endif

                    @if($data['service']->alt_pulley)
                        <div class="flex justify-between">
                            <span>Remenica Alternatora:</span>
                            <span class="font-bold">Da</span>
                        </div>
                    @else
                        <div class="flex justify-between">
                            <span>Remenica Alternatora:</span>
                            <span class="font-bold">Ne</span>
                        </div>
                    @endif

                    @if($data['service']->outside_spanner)
                        <div class="flex justify-between">
                            <span>Španer Trakastog Remena:</span>
                            <span class="font-bold">Da</span>
                        </div>
                    @else
                        <div class="flex justify-between">
                            <span>Španer Trakastog Remena:</span>
                            <span class="font-bold">Ne</span>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endif
<!-- End Big Service -->

<!-- Brakes Service -->
@if($data['service']->brake_pads_front ||
    $data['service']->brake_pads_rear ||
    $data['service']->front_left_cylinder ||
    $data['service']->front_right_cylinder ||
    $data['service']->rear_left_cylinder ||
    $data['service']->rear_right_cylinder )
    <div class="container-small-service">
        <div class="w-full middle-container small-service">
                <span class="flex flex-col font-bold">
                    <span class="text-base"><b>Kocnice:</b></span>
                </span>
        </div>

        <div class="container flex justify-end mx-auto">
            <div class="flex flex-col">
                <div class="flex flex-col w-full mb-4">


                    @if($data['service']->brake_pads_front)
                        <div class="flex justify-between">
                            <span>Prednje Plocice:</span>
                            <span class="font-bold">Da</span>
                        </div>
                    @else
                        <div class="flex justify-between">
                            <span>Prednje Plocice:</span>
                            <span class="font-bold">Ne</span>
                        </div>
                    @endif

                    @if($data['service']->disc_front)
                        <div class="flex justify-between">
                            <span>Prednji Diskovi:</span>
                            <span class="font-bold">Da</span>
                        </div>
                    @else
                        <div class="flex justify-between">
                            <span>Prednji Diskovi:</span>
                            <span class="font-bold">Ne</span>
                        </div>
                    @endif

                    @if($data['service']->brake_pads_rear)
                        <div class="flex justify-between">
                            <span>Zadnje Plocice:</span>
                            <span class="font-bold">Da</span>
                        </div>
                    @else
                        <div class="flex justify-between">
                            <span>Zadnje Plocice:</span>
                            <span class="font-bold">Ne</span>
                        </div>
                    @endif

                    @if($data['service']->disc_rear)
                        <div class="flex justify-between">
                            <span>Zadnji Diskovi:</span>
                            <span class="font-bold">Da</span>
                        </div>
                    @else
                        <div class="flex justify-between">
                            <span>Zadnji Diskovi:</span>
                            <span class="font-bold">Ne</span>
                        </div>
                    @endif

                    @if($data['service']->front_left_cylinder)
                        <div class="flex justify-between">
                            <span>Prednja Lijeva Kliješta:</span>
                            <span class="font-bold">Da</span>
                        </div>
                    @else
                        <div class="flex justify-between">
                            <span>Prednja Lijeva Kliješta:</span>
                            <span class="font-bold">Ne</span>
                        </div>
                    @endif

                    @if($data['service']->front_right_cylinder)
                        <div class="flex justify-between">
                            <span>Prednja Desna Kliješta:</span>
                            <span class="font-bold">Da</span>
                        </div>
                    @else
                        <div class="flex justify-between">
                            <span>Prednja Desna Kliješta:</span>
                            <span class="font-bold">Ne</span>
                        </div>
                    @endif

                    @if($data['service']->rear_left_cylinder)
                        <div class="flex justify-between">
                            <span>Zadnja Lijeva Kliješta:</span>
                            <span class="font-bold">Da</span>
                        </div>
                    @else
                        <div class="flex justify-between">
                            <span>Zadnja Lijeva Kliješta:</span>
                            <span class="font-bold">Ne</span>
                        </div>
                    @endif

                    @if($data['service']->rear_right_cylinder)
                        <div class="flex justify-between">
                            <span>Zadnja Densa Kliješta:</span>
                            <span class="font-bold">Da</span>
                        </div>
                    @else
                        <div class="flex justify-between">
                            <span>Zadnja Densa Kliješta:</span>
                            <span class="font-bold">Ne</span>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endif
<!-- End Brakes Service -->

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
                <span class="font-light">Cijena Servisa: {{ $data['service']->price }}km</span>
            </div>
        </div>
    </div>
</div>
</body>
</html>
