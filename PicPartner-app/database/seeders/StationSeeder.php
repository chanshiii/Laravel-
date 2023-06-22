<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Seeder;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv_path = storage_path('/app/csv/station20230327free.csv'); // ダウンロードしたファイルへのパス
        $file = new \SplFileObject($csv_path);
        $file->setFlags(\SplFileObject::READ_CSV);

        foreach ($file as $index => $row) {

            if($index > 0 && !is_null($row[0])) {

                $station_name = $row[2];
                $longitude = floatval($row[9]);
                $latitude = floatval($row[10]);

                $station = new Station();
                $station->name = $station_name;
                $station->longitude = $longitude;
                $station->latitude = $latitude;
                $station->save();

            }

        }
    }
}