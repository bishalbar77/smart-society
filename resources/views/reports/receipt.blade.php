<html>
<head>
<title>Invoice</title>
<style>
*{
	color:black;
	font-family:  Helvetica;
	font-size:medium;
}
#grad1 {
    background-color:#65E42C ;
        width: 280px;
        height: 47px;
        border-bottom: 1px solid #65E42C ;
        -webkit-transform:
            translateY(-10px)
            translateX(28px)
            rotate(29deg);
        position: absolute;
        top: 33px;
		right: 0;	
        text-align:center;
        font-size:40px;
        color:white;
}
#in_no{
    background-color: #f2f2f2;
    font-family:  Helvetica;
	font-size:medium;
}

#cin{
	background-color: #f2f2f2;
}
.invoice_num{
	font-size:25px;
	line-height: 1cm;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
	border: 1px solid #dddddd;
  	padding: 8px;
}

.tb-color{
	background-color: #f2f2f2;
	}

th {
  background-color: #f2f2f2;
  color: black;
}
.centric {
    text-align: center ;
    font-size: 55px;
}
</style>
</head>
<body>
<br>
<div class="row centric"><h1><b>Society Debit Receipt</b></h1></div>
<div class="d-flex flex-column-fluid">
<div class="container">

    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>{{ $sale->name }}</strong>
                        <br />
                        {{ $sale->email }}
                        <br />
                        <abbr title="Phone">Ph:</abbr> {{ $sale->phone }}
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>{{strftime("%d %b %Y",strtotime($sale->txt_dat))}}</em>
                    </p>
                    <p>
                        <em>Receipt #: 345226{{ $sale->id }}W</em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Flat Description</th>
                            <th>Months</th>
                            <th class="text-center">Paid</th>
                            <th class="text-center">Total({{ $sale->month}} months)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9"><em>{{ $sale->flat_no }} </em></td>
                            <td class="col-md-1" style="text-align: center"> {{ $sale->month}} months</td>
                            <td class="col-md-1" style="text-align: center">{{ $sale->txt_amount}}</td>
                            <td class="col-md-1" style="text-align: center">{{ $sale->txt_amount}}</td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"  style="text-align: center">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>Tax: </strong>
                            </p></td>
                            <td class="text-center"  style="text-align: center">
                            <p>
                                <strong>Rs. {{ $sale->txt_amount}}</strong>
                            </p>
                            <p>
                                <strong>Rs. 00.00</strong>
                            </p></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"  style="text-align: center"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger"  style="text-align: center"><h4><strong>Rs. {{ $sale->txt_amount}}</strong></h4></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div>
</body>
</html>