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
					<form action="{{ url('/entry') }}" method="POST" id="save">
						@csrf
						
						<div class="form-group">
							<label for="name">氏名</label>
							<input type="text" id="name" name="name" class="form-control" value="">
						</div>	
						<div class="form-group">
							<label for="email">E-mail</label>
							<input type="text" id="email" name="email" class="form-control" value="">
						</div>
						<div class="form-group">
							<label for=="company">会社名(任意)</label>
							<input type="text" id="company" name="company" class="form-control" value="">

						</div>
						<div class="form-group">
							<label for=="staffs">担当者</label>
							<input type="text" id="staffs" name="staffs" class="form-control" value="">

						</div>
						<div class="form-group">
							<label for="message">要望・質問</label>
							<textarea id="message" name="message" rows="8" cols="80" class="form-control"></textarea>
						</div>

						<button type="submit" class="btn btn-primary form-control">送信</button>

					</form>
				</div>

				<br>

				<!-- 問い合わせ　履歴 -->
				<div class="card-header">
					<table class="table table-borderless">
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
