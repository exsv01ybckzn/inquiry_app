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
					<form action="{{ route('content.history') }}" method="GET" id="history">
						@csrf

						<div class="form-group">
							<label for="staffs">営業担当者</label>
							<label id="staffs" name="staffs" class="form-control" readonly>{{ $date->staffs }}</label>
						</div>
						<div class="form-group">
							<label for="company">お客様名・施設名</label>
							<label id="company" name="company" class="form-control" readonly>{{ $date->company }}</label>
						</div>
						<div class="form-group">
							<label for="name">お客様　担当者</label>
							<label id="name" name="name" class="form-control" readonly>{{ $date->name }}</label>
						</div>	
						<div class="form-group">
							<label for="title">案件・タイトル</label>
							<label id="title" name="title" class="form-control" readonly>{{ $date->title }}</label>

						</div>
						<div class="form-group">
							<label for="body">提案・要望・質問</label>
							<textarea id="body" name="body" rows="8" cols="80" class="form-control" readonly>{{ $date->body }}</textarea>
						</div>

						<button type="submit" class="btn btn-primary" name="back">戻る</button>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
