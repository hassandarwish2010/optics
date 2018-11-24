<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail;
use App\Setting;
use App\Http\Requests\User\MailRequest;

class ContactController extends Controller
{
  /**
   * Show contact page
   *
   * @return response
   */
  public function index() {
    $setting = Setting::first();
    return view('web.contact.index', compact('setting'));
  }

  /**
   * Submit sending mail to company
   *
   * @return response
   */
  public function submit(MailRequest $request) {
    $mail = Mail::create($request->all());
    $mail->save();

    return redirect()->back()->with(['success' => 'Mail sent successfully']);
  }
}
