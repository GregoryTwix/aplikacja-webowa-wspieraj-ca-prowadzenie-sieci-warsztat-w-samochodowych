@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="box">
                <div class="w-50">
                    <table class="full">
                        <td>
                            <p>Warsztat samochodowy</p>
                            <p>{{$invoice->workshop->address}}</p>
                        </td>
                    </table>
                </div>
                <div class="w-50">
                    <div class="gray-stripe">Faktura VAT</div>
                    <span class="text-center"> Faktura numer {{$invoice->id}} </span>
                    <p>Data dostawy/wykonania usługi: {{$invoice->created_at}}</p>
                </div>
            </div>
            <div class="box">
                <div class="w-50">
                    <p><b>Nabywca</b></p>
                    <p>{{$invoice->user->name}}</p>
                </div>
            </div>
            <div class="box">
                <div> <p>Opis &nbsp;</p> </div>
                <div> <p> {{$invoice->comment}}</p> </div>
            </div>
            <div class="box">
                <div class="w-100">
                    <table class="full">
                        <tr>
                            <td>Lp.</td>
                            <td>Nazwa towaru </td>
                            <td>PKWiU </td>
                            <td>Ilość</td>
                            <td>J.m</td>
                            <td>Vat</td>
                            <td>Cena brutto</td>
                            <td>Wartość brutto</td>
                        </tr>
                        <tr style="border-top:1px solid #CCC;">
                            <td>1 </td>
                            <td>{{$invoice->name}} </td>
                            <td>29	 </td>
                            <td>1</td>
                            <td>szt</td>
                            <td>23%</td>
                            <td>{{$brutto}} zł</td>
                            <td>{{$brutto}} zł</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="box">
                <div class="w-50">
                    <table class="half">
                        <tr>
                            <td>Forma płatności</td>
                            <td>Termin płatności</td>
                            <td>Kwota</td>

                        </tr>
                        <tr style="border-top:1px solid #CCC;">
                            <td>Przelew</td>
                            <td>{{$paymentDate}}</td>
                            <td>{{$brutto}} zł </td>
                        </tr>
                    </table>
                </div>
                <div class="w-50">
                    <table class="half">
                        <tr>
                            <td>Netto</td>
                            <td>VAT</td>
                            <td>Brutto</td>

                        </tr>
                        <tr style="border-top:1px solid #CCC;">
                            <td>{{$invoice->order->cost}} zł</td>
                            <td>23%</td>
                            <td>{{$brutto}} zł</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="box">
                <div class="w-100">
                    <p>Podstawa prawna: Ustawa z dnia 11 marca 2014 o podatku od towarów i usług art.106e
                    </p>
                </div>
            </div>
            <div class="box">
                <a href="{{route('invoices.download', [$workshopId, $invoice->id])}}"><button class="btn btn-success">Pobierz</button></a>
            </div>

            <style>
                .box {
                    margin-top:20px;
                    display: flex;
                    align-items: stretch;
                }
                .w-50 {
                    width:50%;
                }
                .w-50 {
                    width:100%;
                }
                table.full {
                    border: 1px solid #CCC;
                    border-collapse: collapse;
                    width:97%;
                    table-layout: fixed;
                    overflow-wrap: break-word;
                }

                table.half {
                    border: 1px solid #CCC;
                    border-collapse: collapse;
                    width:49%;
                    table-layout: fixed;
                    overflow-wrap: break-word;
                }
                td {
                    padding:10px;
                }
                .gray-stripe {
                    padding:1px;
                    text-align:center;
                    background:gray;
                }
                .text-center {
                    text-align:center;
                }
            </style>

        </div>
    </div>
@endsection
