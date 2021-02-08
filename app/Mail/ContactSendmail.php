<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSendmail extends Mailable
{
	use Queueable, SerializesModels;

	private $name;
	private $email;
	private $company;
	private $staffs;
	private $title;
	private $message;

	/**
	* Create a new message instance.
	*
	* @return void
	*/
	public function __construct()
	{
		$this->name = $inputs['name'];
		$this->email = $inputs['email'];
		$this->company = $inputs['company'];
		$this->title = $inputs['title'];
		$this->staffs = $inputs['staffs'];
		$this->message = $inputs['message'];
	}

	/**
	* Build the message.
	*
	* @return $this
	*/
	public function build()
	{
		return $this->from('exsv01ybckzn@gmail.com')
				->subject('問い合わせ　自動送信メール')
				->view('content.mail')
				->with([
					'name' => this->name,
					'email' => this->email,
					'company' => this->company,
					'staffs' => this->staffs,
					'title' => this->title,
					'message' => this->message,
				]);
	}
}
