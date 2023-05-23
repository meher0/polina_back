<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Humidite;
use App\Models\Temperature;


class NotificationLog extends Command
{
    
    protected $signature = 'minute:notify';

   
    protected $description = 'clean table temperature';

   
    public function __construct()
    {
        parent::__construct();
    }

   
    public function handle()
    {
        $temp_chaud = Temperature::orderBy('id', 'DESC')
        ->paginate(1)
        ->where('value_tem','>','35');


        $temp_froid = Temperature::orderBy('id', 'DESC')
        ->paginate(1)
        ->where('value_tem','<','30');

        $hum_augm = Humidite::orderBy('id', 'DESC')
        ->paginate(1)
        ->where('value_hum','>','45');


        $hum_dimi = Humidite::orderBy('id', 'DESC')
        ->paginate(1)
        ->where('value_hum','<','35');

            if ($temp_chaud->count()) {
        
                    $SERVER_API_KEY = 'AAAAcyMkWfY:APA91bEYiFf0twO5O5imNZteRaJR4nxNUMsz825zT6ftEIcGl42SbH6rKydtBuOwL8spe1Bmnql4ilLQ3DuOa7gvcsKU7eNg94lzS-DWawDmJXSwDcpsYuMCuPrvacqTmPpZHJV7Olux';

                    $token_1 = 'dFLaPkGSSv-elCpqmXrNGa:APA91bH1UMcTjSBQ7fg4pTrTbl4GDiC2uU-BiJk94IU_66AUB2E62o-8ZawuaktfMJVgJ9YIXrFUVaD6QuaPYa0d-ieILXjWstZhzQ2xEX26XE9Bar502v5jEt3rv26k8to_EzhvgkGb';
                    foreach($temp_chaud as $data){
                    
                
                    $data = [

                        "registration_ids" => [
                            $token_1
                        ],

                        "notification" => [

                            "title" => 'Alert',

                            "body" => ' Température très eleve 🥵 '.$data->value_tem.'℃',

                            "sound"=> "default" // required for sound on ios

                        ],

                    ];
                }

                    $dataString = json_encode($data);

                    $headers = [

                        'Authorization: key=' . $SERVER_API_KEY,

                        'Content-Type: application/json',

                    ];

                    $ch = curl_init();

                    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

                    curl_setopt($ch, CURLOPT_POST, true);

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

                    $response = curl_exec($ch);

            }

        
            if ($temp_froid->count()) {
        
                $SERVER_API_KEY = 'AAAAcyMkWfY:APA91bEYiFf0twO5O5imNZteRaJR4nxNUMsz825zT6ftEIcGl42SbH6rKydtBuOwL8spe1Bmnql4ilLQ3DuOa7gvcsKU7eNg94lzS-DWawDmJXSwDcpsYuMCuPrvacqTmPpZHJV7Olux';

                $token_1 = 'dFLaPkGSSv-elCpqmXrNGa:APA91bH1UMcTjSBQ7fg4pTrTbl4GDiC2uU-BiJk94IU_66AUB2E62o-8ZawuaktfMJVgJ9YIXrFUVaD6QuaPYa0d-ieILXjWstZhzQ2xEX26XE9Bar502v5jEt3rv26k8to_EzhvgkGb';
               
                foreach($temp_froid as $data){
                
            
                    $data = [

                        "registration_ids" =>  [
                            $token_1
                        ],

                        "notification" => [

                            "title" => 'Alert',

                            "body" => ' Température très froid 🥶 '.$data->value_tem.'℃',

                            "sound"=> "default" // required for sound on ios

                        ],

                    ];
                }

                $dataString = json_encode($data);

                $headers = [

                    'Authorization: key=' . $SERVER_API_KEY,

                    'Content-Type: application/json',

                ];

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

                curl_setopt($ch, CURLOPT_POST, true);

                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

                $response = curl_exec($ch);

            
                

            }


            if ($hum_augm->count()) {
        
                $SERVER_API_KEY = 'AAAAcyMkWfY:APA91bEYiFf0twO5O5imNZteRaJR4nxNUMsz825zT6ftEIcGl42SbH6rKydtBuOwL8spe1Bmnql4ilLQ3DuOa7gvcsKU7eNg94lzS-DWawDmJXSwDcpsYuMCuPrvacqTmPpZHJV7Olux';

                $token_1 = 'dFLaPkGSSv-elCpqmXrNGa:APA91bH1UMcTjSBQ7fg4pTrTbl4GDiC2uU-BiJk94IU_66AUB2E62o-8ZawuaktfMJVgJ9YIXrFUVaD6QuaPYa0d-ieILXjWstZhzQ2xEX26XE9Bar502v5jEt3rv26k8to_EzhvgkGb';
                foreach($hum_augm as $data){
                
            
                $data = [

                    "registration_ids" => [
                        $token_1
                    ],

                    "notification" => [

                        "title" => 'Alert',

                        "body" => ' Humidite très augmente 😨 '.$data->value_hum.'%',

                        "sound"=> "default" // required for sound on ios

                        ],

                    ];
                }

                $dataString = json_encode($data);

                $headers = [

                    'Authorization: key=' . $SERVER_API_KEY,

                    'Content-Type: application/json',

                ];

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

                curl_setopt($ch, CURLOPT_POST, true);

                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

                $response = curl_exec($ch);

            }

    
            if ($hum_dimi->count()) {
        
                $SERVER_API_KEY = 'AAAAcyMkWfY:APA91bEYiFf0twO5O5imNZteRaJR4nxNUMsz825zT6ftEIcGl42SbH6rKydtBuOwL8spe1Bmnql4ilLQ3DuOa7gvcsKU7eNg94lzS-DWawDmJXSwDcpsYuMCuPrvacqTmPpZHJV7Olux';

                $token_1 = 'dFLaPkGSSv-elCpqmXrNGa:APA91bH1UMcTjSBQ7fg4pTrTbl4GDiC2uU-BiJk94IU_66AUB2E62o-8ZawuaktfMJVgJ9YIXrFUVaD6QuaPYa0d-ieILXjWstZhzQ2xEX26XE9Bar502v5jEt3rv26k8to_EzhvgkGb';
                foreach($hum_dimi as $data){
                
            
                    $data = [

                        "registration_ids" => [
                            $token_1
                        ],

                        "notification" => [

                            "title" => 'Alert',

                            "body" => ' Humidite est déminue 😨 '.$data->value_hum.'℃',

                            "sound"=> "default" // required for sound on ios

                        ],

                    ];
                }

                $dataString = json_encode($data);

                $headers = [

                    'Authorization: key=' . $SERVER_API_KEY,

                    'Content-Type: application/json',

                ];

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

                curl_setopt($ch, CURLOPT_POST, true);

                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

                $response = curl_exec($ch);

            
                

            }


    }
}
