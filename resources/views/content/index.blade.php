@extends('layouts.layout')

@section('content')
<div class="container">

	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<!-- 問い合わせ　内容 -->
				<div class="card-header">
					お客様要望内容　入力
				</div>
				<div class="card-body table-responsivei collapse show" id="inquiry_save">
					<form action="{{ route('content.confirm') }}" method="POST" id="save">
						@csrf

						<div class="form-group">
							<label for="staffs">営業担当者</label>
							<input type="text" id="staffs" name="staffs" class="form-control" value="{{ old('staffs') }}">
							@if (!empty($members))
								<datalist id="list">
									@foreach($members as $member)
										<option value="{{ $member->name }}">
									@endforeach
								</datalist>
							@endif

							@if ($errors->has('staffs'))
								<p class="error-message">{{ $errors->first('staffs') }}</p>
							@endif

						</div>
						<div class="form-group">
							<label for="company">お客様名・施設名</label>
							<input type="text" id="company" name="company" class="form-control" value="{{ old('company')}}">

							@if ($errors->has('company'))
								<p class="error-message">{{ $errors->first('company') }}</p>
							@endif
						</div>
						<div class="form-group">
							<label for="name">お客様　担当者</label>
							<input type="text" id="name" name="name" class="form-control" value="{{ old('name')}}">
						
							@if ($errors->has('name'))
								<p class="error-message">{{ $errors->first('name') }}</p>
							@endif
						</div>	
						<div class="form-group">
							<label for="title">案件・タイトル</label>
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

						<button type="submit" class="btn btn-primary form-control">登録</button>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
