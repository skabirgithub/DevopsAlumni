
{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered table-hover','id'=>'data-table']) !!}

@section('script')
    {!! $dataTable->scripts() !!}
@include('includes.ajax_setup')
@include('includes.ajax_delete',['url'=>'orders'])
@endsection