@php
/**
 * @var \App\Datagrids\Filters\DatagridFilter $filter
 * @var \App\Services\FilterService $filterService
 */
use Illuminate\Support\Arr;
$filters = $filter->filters();
$activeFilters = count($filterService->activeFilters());
$entityModel = $model;
$count = 0;

@endphp

<div class="box no-border datagrid-filters">
    <div class="box-header" data-toggle="collapse" data-target="#datagrid-filters">

        <i class="fa fa-chevron-down pull-right"></i>
        <i class="fa fa-filter"></i> {{ __('crud.filters.title') }}

        @if ($activeFilters > 0)
            <span class="label label-danger">{{ $activeFilters }}</span>
        @endif
    </div>

    {!! Form::open(['url' => route($route), 'method' => 'GET', 'id' => 'crud-filters-form']) !!}
    <div class="collapse out" id="datagrid-filters">
        <div class="box-body">
            <div class="row">
                @foreach ($filters as $field)
                    @if ($count % 2 === 0)
                </div>
                <div class="row">
                    @endif
                    @php $count++ @endphp
                    <div class="col-md-6">
                        <div class="form-group">
                            @if (is_array($field))
                                <label>{{ Arr::get($field, 'label', __('crud.fields.' . $field['field'])) }}</label>
                                <?php $model = null;
                                $value = $filterService->single($field['field']);
                                if (!empty($value) && $field['type'] == 'select2') {
                                    $modelclass = new $field['model'];
                                    $model = $modelclass->find($value);
                                }?>
                                @if ($field['type'] == 'tag')
                                    {!! Form::hidden($field['field'], null) !!}
                                    {!! Form::tags(
                                        $field['field'],
                                        [
                                            'id' => $field['field'] . '_' . uniqid(),
                                            'model' => null,
                                            'enableNew' => false,
                                            'allowClear' => 'false',
                                            'label' => false,
                                            'filterOptions' => $value
                                        ]
                                    ) !!}
                                @elseif ($field['type'] == 'select')
                                    {!! Form::select(
                                    $field['field'],
                                    array_merge(['' => ''], $field['data']), // Add an empty option
                                    $value,
                                    [
                                        'id' => $field['field'],
                                        'class' => 'form-control select2',
                                        'style' => 'width: 100%',
                                    ]
                                ) !!}
                                @else
                                    {!! Form::select($field['field'], (!empty($model) ? [$model->id => $model->name] : []),
                                        null,
                                        [
                                            'id' => $field['field'],
                                            'class' => 'form-control select2',
                                            'data-url' => $field['route'],
                                            'data-placeholder' => $field['placeholder'],
                                            'style' => 'width: 100%',
                                        ]
                                    ) !!}
                                @endif
                            @else
                                <label>{{ __(($field == 'is_private' ? 'crud.fields.' : $name . '.fields.') . $field) }}</label>
                                @if ($filterService->isCheckbox($field))
                                    <select class="filter-select form-control" id="{{ $field }}" name="{{ $field }}">
                                        <option value=""></option>
                                        <option value="0" @if ($filterService->filterValue($field) === '0') selected="selected" @endif>{{ trans('voyager.generic.no') }}</option>
                                        <option value="1"  @if ($filterService->filterValue($field) === '1') selected="selected" @endif>{{ trans('voyager.generic.yes') }}</option>
                                    </select>
                                @elseif ($field === 'type' && !empty($entityModel))

                                    <input type="text" class="form-control" name="{{ $field }}" value="{{ $filterService->single($field) }}" autocomplete="off" list="entity-type-list" />
                                    <div class="hidden">
                                        <datalist id="entity-type-list">
                                            @foreach ($entityModel->entityTypeList() as $suggestion)
                                                <option value="{{ $suggestion }}">{{ $suggestion }}</option>
                                            @endforeach
                                        </datalist>
                                    </div>
                                @else
                                    <input type="text" class="form-control" name="{{ $field }}" value="{{ $filterService->single($field) }}" />
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="box-footer text-center">
            <div class="pull-left hidden-xs">
                <a href="{{ route($route, ['reset-filter' => 'true']) }}" class="btn btn-default">
                    <i class="fa fa-eraser"></i> {{ trans('crud.filters.clear') }}
                </a>
                <a href="{{ route('helpers.filters') }}" data-url="{{ route('helpers.filters') }}" data-toggle="ajax-modal" data-target="#entity-modal" title="{{ __('helpers.filters.title') }}">
                    {{ __('helpers.filters.title') }} <i class="fa fa-question-circle"></i>
                </a>
            </div>

            <div class="visible-xs pull-left block">
                <a href="{{ route($route, ['reset-filter' => 'true']) }}" class="btn btn-default margin-r-5">
                    <i class="fa fa-eraser"></i> {{ trans('crud.filters.clear') }}
                </a>
                <a href="{{ route('helpers.filters') }}" data-url="{{ route('helpers.filters') }}" data-toggle="ajax-modal" data-target="#entity-modal" title="{{ __('helpers.filters.title') }}">
                    <i class="fa fa-question-circle"></i>
                </a>
            </div>

            <button class="btn btn-primary pull-right">
                <i class="fa fa-filter"></i> {{ __('crud.filter') }}
            </button>

            <a href="#" data-toggle="collapse" data-target="#datagrid-filters" class="hidden-xs">
                <i class="fa fa-chevron-up"></i>
            </a>

        </div>
        {!! Form::close() !!}
    </div>
</div>
