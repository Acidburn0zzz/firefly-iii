@extends('layouts.default')
@section('content')
{!! Breadcrumbs::renderIfExists(Route::getCurrentRoute()->getName(), $tag) !!}
{!! Form::model($tag, ['class' => 'form-horizontal','id' => 'update','url' => route('tags.update',$tag->id)]) !!}

<input type="hidden" name="id" value="{{$tag->id}}" />

<div class="row">
    <div class="col-lg-5 col-md-5 col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-tag"></i> Mandatory fields
            </div>
            <div class="panel-body">
                {!! ExpandedForm::text('tag') !!}
                {!! ExpandedForm::multiRadio('tagMode',$tagOptions) !!}
            </div>
        </div>
    </div>

    <div class="col-lg-7 col-md-7 col-sm-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-smile-o"></i> Optional fields
            </div>
            <div class="panel-body">
                    {!! ExpandedForm::date('date') !!}
                    {!! ExpandedForm::textarea('description') !!}
                    {!! ExpandedForm::location('tagPosition') !!}
            </div>
        </div>

        <!-- panel for options -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bolt"></i> Options
            </div>
            <div class="panel-body">
                {!! ExpandedForm::optionsList('update','tag') !!}
            </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <p>
            <button type="submit" class="btn btn-lg btn-success">
                <i class="fa fa-plus-circle"></i> Update tag
            </button>
        </p>
    </div>
</div>

</form>
@stop
@section('scripts')
    <script type="text/javascript">
    @if(Input::old('latitude'))
        var latitude = "{{Input::old('latitude')}}";
    @else
        var latitude = "52.3167";
    @endif

    @if(Input::old('latitude') && Input::old('longitude') && Input::old('zoomLevel'))
        var doPlaceMarker = true;
    @else
        var doPlaceMarker = false;
    @endif

    @if(Input::old('longitude'))
        var longitude = "{{Input::old('longitude')}}";
    @else
        var longitude = "5.5500";
    @endif

    @if(Input::old('zoomLevel'))
        var zoomLevel = {{intval(Input::old('zoomLevel'))}};
    @else
        var zoomLevel = 6;
    @endif

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3"></script>
    <script src="js/tags.js"></script>
@stop