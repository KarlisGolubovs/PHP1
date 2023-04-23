<?php

namespace App;


use App\Models\Enterprise;

class EnterpriseFactory
{
    public static function fetchEnterpriseData(array $data): array
    {
        $enterprises = [];
        foreach ($data as $row) {
            $enterprise = new Enterprise(
                $row['name'],
                $row['regcode'],
                $row['address'],
                $row['employees_count'],
                $row['revenue']
            );
            $enterprises[] = $enterprise;
        }
        return $enterprises;
    }
}
