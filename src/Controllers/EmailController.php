<?php

namespace Laramailer\Controllers;

use App\Http\Requests;
use Laramailer\Models\Email;
use App\Http\Controllers\Controller;

/**
 * Class EmailController
 * @package App\Http\Controllers\Frontend
 * @author Andre Figueira <andre@designfront.co.uk>
 */
class EmailController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $email = Email::where(['id' => $id])->firstOrFail();

        $previewLink = action('\Laramailer\Controllers\EmailController@show', ['id' => $id]);

        return view($email->template, $email, ['previewLink' => $previewLink]);
    }
}
