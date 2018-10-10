<?php

namespace App\Modules\Order\Http\Controllers\expensesector;

use App\Models\Recruit\ExpenseSector;
use App\Models\Recruit\RecruitExpense;
use App\Models\Recruit\Recruitorder;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sector = ExpenseSector::all();
        return view('order::expensesector.index', compact('sector'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order::expensesector.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'contact_category_name' => 'required',

        ]);

        try
        {
            $category_data = $request->all();
            $created_by = Auth::user()->id;
            $updated_by = Auth::user()->id;

            $category = new ExpenseSector();

            $category->title = $category_data['contact_category_name'];
            $category->summary = $category_data['contact_category_description'];
            $category->created_by = $created_by;
            $category->updated_by = $updated_by;


            if ($category->save())
            {
                return redirect()
                    ->route('order_expense_sector')
                    ->with('alert.status', 'success')
                    ->with('alert.message', 'Sector added successfully!');
            }
            else
            {
                return redirect()
                    ->route('order_expense_sector_create')
                    ->with('alert.status', 'danger')
                    ->with('alert.message', 'Sorry, something went wrong! Data cannot be saved.');
            }


        }
        catch (Exception $e)
        {
            return redirect()
                ->route('order_expense_sector_create')
                ->with('alert.status', 'danger')
                ->with('alert.message', 'Sorry, something went wrong! Refresh or reload the page and try again.');
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
        $category =ExpenseSector::find($id);

        return view('order::expensesector.edit', compact('category'));
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
        $this->validate($request, [
            'contact_category_name' => 'required',

        ]);

        try
        {
            $category_data = $request->all();
            $created_by = Auth::user()->id;
            $updated_by = Auth::user()->id;

            $category = ExpenseSector::find($id);

            $category->title = $category_data['contact_category_name'];
            $category->summary = $category_data['contact_category_description'];

            $category->updated_by = $updated_by;

            if ($category->update())
            {
                return redirect()
                    ->route('order_expense_sector', ['id' => $id])
                    ->with('alert.status', 'success')
                    ->with('alert.message', 'Sector updated successfully!');
            }
            else
            {
                return redirect()
                    ->route('order_expense_sector_edit', ['id' => $id])
                    ->with('alert.status', 'danger')
                    ->with('alert.message', 'Sorry, something went wrong! Data cannot be updated.');
            }
        }
        catch (Exception $e)
        {
            return redirect()
                ->route('order_expense_sector_edit', ['id' => $id])
                ->with('alert.status', 'danger')
                ->with('alert.message', 'Sorry, something went wrong! Refresh or reload the page and try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!is_null($id)){
            $category = ExpenseSector::find($id);
            $recruit = RecruitExpense::where('expenseSectorid' , $id)->first();
        if($recruit == Null){
                if ($category->delete())
                {
                    return redirect()
                        ->route('order_expense_sector')
                        ->with('alert.status', 'success')
                        ->with('alert.message', 'Expense Sector deleted successfully!');
                }
                else
                {
                    return redirect()
                        ->route('order_expense_sector')
                        ->with('alert.status', 'danger')
                        ->with('alert.message', 'Sorry, something went wrong! Data cannot be deleted.');
                }
            }
            else{
                return back()->with(['alert.status' => 'danger' , 'alert.message' => 'Delete failed! Because Paxwise expense exists.']);
            }
        }
        return redirect()
            ->route('order_expense_sector')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Sorry, something went wrong! Data cannot be deleted.');
    }

    public function search($id)
    {
        $sector = RecruitExpense::where('expenseSectorid',$id)->get();

        return view('order::expense.index', compact('sector'));
       // return view('document::document.index', compact('document'));
    }
}
