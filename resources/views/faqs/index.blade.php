<?php use Illuminate\Support\Str ?>
@extends('layouts.front', [
    'title' => trans('front.menu.faq'),
    'menus' => [
        'faq',
    ],
])

@section('og')
    <meta property="og:description" content="{{ __("front.faq.description") }}" />
    <meta property="og:url" content="{{ route('faq.index') }}" />
@endsection

<?php /** @var \App\Models\Faq $faq */ ?>
@section('content')
    <header class="masthead reduced-masthead">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-7 my-auto">
                    <div class="header-content mx-auto">
                        <h1 class="mb-5">{{ trans('front.faq.title') }}</h1>
                        <p class="mb-5">{{ trans('front.faq.description') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="faqs" id="faq">
        <div class="container">
            <div class="section-body">
                <div class="row">
                    <div class="col-md-4">
                        <h2>{{ __('faq.sections.general') }}</h2>
                        <ul>
                            <li>
                                <a href="{{ route('faq.show', ['key' => 'multiworld', 'slug' => Str::slug(__('faq.multiworld.question'))]) }}">
                                    {{ __('faq.multiworld.question') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('faq.show', ['key' => 'campaign-sync', 'slug' => Str::slug(__('faq.campaign-sync.question'))]) }}">
                                    {{ __('faq.campaign-sync.question') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('faq.show', ['key' => 'custom', 'slug' => Str::slug(__('faq.custom.question'))]) }}">
                                    {{ __('faq.custom.question') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('faq.show', ['key' => 'map', 'slug' => Str::slug(__('faq.map.question'))]) }}">
                                    {{ __('faq.map.question') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('faq.show', ['key' => 'conversations', 'slug' => Str::slug(__('faq.conversations.question'))]) }}">
                                    {{ __('faq.conversations.question') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('faq.show', ['key' => 'attribute-templates', 'slug' => Str::slug(__('faq.attribute-templates.question'))]) }}">
                                    {{ __('faq.attribute-templates.question') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('faq.show', ['key' => 'backup', 'slug' => Str::slug(__('faq.backup.question'))]) }}">
                                    {{ __('faq.backup.question') }}
                                </a>
                            </li>
                        </ul>

                    </div>
                    <div class="col-md-4">
                        <h2>{{ __('faq.sections.permissions') }}</h2>
                        <ul>
                            <li>
                                <a href="{{ route('faq.show', ['key' => 'permissions', 'slug' => Str::slug(__('faq.permissions.question'))]) }}">
                                    {{ __('faq.permissions.question') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('faq.show', ['key' => 'visibility', 'slug' => Str::slug(__('faq.visibility.question'))]) }}">
                                    {{ __('faq.visibility.question') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('faq.show', ['key' => 'entity-notes', 'slug' => Str::slug(__('faq.entity-notes.question'))]) }}">
                                    {{ __('faq.entity-notes.question') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('faq.show', ['key' => 'delete-campaign', 'slug' => Str::slug(__('faq.delete-campaign.question'))]) }}">
                                    {{ __('faq.delete-campaign.question') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h2>{{ __('faq.sections.community') }}</h2>
                        <ul>
                            <li>
                                <a href="{{ route('faq.show', ['key' => 'help', 'slug' => Str::slug(__('faq.help.question'))]) }}">
                                    {{ __('faq.help.question') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('faq.show', ['key' => 'public-campaigns', 'slug' => Str::slug(__('faq.public-campaigns.question'))]) }}">
                                    {{ __('faq.public-campaigns.question') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-4">
                        <h2>{{ __('faq.sections.worldbuilding') }}</h2>
                        <ul>
                            <li>
                                <a href="{{ route('faq.show', ['key' => 'gods-and-religions', 'slug' => Str::slug(__('faq.gods-and-religions.question'))]) }}">
                                    {{ __('faq.gods-and-religions.question') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h2>{{ __('faq.sections.pricing') }}</h2>
                        <ul>
                            <li>
                                <a href="{{ route('faq.show', ['key' => 'free', 'slug' => Str::slug(__('faq.free.question'))]) }}">
                                    {{ __('faq.free.question') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h2>{{ __('faq.sections.other') }}</h2>
                        <ul>
                            <li>
                                <a href="{{ route('faq.show', ['key' => 'mobile', 'slug' => Str::slug(__('faq.mobile.question'))]) }}">
                                    {{ __('faq.mobile.question') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('faq.show', ['key' => 'plans', 'slug' => Str::slug(__('faq.plans.question'))]) }}">
                                    {{ __('faq.plans.question') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('faq.show', ['key' => 'bugs', 'slug' => Str::slug(__('faq.bugs.question'))]) }}">
                                    {{ __('faq.bugs.question') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
