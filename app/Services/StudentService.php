<?php

namespace App\Services;

use App\Models\Students;

class StudentService
{
    /**
     * Fetch all students ordered by registration number.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getStudents($graduation_status = 0)
    {
        return Students::where('graduation_status', $graduation_status)->orderBy('registration_number')->get();
    }
}
