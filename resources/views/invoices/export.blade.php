<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
    <div class="row">
            <div class="col-xs-6">
                <table class="table-bordered" style="width:100% !important;">
                    <td>
                        <p>Warsztat samochodowy</p>
                        <p>{{$invoice->workshop->address}}</p>
                    </td>
                </table>
            </div>
            <div class="col-xs-6">
                <div class="gray-stripe">Faktura VAT</div>
                <span class="text-center"> Faktura numer {{$invoice->id}} </span>
                <p>Data dostawy/wykonania usługi: {{$invoice->created_at}}</p>
            </div>
        </div>

    <div class="row">
        <div class="col-xs-6">
            <p><b>Nabywca</b></p>
            <p>{{$invoice->user->name}}</p>
        </div>
        <div class="col-xs-6">
            <div> <p>Opis &nbsp;</p> </div>
            <div> <p> {{$invoice->comment}}</p> </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
                <table class="table-bordered" style="width:100% !important;">
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

<div class="row">
    <div class="col-xs-12">
        <table class="table-bordered">
            <tr>
                <td>Forma płatności</td>
                <td>Termin płatności</td>
                <td>Kwota</td>

            </tr>
            <tr>
                <td>Przelew</td>
                <td>{{$paymentDate}}</td>
                <td>{{$brutto}} zł </td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <table class="table-bordered">
            <tr>
                <td>Netto</td>
                <td>VAT</td>
                <td>Brutto</td>

            </tr>
            <tr>
                <td>{{$invoice->order->cost}} zł</td>
                <td>23%</td>
                <td>{{$brutto}} zł</td>
            </tr>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <p>Podstawa prawna: Ustawa z dnia 11 marca 2014 o podatku od towarów i usług art.106e</p>
    </div>
</div>

    <style>
        .row {
            margin-top:25px !important;
        }

        body { font-family: DejaVu Sans, sans-serif; font-size:10px;}

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
