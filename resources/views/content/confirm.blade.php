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
							<label for="name">氏名</label><br>
							{{ $inputs['name'] }}
							<input type="hidden" id="name" name="name" value="{{ $inputs['name'] }}">
						</div>	
						<div class="form-group">
							<label for="email">メールアドレス</label><br>
							{{ $inputs['email'] }}
							<input type="hidden" id="email" name="email" value="{{ $inputs['email'] }}">
						</div>
						<div class="form-group">
							<label for=="company">会社名</label><br>
							{{ $inputs['company'] }}
							<input type="hidden" id="company" name="company" value="{{ $inputs['company'] }}">

						</div>
						<div class="form-group">
							<label for=="staffs">担当者</label><br>
							{{ $inputs['staffs'] }}
							<input type="hidden" id="staffs" name="staffs" value="{{ $inputs['staffs'] }}">

						</div>
						<div class="form-group">
							<label for=="title">案件・タイトル</label><br>
							{{ $inputs['title'] }}
							<input type="hidden" id="title" name="title" value="{{ $inputs['title'] }}">

						</div>
						<div class="form-group">
							<label for="body">提案・提案・要望・質問</label><br>
							{!! nl2br(e($inputs['body'])) !!}
							<input id="body" name="body" value="{{ $inputs['body'] }}" type="hidden">
						</div>

						<button type="submit" class="btn btn-primary" name="next" value="back">修正</button>
						<button type="submit" class="btn btn-primary" name="next" value="submit">送信</button>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
