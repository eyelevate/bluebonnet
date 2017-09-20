@extends('layouts.themes.backend.layout')


@section('styles')

@endsection

@section('scripts')
<script type="text/javascript" src="{{ mix('/js/views/reports/years.js') }}"></script>

@endsection

@section('content')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('report.index') }}">Reports</a></li>
    <li class="breadcrumb-item active">Year</li>
</ol>
<div class="container-fluid">
    
    <bootstrap-card use-body="true" use-footer="true">
        <template slot="body">
            <h3 class="text-center">Year In Review</h3>
            <div class="chart-wrapper col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:300px;margin-top:40px;">
                <canvas id="main-chart" class="chart" height="300"></canvas>
            </div>
            <hr/>
            <bootstrap-control
                use-label="true"
                label="Select Year"
            >
                <template slot="control">
                    <select name="week" class="form-control" v-model="thisYear" @change="setYear">
                        <option :value="key" v-for="year, key in years">@{{ year }}</option>

                    </select>    
                </template>
            </bootstrap-control>

            <div class="table-responsive">
                <table class="table table-condensed table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Invoice</th>
                            <th>Subtotal</th>
                            <th>Tax</th>
                            <th>Shipping</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                      <tr v-for="invoice in invoices">
                        <td><a target="__blank" :href="'/invoices/'+invoice.id+'/edit'">@{{ invoice.id_formatted }}</a></td>
                        <td>@{{ invoice.subtotal }}</td>
                        <td>@{{ invoice.tax }}</td>
                        <td>@{{ invoice.shipping_total }}</td>
                        <td>@{{ invoice.total }}</td>
                    </tr>
                    </tbody>
                    <tfoot v-for="total in totals">

                        <tr>
                            <th class="text-right" colspan="4">Quantity:</th>
                            <td>@{{ total._quantity }}</td>
                        </tr>
                        <tr>
                            <th class="text-right" colspan="4">Subtotal:</th>
                            <td>@{{ total.subtotal }}</td>
                        </tr>
                        <tr>
                            <th class="text-right" colspan="4">Tax:</th>
                            <td>@{{ total.tax }}</td>
                        </tr>
                        <tr>
                            <th class="text-right" colspan="4">Shipping:</th>
                            <td>@{{ total.shipping_total }}</td>
                        </tr>
                        <tr>
                            <th class="text-right" colspan="4">Total:</th>
                            <td>@{{ total.total }}</td>
                        </tr>

                    </tfoot>
                </table>
            </div>
        </template>
        <template slot="footer">
            <a href="{{ route('report.index') }}" class="btn btn-secondary">Back</a>
        </template>
    </bootstrap-card>

</div>
@endsection

@section('modals')

@endsection

@section('variables')
<div id="variable-root"
    dataset="{{ json_encode($data) }}"
    years="{{ json_encode($years) }}"
    thisYear = "{{ $year }}"
    invoices = "{{ json_encode($invoices) }}"
    totals = "{{ json_encode($totals) }}"
>
    
</div>
@endsection