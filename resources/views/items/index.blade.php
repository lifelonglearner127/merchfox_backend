@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Here are the products you saved.</div>

			<div class="panel-body">
				<table id="products-table" class="table table-striped table-bordered datatables" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Product Image</th>
							<th>Title</th>
							<th>Bullet Points</th>
							<th width="60px">Price</th>
							<th>BSR</th>
							<th>bsr</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $index = 1; ?>
						@foreach($items as $item)
						<tr>
							<td>{{ $index }}</td>
							<td><img src="{{ $item->img_url }}" class="product-image"></td>
							<td>{{ $item->title }}</td>
							<td>
								@if (sizeof(explode("\n", $item->bullet_points)) > 0 && explode("\n", $item->bullet_points) != "")
								<ul>
									@foreach(explode("\n", $item->bullet_points) as $point)
									<li>{{ $point }}</li>
									@endforeach
								</ul>
								@endif
							</td>
							<td>{{ $item->price }}</td>
							<td>{{ $item->top_bsr }}</td>
							<td>{{ $item->bottom_bsr }}</td>
							<td class="actions">
								<a href="{{ route('items.show', $item->id) }}" class="btn btn-default">View</a>
							</td>
						</tr>
						<?php $index++; ?>
						@endforeach
					</tbody>
				</table>
			</div>

			<div class="panel-footer">
				<div class="row">
					<div class="pagination-container col-xs-12" style="text-align:right;">
						{{ $items->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection