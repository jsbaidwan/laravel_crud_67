<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use View;
use App\Customer;
use Session;
use Redirect;
use Validator;
use File;
use Config;
use Response;
class customers_controller extends Controller
{

    ####### FUNCTION TO SHOW LIST OF CUSTOMERS #######
    function index(Request $request) {
        $customers_arr = Customer::orderby('created_at', 'desc')->get();
        return View::make('customers.index')->with('customers_arr', $customers_arr);
    }

    ####### FUNCTION TO RENDER ADD/EDIT CUSTOMER FORM #######
    function add_customer(Request $request, $id=null) {
        $customer_data = array();
        if(!empty($id)) {
            $customer_data = Customer::where('id', $id)->first();
        }
        return View::make('customers.add_customer')->with('customer_data', $customer_data);
    }

    ####### FUNCTION TO SAVE CUSTOMER DETAILS #######
    function save_customer(Request $request) {
        $data = $request->all();
        unset($data['_token']);
        if(isset($data['id']) && !empty($data['id'])) {
            $validator = Validator::make($request->all(), [ 
                'id' => 'required|numeric',
                'first_name' => 'required|regex:/^[a-zA-Z]/|max:255',
                'last_name' => 'max:255',
                'email' => 'required|unique:customers,email,'.$data['id'].'|max:255',
                'phone' => 'required|regex:/[0-9]{9}/|max:12|min:10|unique:customers,phone,'.$data['id'],  
            ]);  
            if($validator->fails()) 
            {          
                return Redirect::back()->withInput($request->all())->withErrors($validator);    
            }
            else 
            {
                $customer_data = Customer::where('id', $data['id'])->first();
                if(Customer::where('id', $data['id'])->update($data)) {
                    Session::flash('success', 'Customer has been updated successfully.');
                    return Redirect('/');                
                } 
                else  
                {
                    Session::flash('error', 'An error occured while saving customer detail.');
                    return Redirect::back()->withInput($request->all());            
                }
            }
        }
        else {
            $validator = Validator::make($request->all(), [ 
                'first_name' => 'required|regex:/^[a-zA-Z]/|max:255',
                'last_name' => 'max:255',
                'email' => 'required|unique:customers|max:255',
                'phone' => 'required|regex:/[0-9]{9}/|max:12|min:10|unique:customers',  
            ]);  
            if($validator->fails()) 
            {          
                return Redirect::back()->withInput($request->all())->withErrors($validator);    
            }
            else 
            {
                if(Customer::create($data)) {
                    Session::flash('success', 'Customer has been added successfully.');
                    return Redirect('/');  
                }
                else {
                    Session::flash('error', 'An error occured while saving customer detail.');
                    return Redirect::back()->withInput($request->all());    
                }
            }
        }
    }

    ####### FUNCTION TO CHANGE CUSTOMER STATUS #######
    function update_customer_status(Request $request) {
        $validator = Validator::make($request->all(), [ 
            'id' => 'required|numeric',
            'status' => 'required',
        ]);  
        if($validator->fails()) 
        {          
            return response()->json([
                'success' => 'false',
                'errors'  => $validator->errors()->all(),
            ], 400); 
        }
        else 
        {
            $is_exist = Customer::where('id', $request->input('id'))->first();
            if(!empty($is_exist)) {
                $data['status'] = $request->input('status');
                if(Customer::where('id', $request->input('id'))->update($data)) {
                    die('suc');
                }
                else {
                    die('error');
                }
            }
            else {
                die('error');    
            }
        }
        die;
    }


    ####### FUNCTION TO DELETE CUSTOMER #######
    function delete_customer(Request $request) {
        $validator = Validator::make($request->all(), [ 
            'id' => 'required|numeric',
        ]);  
        if($validator->fails()) 
        {          
            return response()->json([
                'success' => 'false',
                'errors'  => $validator->errors()->all(),
            ], 400); 
        }
        else 
        {
            $is_exist = Customer::where('id', $request->input('id'))->first();
            if(!empty($is_exist)) {
                if($is_exist->delete()) {
                    die('suc');
                }
                else {
                    die('error');
                }
            }
            else {
                die('error');    
            }
        }
        die;
    }
}
