@inject('formService', 'App\Services\FormService')

{{ csrf_field() }}
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>{{ trans('crud.panels.general_information') }}</h4>
            </div>
            <div class="panel-body">
                <div class="form-group required">
                    <label>{{ trans('dice_rolls.fields.name') }}</label>
                    {!! Form::text('name', $formService->prefill('name', $source), ['placeholder' => trans('dice_rolls.placeholders.name'), 'class' => 'form-control', 'maxlength' => 191]) !!}
                </div>

                @if ($campaign->enabled('characters'))
                    <div class="form-group">
                        {!! Form::select2(
                            'character_id',
                            (isset($model) && $model->character ? $model->character : $formService->prefillSelect('character', $source)),
                            App\Models\Character::class,
                            true
                        ) !!}
                    </div>
                @endif
                @if ($campaign->enabled('sections'))
                    <div class="form-group">
                        {!! Form::select2(
                            'section_id',
                            (isset($model) && $model->section ? $model->section : $formService->prefillSelect('section', $source)),
                            App\Models\Section::class,
                            true
                        ) !!}
                    </div>
                @endif

                <div class="form-group required">
                    <label>{{ trans('dice_rolls.fields.parameters') }}</label>
                    {!! Form::text('parameters', $formService->prefill('parameters', $source), ['placeholder' => trans('dice_rolls.placeholders.parameters'), 'class' => 'form-control', 'maxlength' => 191]) !!}
                    <a href="{{ route('helpers.dice') }}" target="_blank">{{ trans('dice_rolls.hints.parameters') }}</a>
                </div>

                @include('cruds.fields.private')
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>{{ trans('crud.panels.appearance') }}</h4>
            </div>
            <div class="panel-body">
                @include('cruds.fields.image')
            </div>
        </div>
    </div>
</div>


<div class="form-group">
    <button class="btn btn-success">{{ trans('crud.save') }}</button>
    <button class="btn btn-default" name="submit-new">{{ trans('crud.save_and_new') }}</button>
    {!! trans('crud.or_cancel', ['url' => (!empty($cancel) ? $cancel : url()->previous())]) !!}
</div>
