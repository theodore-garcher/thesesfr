<?php

namespace App\Imports;

use App\Models\These;
use Illuminate\Console\OutputStyle;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class ThesesImport implements ToModel, WithCustomCsvSettings, WithBatchInserts, WithChunkReading, WithUpserts
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //modified php.ini values in mamp in order for big file uploads to work
        //post_max_size = 1000M
        //upload_max_filesize = 1000M
        //memory_limit = 1000M
        //max_execution_time = 300
        return new These([
            'auteur' => $row[0],
            'id_auteur' => $row[1],
            'titre' => $row[2],
            'directeur' => $row[3],
            'directeur_np' => $row[4],
            'id_directeur' => $row[5],
            'etablissement_soutenance' => $row[6],
            'id_etablissement' => $row[7],
            'discipline' => $row[8],
            'statut' => $row[9],
            'date_premiere_inscription' => $row[10] ? date("y-m-d", strtotime($row[10])) : null,
            'date_soutenance' => $row[11] ? date("y-m-d", strtotime($row[11])) : null,
            'langue' => $row[12],
            'id_these' => $row[13],
            'accessible_online' => $row[14],
            'publi_thesesfr' => $row[10] ? date("y-m-d", strtotime($row[15])) : null,
            'maj_thesesfr' => $row[10] ? date("y-m-d", strtotime($row[16])) : null
        ]);
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ";"
        ];
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function uniqueBy()
    {
        return 'id_these';
    }

    public function onFailure(Failure ...$failures)
    {
        // TODO: Implement onFailure() method.
    }

    public function onError(Throwable $e)
    {
        // TODO: Implement onError() method.
    }
}
