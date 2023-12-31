@extends('adminlte::page')

@section('title', 'Payment')

@section('content_header')
    <h1>Kebbi State Umrah Application</h1>
@stop

@section('content')




{{-- Themes --}}

<x-adminlte-card title="Payment" theme="lightblue" theme-mode="outline"
    icon="fas fa-lg fa-credit-card" header-class="text-uppercase rounded-bottom border-info">
    @include('flash-messages')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="post" action="{{route('application.invoice')}}" >
        @csrf
        <div class="row">

            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div id="invoice">

                            <div class="toolbar hidden-print">
                                <div class="text-end">
                                    <button type="button" class="btn btn-dark"><i class="fa fa-print"></i> Print</button>
                                    <a href="{{route('umrah.invoice')}}" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export as PDF</a>

                                </div>
                                <hr>
                            </div>
                            <div class="invoice overflow-auto">
                                <div style="min-width: 600px">
                                    <header>
                                        <div class="row">
                                            <div class="col">
                                                <a href="javascript:;">
                                                                <img src="assets/images/logo-icon.png" width="80" alt="">
                                                            </a>
                                            </div>
                                            <div class="col company-details">
                                                <h2 class="name">
                                                    <a target="_blank" href="javascript:;">
                                                Ministry For Religious Affairs
                                                </a>
                                                </h2>
                                                <div>Kebbi State</div>
                                                <div>07032137776</div>
                                                <div>company@example.com</div>
                                            </div>
                                        </div>
                                    </header>
                                    <main>
                                        <div class="row contacts">
                                            <div class="col invoice-to">
                                                <div class="text-gray-light">INVOICE TO:</div>

                                                <h2 class="to">{{auth()->user()->name}}</h2>

                                                <div class="address">{{auth()->user()->biodata->address}}</div>
                                                <div class="email"><a href="mailto:john@example.com">{{auth()->user()->email}}</a>
                                                </div>
                                            </div>
                                            <div class="col invoice-details">
                                                <h1 class="invoice-id">INVOICE {{ Str::substr(auth()->user()->email, 0, 3) . "Hajj" .Str::substr(auth()->user()->biodata->phone, 5, 3)}}</h1>
                                                <div class="date">Date of Invoice: {{ date('d-m-Y') }}</div>
                                                <div class="date">Due Date: -</div>
                                            </div>
                                        </div>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th class="text-left">DESCRIPTION</th>
                                                    <th class="text-right">PRICE</th>
                                                    <th class="text-right">Payment For</th>
                                                    <th class="text-right">TOTAL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="no">1</td>
                                                    <td class="text-left">
                                                        <h3>
                                                            <a target="_blank" href="javascript:;">
                                                   Payment for Umrah
                                                    </a>
                                                        </h3>
                                                        <a target="_blank" href="javascript:;">
                                                     for the year  {{date('Y')}}
                                                   </a> Note: This covers all your Expences</td>
                                                    <td class="unit">N1,000000</td>
                                                    <td class="qty">Umrah</td>
                                                    <td class="total">$0.00</td>
                                                </tr>


                                            </tbody>
                                            <tfoot>
                                                <tr>

                                                    <td colspan="2"></td>
                                                    <td colspan="2">Payment Status</td>
                                                    @if (auth()->user()->payment?->status === '00')
                                                    <td>Paid</td>
                                                    @else
                                                    <td>Pending</td>
                                                    @endif
                                                </tr>
                                                @if (auth()->user()->payment?->status === '00')
                                                <tr>
                                                    <td colspan="2"></td>
                                                    <td colspan="2">Remita Number</td>
                                                    <td>{{auth()->user()->payment->RRR}}</td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <td colspan="2"></td>
                                                    <td colspan="2">GRAND TOTAL</td>
                                                    <td>N1000000.00</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="thanks">Thank you!</div>
                                        <div class="notices">
                                            <div>NOTICE:</div>
                                            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                                        </div>
                                    </main>
                                    <footer>Invoice was created on a computer and is valid without the signature and seal.</footer>
                                </div>
                                <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                                <div></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
            @php
                   $full_name = auth()->user()->name;
$name_parts = explode(" ", $full_name, 2);

$first_name = $name_parts[0];
$last_name = isset($name_parts[1]) ? $name_parts[1] : '----';
            @endphp


        <input type="hidden" name="amount" value="1000000"/>
        <input type="hidden" name="email" value={{auth()->user()->email}}>
        <input type="hidden" name="payerPhone" value={{auth()->user()->biodata->phone}}>
        <input type="hidden" name="description" value="Payment For Umrah">
        <input type="hidden" name="firstName" value={{$first_name}}>
        <input type="hidden" name="lastName" value={{$last_name}}>
        @if (auth()->user()->payment?->status === '00')
        <a href="" class="btn btn-success">Print Receipt</a>

        @else
        <x-adminlte-button class="btn-flat" type="submit" label="Generate Invoice" theme="success" icon="fas fa-lg fa-save"/>
        @endif



    </form>
</x-adminlte-card>



@stop

@section('css')
    <link rel="stylesheet" href="/css/payment.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
