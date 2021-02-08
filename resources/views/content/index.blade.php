@extends('layouts.layout')

@section('content')
<div class="container">

	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<!-- 問い合わせ　内容 -->
				<div class="card-header">
					問い合わせフォーム
				</div>
				<div class="card-body table-responsivei collapse show" id="inquiry_save">
					<form action="{{ route('content.confirm') }}" method="POST" id="save">
						@csrf

						<div class="form-group">
							<label for="name">氏名</label>
							<input type="text" id="name" name="name" class="form-control" value="{{ old('name')}}">
						
							@if ($errors->has('name'))
								<p class="error-message">{{ $errors->first('name') }}</p>
							@endif
						</div>	
						<div class="form-group">
							<label for="email">メールアドレス</label>
							<input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}">
							@if ($errors->has('email'))
								<p class="error-message">{{ $errors->first('email') }}</p>
							@endif
						</div>
						<div class="form-group">
							<label for=="company">会社名(任意)</label>
							<input type="text" id="company" name="company" class="form-control" value="{{ old('company')}}">

							@if ($errors->has('company'))
								<p class="error-message">{{ $errors->first('company') }}</p>
							@endif

						</div>
						<div class="form-group">
							<label for=="staffs">担当者</label>
							<input type="text" id="staffs" name="staffs" class="form-control" value="{{ old('staffs') }}">

							@if ($errors->has('staffs'))
								<p class="error-message">{{ $errors->first('staffs') }}</p>
							@endif

						</div>
						<div class="form-group">
							<label for=="title">案件・タイトル</label>
							<input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">

							@if ($errors->has('title'))
								<p class="error-message">{{ $errors->first('title') }}</p>
							@endif

						</div>
						<div class="form-group">
							<label for="body">提案・要望・質問</label>
							<textarea id="body" name="body" rows="8" cols="80" class="form-control">{{ old('body') }}</textarea>

							@if ($errors->has('body'))
								<p class="error-message">{{ $errors->first('body') }}</p>
							@endif
						</div>

						<button type="submit" class="btn btn-primary form-control">送信</button>

					</form>
				</div>

				<br>

				@if(!empty($histories))
				<!-- 問い合わせ　履歴 -->
				<div class="card-header">
					問い合わせ　履歴
				</div>
				<div class="card-body table-responsivei collapse show" id="inquiry_save">
					<table class="table table-borderless">
						<thead>
							<th scope="col">日付</th>
							<th scope="col">案件・タイトル</th>
							<th scope="col">提案・要望・質問</th>
						</thead>
						@foreach($histories as $history)
						<body>
							<tr class="table">
								<td scope="col">{{ date('Y-m-d', strtotime($history->created_at)) }}</td>
								<td scope="col">{{ $history->title }}</td>
								<td scope="col">{{ $history->body }}</td>
							</tr>
						</body>
						@endforeach
					</table>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection
