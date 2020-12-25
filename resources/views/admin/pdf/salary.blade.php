<!DOCTYPE html>
<html>
<head>
	<title>Salary Slip</title>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		.contrainer{
			position: absolute;
			top: 5%;
			left: 10%;
			background: #F9F1E5;;
			width:900px;
  			height:670px;
			border: 10px solid #D1CCCE;
			margin: 5px;
			box-shadow: 0px 5px 10px 20px;
		}
		.header{
			font-size: 40px;
			font-weight: bold;
			border: 2px solid #D1CCCE;
			background-color: #F9F1E5;
			text-decoration: underline;
			text-align: center;
			color: blue;
			opacity: 0.6;
			font-family: serif;
		}
		.address{
			text-align: center;
			font-size: 20px;
			color: black;
			text-transform: capitalize;
		}
		.article{
			font-size: 15px;
			color: black;
			text-transform: capitalize;
			text-align: center;
			margin: 5px;
		}
		.article>h2{
			font-size: 20px;
			display: inline;
		}
		.table{
			text-align: center;
			margin: auto;
   			width: 80% !important; 
   			height: auto;
		}
		.article2{
			font-size: 15px;
			color: black;
			text-transform: capitalize;
			margin: 55px;

		}
		.article2>h2{
			font-size: 15px;
			display: inline;
		}
		.article3{
			font-size: 15px;
			color: black;
			text-transform: capitalize;
			margin: 25px;
			position: absolute;
			top: 62%;
			right: 5%;

		}
		.article3>h2{
			font-size: 15px;
			display: inline;
			border-top: 2px solid black;

		}
		.signature{
			border-top: 2px solid black;
			margin: 50px;
			width: 22%;
			position: absolute;
			top: 80%;
		}
		.signature>h4{
			display: inline;
			font-size: 15px;
		}
		.director{
			margin: 50px;
			width: 25%;
			position: absolute;
			top: 80%;
			right: 5%;
		}
		.director>h4{
			font-size: 20px;
		}

	</style>

</head>

<body>
	<div class="contrainer">
		<header class="header">Employee Management System</header>
		<address class="address">
			<p>Address:Sylhet</p> 
			<h5>Salary Slip</h5>
		</address>
		@php($i=1)

		<article class="article">
			<h2>Employee Name:</h2>
			<h2>{{ $salary_slip->user->name }}</h2>
		</article>
		<article class="article">
			<h2>Desgination:</h2>
			<h2>{{ $salary_slip->user->designation }}</h2>
		</article>
		<article class="article">
			<h2>Month:</h2>
			<h2>{{ $salary_slip->month }}</h2>
		</article>

		<table class="table table-bordered align-top">
            <thead class="thead-light">
              <tr>
                <th>Payslip No</th>
                <th>Net Salary</th>
                <th>Issue Date</th>
                <th>Payment Status</th>
              </tr>
            </thead>

            <tbody>
                <tr>
	                <td>{{$i++}}</td>
	                <td>{{ $salary_slip->salary }}</td>
	                <td>{{ $salary_slip->created_at }}</td>
	                <td class="font-weight-bold">{{ $salary_slip->status }}</td>
                </tr>
                <hr>
            </tbody>

        </table>
        <article class="article2">
			<h2>Cheque No:</h2>
			<h2>--------------------</h2>
		</article>
		<article class="article2">
			<h2>Date:</h2>
			<h2>-----------------------</h2>
		</article>

		<article class="article3">
			<h2>Name Of Bank:</h2>
		</article>

		<section class="signature">
			<h4>Signature Of The Employee</h4>
		</section>

		<section class="director">
			<h4>Director:</h4>
		</section>
	</div>
	
</body>
</html>
