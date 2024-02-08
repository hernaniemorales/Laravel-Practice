<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use App\Mail\WelcomeNewUserMail;            //import Mails' class
use App\Events\NewCustomerHasRegisteredEvent;    //import events' class
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;        //import Mails' class

class CustomersController extends Controller
{
    //creates a construct method which locked up the customers list.
    public function __construct(){
        //locked up everything.
        $this->middleware('auth');
        
        // //locked up everything in customers list except the index.
        // $this->middleware('auth')->except('index');

        // //locked up only the specified argument mentioned on the method only.
        // $this->middleware('auth')->only('create', 'show');
    }


    public function index(){

        // //where active customer is equals to 1, and get all the results.
        // $activeCustomers = Customer::active()->get();
        // $inactiveCustomers = Customer::inactive()->get();
        
        $customers = Customer::all();

        // dd($inactiveCustomers);

        // $customers = Customer::all();

        // dd($customers);      //can be used for debugging purposes.

        // return view('internals.customers', [
        //     //PASSING DATA INTO VIEWS
        //     // 'customers' => $customers
        //     'activeCustomers' => $activeCustomers,
        //     'inactiveCustomers' => $inactiveCustomers,
        // ]);

        return view('customers.index', compact('customers'));
    }

    public function create(){
        $companies = Company::all();
        $customer = new Customer();

        return view('customers.create', compact('companies', 'customer'));
    }

    public function store(){
        //form validation
        // $data = request()->validate([
        //     'name' => 'string|required|min:3|max:200',
        //     'email' => 'required|email',
        //     'active' => 'required',
        //     'company_id' => 'required',
        // ]);

        // dd($data);
        
        //produce a mass assignment error that needs to be fixed on the Customer Model.
        // $customer = Customer::create($data);  
        // Customer::create($this->validateRequest());       
        // $customer = new Customer();
        // $customer->name = request('name');
        // $customer->email = request('email');
        // $customer->active = request('active');
        // $customer->save();

        // dd(request('name'));

        $customer = Customer::create($this->validateRequest());
            
            event(new NewCustomerHasRegisteredEvent());    

            //send and email                                  and pass in the $customer
            // Mail::to($customer->email)->send(new WelcomeNewUserMail($customer));

            //register to newsletter.
            dump('Registered to newsletter');

            // slack notifications to Admin.
            dump('Slack message here'); 

        // return redirect('customers');
    }

    
    // public function show($customer){ 
        // $customer = Customer::where('id', $customer)->firstOrFail();

        //an example of ROUTE MODEL FINDING 
        public function show(Customer $customer){

        // dd($customer);

                //controller name or file name . method name then passing it to the view.
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer){

        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer){

        // $data = request()->validate([
        //     'name' => 'string|required|min:3|max:200',
        //     'email' => 'required|email',
        //     'active' => 'required',
        //     'company_id' => 'required',
        // ]);

        // $customer->update($data);
        // the above code has been simplified by the code below.
        $customer->update($this->validateRequest());


        return redirect('customers/' . $customer->id );
    }

    public function destroy(Customer $customer){

        $customer->delete();

        return redirect('customers');
    }


    private function validateRequest(){

        return request()->validate([
            'name' => 'string|required|min:3|max:200',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
        ]);
    }




}