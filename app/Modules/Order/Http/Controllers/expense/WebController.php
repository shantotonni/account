<?php

namespace App\Modules\Order\Http\Controllers\expense;

use App\Models\AccountChart\Account;
use App\Models\Contact\Contact;
use App\Models\ManualJournal\JournalEntry;
use App\Models\MoneyOut\Expense;
use App\Models\Recruit\ExpenseSector;
use App\Models\Recruit\RecruiteExpensePax;
use App\Models\Recruit\RecruitExpense;
use App\Models\Recruit\Recruitorder;
use App\Models\Tax;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sector = RecruitExpense::all();

      return view('order::expense.index', compact('sector'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sector = ExpenseSector::all();
        $pax= Recruitorder::all();
        return view('order::expense.create', compact('sector','pax'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      try{
          $recruit =  new RecruitExpense();

          $recruit->expenseSectorid =$request->sector_id;

          if ($request->hasFile('img_url')){
            $file= $request->img_url;

            $fileName=uniqid(). '.' .$file->getClientOriginalName();
            $file->move(public_path('all_image'), $fileName);

            $recruit->img_url = $fileName;
          }

          if($recruit->save())
          {

            //return $request->recruit_id;


              foreach($request->recruit_id as $value)
              {
                  $pax  = new RecruiteExpensePax();

                  $pax->recruitExpenseid = $recruit->id;
                  $pax->paxid = $value? $value:null ;

                  $pax->save();
              }

              return redirect()
                  ->route('order_expense_accounts')
                  ->with('alert.status', 'success')
                  ->with('alert.message', 'Expense data inserted successfully.');
          }
      }catch (\Illuminate\Database\QueryException $e){
          return redirect()
              ->route('order_expense_accounts')
              ->with('alert.status', 'danger')
              ->with('alert.message', 'Expense data inserted failed.');
      }





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sector = ExpenseSector::all();
        $pax= Recruitorder::all();
        $recruit = RecruitExpense::find($id);
        return view('order::expense.edit', compact('sector','pax','recruit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try{
            $recruit =  RecruitExpense::find($id);

            $recruit->expenseSectorid =$request->sector_id;

            if ($request->hasFile('img_url')){
            $file= $request->img_url;

            $fileName=uniqid(). '.' .$file->getClientOriginalName();
            $file->move(public_path('all_image'), $fileName);

            $recruit->img_url = $fileName;
          }

            if($recruit->save())
            {

              $delete=RecruiteExpensePax::where('recruitExpenseid',$id);
              $delete->delete();
                foreach($request->pax_id as $value)
                {
                    $pax  = new RecruiteExpensePax();

                    $pax->recruitExpenseid = $recruit->id;
                    $pax->paxid = $value? $value:null ;

                    $pax->save();
                }

                return redirect()
                    ->route('order_expense_accounts')
                    ->with('alert.status', 'success')
                    ->with('alert.message', 'saved.');
            }
        }catch (\Illuminate\Database\QueryException $e){

            dd($e->getMessage());
            return redirect()
                ->route('order_expense_accounts')
                ->with('alert.status', 'danger')
                ->with('alert.message', 'not saved.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$ex=null)
    {
        if(is_null($ex))
        {

          $category = RecruitExpense::find($id);
          if($category->expense_id == Null){
              if ($category->delete())
              {
                  $delete=RecruiteExpensePax::where('recruitExpenseid',$id);
                  $delete->delete();
                  return redirect()
                      ->route('order_expense_accounts')
                      ->with('alert.status', 'success')
                      ->with('alert.message', 'Recruite Expense  deleted successfully!');
              }
              else
              {
                  return redirect()
                      ->route('order_expense_accounts')
                      ->with('alert.status', 'danger')
                      ->with('alert.message', 'Sorry, something went wrong! Data cannot be deleted.');
              }
          }
          else{
            return back()->with(['alert.status' => 'danger' , 'alert.message' => 'Delete failed! Because expense exists.']);
          }
        }
        else
        {
            return redirect()
                ->route('order_expense_accounts')
                ->with('alert.status', 'danger')
                ->with('alert.message', 'You have an expense attached with this entry. Please delete expense first.');
        }
   }

   public function expense($id,$ex=null)
   {


       if(is_null($ex))
       {

           $customers = Contact::all();
           $accounts = Account::all();
           $paid_throughs = Account::where('account_type_id',4)->get();
           return view('order::mainexpense.create', compact('customers', 'accounts', 'taxes', 'paid_throughs','id'));
       }
       else
       {
//           $expense = Expense::find($ex);
//           $customers = Contact::all();
//           $accounts = Account::all();
//           $paid_throughs = Account::where('account_type_id',4)->get();

           return redirect()->route('expense_show', ['id' => $ex]);
           //  return view('expense::expense.edit', compact('customers', 'accounts', 'taxes', 'paid_throughs','expense'));
       }
   }
    public function insertExpenseInJournal($total_tax, $total_amount, $data, $expense_id)
    {
        $user_id = Auth::user()->id;

        $journal_entry = new JournalEntry;
        $journal_entry->debit_credit    = 0;
        $journal_entry->amount          = round(($total_tax + $total_amount) , 2);
        $journal_entry->jurnal_type    = "expense";
        $journal_entry->account_name_id = $data['paid_through_id'];
        $journal_entry->contact_id      = $data['customer_id'];
        $journal_entry->note            = $data['customer_note'];
        $journal_entry->expense_id      = $expense_id;
        $journal_entry->created_by      = $user_id;
        $journal_entry->updated_by      = $user_id;
        $journal_entry->assign_date      = date('Y-m-d',strtotime($data['expense_date']));

        if($journal_entry->save())
        {
            $journal_entry = new JournalEntry;
            $journal_entry->debit_credit    = 1;
            $journal_entry->amount          = round($total_amount, 2);
            $journal_entry->jurnal_type    = "expense";
            $journal_entry->account_name_id = $data['account_id'];
            $journal_entry->contact_id      = $data['customer_id'];
            $journal_entry->note            = $data['customer_note'];
            $journal_entry->expense_id      = $expense_id;
            $journal_entry->created_by      = $user_id;
            $journal_entry->updated_by      = $user_id;
            $journal_entry->assign_date      = date('Y-m-d',strtotime($data['expense_date']));
            if($journal_entry->save())
            {
                $journal_entry = new JournalEntry;
                $journal_entry->debit_credit    = 1;
                $journal_entry->amount          = round($total_tax, 2);
                $journal_entry->jurnal_type    = "expense";
                $journal_entry->account_name_id = 9;
                $journal_entry->contact_id      = $data['customer_id'];
                $journal_entry->note            = $data['customer_note'];
                $journal_entry->expense_id      = $expense_id;
                $journal_entry->created_by      = $user_id;
                $journal_entry->updated_by      = $user_id;
                $journal_entry->assign_date      = date('Y-m-d',strtotime($data['expense_date']));
                if($journal_entry->save())
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
   public function storeExpense(Request $request,$id)
   {


       $data = $request->all();
       $this->validate($request, [
           'expense_date'      => 'required',
           'account_id'        => 'required',
           'amount'            => 'required',
           'tax_id'            => 'required',
           'amount_is'         => 'required',
           'customer_id'       => 'required',
           'amount_is'         => 'required',
           'paid_through_id'   => 'required',
       ]);

       $total_tax = 0;
       $user_id = Auth::user()->id;

       $tax_amount = Tax::find($data['tax_id'])->amount_percentage;
       if($data['amount_is'] == 1)
       {
           $total_tax = ($data['amount']*($tax_amount/100));
       }
       else
       {
           $total_tax = ($data['amount']*($tax_amount/110));
       }

       $expense = new Expense;
       $expense->date              = $data['expense_date'];
       $expense->amount            = round($data['amount'], 2);
       $expense->paid_through_id   = $data['paid_through_id'];
       $expense->tax_total         = round($total_tax, 2);
       $expense->reference         = $data['reference'];
       $expense->note              = $data['customer_note'];
       $expense->account_id        = $data['account_id'];
       $expense->vendor_id         = $data['customer_id'];
       $expense->tax_id            = $data['tax_id'];
       $expense->tax_type          = $data['amount_is'];
       $expense->created_by        = $user_id;
       $expense->updated_by        = $user_id;

       if($expense->save())
       {
           $expense = Expense::orderBy('created_at', 'desc')->first();
           $expense_id = $expense['id'];


           $status = $this->insertExpenseInJournal($total_tax, $data['amount'], $data, $expense_id);
           if($status)
           {
             $rec=  RecruitExpense::find($id);
             $rec->expense_id = $expense_id;
             if($rec->save()){
                 return redirect()
                     ->route('order_expense_accounts')
                     ->with('alert.status', 'success')
                     ->with('alert.message', 'Expense added successfully!');
             }else{
                 $expense = Expense::find($expense_id);
                 $expense->delete();
                 {
                     return redirect()
                         ->route('order_expense_accounts')
                         ->with('alert.status', 'danger')
                         ->with('alert.message', 'Something went to wrong! Please check your input field');
                 }
             }

           }
           else
           {
               $expense = Expense::find($expense_id);
               $expense->delete();
               {
                   return redirect()
                       ->route('order_expense_accounts')
                       ->with('alert.status', 'danger')
                       ->with('alert.message', 'Something went to wrong! Please check your input field');
               }
           }

       }
   }
}
