<?php

namespace App\Models\MedicalSlipForm;

use Illuminate\Database\Eloquent\Model;

class Gamca_Received_submit extends Model
{
    protected $table = 'gamca_receive_submit';

    protected $fillable = [
        'medical_slip_form_id',
        'received_status',
        'submitted_status'
    ];

    public function medical_form()
    {
        return $this->belongsToMany('App\Models\MedicalSlipForm\MedicalSlipForm','medical_slip_form_id');
    }

    public function medicalslipFromPax()
    {
        return $this->belongsTo('App\Models\Recruit\Recruitorder','pax_id')->select('paxid');
    }

}
