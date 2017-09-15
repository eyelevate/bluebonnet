<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#unreadmessages" role="tab"><span class="badge badge-pill badge-danger" style="font-size: 8px; display:block; float:right;">@{{ count }}</span><i class="fa fa-envelope-open-o" aria-hidden="true"></i></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#readmessages" role="tab"><span class="badge badge-pill badge-success" style="font-size: 8px; display:block; float:right;"> @{{ archivedCount }}</span><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
    </li>
{{--  <li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#settings" role="tab"><i class="icon-settings"></i></a>
</li>  --}}
</ul>

<!-- Tab panes -->
<div class="tab-content" v-for="v,k in firstMessages">

    {{--  Unread Messages  --}}

    <div class="tab-pane active" id="unreadmessages" role="tabpanel">
        <div class="callout m-0 py-2 text-muted text-center bg-faded text-uppercase">
            <small><b>@{{ k }}</b></small>
        </div>

        <hr class="transparent mx-3 my-0">

        <div class="panel panel-default" v-for="ival, ikey in v">
            
            <div class="callout m-0 py-3" :class="ival.status_html">
            
                <div class="card-header" >
                    <span class="badge badge-pill badge-danger" style="font-size: 10px; float:right;">New</span>
                    <hr class="transparent mx-0 my-2">
                    <p data-toggle="collapse" data-parent="#accordion" :href="'#collapse'+ikey+'-main'" class="panel-title expand">
                        Subject: @{{ ival.subject }}
                        <small style="align:left">
                            @{{ ival.name }}
                        </small>
                        <small style="text-align:right; color:#777;">&nbsp; @{{ ival.created_at_formatted }}</small>
                    </p>
                </div>
                <div :id="'collapse'+ikey+'-main'" class="panel-collapse collapse" style="padding-top: 5px;">
                    <div class="panel-body">

                        <div>
                            <strong>Email:&nbsp;</strong>
                            <small>
                                @{{ ival.email }}
                            </small>
                        </div>

                        <div>
                            <strong>Phone:&nbsp;</strong>
                            <small>
                                @{{ ival.phone_formatted }}
                            </small>
                        </div>
                        <hr class="transparent mx-0 my-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <button type="button" data-toggle="collapse" data-parent="#accordion" :href="'#collapse-'+ikey" class="panel-title expand btn btn-secondary btn-block">
                                    Message
                                </button>
                            </div>
                            <div :id="'collapse-'+ikey" class="panel-collapse collapse" style="padding-top: 5px;">
                                <div class="panel-body">
                                    @{{ ival.message }}
                                </div>
                                <hr class="transparent mx-0 my-1">
                                <div class="row">
                                    <div class="col-4" style="padding:2px;">
                                        <button type="button" class="btn btn-warning btn-small btn-block">Archive</button>
                                    </div>
                                    <div class="col-4" style="padding:2px;">
                                        <button type="button" class="btn btn-primary btn-small btn-block">Email</button>
                                    </div>
                                    <div class="col-4" style="padding:2px;">
                                        <button type="button" class="btn btn-danger btn-small btn-block">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>    
            <hr class="transparent mx-0 my-1">
  


        </div>
    </div>

    {{--  Read Messages  --}}


    <div class="tab-pane p3" id="readmessages" role="tabpanel">
        <div class="callout m-0 py-2 text-muted text-center bg-faded text-uppercase">
            <small><b>More Than 3 Days Ago</b>
            </small>
        </div>

        <hr class="transparent mx-3 my-0">

        <div class="panel panel-default">

            {{--  <div class="tab-pane p-3" id="readmessages" role="tabpanel">  --}}


                <div class="message" style="padding: 10px;">

                    <div class="card-header">
                        <p data-toggle="collapse" data-parent="#accordion" href="#collapse1-read" class="panel-title expand">
                            Subject: Custom Order
                            <small style="align:left">
                                Customer Name
                            </small>
                            <small style="text-align:right; color:#777;">&nbsp; 9/01/2017</small>
                        </p>
                    </div>
                    <div id="collapse1-read" class="panel-collapse collapse" style="padding-top: 5px;">
                        <div class="panel-body">

                            <div>
                                <small>
                                    Email@Address.com
                                </small>
                            </div>

                            <div>
                                <small>
                                    555-555-5555
                                </small>
                            </div>
                            <hr class="transparent mx-0 my-1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <button type="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1-readsub" class="panel-title expand btn btn-secondary btn-block">
                                        Message
                                    </button>
                                </div>
                                <div id="collapse1-readsub" class="panel-collapse collapse" style="padding-top: 5px;">
                                    <div class="panel-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et 
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                                        ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                        nulla pariatur.
                                    </div>
                                    <hr class="transparent mx-0 my-1">
                                    <div>
                                        <button type="button" class="btn btn-danger btn-small btn-block">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="transparent mx-0 my-1">


                <div class="message" style="padding: 10px;">

                    <div class="card-header">
                        <p data-toggle="collapse" data-parent="#accordion" href="#collapse2-read" class="panel-title expand">
                            Subject: Custom Order
                            <small style="align:left">
                                Customer Name
                            </small>
                            <small style="text-align:right; color:#777;">&nbsp; 9/01/2017</small>
                        </p>
                    </div>
                    <div id="collapse2-read" class="panel-collapse collapse" style="padding-top: 5px;">
                        <div class="panel-body">

                            <div>
                                <small>
                                    Email@Address.com
                                </small>
                            </div>

                            <div>
                                <small>
                                    555-555-5555
                                </small>
                            </div>
                            <hr class="transparent mx-0 my-1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <button type="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2-readsub" class="panel-title expand btn btn-secondary btn-block">
                                        Message
                                    </button>
                                </div>
                                <div id="collapse2-readsub" class="panel-collapse collapse" style="padding-top: 5px;">
                                    <div class="panel-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et 
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                                        ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                        nulla pariatur.
                                    </div>
                                    <hr class="transparent mx-0 my-1">
                                    <div>
                                        <button type="button" class="btn btn-danger btn-small btn-block">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <hr class="transparent mx-0 my-1">


                <div class="message" style="padding: 10px;">

                    <div class="card-header">
                        <p data-toggle="collapse" data-parent="#accordion" href="#collapse3-read" class="panel-title expand">
                            Subject: Custom Order
                            <small style="align:left">
                                Customer Name
                            </small>
                            <small style="text-align:right; color:#777;">&nbsp; 9/01/2017</small>
                        </p>
                    </div>
                    <div id="collapse3-read" class="panel-collapse collapse" style="padding-top: 5px;">
                        <div class="panel-body">

                            <div>
                                <small>
                                    Email@Address.com
                                </small>
                            </div>

                            <div>
                                <small>
                                    555-555-5555
                                </small>
                            </div>
                            <hr class="transparent mx-0 my-1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <button type="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3-readsub" class="panel-title expand btn btn-secondary btn-block">
                                        Message
                                    </button>
                                </div>
                                <div id="collapse3-readsub" class="panel-collapse collapse" style="padding-top: 5px;">
                                    <div class="panel-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et 
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                                        ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                        nulla pariatur.
                                    </div>
                                    <hr class="transparent mx-0 my-1">
                                    <div>
                                        <button type="button" class="btn btn-danger btn-small btn-block">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <hr class="transparent mx-0 my-1">
            </div>
        </div>