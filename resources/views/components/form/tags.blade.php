<?php
/**
 * We want to pre-load the data from the model, or what has been sent with the form.
 */
$selectedOption = [];

$model = array_get($options, 'model', null);

// Try to load what was sent with the form first, in case there was a form validation error
$previous = old($fieldId);
if (!empty($previous)) {
    dd($previous);
}
// If we didn't get anything, and there is a model sent, use that
elseif(!empty($model)) {
    foreach ($model->entity->tags as $tag) {
        $selectedOption[$tag->id] = $tag->name;
    }
}
?>
<label>{{ trans('crud.fields.tags') }}</label>

<select multiple="multiple" name="tags[]" id="tags" class="form-control form-tags" style="width: 100%" data-url="{{ route('tags.find') }}">
    @foreach ($selectedOption as $key => $val)
        <option value="{{ $key }}" selected="selected">{{ $val }}</option>
    @endforeach
</select>
