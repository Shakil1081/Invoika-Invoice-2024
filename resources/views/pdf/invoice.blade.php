<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .invoice-box {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            padding: 20px;
        }

        .invoice-head{
            width: 100%;
            margin-bottom: 20px;
        }
        .invoice-head table {
            width: 100%;
            table-layout: fixed;
        }

        p{
            margin: 0;
        }

        .title{
            color: #2A7BB8;
            font-weight: 700;
            margin: 0;
        }

        .title-area{
            background-color: #e0e9f1;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        .invoice-client-info table {
            width: 100%;
            margin-bottom: 10px;
            table-layout: fixed;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        /* Horizontal row dividing lines */
        tr {
            border-bottom: 1px solid #E2E8F0;
        }

        /* Remove vertical borders */
        th, td {
            border: none;
        }

        .invoice-footer table {
            width: 100%;
            table-layout: fixed;
        }

        .notes {
            width: 40%;
            vertical-align: top;
        }

        .amount-area {
            display: block;
            width: 100%;
        }

        .amount-area .amount-break {
            width: 100%;
            display: table;
        }
        .amount-name {
            display: table-cell;
            padding: 5px;
            vertical-align: top;
        }
        .amount-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            border-top: 1px solid #E2E8F0;
            padding-top: 10px;
        }
    </style>
</head>
<body>

<div class="invoice-box">
    <div class="invoice-head">
        <table>
            <tr>
                <td>
                    <h2 class="title">INVOICE</h2>
                    <p class="title">Subject: <span>[Subject]</span></p>
                </td>
                <td style="text-align: right;">
                    <img src="your-logo.png" alt="Your Logo Here" width="100px">
                </td>
            </tr>
        </table>
    </div>

    <div class="title-area">
        <p class="title"> Business and Client Information</p>
    </div>

    <div class="invoice-client-info">
        <table>
            <tr>
                <td>
                    <strong>From:</strong><br>
                    Name: {{ config('app.name') }}<br>
                    Email: test@gmail.com<br>
                    Address: TEST<br>
                    Phone: 01974435433<br>
                    Business Number: 01974435433
                </td>
                <td>
                    <strong>Bill to:</strong><br>
                    Name: {{ $addInvoiceMaster->select_client->company_name ?? '' }}<br>
                    Email: {{ $addInvoiceMaster->select_client->email ?? '' }}<br>
                    Address: {{ $addInvoiceMaster->select_client->address ?? '' }}<br>
                    Phone: {{ $addInvoiceMaster->select_client->contact_no ?? '' }}<br>
                    Postal Code: {{ $addInvoiceMaster->select_client->postalcode ?? '' }}
                </td>
            </tr>
        </table>
    </div>

    <div class="title-area">
        <p class="title"> Invoice Information</p>
    </div>
    <div class="invoice-client-info">
        <table>
            <tr>
                <td>
                    <strong class="title">Invoice#: </strong>  {{ $addInvoiceMaster->invoice_number }}<br>
                    <strong class="title">Issue Date: </strong> {{ $addInvoiceMaster->inv_date }}<br>
                    <strong class="title">Due Date: </strong> xx.xx.xxxx<br>
                </td>
                <td>
                    <strong class="title">Payment Method: </strong> ------<br>
                    <strong class="title">Other Payment Terms: </strong> -------<br>
                    <strong class="title">Payment Status: </strong> <span class="text-danger">{{ $addInvoiceMaster->payment_status->payment_status ?? '' }}</span><br>
                </td>
            </tr>
        </table>
    </div>

    <div class="title-area">
        <p class="title"> Invoice Items</p>
    </div>
    <table>
        <tr>
            <th class="title">No.</th>
            <th class="title" width="40%">Item Description</th>
            <th class="title">Rate</th>
            <th class="title">QTY</th>
            <th class="title">Amount In</th>
        </tr>
        {{ $sl=1 }}
        @foreach($addInvoiceMaster->invoice_details as $invoiceDerail)
            <tr>
                <td>{{ $sl++ }}</td>
                <td>{{ $invoiceDerail->product_details }}</td>
                <td>{{ $invoiceDerail->rate }}</td>
                <td>{{ $invoiceDerail->quantity }}</td>
                <td>{{ $invoiceDerail->amount }}</td>
            </tr>
        @endforeach
    </table>

    <div class="invoice-footer">
        <table>
            <tr>
                <td class="notes">
                    <p class="title">Notes:</p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis minus deleniti, inventore facilis sequi,
                </td>
                <td class="amount-area">
                    <div class="amount-break">
                        <div class="amount-name">
                            Subtotal
                            <h2 class="title"> {{ $addInvoiceMaster->sub_total }}</h2>
                        </div>
                        <div class="amount-name">
                            Discount
                            <h2 class="title">{{ $addInvoiceMaster->discount }}</h2>
                        </div>
                        <div class="amount-name">
                            Taxes
                            <h2 class="title">{{ $addInvoiceMaster->tax }}</h2>
                        </div>
                        <div class="amount-name">
                            Shipping Charge
                            <h2 class="title">{{ $addInvoiceMaster->shipping_charge }}</h2>
                        </div>
                    </div>
                    <div class="amount-total">
                        Invoice Total <h2 class="title">{{ $addInvoiceMaster->total_amount }}</h2>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>
