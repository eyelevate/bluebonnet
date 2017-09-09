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
                        Sales
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <!--/.col-->
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="callout">
                                            <small class="text-muted">Sold This Week</small>
                                            <br>
                                            <strong class="h4">23%</strong>
                                            <div class="chart-wrapper">
                                                <canvas id="sparkline-chart-5" width="100" height="30"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.col-->
                                    <div class="col-sm-6">
                                        <div class="callout callout-primary">
                                            <small class="text-muted">Sold YTD</small>
                                            <br>
                                            <strong class="h4">5%</strong>
                                            <div class="chart-wrapper">
                                                <canvas id="sparkline-chart-6" width="100" height="30"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.col-->
                                </div>
                                <!--/.row-->
                                <hr class="mt-0">
                                <ul class="icons-list">
                                @if (count($topTenInvoiceItem))
                                    @foreach($topTenInvoiceItem as $key => $value)
                                    <li>
                                        <i class="" ><img src="{{ $value->inventoryItem->img_src }}" style="height:40px;"></i>
                                        <div class="desc">
                                            <div class="title">{{ $value->inventoryItem->name }}</div>
                                            <small>{{ $value->inventoryItem->desc }}</small>
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
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover table-outline mb-0">
                                <thead class="thead-default col-12">
                                    <tr>
                                        <th class="text-center"><i class="icon-people"></i>
                                        </th>
                                        <th>User</th>
                                        <th class="text-center">Country</th>
                                        <th>Usage</th>
                                        <th class="text-center">Payment Method</th>
                                        <th>Activity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <div class="avatar">
                                                <img src="/img/themes/coreui/avatars/1.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                                                <span class="avatar-status badge-success"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>Yiorgos Avraamu</div>
                                            <div class="small text-muted">
                                                <span>New</span>| Registered: Jan 1, 2015
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <img src="/img/themes/coreui/flags/USA.png" alt="USA" style="height:24px;">
                                        </td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    <strong>50%</strong>
                                                </div>
                                                <div class="float-right">
                                                    <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                                                </div>
                                            </div>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <i class="fa fa-cc-mastercard" style="font-size:24px"></i>
                                        </td>
                                        <td>
                                            <div class="small text-muted">Last login</div>
                                            <strong>10 sec ago</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <div class="avatar">
                                                <img src="/img/themes/coreui/avatars/2.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                                                <span class="avatar-status badge-danger"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>Avram Tarasios</div>
                                            <div class="small text-muted">

                                                <span>Recurring</span>| Registered: Jan 1, 2015
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <img src="/img/themes/coreui/flags/Brazil.png" alt="Brazil" style="height:24px;">
                                        </td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    <strong>10%</strong>
                                                </div>
                                                <div class="float-right">
                                                    <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                                                </div>
                                            </div>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <i class="fa fa-cc-visa" style="font-size:24px"></i>
                                        </td>
                                        <td>
                                            <div class="small text-muted">Last login</div>
                                            <strong>5 minutes ago</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <div class="avatar">
                                                <img src="/img/themes/coreui/avatars/3.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                                                <span class="avatar-status badge-warning"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>Quintin Ed</div>
                                            <div class="small text-muted">
                                                <span>New</span>| Registered: Jan 1, 2015
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <img src="/img/themes/coreui/flags/India.png" alt="India" style="height:24px;">
                                        </td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    <strong>74%</strong>
                                                </div>
                                                <div class="float-right">
                                                    <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                                                </div>
                                            </div>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 74%" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <i class="fa fa-cc-stripe" style="font-size:24px"></i>
                                        </td>
                                        <td>
                                            <div class="small text-muted">Last login</div>
                                            <strong>1 hour ago</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <div class="avatar">
                                                <img src="/img/themes/coreui/avatars/4.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                                                <span class="avatar-status badge-default"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>Enéas Kwadwo</div>
                                            <div class="small text-muted">
                                                <span>New</span>| Registered: Jan 1, 2015
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <img src="/img/themes/coreui/flags/France.png" alt="France" style="height:24px;">
                                        </td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    <strong>98%</strong>
                                                </div>
                                                <div class="float-right">
                                                    <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                                                </div>
                                            </div>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 98%" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <i class="fa fa-paypal" style="font-size:24px"></i>
                                        </td>
                                        <td>
                                            <div class="small text-muted">Last login</div>
                                            <strong>Last month</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <div class="avatar">
                                                <img src="/img/themes/coreui/avatars/5.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                                                <span class="avatar-status badge-success"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>Agapetus Tadeáš</div>
                                            <div class="small text-muted">
                                                <span>New</span>| Registered: Jan 1, 2015
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <img src="/img/themes/coreui/flags/Spain.png" alt="Spain" style="height:24px;">
                                        </td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    <strong>22%</strong>
                                                </div>
                                                <div class="float-right">
                                                    <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                                                </div>
                                            </div>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <i class="fa fa-google-wallet" style="font-size:24px"></i>
                                        </td>
                                        <td>
                                            <div class="small text-muted">Last login</div>
                                            <strong>Last week</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <div class="avatar">
                                                <img src="/img/themes/coreui/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                                                <span class="avatar-status badge-danger"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>Friderik Dávid</div>
                                            <div class="small text-muted">
                                                <span>New</span>| Registered: Jan 1, 2015
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <img src="/img/themes/coreui/flags/Poland.png" alt="Poland" style="height:24px;">
                                        </td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    <strong>43%</strong>
                                                </div>
                                                <div class="float-right">
                                                    <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                                                </div>
                                            </div>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <i class="fa fa-cc-amex" style="font-size:24px"></i>
                                        </td>
                                        <td>
                                            <div class="small text-muted">Last login</div>
                                            <strong>Yesterday</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
