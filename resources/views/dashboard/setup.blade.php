@extends('layouts.app', [
    'title' => trans('dashboard.setup.title'),
    'description' => '',
    'breadcrumbs' => [
        trans('dashboard.setup.title')
    ],
    'headerExtra' => '<a href="' . route('home') .'" class="pull-right text-md" title="'. trans('dashboard.setup.actions.back_to_dashboard') .'"><i class="fa fa-arrow-left"></i> ' . trans('dashboard.setup.actions.back_to_dashboard') . '</a>'

])

@section('content')

    @include('partials.errors')

    <div class="campaign-dashboard-widgets">
        <div class="row" id="widgets" data-url="{{ route('dashboard.reorder') }}">
            @foreach ($widgets as $widget)
                @if ($widget->entity && empty($widget->entity->child))
                    @continue;
                @endif
                <?php /** @var \App\Models\CampaignDashboardWidget $widget */ ?>
                <div class="col-md-{{ $widget->colSize() }} widget-draggable">
                    <div class="widget widget-{{ $widget->widget }} cover-background"
                         data-toggle="ajax-modal"
                         data-target="#edit-widget"
                         data-url="{{ route('campaign_dashboard_widgets.edit', $widget) }}"
                        @if ($widget->entity && !empty($widget->entity->child->image))
                        style="background-image: url({{ $widget->entity->child->getImageUrl() }})"
                        @endif
                    >
                        <div class="widget-overlay">
                            <span class="widget-type">{{ __('dashboard.setup.widgets.' . $widget->widget) }}</span>
                            @if ($widget->entity)
                                <div class="widget-entity">
                                    {{ link_to($widget->entity->child->getLink(), $widget->entity->name) }}
                                </div>
                            @endif

                            @if ($widget->widget == \App\Models\CampaignDashboardWidget::WIDGET_RECENT)
                                @if (!empty($widget->conf('entity')))
                                <h5>{{ __('entities.' . $widget->conf('entity')) }}</h5>
                                @elseif (!empty($widget->conf('singular')))
                                <h5>{{ __('dashboard.widgets.recent.singular') }}</h5>
                                @endif
                            @endif
                        </div>
                        <input type="hidden" name="widgets[]" value="{{ $widget->id }}" />
                    </div>
                </div>
            @endforeach

            <div class="col-md-4">
                <div class="widget add" data-toggle="modal" data-target="#new-widget" id="btn-add-widget">
                    <div class="widget-overlay">
                    <i class="fa fa-plus"></i> {{ __('dashboard.setup.actions.add') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="new-widget" role="dialog" aria-labelledby="deleteConfirmLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ trans('crud.delete_modal.close') }}" title="{{ trans('crud.delete_modal.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        {{ trans('dashboard.setup.actions.add') }}
                    </h4>
                </div>
                <div class="modal-body">
                    <div id="modal-content-buttons">
                        <div class="btn btn-block btn-default btn-lg" id="btn-widget-preview" data-url="{{ route('campaign_dashboard_widgets.create', ['widget' => 'preview']) }}">
                            <i class="fa fa-align-justify"></i> {{ __('dashboard.setup.widgets.preview') }}
                        </div>
                        <div class="btn btn-block btn-default btn-lg" id="btn-widget-calendar" data-url="{{ route('campaign_dashboard_widgets.create', ['widget' => 'calendar']) }}">
                            <i class="ra ra-moon-sun"></i> {{ __('dashboard.setup.widgets.calendar') }}
                        </div>
                        <div class="btn btn-block btn-default btn-lg" id="btn-widget-recent" data-url="{{ route('campaign_dashboard_widgets.create', ['widget' => 'recent']) }}">
                            <i class="fa fa-history"></i> {{ __('dashboard.setup.widgets.recent') }}
                        </div>
                    </div>

                    <div id="modal-content-target">
                        <div class="text-center" id="modal-content-spinner" style="display: none;">
                            <h1><i class="fa fa-spin fa-spinner"></i></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="edit-widget" role="dialog" aria-labelledby="deleteConfirmLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

            </div>
        </div>
    </div>

    {{ csrf_field() }}
@endsection

@section('scripts')
    <script src="{{ mix('js/dashboard.js') }}" defer></script>
@endsection

@section('styles')
    <link href="{{ mix('css/dashboard.css') }}" rel="stylesheet">
@endsection