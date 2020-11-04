<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Traits\ZoomJWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use GuzzleHttp\Client;

class aZoomController extends Controller
{
    use ZoomJWT;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function list(Request $request)
    {
        $path = 'users/me/meetings';
        $response = $this->zoomGet($path);

        $data = json_decode($response->body(), true);
        $data['meetings'] = array_map(
            function (&$m) {
                $m['start_at'] = $this->toUnixTimeStamp($m['start_time'], $m['timezone']);
                return $m;
            },
            $data['meetings']
        );

        return [
            'success' => $response->ok(),
            'data' => $data,
        ];
    }

    public function create(Request $request)
    {

        $jwt = $this->generateZoomToken();
        $client = new Client(['base_uri' => 'https://api.zoom.us']);

        // $db = new DB();
        // $arr_token = $db->get_access_token();
        $accessToken = $this->generateZoomToken();

        try {
            $response = $client->request('POST', '/v2/users/me/meetings', [
                "headers" => [
                    "Authorization" => "Bearer $accessToken"
                ],
                'json' => [
                    "topic" => "Let's learn Laravel",
                    "type" => 2,
                    "start_time" => "2020-05-05T20:30:00",
                    "duration" => "30", // 30 mins
                    "password" => "123456"
                ],
            ]);

            $data = json_decode($response->getBody());
            return response()->json($data);
            echo "Join URL: " . $data;
            echo "<br>";
            echo "Meeting Password: " . $data->password;
        } catch (Exception $e) {
            return "error";
        }


        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => "https://api.zoom.us/v2/users/3/meetings",
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => "",
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 30,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => "POST",
        //     CURLOPT_HTTPHEADER => array(
        //         "authorization: Bearer ".$jwt,
        //         "content-type: application/json"
        //     ),

        // ));

        // $response = curl_exec($curl);
        // $err = curl_error($curl);

        // curl_close($curl);

        // if ($err) {
        //     echo "cURL Error #:" . $err;
        // } else {
        //     echo $response;
        // }

        // $response = $client->request('POST', '/v2/users/me/meetings', [
        //     "headers" => [
        //         "Authorization" => "Bearer $accessToken"
        //     ],
        //     'json' => [
        //         "topic" => "Let's learn Laravel",
        //         "type" => 2,
        //         "start_time" => "2020-05-05T20:30:00",
        //         "duration" => "30", // 30 mins
        //         "password" => "123456"
        //     ],
        // ]);
        // return [
        //     'success' => 'lkj',
        //     'data' => 'lkjs',
        // ];
        // $validator = Validator::make($request->all(), [
        //     'topic' => 'required|string',
        //     'start_time' => 'required|date',
        //     'agenda' => 'string|nullable',
        // ]);

        // if ($validator->fails()) {
        //     return [
        //         'success' => false,
        //         'data' => $validator->errors(),
        //     ];
        // }
        // $data = $validator->validated();

        // $path = 'me/meetings';
        // $response = $this->zoomPost($path, [
        //     'topic' => 'class',
        //     'type' => self::MEETING_TYPE_SCHEDULE,
        //     'start_time' => $this->toZoomTimeFormat('2020-11-05'),
        //     'duration' => 30,
        //     // 'agenda' => $data['agenda'],
        //     'agenda' => 'ratul',
        //     'settings' => [
        //         'host_video' => false,
        //         'participant_video' => false,
        //         'waiting_room' => true,
        //     ]
        // ]);


        // return [
        //     'success' => $response->status() === 201,
        //     'data' => json_decode($response->body(), true),
        // ];
    }

    public function get(Request $request, string $id)
    {
        $path = 'meetings/' . $id;
        $response = $this->zoomGet($path);

        $data = json_decode($response->body(), true);
        if ($response->ok()) {
            $data['start_at'] = $this->toUnixTimeStamp($data['start_time'], $data['timezone']);
        }

        return [
            'success' => $response->ok(),
            'data' => $data,
        ];
    }
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'topic' => 'required|string',
            'start_time' => 'required|date',
            'agenda' => 'string|nullable',
        ]);

        if ($validator->fails()) {
            return [
                'success' => false,
                'data' => $validator->errors(),
            ];
        }
        $data = $validator->validated();

        $path = 'meetings/' . $id;
        $response = $this->zoomPatch($path, [
            'topic' => $data['topic'],
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => (new \DateTime($data['start_time']))->format('Y-m-d\TH:i:s'),
            'duration' => 30,
            'agenda' => $data['agenda'],
            'settings' => [
                'host_video' => false,
                'participant_video' => false,
                'waiting_room' => true,
            ]
        ]);

        return [
            'success' => $response->status() === 204,
            'data' => json_decode($response->body(), true),
        ];
    }
    public function delete(Request $request, string $id)
    {
        $path = 'meetings/' . $id;
        $response = $this->zoomDelete($path);

        return [
            'success' => $response->status() === 204,
            'data' => json_decode($response->body(), true),
        ];
    }
}
