<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables, Session, View, Validator;
use Redirect;
use Auth;
use App\User;
use App\Expense;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->type = ['Expense' => 'Expense','Income' => 'Income'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expense.index');
    }

    /**
     * Display a listing of the records using Datatable.
     *
     * @return \Illuminate\Http\Response
     */
    public function expenseDatatable()
    {
        $userId = Auth::user()->id;
        $expenses = Expense::select('id','user_id','type','currency','amount','date')
        ->with('user:id,name')->orderBy('id','DESC');

        return DataTables::of($expenses)
        ->addIndexColumn()
        ->editColumn('amount', function($expense) {
            return $expense->currency.' '.$expense->amount;
        })
        ->editColumn('user_id', function($expense) {
            return $expense->user->name ?? '-';
        })
        ->editColumn('date', function($expense) {
            return date('jS M Y', strtotime($expense->date));
        })
        ->addColumn('action', function($expense) {
            $html = '';
            if($expense->user_id == Auth::user()->id){
                $html .= '<a href="' .route('expense.edit',$expense->id).'" target="_blank" class="btn btn-success mr-2"><i class="fas fa-edit"></i></a>';
                $html .= '<a href="#" onclick="deleteExpense('.$expense->id.')" class="btn btn-danger"><i class="fas fa-trash"></i></a>';
            }
            return $html;
        })
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = $this->type;
        return View::make('expense.create',compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $rules = array(
            'type' => 'required|in:Expense,Income',
            'amount' => 'required|between:0,99.99',
            'date' => 'required|date'
        );
        $validator = Validator::make($data, $rules);
        if($validator->fails()){
            return Redirect::to('expense/create')
                ->withErrors($validator)->withInput();
        }
        $expense = new Expense();
        $expense->user_id = Auth::user()->id;
        $expense->amount = $data['amount'];
        $expense->type = $data['type'];
        $expense->date = $data['date'];
        $expense->save();

        Session::flash('message', 'Successfully added Expense!');
        return Redirect::to('expense');
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
        $expense = Expense::findOrFail($id);
        $type = $this->type;
        return view('expense.edit',compact('expense','type'));
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
        $data = $request->all();
        $rules = array(
            'type' => 'required|in:Expense,Income',
            'amount' => 'required|between:0,99.99',
            'date' => 'required|date'
        );
        $validator = Validator::make($data, $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('expense/' . $id . '/edit')
                ->withErrors($validator)->withInput();
        } else {
            // store
            $expense = Expense::find($id);
            $expense->amount = $data['amount'];
            $expense->type = $data['type'];
            $expense->date = $data['date'];
            $expense->save();

            // redirect
            Session::flash('message', 'Successfully updated Expense!');
            return Redirect::to('expense');
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
        $expense = Expense::findOrFail($id);
        $expense->delete();

        // redirect
        // Session::flash('message', 'Successfully deleted the Expense!');
        return response()->json(true);
    }
}
