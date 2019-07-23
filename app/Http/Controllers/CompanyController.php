<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\company;

class CompanyController extends Controller
{
    public function index(){
    if(auth()->user())
      return view('company.register');
    
    else
         return redirect(route('login'))->with('register_company','Please Login ');
    }

    public function store(Request $request){
    	$request->validate([
            'company_name'=>'required',
            'phone_number'=>'required',

    	]);

    	$comp = new company([
        'name'=>$request->get('company_name'),
    	'phone'=>$request->get('phone_number')
   	]);

      try{
        $comp->save();
        echo "saved";
      }catch(\Illuminate\Database\QueryException $e){
        echo "<h1 style='color:red; text: bold;font-weight:bold;'>Company name must be unique </h1><br>";
        echo  $e->getMessage();
      }
    }

  public function showcompany(){
  	$all_companies = company::all();
  	return view('company.display',compact('all_companies'));

  }

  public function company_customer($id){
    $company = company::find($id)->customers;
    $companyName =company::find($id)->name;
    return view('company.customerOfCompany',compact('company'))->with('name',$companyName);
  }

}

