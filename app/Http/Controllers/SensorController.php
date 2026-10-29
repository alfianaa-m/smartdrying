<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;

class SensorController extends Controller
{
    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function index()
    {
        // Membaca node 'sensor' di Firebase Realtime Database
        $reference = $this->database->getReference('sensor');
        $sensorData = $reference->getValue();

        return view('dashboard', [
            'suhu' => $sensorData['suhu'] ?? 0,
            'kelembapan' => $sensorData['kelembapan'] ?? 0,
            'pencahayaan' => $sensorData['pencahayaan'] ?? 0,
        ]);
    }

    public function getLatestApi()
    {
        $reference = $this->database->getReference('sensor');
        return response()->json($reference->getValue());
    }
}