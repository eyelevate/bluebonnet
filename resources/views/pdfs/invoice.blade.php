@extends('layouts.themes.pdfs.layout')

@section('content')

	<div class="container-fluid">
		<div class="row-fluid clearfix" >
			<div class="col-5" style="display: inline-block;">
				<h4 style="font-size:20px !important; font-weight:bold !important;">{{ $company->name }}</h4>
				<address style="line-height: 1; font-weight:100 !important; font-size:15px !important;">
					{{ $company->street }}, Suite {{ $company->suite }}<br>
					{{ ucfirst($company->city) }}, {{ strtoupper($company->state) }} {{ $company->zipcode }}<br>
					<abbr title="Phone">P:&nbsp;{{ $company->phone }}</abbr> 
				</address>
			</div>
			<div class="col-6 text-right" style="display: inline-block">
				<h3 style="font-size:30px !important;">INVOICE</h3>
				<strong style="font-size:30px !important;">#{{ $inv->id_formatted }}</strong>
			</div>
			
		</div>

		<div class="row-fluid clearfix" >
			<div class="col-5" style="display: inline-block;">
				<h4 style="font-size:20px !important; font-weight:bold !important;">{{ $inv->full_name }}</h4>
				<address style="line-height: 1; font-weight:100 !important; font-size:15px !important;">
					{{ $inv->full_street }}<br>
					{{ ucfirst($inv->city) }}, {{ strtoupper($inv->state) }} {{ $inv->zipcode }}<br>
					<abbr title="Phone">P:&nbsp;{{ $inv->phone_formatted }}</abbr> 
				</address>
			</div>

			
		</div>

		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed">
				<thead>
					<tr>
						<th>Quantity</th>
						<th>Description</th>
						<th>Subtotal</th>
					</tr>
				</thead>
				<tbody>
				@if(count($inv) > 0)
					@foreach($inv->invoiceItems as $ii)
					<tr>
						<td>{{ $ii->quantity }}</td>
						<td>{{ $ii->inventoryItem->name }} - {{ $ii->inventoryItem->desc }}</td>
						<td>{{ $ii->subtotal_formatted }}</td>
					</tr>
					@endforeach
				@endif
				</tbody>
				<tfoot>
					<tr>
						<th class="text-right" colspan="2" style="font-weight:bold !important;">Quantity:</th>
						<td>{{ $inv->quantity }}</td>
					</tr>
					<tr>
						<th class="text-right" colspan="2" style="font-weight:bold !important;">Subtotal:</th>
						<td>{{ $inv->subtotal_formatted }}</td>
					</tr>
					<tr>
						<th class="text-right" colspan="2" style="font-weight:bold !important;">Tax:</th>
						<td>{{ $inv->tax_formatted }}</td>
					</tr>
					<tr>
						<th class="text-right" colspan="2" style="font-weight:bold !important;">Shipping:</th>
						<td>{{ $inv->shipping_total_formatted }} <strong style="font-weight:bold !important;">({{ $inv->shipping_type }})</strong></td>
					</tr>
					<tr>
						<th class="text-right" colspan="2" style="font-weight:bold !important;">Total Due:</th>
						<td style="font-weight:bold !important;">{{ $inv->total_formatted }}</td>
					</tr>
					@if($inv->status > 2)
					<tr>
						<th class="text-right" colspan="2" style="font-weight:bold !important;">Tendered:</th>
						<td style="font-weight:bold !important;">{{ $inv->tendered_formatted }}</td>
					</tr>
					<tr>
						<th class="text-right" colspan="2" style="font-weight:bold !important;">Due:</th>
						<td style="font-weight:bold !important;">{{ $inv->due_formatted }}</td>
					</tr>
					@endif
				</tfoot>
			</table>
		</div>
		<div class="row-fluid clearfix" >
			<div class="col-12">
				<p class="text-center" style="font-size:14px !important; font-weight:lighter !important;">Make all checks payable to <strong style="font-weight:bold !important;">{{ $company->name }}</strong></p>
				<p class="text-center" style="font-size:14px !important; font-weight:lighter !important;">If you have any questions or concerns please call us at <strong style="font-weight:bold !important;">{{ $company->phone }}</strong></p>
			</div>
		</div>

	</div>
</div>

@endsection
