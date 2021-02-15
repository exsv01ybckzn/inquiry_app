@extends('layouts.layout')

@section('content')
	<div class="col-md-8">
		<h5>保存が完了しました。</h5>
		<br><br><br>
		<form action="{{ route('content.index') }}" method="GET">
			@csrf
			<button type="submit" class="btn btn-primary">引き続き登録する</button>
		</form>
	</div>
@endsection
