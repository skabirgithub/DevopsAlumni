<div class='btn-group'>
    <a href="{{ route('admin.orders.show', $id) }}" class='border-0 btn-sm btn-transition btn btn-outline-primary'>
        View
    </a>
    <a href="{{ route('admin.orders.edit', $id) }}" class='border-0 btn-sm btn-transition btn btn-outline-info'>
       Edit
    </a>
     <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{$id}}" data-original-title="Delete"
        class="border-0 btn-sm btn-transition btn btn-outline-danger delete">Delete</a>
</div>
