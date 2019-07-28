<?php
 
namespace App\Http\Controllers;
 
 
use App\Opening_balance;
use App\collection;
use App\Discount;
use App\Invoice;
use App\Endingbalance;
use App\Customer;
use App\Duebalance;
use App\Customercomments;
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

    /**showstatement
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function openingBalanceUpload(Request $request)
    {    


        // $file = $request->file('import_file');0

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

                return [
                $request,
                $arr,
                    'uploaded successfully'
        ];

        // return [
        //                 'hello world',


        // ];
 

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
 
        return [

            'success', ' Collection Records added successfuly.'

        ];
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
 
                return [

            'success', ' Discount Records added successfuly.'

        ];
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
 

                 return [

            'success', ' Invoices Records added successfuly.'

        ];
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
 

                  return [

            'success', ' Ending Balance Records added successfuly.'

        ];

    }




                public function dueBalance(Request $request)
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
                          'overdue_balance' => $value->overdue_balance,
                          'due_balance' => $value->due_balance,
                          'due_date' => $value->due_date
            ];
            }
 
            if(!empty($arr)){
                Duebalance::insert($arr);
            }
        }
 

                  return [

            'success', ' Due Balance Records added successfuly.'

        ];

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

 self::makeStatements();

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
         if( $EndingBalanceForSpecificUser['ending_balance'] != null){

        $obj->ending_balance = $EndingBalanceForSpecificUser->ending_balance;           
         }else{
            $obj->ending_balance = 0;
         }

        $obj->customer_name = $nameitself->customer_name;

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


    public function UserStatementsList2($id){
       $month = $id;

       $data = Customerstatement::whereMonth('monthly_statement_date', $month)->where('statement_status', 1)->get();

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
       $duebalance = Duebalance::whereMonth('due_date', $month)->where('cutomer_id', $id)->get();
       $customerstatement = Customerstatement::whereMonth('monthly_statement_date', $month)->where('cutomer_id', $id)->get();
 
       $customerstatementcomments = Customercomments::where('customer_statement_id', $customerstatement->pluck('id'))->get();
       // $collection = Customer::find($id)->collection;

            return response()->json([
                'status' => 'Retrieved all Statements Correctly from' . $month,
                'customer_data' => $data,
                'openingbalance' => $openingbalance,
                'endingbalance' => $endingbalance,
                'discount' => $discount,
                'invoice' => $invoice,
                'collection' => $collection,
                'duebalance' => $duebalance,
                'customerstatement' => $customerstatement,
                'customerstatementcomments' => $customerstatementcomments


                

            ]);




    }



 

public function sendSMS($number,$id,$month,$iditself){



        $sms = AWS::createClient('sns');
    

        $sms->publish([
                'Message' => 'Hello, Check your balance here http://13.53.177.139:4202/authentication/user/'.$id.
                '/month/'.$month,
                'PhoneNumber' => '+02'.$number,    
                'MessageAttributes' => [
                    'AWS.SNS.SMS.SMSType'  => [
                        'DataType'    => 'String',
                        'StringValue' => 'Transactional',
                     ]
                 ],
     

              ]);
        $Q1 = Customerstatement::find($iditself);

        $Q1->statement_status = 1;
        $Q1->save();



    }


    public function showstatement(){
        return view('userStatements');

    }

    public function addComments(Request $request){
        $discount_id = $request->discount_id;
        $discount_comment = $request->discount_comment;


$Q1 = Discount::find($discount_id);
$Q1->discount_comment = $discount_comment;
$Q1->save();



        $endingbalance_id = $request->endingbalance_id;
        $endingbalance_comment = $request->endingbalance_comment;


$Q1 = Endingbalance::find($endingbalance_id);
$Q1->ending_balance_comment = $endingbalance_comment;
$Q1->save();



        $invoice_id = $request->invoice_id;
        $invoice_comment = $request->invoice_comment;


$Q1 = Invoice::find($invoice_id);
$Q1->invoice_comment = $invoice_comment;
$Q1->save();



        $opening_id = $request->opening_id;
        $opening_comment = $request->opening_comment;


$Q1 = Opening_balance::find($opening_id);
$Q1->comment = $opening_comment;
$Q1->save();




        $collection_id = $request->collection_id;
        $collection_comment = $request->collection_comment;


$Q1 = Collection::find($collection_id);
$Q1->collection_comment = $collection_comment;
$Q1->save();



                    return response()->json([
            
             
                'discount record' => $Q1


                

            ]);


    }


     public function addComments2(Request $request){
        $customer_statement_id = $request->customer_statement_id;
        $difference_in_payment_comment = $request->difference_in_payment_comment;
        $difference_in_amount_comment = $request->difference_in_amount_comment;
        $payment_not_documented_comment = $request->payment_not_documented_comment;
        $invoice_not_documented_comment = $request->invoice_not_documented_comment;
        $other_comment = $request->other_comment;




$Q1 = new Customercomments;
$Q1->customer_statement_id = $customer_statement_id;
$Q1->difference_in_payment_comment = $difference_in_payment_comment;
$Q1->difference_in_amount_comment = $difference_in_amount_comment;
$Q1->payment_not_documented_comment = $payment_not_documented_comment;
$Q1->invoice_not_documented_comment = $invoice_not_documented_comment;
$Q1->other_comment = $other_comment;
$Q1->save();

                    return response()->json([
            
             
                'discount record' => $Q1


                

            ]);


    }
 }
