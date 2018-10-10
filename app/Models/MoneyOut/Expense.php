<?php

namespace App\Models\MoneyOut;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = 'expense';

    public function customer()
    {
        return $this->belongsTo('App\Models\Contact\Contact', 'vendor_id');
    }

    public function account()
    {
        return $this->belongsTo('App\Models\AccountChart\Account', 'account_id');
    }

    public function accountPaidThrough()
    {
        return $this->belongsTo('App\Models\AccountChart\Account', 'paid_through_id');
    }

    public function journalEntries()
    {
        return $this->hasMany('App\Models\ManualJournal\JournalEntry', 'expense_id');
    }
}




