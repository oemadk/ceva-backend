<?php
 
namespace App\Http\Controllers;
 
 
use App\Opening_balance;
use App\collection;
use App\Discount;
use App\Invoice;
use App\Endingbalance;
use App\Customer;
use App\Customerstatement;
use DB;
use Excel;
use Illuminate\Http\Request;
use AWS;
 
class MaatwebsiteDemoController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importExport()
    {
        return view('importExport');
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadExcel($type)
    {
        $data = Opening_balance::get()->toArray();
            
        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function openingBalanceUpload(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
 
        $path = $request->file('import_file')->getRealPath();

        $data = Excel::load($path)->get();

        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = ['cutomer_id' => $value->client_id, 'customer_name' => $value->client_name

                        , 'opening_balance_date' => $value->date, 'comment' => $value->comment,
                        'opening_balance_amount' => $value->balance_amount, 
            ];
            }
 
            if(!empty($arr)){
                Opening_balance::insert($arr);
            }
        }
 
        return back()->with('success', 'Opening Balance Records added successfuly.');
    }


        public function collectionUpload(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
 
        $path = $request->file('import_file')->getRealPath();

        $data = Excel::load($path)->get();

        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = ['cutomer_id' => $value->client_id, 'customer_name' => $value->client_name

                        , 'collection_date' => $value->date, 'amount_collected' => $value->amount_collected,
                        'receipt_statement' => $value->receipt_statement, 
                        'deposit_statement' => $value->deposit_statement, 
            ];
            }
 
            if(!empty($arr)){
                collection::insert($arr);
            }
        }
 
        return back()->with('success', ' Collection Records added successfuly.');
    }


            public function discountUpload(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
 
        $path = $request->file('import_file')->getRealPath();

        $data = Excel::load($path)->get();

        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = ['cutomer_id' => $value->client_id, 'customer_name' => $value->client_name

                        , 'discount_date' => $value->discount_date, 'discount_amount' => $value->discount_amount
            ];
            }
 
            if(!empty($arr)){
                Discount::insert($arr);
            }
        }
 
        return back()->with('success', 'Discount Records added successfuly.');
    }



            public function invoicesBalance(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        // set_time_limit(0);

 
        $path = $request->file('import_file')->getRealPath();

        $data = Excel::load($path)->get();

        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = ['cutomer_id' => $value->client_id, 'customer_name' => $value->client_name

                        , 'invoice_date' => $value->invoice_date, 'invoice_amount' => $value->invoice_amount,
                        'invoice_id' => $value->invoice_id, 
                        'amount' => $value->amount, 
                        'unit_price' => $value->unit_price
            ];
            }
 
            if(!empty($arr)){
                Invoice::insert($arr);
            }
        }
 
        return back()->with('success', 'Insert Record successfully.');
    }



                public function endingBalance(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        // set_time_limit(0);

 
        $path = $request->file('import_file')->getRealPath();

        $data = Excel::load($path)->get();

        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = ['cutomer_id' => $value->client_id, 
                          'customer_name' => $value->client_name,
                          'ending_balance' => $value->ending_balance,
                          'ending_balance_date' => $value->ending_balance_date
            ];
            }
 
            if(!empty($arr)){
                Endingbalance::insert($arr);
            }
        }
 
        return back()->with('success', 'Insert Record successfully.');
    }



public function GenerateUsers(){


 $customerIDsFromOpeningbalance = Opening_balance::pluck('cutomer_id');
 $customerIDsFromCollections = Collection::pluck('cutomer_id');
 $customerIDsFromDiscounts = Discount::pluck('cutomer_id');
 $customerIDsFromInvoices = Invoice::pluck('cutomer_id');
 $customerIDsFromEndingbalance= Endingbalance::pluck('cutomer_id');


foreach($customerIDsFromOpeningbalance as $v)
{                


     if($v>0){
        $obj = new Customer(); // this is to have new instance of own
        $obj->cutomer_id = $v;
        $obj->save();

}

}



}
    public function makeStatements(){




 $Customerids = Customer::pluck('cutomer_id');


foreach($Customerids as $v)
{                




     if($v>0){
         for ($i = 01; $i <= 12; $i++) {

        $obj = new Customerstatement(); // this is to have new instance of own
        $obj->cutomer_id = $v;

        $obj->monthly_statement_date = '2019'.'-'.$i.'-1';

        $dummyHolderForOpeningBalance = Customer::find($v)->openingbalance;

$date = '2019'.'-0'.$i.'-';
         $OpeningBalanceForSpecificUser =  Opening_balance::where('cutomer_id', $v)->whereMonth('opening_balance_date', $i)->first();

         $EndingBalanceForSpecificUser =  Endingbalance::where('cutomer_id', $v)->whereMonth('ending_balance_date', $i)->first();

         $nameitself = Opening_balance::where('cutomer_id', $v)->first();
         
         if( $OpeningBalanceForSpecificUser['opening_balance_amount'] != null){

        $obj->opening_balance = $OpeningBalanceForSpecificUser->opening_balance_amount;           
         }else{
            $obj->opening_balance = 0;
         }


        $obj->customer_name = $nameitself->customer_name;
        $obj->ending_balance = $EndingBalanceForSpecificUser['ending_balance'];

        $obj->save();
        };

 

            };



    }

return [

'STATEMENTS GENERATED SUCCESSFULLY'
];

}


    public function UserStatementsList($id){
       $month = $id;

       $data = Customerstatement::whereMonth('monthly_statement_date', $month)->get();

            return response()->json([
                'status' => 'Retrieved all Statements Correctly from' . $month,
                'data' => $data
            ]);

    }


        public function getUserThings($id, $month){


       $data = Customer::find($id);
       $openingbalance = Customer::find($id)->openingbalance->first();
       $openingbalance = $openingbalance->whereMonth('opening_balance_date', $month)->where('cutomer_id', $id)->get();
       $endingbalance = Endingbalance::whereMonth('ending_balance_date', $month)->where('cutomer_id', $id)->get();
       $collection = collection::whereMonth('collection_date', $month)->where('cutomer_id', $id)->get();
       $discount = Discount::whereMonth('discount_date', $month)->where('cutomer_id', $id)->get();
       $invoice = Invoice::whereMonth('invoice_date', $month)->where('cutomer_id', $id)->get();
       // $collection = Customer::find($id)->collection;

            return response()->json([
                'status' => 'Retrieved all Statements Correctly from' . $month,
                'customer_data' => $data,
                'openingbalance' => $openingbalance,
                'endingbalance' => $endingbalance,
                'discount' => $discount,
                'invoice' => $invoice,
                'collection' => $collection,


                

            ]);




    }



 

public function sendSMS(){
        $sms = AWS::createClient('sns');
    

        $sms->publish([
                'Message' => 'Hello, This is just a test Message for CEVA from the backend',
                'PhoneNumber' => '+0201222686756',    
                'MessageAttributes' => [
                    'AWS.SNS.SMS.SMSType'  => [
                        'DataType'    => 'String',
                        'StringValue' => 'Transactional',
                     ]
                 ],
     

              ]);


    }
 }