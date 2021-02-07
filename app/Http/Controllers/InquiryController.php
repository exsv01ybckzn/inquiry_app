<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InquiryController extends Controller
{

	public function index()
	{
		return view('content.index');
	}


	public function confirm(Request $request)
	{
		//
		$request->validate([
			'name' => 'required',
			'email' => 'required|email',
			'company' => 'required',
			'title' => 'required',
			'message' => 'required',
		]);

		$inputs = $request->all();

		return view('content.confirm',['inputs' => $inputs,]);
	}

	//
	public function send(Request $request)
	{
		try
		{
			$inquiry = new Inquiry;

			$inquiry->name = $request->input('name');

			$inquiry->email = $request->input('email');

			if(!empty($request->input('company')))
			{
				$inquiry->company = $request->input('company');
			}

			$inquiry->staffs = $request->input('staffs');

			$inquiry->message = $request->input('message');

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
	}
}
