<?php

namespace App\Http\Controllers;

use App\Http\Requests\Application\PaymentRequest;
use App\Services\PaymentService;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function __construct(protected PaymentService $paymentService)
    {
    }
    public function index()
    {
        if (!auth()->user()->medicalHistory) {
            return to_route('application.medical-history')->with('warning', 'You must Upload your Medical Records First');
        }
        return view('payment');
    }


    public function generateInvoice(PaymentRequest $request)
    {
        $response = auth()->user()?->payment;
        if ($response) {
            return view('invoice')->with(['success', $response->status, 'RRR' => $response->RRR]);
        }

        $data = $request->validated();

        $data['transactionId'] = $this->generateTransactionId();



        $valuesToHash = "2547916" . "4430731" .
            $data['transactionId'] . $data['amount'] . "1946";
        $data['apiHash'] = hash('sha512', $valuesToHash);
        try {
            $response = $this->paymentService->generateInvoice($data);

            $data['RRR'] = $response->RRR;
            $data['statuscode'] = $response->statuscode;
            $data['status'] = $response->status;

            $this->paymentService->createPayment($data);

            // return view('nds.payment')->with($data);
            return view('invoice')->with(['success', $response->status, 'RRR' => $response->RRR]);
        } catch (\Exception $ex) {
            Log::alert($ex->getMessage());
            return redirect()->back()->with('error', 'Something went wrong:' . $response->status);
        }
    }
    public function handleResponse(Request $request)
    {
        // Retrieve the response data from the request
        $response = json_decode($request->input('response'), true);
        $rrr = $response['paymentReference'];
        try {
            $this->checkTransactionStatus($rrr);
            return  view('invoice')->with(['success_mesaage' => 'Payment Successful']);
        } catch (\Exception $ex) {
            Log::alert($ex->getMessage());
            return redirect()->back()->withErrors(['error_message' => 'Something went wrong:']);
        }




        // Return a response or redirect as per your application logic
    }
    public function checkTransactionStatus($rrr)
    {
        try {

            $response = PaymentService::getTransactionStatus($rrr);
            if ($response->status == '00') {

                PaymentService::updateTransactionStatus($response->status, $response->RRR);
                return  to_route('application.payment')->with(['success_mesaage' => 'Payment Successful']);
            }

            PaymentService::updateTransactionStatus($response->status, $response->RRR);

            // return view('nds.payment')->with($data);
            return redirect()->back()->with(['success_message' => 'Done']);
        } catch (\Exception $ex) {
            Log::alert($ex->getMessage());
            return redirect()->back()->withErrors(['error_messsage' => 'Something went wrong:' . $response->message]);
        }
    }
    public function exportReceipt()
    {




        $pdf = PDF::loadView('payment-pdf');



        return $pdf->download('invoice.pdf');
    }


    private function generateTransactionId(): string
    {
        $transcId = substr(md5(uniqid(rand(), true)), 0, 4);
        $tran = strtoupper($transcId);
        return "Hajj" . $today = date("Ymd") . $tran;
    }
}
