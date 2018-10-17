@extends('layouts.app', [
    'title' => trans('locations.organisations.title', ['name' => $model->name]),
    'description' => trans('locations.organisations.description'),
    'breadcrumbs' => [
        ['url' => route('locations.show', $model), 'label' => $model->name],
        trans('locations.show.tabs.locations')
    ]
])

@inject('campaign', 'App\Services\CampaignService')

@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-3">
            @include('locations._menu', ['active' => 'organisations'])
        </div>
        <div class="col-md-9">
            @include('locations.panels.organisations')
        </div>
    </div>
@endsection