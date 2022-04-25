<?php

namespace App\Exports;


use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ExcelExports implements FromArray, WithHeadings
{



    public function array(): array{
        return DB::Select('Select  id,
                                   surname,
                                   name,
                                   patronymic,
                                   familyStatus,
                                   nationality,
                                   dataOfBirth,
                                   Iin,
                                   cityOfResidence,
                                   homeAdress,
                                   mobileNumber,
                                   mobileNumberTwo,
                                   email,
                                   emailTwo
                                   from personal_datamba');
    }


    public function headings(): array
    {
        return [
            'id',
            'Фамилия',
            'Имя',
            'Отчество',
            'Гражданский статус',
            'Национальность',
            'Дата рождения',
            'ИИН/ПИНФЛ',
            'Город проживания',
            'Домашний адрес',
            'Мобильный телефон',
            'Второй мобильный номер',
            'Личная электронная почта',
            'Электронная почта (корпоративный)'
        ];
    }
}
