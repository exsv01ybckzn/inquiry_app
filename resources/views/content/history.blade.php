@extends('layouts.layout')

@section('content')
<div class="container">

	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				@if(!empty($histories))
				<!-- 問い合わせ　履歴 -->
				<div class="card-header">
					問い合わせ　履歴
				</div>
				<div class="card-body table-responsivei collapse show" id="inquiry_save">
					<table class="table table-borderless">
						<thead>
						</thead>
						@foreach($histories as $history)
						<body>
							<tr class="table">
								<td class="table-text">
									<div>	
										<p>日付:{{ date('Y-m-d', strtotime($history->created_at)) }}</p>
										<p>案件:{{ $history->title }}</p>
										<p>内容:{{ $history->body }}</p><hr>
										<form action="{{ route('content.detail') }}" method="POST" id="detail">
											@csrf
											<input type="hidden" name="history_id" id="history_id" value="{{ $history->id }}">
											<button type="submit" class="btn btn-primary" name="btn">詳細</button>
										</form>
									</div>
								</td>
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
