<?php

namespace Database\Seeders;

use App\Models\Model;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producer;


class CarSeeder extends Seeder
{
    public function run()
    {
        $brandModels = [
            'Alfa Romeo' => [
                'Giulia', 'Stelvio', 'Giulietta', '4C', '8C Competizione', '156', '159', 'Brera', 'Spider',
                'GT', 'MiTo', 'SZ', 'GTV', '164', '145', '147', '166', 'Alfetta', 'Alfasud'
            ],

            'Aston Martin' => ['DB11', 'Vantage', 'DBS Superleggera', 'Valhalla', 'Valkyrie'],

            'Audi' => [
                'A1', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8', 'Q2', 'Q3', 'Q4', 'Q5', 'Q7', 'Q8',
                'TT', 'R8', 'e-tron', 'e-tron GT', 'RS3', 'RS4', 'RS5', 'RS6', 'RS7',
                'S3', 'S4', 'S5', 'S8', '100', '80', '90', 'Quattro', 'Cabriolet', 'V8'
            ],

            'Bentley' => ['Continental GT', 'Bentayga', 'Flying Spur', 'Mulsanne'],

            'BMW' => [
                '1 Series', '2 Series', '3 Series', '4 Series', '5 Series', '6 Series', '7 Series', '8 Series',
                'X1', 'X2', 'X3', 'X4', 'X5', 'X6', 'X7', 'Z4', 'i3', 'i4', 'i7', 'i8',
                'M2', 'M3', 'M4', 'M5', 'M8', 'X3 M', 'X5 M', 'X6 M', '2002', 'Z1', 'Z3', 'Z8',
                'E21', 'E30', 'E36', 'E46', 'E60', 'E90'
            ],

            'Bugatti' => ['Chiron', 'Veyron', 'Divo', 'Centodieci'],
            'Cadillac' => ['Escalade', 'CT5', 'XT5', 'CTS-V'],
            'Chevrolet' => ['Camaro', 'Corvette', 'Silverado', 'Tahoe', 'Malibu'],
            'Chrysler' => ['300', 'Pacifica', 'Voyager'],

            'Citroën' => [
                'C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'Berlingo', 'Jumpy', 'Spacetourer',
                'DS3', 'DS4', 'DS5', '2CV', 'AX', 'BX', 'CX', 'Saxo', 'XM', 'Xantia', 'Xsara',
                'C-Crosser', 'C-Elysée', 'C-Zero', 'Cactus', 'Evasion', 'Nemo', 'Visa'
            ],

            'Dacia' => ['Sandero', 'Duster', 'Logan', 'Spring'],
            'Daewoo' => ['Matiz', 'Lanos', 'Nubira'],
            'Dodge' => ['Charger', 'Challenger', 'Durango', 'Viper'],
            'DS' => ['DS 3', 'DS 7', 'DS 9'],
            'Ferrari' => ['488', 'F8 Tributo', 'SF90 Stradale', 'Roma', 'Portofino'],
            'Fiat' => ['500', 'Panda', 'Tipo', 'Ducato'],
            'Ford' => ['Fiesta', 'Focus', 'Mustang', 'F-150', 'Explorer'],
            'Honda' => ['Civic', 'Accord', 'CR-V', 'Jazz', 'NSX'],
            'Hummer' => ['H2', 'H3', 'EV'],
            'Hyundai' => ['Tucson', 'Santa Fe', 'Kona', 'i30', 'Nexo'],
            'Iveco' => ['Daily', 'Stralis', 'Trakker'],
            'Jaguar' => ['XE', 'XF', 'F-PACE', 'I-PACE', 'F-TYPE'],
            'Jeep' => ['Wrangler', 'Grand Cherokee', 'Cherokee', 'Renegade'],
            'Kia' => ['Sportage', 'Sorento', 'Picanto', 'Stinger', 'EV6'],
            'KTM' => ['X-Bow'],
            'Lada' => ['Granta', 'Vesta', 'Niva', 'XRAY'],
            'Lamborghini' => ['Aventador', 'Huracán', 'Urus', 'Sian'],
            'Lancia' => ['Ypsilon', 'Delta'],
            'Land Rover' => ['Range Rover', 'Discovery', 'Defender', 'Evoque'],
            'Lexus' => ['RX', 'NX', 'ES', 'LS', 'LC'],
            'Lotus' => ['Evora', 'Elise', 'Exige', 'Emira'],
            'Maserati' => ['Ghibli', 'Quattroporte', 'Levante', 'MC20'],
            'Mazda' => ['MX-5', 'CX-5', '3', '6', 'CX-30'],


            'Mercedes-Benz' => [
                'A-Class', 'B-Class', 'C-Class', 'E-Class', 'S-Class', 'CLA', 'CLS', 'GLA', 'GLB', 'GLC', 'GLE', 'GLS',
                'AMG GT', 'SL', 'SLC', 'V-Class', 'X-Class', 'EQE', 'EQS', 'EQB', 'EQC',
                '190', '300 SL', '600', 'CLK', 'CL', 'SLK', 'SLR', 'SLS', 'Maybach', 'G-Class',
                '220', '230', '250', '280', '350', '450', '500', '560', '190E', '300E', '500E'
            ],


            'MG' => ['ZS', 'HS', '5', 'Marvel R'],
            'Mini' => ['Cooper', 'Countryman', 'Clubman'],
            'Mitsubishi' => ['Outlander', 'ASX', 'L200', 'Eclipse Cross'],
            'Morgan' => ['Plus Four', 'Plus Six', '3 Wheeler'],
            'Nissan' => ['Qashqai', 'Juke', 'Leaf', 'GT-R', '370Z'],

            'Opel' => [
                'Adam', 'Ampera', 'Astra', 'Corsa', 'Insignia', 'Karl', 'Mokka', 'Crossland X', 'Grandland X',
                'Combo', 'Movano', 'Vivaro', 'Zafira', 'Meriva', 'Omega', 'Vectra', 'Calibra', 'Kadett',
                'Ascona', 'Rekord', 'Senator', 'Monza', 'GT', 'Manta', 'Frontera', 'Agila', 'Tigra', 'Speedster'
            ],


            'Peugeot' => [
                '107', '108', '206', '207', '208', '306', '307', '308', '405', '406', '407', '504', '505', '508',
                '2008', '3008', '4008', '5008', 'RCZ', 'Bipper', 'Partner', 'Expert', 'Boxer',
                '104', '205', '309', '403', '604', '605', '806', '807', '1007', '4007', 'iOn'
            ],


            'Porsche' => ['911', 'Cayenne', 'Taycan', 'Panamera', 'Macan'],


            'Renault' => [
                'Clio', 'Megane', 'Scenic', 'Laguna', 'Talisman', 'Captur', 'Kadjar', 'Koleos', 'Zoe', 'Twingo',
                '4', '5', '6', '8', '9', '11', '12', '14', '16', '18', '19', '20', '21', '25', '30',
                'Alpine A110', 'Avantime', 'Espace', 'Fuego', 'Grand Espace', 'Kangoo', 'Master', 'Modus',
                'R4', 'R5', 'R6', 'R11', 'R12', 'R14', 'R16', 'R17', 'R18', 'R19', 'R20', 'R21', 'R25', 'R30'
            ],



            'Rover' => ['75', '25', '45'],
            'Saab' => ['9-3', '9-5'],

            'Seat' => [
                'Ibiza', 'Leon', 'Arona', 'Ateca', 'Tarraco', 'Alhambra', 'Altea', 'Cordoba', 'Exeo',
                'Mii', 'Toledo', 'Marbella', 'Ronda', 'Malaga', 'Arosa', 'Inca', 'Fura', '133', '850'
            ],


            'Skoda' => [
                'Fabia', 'Octavia', 'Superb', 'Kodiaq', 'Kamiq', 'Enyaq', 'Scala', 'Rapid', 'Yeti',
                'Roomster', 'Citigo', '120', '130', '135', '136', 'Favorit', 'Felicia', 'Forman',
                '105', '110', '120', '130', 'Popular', 'Octavia Tour', '1000 MB', '110 R', '100', '1100 MB'
            ],

            'Smart' => ['Fortwo', 'Forfour'],
            'Subaru' => ['Impreza', 'Forester', 'Outback', 'BRZ'],
            'Suzuki' => ['Swift', 'Vitara', 'Jimny', 'Ignis'],
            'Tesla' => ['Model S', 'Model 3', 'Model X', 'Model Y', 'Cybertruck'],
            'Toyota' => ['Corolla', 'RAV4', 'Camry', 'Prius', 'Supra'],

            'Volkswagen' => [
                'Golf', 'Polo', 'Passat', 'Passat CC', 'CC', 'Tiguan', 'Touareg', 'Arteon', 'ID.3', 'ID.4', 'ID.5', 'ID.6', 'ID.7',
                'Beetle', 'Scirocco', 'Corrado', 'Jetta', 'Bora', 'Vento', 'Lupo', 'Fox', 'Up', 'XL1',
                'Amarok', 'Caddy', 'Caravelle', 'Multivan', 'California', 'Sharan', 'Touran',
                'Type 1', 'Type 2', 'Type 3', 'Type 4', 'K70', '181', '411', '412', 'Dasher', 'Rabbit'
            ],


            'Volvo' => ['XC40', 'XC60', 'XC90', 'S60', 'V90']
        ];

        foreach ($brandModels as $brand => $models) {
            $producer = Producer::where('name', $brand)->first();

            if ($producer) {
                foreach ($models as $model) {
                    Type::firstOrCreate([
                        'producer_id' => $producer->id,
                        'name' => $model
                    ]);
                }
            }
        }
    }
}
