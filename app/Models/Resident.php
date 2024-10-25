<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;
    protected $fillable = [
        'ice_fullname', 'ice_address', 'ice_relationship', 'ice_contactNumber', 
        'firstName', 'middleName', 'lastName', 'birthDate', 'age', 'birthPlace',
        'gender', 'address', 'purokNumber', 'totalHousehold', 'voter', 'maritalStatus', 
        'nationality', 'religion', 'pwd', 'indigenous', 'occupation', 'MonthlyIncome', 'image'
    ];
}
