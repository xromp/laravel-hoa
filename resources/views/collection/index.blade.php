@extends('layouts.master')

@section('layouts.gloabal-templates')
<script type="text/ng-template" id="collection.base">
	@include('collection.base')
</script>
<script type="text/ng-template" id="collection.create">
	@include('collection.create')
</script>
<script type="text/ng-template" id="collection.view">
	@include('collection.view')
</script>
@endsection


@section('scripts')
<script type="text/javascript" src="{{URL::to('js/collection/collection.js')}}"></script>
@endsection

