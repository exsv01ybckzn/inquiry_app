@extends('layouts.layout')

@section('content')
	<div class="col-md-8">
		<h5>送信が完了しました。</h5>
		<br><br><br>
		<form action="{{ route('content.entry') }}" method="POST">
			<button type="submit" class="btn btn-primary" name="btn" value="back">ホーム</button>
			<button type="submit" class="btn btn-primary" name="btn" value="next">履歴</button>
		</form>
	</div>
@endsection
