@extends('layouts.themes.backend.layout')
@section('scripts')
<script type="text/javascript" src="{{ mix('/js/views/admins/index.js') }}"></script>

@endsection
@section('content')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Home</li>
</ol>

<div class="container-fluid">
    <div class="animated fadeIn">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Active Invoices
                    </div>
                    <div class="card-block">
                        <div class="nav">
                            @if (count($invoiceSummary) > 0)
                            @foreach($invoiceSummary as $key => $summary)
                            @if($summary->status == 2)
                            <div class="col-sm-6 nav-item">
                                <a class="nav-link active" href="#summary-{{ $summary->status }}">
                                    <div class="callout callout-danger">
                                        <small class="text-muted">Pending</small>
                                        <br>
                                        <strong class="h4">{{ $summary->total }}</strong>
                                        <div class="chart-wrapper">
                                            <canvas id="sparkline-chart-5" width="100" height="30"></canvas>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @elseif($summary->status == 3)
                            <div class="col-sm-6 nav-item">
                                <a class="nav-link" href="#summary-{{ $status }}">
                                    <div class="callout callout-warning">
                                        <small class="text-muted">Paid</small>
                                        <br>
                                        <strong class="h4">{{ $summary->total }}</strong>
                                        <div class="chart-wrapper">
                                            <canvas id="sparkline-chart-6" width="100" height="30"></canvas>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            @endif
                            <!--/.col-->
                            @endforeach
                            @endif
                        </div>

                        <div class ="tab-content">
                            @if (count($invoiceDetails) > 0)
                            @php
                            $idx = 0;                            
                            @endphp
                            @foreach($invoiceDetails as $key => $details)
                            @php
                            $idx++;                            
                            @endphp
                            <div class="tab-pane {{ ($idx == 1) ? 'active' : '' }}" id="summary-{{ $key }}" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-hover table-outline mb-0">
                                        <thead class="thead-default col-12">
                                            <tr>
                                                <th>Invoice</th>
                                                <th>Client</th>
                                                <th>Item</th>
                                                <th>Status</th>
                                                <th>Method</th>
                                                <th>Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($details) > 0)
                                            @foreach($details as $dkey => $detail)

                                            <tr>
                                                <td class="text-center">{{ $detail->id }}</td>
                                                <td>{{ $detail->user_id }}</td>
                                                <td>test</td>
                                                <td>{{ $detail->status }}</td>
                                                <td>test</td>
                                                <td>{{ $detail->created_at }}</td>
                                                <td><a href="{{ route('invoice.edit',$detail->id) }}" class="btn btn-secondary">Edit</a></td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            @endforeach
                            @endif


                        </tbody>
                    </table>
                </div>   
            </div> 
        </div>

    </div>
</div>
<!--/.col-->
</div>
        <!--/.row-->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Top 10 Selling Items
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <!--/.col-->
                            <div class="col-12">
                                <ul class="icons-list">
                                @if (count($topTenInvoiceItem))
                                    @foreach($topTenInvoiceItem as $key => $value)
                                    <li>

                                        <i class="" ><img src="{{ $value->inventoryItem->img_src }}" style="height:40px;"></i>
                                        <div class="desc">
                                            <div class="title"><strong>#{{ $key + 1 }}</strong></div>
                                            <small>{{ $value->inventoryItem->name }} - {{ $value->inventoryItem->desc }}</small>
                                        </div>
                                        <div class="value">
                                            <div class="small text-muted">Total Sold</div>
                                            <strong>{{ $value->total }}</strong>
                                        </div>
                                        <div class="actions">
                                            <a href="{{ route('inventory_item.edit',$value->inventoryItem->id) }}" class="btn"><i class="icon-settings"></i>
                                            </a>
                                        </div>
                                    </li>
                                    @endforeach
                                @endif

                                    <li class="divider text-center">
 
                                    </li>
                                </ul>
                            </div>
                            <!--/.col-->
                        </div>
                        <!--/.row-->
                        
                    </div>
                </div>
            </div>
            <!--/.col-->
        </div>
        <!--/.row-->
    </div>
</div>
<!-- /.conainer-fluid -->
@endsection

@section('modals')

@endsection
