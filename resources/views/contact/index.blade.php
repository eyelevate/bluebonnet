@extends($layout)
@section('scripts')
<script type="text/javascript" src="{{ mix('/js/views/home/index.js') }}"></script>
@endsection
@section('header')
@endsection


@section('content')
<div class="ontainer-fluid">
    {!! Form::open(['method'=>'post','route'=>['contact.store']]) !!}

        <bootstrap-card use-header = "true" use-body="true" use-footer = "true">
            <template slot = "header" style="margin-bottom: 25px; text-align: center;" > Contact Form </template>
            <template slot = "body">
                <div class="content">
                    
                    <!-- Name -->
                    <bootstrap-input class="form-group-no-border {{ $errors->has('name') ? ' has-danger' : '' }}" 
                        use-label = "true"
                        label = "Name"
                        b-placeholder="Name"
                        b-name="name"
                        b-type="text"
                        b-value="{{ old('name') }}"
                        b-err="{{ $errors->has('name') }}"
                        b-error="{{ $errors->first('name') }}"
                        >
                    </bootstrap-input>

                    <!-- email -->
                    <bootstrap-input class="form-group-no-border {{ $errors->has('email') ? ' has-danger' : '' }}" 
                        use-label = "true"
                        label = "Email"
                        b-placeholder="Email@email.com"
                        b-name="email"
                        b-type="text"
                        b-value="{{ old('email') }}"
                        b-err="{{ $errors->has('email') }}"
                        b-error="{{ $errors->first('email') }}"
                        >
                    </bootstrap-input>

                    <!-- Mobile Number -->
                    <bootstrap-input class="form-group-no-border {{ $errors->has('phone') ? ' has-danger' : '' }}" 
                        use-label = "true"
                        label = "Mobile Number"
                        b-placeholder="Mobile Number"
                        b-name="phone"
                        b-type="text"
                        b-value="{{ old('phone') }}"
                        b-err="{{ $errors->has('phone') }}"
                        b-error="{{ $errors->first('phone') }}"
                        >
                    </bootstrap-input>

                    <!-- Subject -->

                   <bootstrap-control use-label="true" label="Subject" b-name="subject">
                        <template slot="control">
                            <select class="form-control" name="subject">
                                    <option value="Custom Order">Custom Order</option>
                                    <option value="New Order">New Order</option>
                                    <option value="Current Order">Current Order</option>
                                    <option value="Other">Other</option>
                            </select>
                         </template>
                     </bootstrap-control> 

              

                   

                    <!-- Description -->
                    <bootstrap-textarea class="form-group-no-border {{ $errors->has('message') ? ' has-danger' : '' }}" 
                        use-label = "true"
                        label = "Message"
                        b-placeholder="Message"
                        b-name="message"
                        b-type="text"
                        b-value="{{ old('message') }}"
                        b-err="{{ $errors->has('message') }}"
                        b-error="{{ $errors->first('message') }}"
                        >
                    </bootstrap-textarea>


                </div>
            </template>

            <template slot = "footer">
                <button type="submit" class = "btn btn-warning pull-right">Save</button>
            </template>
        </bootstrap-card>
    {!! Form::close() !!}
</div>

</div> 


@endsection

@section('modals')
@endsection