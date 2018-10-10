<?php

namespace App\Modules\Inventory\Http\Controllers;

use App\Models\Moneyin\InvoiceEntry;
use Exception;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

// Models
use App\Models\Branch\Branch;
use App\Models\Inventory\Item;
use App\Models\Inventory\ItemCategory;
use App\Models\Inventory\Product;
use App\Models\Inventory\ProductPhase;
use App\Models\Inventory\ProductPhaseItem;
use App\Models\Inventory\Stock;
use App\Models\AccountChart\Account;
use App\Models\Tax;
use App\Models\MoneyOut\BillEntry;

class InventoryWebController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $item_categories = ItemCategory::all();
        return view('inventory::inventory.index', compact('items','item_categories'));
    }

    public function create()
    {
        $item_categories = ItemCategory::all();
        $accounts = Account::all();
        $branches = Branch::all();
        $taxs     = Tax::all();

        return view('inventory::inventory.create', compact('item_categories', 'accounts', 'branches','taxs'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'item_name'                 => 'required',
            'item_category_id'          => 'required',
        ]);

         try {
            $item_data = $request->all();
            $created_by = Auth::user()->id;
            $updated_by = Auth::user()->id;

            $item = new Item;

            $item->item_name                 = $item_data['item_name'];
            $item->item_about                = $item_data['item_about'];
            $item->item_sales_rate           = $item_data['item_sales_rate'];
            $item->item_sales_description    = $item_data['item_sales_description'];
            $item->item_sales_tax            = $item_data['item_sales_tax'];
            $item->item_purchase_rate        = $item_data['item_purchase_rate'];
            $item->item_purchase_description = $item_data['item_purchase_description'];
            $item->reorder_point             = $item_data['reorder_point'];
            $item->item_category_id          = $item_data['item_category_id'];
            $item->branch_id                 = 1;
            $item->created_by                = $created_by;
            $item->updated_by                = $updated_by;

            if($item->save())
            {
                return redirect()
                    ->route('inventory')
                    ->with('alert.status', 'success')
                    ->with('alert.message', 'Item added successfully!');
            }
            else
                {
                return redirect()
                    ->route('inventory')
                    ->with('alert.status', 'danger')
                    ->with('alert.message', 'Sorry, something went wrong! Data cannot be saved.');
            }
        }
        catch (Exception $e)
        {
            return redirect()
                ->route('inventory')
                ->with('alert.status', 'danger')
                ->with('alert.message', 'Sorry, something went wrong! Refresh or reload the page and try again.');
        }
    }

    public function show($id)
    {
        $item = Item::find($id);
        $item_categories = ItemCategory::all();
        return view('inventory::inventory.show', compact('item','item_categories'));
    }

    public function edit($id)
    {
        $item_categories = ItemCategory::all();
        $accounts = Account::all();
        $branches = Branch::all();
        $item = Item::find($id);
        $taxs     = Tax::all();
        return view('inventory::inventory.edit', compact('accounts', 'branches', 'item_categories', 'item', 'id','taxs'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'item_name'                 => 'required',
            'item_sales_tax'            => 'required',
            'item_category_id'          => 'required',
        ]);

        try {
            $item_data = $request->all();
            $created_by = Auth::user()->id;
            $updated_by = Auth::user()->id;

            $item = Item::find($id);

            $item->item_name                 = $item_data['item_name'];
            $item->item_about                = $item_data['item_about'];
            $item->item_sales_rate           = $item_data['item_sales_rate'];
            $item->item_sales_description    = $item_data['item_sales_description'];
            $item->item_sales_tax            = $item_data['item_sales_tax'];
            $item->item_purchase_rate        = $item_data['item_purchase_rate'];
            $item->item_purchase_description = $item_data['item_purchase_description'];
            $item->reorder_point             = $item_data['reorder_point'];
            $item->item_category_id          = $item_data['item_category_id'];
            $item->branch_id                 = 1;
            $item->created_by                = $item['created_by'];
            $item->updated_by                = $updated_by;

            if($item->update())
            {
                return redirect()
                    ->route('inventory', ['id' => $id])
                    ->with('alert.status', 'success')
                    ->with('alert.message', 'Item added successfully!');
            }
            else
            {
                return redirect()
                    ->route('inventory', ['id' => $id])
                    ->with('alert.status', 'danger')
                    ->with('alert.message', 'Sorry, something went wrong! Data cannot be saved.');
            }
        }
        catch (Exception $e)
        {
            return redirect()
                ->route('inventory', ['id' => $id])
                ->with('alert.status', 'danger')
                ->with('alert.message', 'Sorry, something went wrong! Refresh or reload the page and try again.');
        }
    }

    public function destroy($id)
    {
        $item_use = InvoiceEntry::where('item_id', $id)->get();
        if(count($item_use) > 0)
        {
            return redirect()
                ->route('inventory')
                ->with('alert.status', 'danger')
                ->with('alert.message', 'Sorry, Item is used in invoice. You can not delete this item.');
        }

        $item_use = BillEntry::where('item_id', $id)->get();
        if(count($item_use) > 0)
        {
            return redirect()
                ->route('inventory')
                ->with('alert.status', 'danger')
                ->with('alert.message', 'Sorry, Item is used in bill. You can not delete this item.');
        }

        $item = Item::find($id);

        if ($item->delete())
        {
            return redirect()
                ->route('inventory')
                ->with('alert.status', 'success')
                ->with('alert.message', 'Item deleted successfully!');
        }
        else
        {
            return redirect()
                ->route('inventory')
                ->with('alert.status', 'danger')
                ->with('alert.message', 'Sorry, something went wrong! Data cannot be deleted.');
        }
    }
}
