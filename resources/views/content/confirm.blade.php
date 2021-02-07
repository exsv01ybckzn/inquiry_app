@extends('layouts.layout')

@section('content')
<div class="container">

	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<!-- 問い合わせ　内容 -->
				<div class="card-header">
					確認フォーム
				</div>
				<div class="card-body table-responsivei collapse show" id="inquiry_save">
					<form action="{{ route('content.send') }}" method="POST" id="save">
						@csrf
						
						<div class="form-group">
							<label for="name">氏名</label>
							{{ $inputs['name'] }}
							<input type="hidden" id="name" name="name" value="{{ $inputs['name'] }}">
						</div>	
						<div class="form-group">
							<label for="email">メールアドレス</label>
							{{ $inputs['email'] }}
							<input type="hidden" id="email" name="email" value="{{ $inputs['email'] }}">
						</div>
						<div class="form-group">
							<label for=="company">会社名</label>
							{{ $inputs['company'] }}
							<input type="hidden" id="company" name="company" value="{{ $inputs['company'] }}">

						</div>
						<div class="form-group">
							<label for=="staffs">担当者</label>
							{{ $inputs['staffs'] }}
							<input type="hidden" id="staffs" name="staffs" value="{{ $inputs['staffs'] }}">

						</div>
						<div class="form-group">
							<label for=="title">タイトル</label>
							{{ $inputs['title'] }}
							<input type="hidden" id="title" name="title" value="{{ $inputs['title'] }}">

						</div>
						<div class="form-group">
							<label for="message">要望・質問</label>
							{!! nl2br(e($inputs['message'])) !!}
							<input id="message" name="message" value="{{ $inputs['message'] }}" type="hidden">
						</div>

						<button type="submit" class="btn btn-primary" name="back" value="back">修正</button>
						<button type="submit" class="btn btn-primary" name="next" value="submit">送信</button>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
