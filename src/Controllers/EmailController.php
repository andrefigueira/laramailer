<?php

namespace Andrefigueira\Laramailer\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Andrefigueira\Laramailer\Models\Email;

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

        $previewLink = action('\Andrefigueira\Laramailer\Controllers\EmailController@show', ['id' => $id]);

        return view($email->template, $email, ['previewLink' => $previewLink]);
    }
}
