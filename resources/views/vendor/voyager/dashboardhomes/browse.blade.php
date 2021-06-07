@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' '.$dataType->getTranslatedAttribute('display_name_plural'))

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <br>
        <div class="row" style="margin-right: 0;">
            <div class="col-md-3">
                <div class="dash">
                    <a href="employees">
                        <p>عدد الموظفين</p>
                    </a>
                    <strong>@php echo count(App\Employee::all()) @endphp</strong>
                    <span class="icon voyager-people"></span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dash dash2">
                    <a href="cats">
                        <p>الأقسام</p>
                    </a>
                    <strong>@php echo count(App\Cat::all()) @endphp</strong>
                    <span class="icon voyager-categories"></span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dash dash3">
                    <a href="years">
                    <p>عدد الشهور</p>
                    </a>
                    <strong>@php echo count(App\Year::all()) @endphp</strong>
                    <span class="icon voyager-calendar"></span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dash dash4">
                    <a href="items">
                        <p>التقارير</p>
                    </a>
                    <strong>@php echo count(App\Item::all()) @endphp</strong>
                    <span class="icon voyager-lock"></span>
                </div>
            </div>
        </div>
    </div>
    <style>
        .dash{ 
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 20px;
            border-right: 4px solid #22a7f0;
            color: #22a7f0;
            box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
            position: relative;

        }
        .dash a{
            color: inherit;
        }
        .dash p{
            font-size: 16px;
            margin: 0;
        }

        .dash strong{
            font-weight: bold;
            color: #000;
            font-size: 16px;
        }
        .dash2{
            color: #f6c23e;
            border-right: 4px solid #f6c23e;
        }
        .dash3{
            color: #1cc88a;
            border-right: 4px solid #1cc88a;
        }
        .dash4{
            color: #14a8bd;
            border-right: 4px solid #14a8bd;
        }
        .dash span{
            position: absolute;
            left: 20px;
            top: 26px;
            font-size: 32px;
            color: #e8e8e8;
        }
    </style>
<script>

</script>
    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="{{ __('voyager::generic.delete_confirm') }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('css')
@if(!$dataType->server_side && config('dashboard.data_tables.responsive'))
    <link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">
@endif
@stop

@section('javascript')
    <!-- DataTables -->
    @if(!$dataType->server_side && config('dashboard.data_tables.responsive'))
        <script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>
    @endif
    <script>
        $(document).ready(function () {
            @if (!$dataType->server_side)
                var table = $('#dataTable').DataTable({!! json_encode(
                    array_merge([
                        "order" => $orderColumn,
                        "language" => __('voyager::datatable'),
                        "columnDefs" => [
                            ['targets' => 'dt-not-orderable', 'searchable' =>  false, 'orderable' => false],
                        ],
                    ],
                    config('voyager.dashboard.data_tables', []))
                , true) !!});
            @else
                $('#search-input select').select2({
                    minimumResultsForSearch: Infinity
                });
            @endif

            @if ($isModelTranslatable)
                $('.side-body').multilingual();
                //Reinitialise the multilingual features when they change tab
                $('#dataTable').on('draw.dt', function(){
                    $('.side-body').data('multilingual').init();
                })
            @endif
            $('.select_all').on('click', function(e) {
                $('input[name="row_id"]').prop('checked', $(this).prop('checked')).trigger('change');
            });
        });


        var deleteFormAction;
        $('td').on('click', '.delete', function (e) {
            $('#delete_form')[0].action = '{{ route('voyager.'.$dataType->slug.'.destroy', '__id') }}'.replace('__id', $(this).data('id'));
            $('#delete_modal').modal('show');
        });

        @if($usesSoftDeletes)
            @php
                $params = [
                    's' => $search->value,
                    'filter' => $search->filter,
                    'key' => $search->key,
                    'order_by' => $orderBy,
                    'sort_order' => $sortOrder,
                ];
            @endphp
            $(function() {
                $('#show_soft_deletes').change(function() {
                    if ($(this).prop('checked')) {
                        $('#dataTable').before('<a id="redir" href="{{ (route('voyager.'.$dataType->slug.'.index', array_merge($params, ['showSoftDeleted' => 1]), true)) }}"></a>');
                    }else{
                        $('#dataTable').before('<a id="redir" href="{{ (route('voyager.'.$dataType->slug.'.index', array_merge($params, ['showSoftDeleted' => 0]), true)) }}"></a>');
                    }

                    $('#redir')[0].click();
                })
            })
        @endif
        $('input[name="row_id"]').on('change', function () {
            var ids = [];
            $('input[name="row_id"]').each(function() {
                if ($(this).is(':checked')) {
                    ids.push($(this).val());
                }
            });
            $('.selected_ids').val(ids);
        });
    </script>
@stop
