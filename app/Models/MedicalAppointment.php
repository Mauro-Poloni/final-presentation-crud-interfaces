<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalAppointment extends Model
{
    use HasFactory;
    protected $fillable = ['patient_name','doctor_name','appointment_date','specialty','notes','attachment_path'];
}
