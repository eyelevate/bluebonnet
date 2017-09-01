@extends('layouts.themes.backend.layout')
@section('styles')	
@endsection
@section('scripts')
<script type="text/javascript" src="{{ mix('/js/views/admins/index.js') }}"></script>
@endsection

@section('content')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
    <li class="breadcrumb-item active">Inventories </li>
</ol>
<div class="container-fluid">
	
	<bootstrap-card use-header="true" use-body="true" use-footer="true">
		<template slot="header">
			<ul class="nav nav-pills card-header-pills">
			@if(count($inventories))
				@foreach($inventories as $key => $inventory)
				<li class="nav-item">
					<a class="nav-link {{ ($key == 0) ? 'active' :  '' }}" href="#item-{{ $inventory->id }}" data-toggle="tab" role="tab">{{ $inventory->name }} <span class="badge badge-primary">{{ count($inventory->inventoryItems) }}</span></a>
				</li>
				@endforeach
			@endif
				
			</ul>
		</template>
		<template slot="body">
		<div class="tab-content">
		@if(count($rows))
			@foreach($rows as $k => $v)
			<div class="tab-pane {{ ($k == 0) ? 'active' :  '' }}" id="item-{{ $v->id }}" role="tabpanel">
				<div class="table-responsive">
					<bootstrap-table
						:columns="{{ $columns }}"
						:rows="{{ $v->inventoryItems }}"
						:paginate="true"
						:global-search="true"
						:line-numbers="true"/>
					</bootstrap-table>
					<hr/>
		    		<a href="{{ route('inventory_item.create',$v->id) }}" class="btn btn-success btn-block">Add {{ $v->name }}</a>
			    </div>
			</div>
			@endforeach
		@endif	
		</div>
		
		</template>

		<template slot="footer">
			<a href="{{ route('inventory.create') }}" class="btn btn-primary">Add Inventory</a>
		</template>
	</bootstrap-card>
	
</div>
@endsection

@section('modals')
@if(count($rows))
	@foreach($rows as $v)
		@if (count($v->inventoryItems) >0)
			@foreach($v->inventoryItems as $ii)
				<bootstrap-modal id="viewModal-{{ $ii->id }}" b-size="modal-lg">
					<template slot="header">View Item - {{ $ii->name }}</template>
					<template slot="body">
						<div class="container">
							<!-- main slider carousel -->
							<div class="row">
							    <div class="col-12" id="slider">
							            <div id="myCarousel-{{ $ii->id }}" class="carousel inventory-carousel slide">
							                <!-- main slider carousel items -->
							                <div class="carousel-inner">
						                	@if (count($ii->images) > 0)
						                    	@foreach($ii->images as $ikey => $image)
						                    	<div class="{{ ($image->primary == true) ? 'active' : '' }} item carousel-item text-center" data-slide-number="{{ $ikey }}">
							                        <img src="{{ asset(str_replace('public/', 'storage/', $image->img_src)) }}" class="img-fluid mx-auto d-block">
							                    </div>
						                    	@endforeach
						                    @endif
							                </div>
							                <!-- main slider carousel nav controls -->


							                <div class="carousel-indicators ">
							                @if (count($ii->images) > 0)
							                 	<div class="row">
								                 	@foreach($ii->images as $ikey => $image)
								                 	<div class="col-2 {{ ($ikey == 0) ? 'active' : '' }}">
								                        <a id="carousel-selector-0" class="{{ ($ikey == 0) ? 'selected' : '' }}" data-slide-to="{{ $ikey }}" data-target="#myCarousel-{{ $ii->id }}">
								                            <img src="{{ asset(str_replace('public/', 'storage/', $image->img_src)) }}" class="img-fluid">
								                        </a>
								                    </div>
								                 	@endforeach
							                 	</div>
							                @endif
							   
							                </div>
							        </div>
							    </div>

							</div>
							<!--/main slider carousel-->
							<hr/>
							<!-- Name -->
							<bootstrap-readonly
								use-input="true"
								b-value="{{ $ii->name}}"
								use-label="true"
								b-label="Name">		
							</bootstrap-readonly>
							<hr/>
							<!-- Desc -->
							<bootstrap-readonly
								use-textarea="true"
								b-value="{{ $ii->desc}}"
								use-label="true"
								b-label="Description">		
							</bootstrap-readonly>
							<hr/>
							<!-- Collection -->
							<bootstrap-readonly
								use-input="true"
								b-value="{{ $ii->collection_name}}"
								use-label="true"
								b-label="Collection">		
							</bootstrap-readonly>
							<hr/>
							<!-- Subtotal -->
							<bootstrap-readonly
								use-input="true"
								b-value="{{ $ii->subtotal }}"
								use-label="true"
								b-label="Subtotal">		
							</bootstrap-readonly>
							<hr/>
							<!-- Taxable -->
							<bootstrap-readonly
								use-input="true"
								b-value="{{ $ii->taxable_status }}"
								use-label="true"
								b-label="Taxable">		
							</bootstrap-readonly>
							<hr/>
							<!-- Metals -->
							<bootstrap-readonly
								use-input="true"
								b-value="{{ $ii->metals_status }}"
								use-label="true"
								b-label="Metal Selection?">		
							</bootstrap-readonly>
							<hr/>
							<!-- Stones -->
							<bootstrap-readonly
								use-input="true"
								b-value="{{ $ii->stones_status }}"
								use-label="true"
								b-label="Stones Selection?">		
							</bootstrap-readonly>
							<hr/>
							<!-- Active -->
							<div>
								<label>Active?</label>
								<div class="row-fluid">
									{!! $ii->active_status !!}	
								</div>
									
							</div>
							<hr/>
							<!-- Active -->
							<div>
								<label>Featured?</label>
								<div class="row-fluid">
									{!! $ii->featured_status !!}	
								</div>
									
							</div>
							
						</div>
					</template>
					<template slot="footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{ $ii->id }}">Delete</button>	
						<a href="{{ route('inventory_item.edit',$ii->id) }}" class="btn btn-primary">Edit</a>
					</template>
				</bootstrap-modal>

				{!! Form::open(['method'=>'delete','route'=>['inventory_item.destroy',$ii->id]]) !!}

				<bootstrap-modal id="deleteModal-{{ $ii->id }}">
					<template slot="header">Delete Confirmation</template>
					<template slot="body">
						Are you sure you wish to delete {{ $ii->name }}?
					</template>
					<template slot="footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-danger">Delete</button>	
					</template>
				</bootstrap-modal>
				{!! Form::close() !!}
			@endforeach
		@endif
	@endforeach
@endif	
@endsection

@section('variables')
@endsection
