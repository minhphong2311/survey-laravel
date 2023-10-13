<?php

namespace App\Imports;

use App\Client;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;


class ClientImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnError, SkipsOnFailure
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $row)
    {
        return new Client([
            'name' => $row['name'],
            'ic_number' => $row['ic_number'],
            'ic_front' => $row['ic_front'],
            'ic_back' => $row['ic_back'],
            'phone' => $row['phone'],
            'address' => $row['address'],
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => ['required'],
            'ic_number' => ['required','unique:clients'],
            'phone' => ['required'],
            'address' => ['required']
        ];
    }
}
