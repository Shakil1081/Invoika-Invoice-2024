<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentProcessRequest;
use App\Models\AddInvoiceMaster;
use App\Models\Payment;
use App\Models\PaymentType;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Stripe\PaymentIntent;
use Stripe;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    public function showInvoiceList()
    {
        $invoiceList = AddInvoiceMaster::with('invoice_details', 'payments')->get();
        return view('admin.makePayment.invoiceList', compact('invoiceList'));
    }

    public function showPaymentPage($invoiceId)
    {
        $invoice = AddInvoiceMaster::with('invoice_details')->find($invoiceId);
        $paymentTypes = PaymentType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.makePayment.payment', compact('invoice','paymentTypes'));
    }

    public function processPayment(PaymentProcessRequest $request, $invoiceId)
    {
        $amount = $request->input('amount');
        $paymentMethod = $request->input('payment_method');
        $tax = $request->input('tax');

        session(['payment_amount' => $amount]);

        if ($paymentMethod == 'Card') {
            return redirect()->route('admin.payment.confirmation', ['invoice' => $invoiceId]);
        } else {
            $this->createPaymentRecord($invoiceId, $amount, $paymentMethod);
            return redirect()->route('invoice.list')->with('success', 'Payment recorded successfully.');
        }
    }

    public function paymentMakePage($invoiceId)
    {
        $amount = session('payment_amount');

        if (!$amount) {
            return redirect()->route('admin.invoice.payment')->with('error', 'No payment data found.');
        }
        $invoice = AddInvoiceMaster::find($invoiceId);

        return view('admin.makePayment.paymentConfirmation', compact('amount','invoice'));
    }

    private function createPaymentRecord($invoiceId, $amount, $paymentMethod, $paymentTransactionId = null)
    {
        $invoice = AddInvoiceMaster::find($invoiceId);
        $dueAmount = $invoice->total_amount - $invoice->payments->sum('amount_paid') - $amount;
        $transactionId = uniqid('txn_');

        Payment::create([
            'invoice_id' => $invoiceId,
            'amount_paid' => $amount,
            'due_amount' => $dueAmount,
            'payment_method' => $paymentMethod,
            'transaction_id' => $transactionId,
            'payment_transaction_id' => $paymentTransactionId,
        ]);
    }

    public function finalizePayment(Request $request, $amount, $invoice)
    {
        $invoice = AddInvoiceMaster::with('invoice_details')->find($invoice);

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $payment = \Stripe\Charge::create([
                "amount" => $amount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment for Invoice ID: " . $invoice->id,
            ]);

            if ($payment->status === 'succeeded') {
                $this->createPaymentRecord($invoice->id, $amount, 'Card', $payment->id);

                return redirect()->route('admin.invoice.list');
            } else {

                return redirect()->route('admin.invoice.list')->with('error', 'Payment failed: ' . $payment->failure_message);
            }
        } catch (\Stripe\Exception\CardException $e) {

            return redirect()->route('admin.invoice.list')->with('error', 'Payment failed: ' . $e->getMessage());
        } catch (\Exception $e) {

            return redirect()->route('admin.invoice.list')->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }

    public function paymentVouchers($invoiceId)
    {
        $payments = Payment::where('invoice_id',$invoiceId)->get();
        return view('admin.makePayment.paymentVouchers', compact('payments'));
    }

    public function paymentVoucherDownload($id)
    {
        $payment = Payment::with('addInvoiceMaster')->find($id);

        $pdf = PDF::loadView('pdf.payment_voucher', $payment);

        $fileName = 'invoice_' . $payment->addInvoiceMaster->invoice_number . '_' . time() . '.pdf';
        $filePath = storage_path('app/invoices/' . $fileName);

        $pdf->download($fileName);

        return $filePath;
    }
}
