<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactSendmail;
use App\Models\Inquiry;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InquiryController extends Controller
{

	public function index()
	{

		$members = DB::table('members')->get();
		$histories = DB::table('inquiries')->orderBy('id', 'desc')->get();

		return view('content.index', ['members'=>$members, 'histories'=>$histories]);
	}


	public function confirm(Request $request)
	{
		//バリデーション実行（結果に問題があれば処理を中断してエラーを返す）
		$request->validate([
			'name' => 'required',
			'email' => 'required|email',
			'company' => 'required',
			'title' => 'required',
			'body' => 'required',
		]);

		$inputs = $request->all();

		return view('content.confirm',['inputs' => $inputs,]);
	}

	//
	public function send(Request $request)
	{
		//バリデーション実行（結果に問題があれば処理を中断してエラーを返す）
		$request->validate([
			'name' => 'required',
			'email' => 'required|email',
			'company' => 'required',
			'title' => 'required',
			'body' => 'required',
		]);

		$next = $request->input('next');
		$inputs = $request->except('next');

		if ($next !== 'submit')		
		{
			return redirect()->route('content.index')->withInput($inputs);
		} 
		else
		{
			//メール送信
			\Mail::to($inputs['email'])->send(new ContactSendmail($inputs));


			//データベース保存
			try
			{
				/*
				$inquiry = new Inquiry;

				$inquiry->name = $inputs['name'];

				$inquiry->email = $inputs['email'];

				if(!empty($inputs['company']))
				{
					$inquiry->company = $inputs['company'];
				}

				$inquiry->staffs = $inputs['staffs'];

				$inquiry->body = $inputs['body'];

				$inquiry->save();
				*/

				$now = Carbon::now('Asia/Tokyo');
				$today = $now->format('Y-m-d H:i:s');

				DB::table('inquiries')->insert([
					'name' => $inputs['name'],
					'email' => $inputs['email'],
					'company' => $inputs['company'],
					'staffs' => $inputs['staffs'],
					'title' => $inputs['title'],
					'body' => $inputs['body'],
					'created_at' => $today,
					'updated_at' =>	$today
				]);

			}
			catch(\IlluminateDatabaseQueryException $e)
			{
				$errorcode = $e->errorInfo[1];

				//重複エラー処理
				if($errorcode == 1062)
				{
					return back()->withInput()->withErrors(['error_message'=>"既に該当するデータが保存されております。\n"]);
				}
			}
			catch(\Exception $er)
			{
				return back()->withInput()->withErrors(['error_message'=>"入力データに誤りがある可能性があります。\n入力データの確認をお願い致します。"]);
			}

			$request->session()->regenerateToken();
			return view('content.thanks');
		}
	}
}
