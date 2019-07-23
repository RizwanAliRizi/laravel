<?php

namespace App\Http\Controllers;
use App\Address;
use App\company;
use App\customers;
use Illuminate\Http\Request;

class 

CustomerController extends Controller
{
  
    public function index(){


    if(auth()->user()){

        $companies = company::all();
        return view('customers.register',compact('companies'));
    }
    else
        return redirect(route('login'))->with('register_company','Please Login ');
    	
    }

    public function store(Request $request){

    	$request->validate([
    		'customer_name'=>'required',
    		'age'=>'required',
    	]);

    	$cus= new customers([

    		'name'=> $request->get('customer_name'),
    		'age'=> $request->get('age'),
    		'company_id' => $request->get('company_id')
    	]);

    	$cus->save();
    	 return redirect(route('register_customer'))->with('saveEmployee','Customer saved successfully.!');
        // $address = new Address();
        // $address->address="lahore, pakistan";
        // $address->customer_id=10;
        // $address->address()->save();
    }

    public function showcustomer(){
    	$all_customer = customers::with('company')->get();
    	return view('customers.display',compact('all_customer'));
    }


    // public function customerDetails($id){
    //   $companyName = customers::find($id)->company->name;
    //   $customerDetail = customers::find($id);
    //     return view('customers.customerDetails',compact('customerDetail'))->with('company_name',$companyName);
    // }

    public function edit($id){
        $customer = customers::find($id);
        $customer_name = $customer->name;
        $customer_age = $customer->age;

        $company_name = company::find($customer)->first()->name;
    
        $companies = company::All();
           return view('customers.edit_customer',compact('companies'))
           ->with(['name' => $customer_name, 'age' => $customer_age, 'companyName' => $company_name]);

    }


    public function updateCustomer(Request $request){
        $request->validate([
            'customer_name'=>'required',
            'age'=>'required',
        ]);

        $cus= new customers([

            'name'=> $request->get('customer_name'),
            'age'=> $request->get('age'),
            'company_id' => $request->get('company_id')
        ]);

        $cus->save();
         return redirect(route('allcustomer'))->with('updateCustomer','Customer updated successfully.!');

    }



    public function deleteCutomer($id){
        try{
            
            $toDelCustomer= customers::find($id);
            // dd($toDelCustomer);
            $toDelCustomer->delete();
            return redirect(route('allcustomer'))->with('deleteCutomer','Customer deleted successfully.!');
        }
        catch(\Illuminate\Database\QueryException $qe){
            $qe->getMessage();
        }
    }
}
