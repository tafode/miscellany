@extends('layouts.app', [
    'title' => trans('quests.organisations.title', ['name' => $model->name]),
    'description' => '',
    'breadcrumbs' => [
        ['url' => route('quests.show', $model), 'label' => $model->name],
        trans('quests.show.tabs.organisations')
    ]
])

@inject('campaign', 'App\Services\CampaignService')

@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-3">
            @include('quests._menu', ['active' => 'organisations'])
        </div>
        <div class="col-md-9">
            @include('quests.panels.organisations')
        </div>
    </div>
@endsection