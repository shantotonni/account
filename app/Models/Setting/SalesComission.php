<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Model;

class SalesComission extends Model
{
    protected $table = "salescommisions";

    public function createdBy()
    {
        return $this->belongsTo('App\User','created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\User','updated_by');
    }

    public function Agents()
    {
        return $this->belongsTo('App\Models\Contact\Agent', 'agents_id');
    }

    public function Account()
    {
        return $this->belongsTo('App\Models\AccountChart\Account', 'paid_through_id');
    }

}
