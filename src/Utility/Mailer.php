<?php

namespace Andrefigueira\Laramailer\Utility;

use Mail;
use Andrefigueira\Laramailer\Models\Email;

/**
 * Class Mailer
 * @package App\Http\Mailer
 * @author Andre Figueira <andre@designfront.co.uk>
 */
class Mailer
{
    /**
     * Name of the template
     *
     * @var string
     */
    protected $template;

    /**
     * The email subject
     *
     * @var string
     */
    protected $subject;

    /**
     * Array of the to email and name
     *
     * @var array
     */
    protected $to;

    /**
     * Data to be passed on to the view
     *
     * @var array
     */
    protected $data;

    /**
     * If the email will be queued or not
     *
     * @var bool
     */
    protected $queue = false;

    /**
     * Sets the template for the email
     *
     * @param $template
     * @return $this
     */
    public function template($template)
    {
        $this->template = $template;

        return $this;
    }

    /**
     * Sets the email subject
     *
     * @param $subject
     * @return $this
     */
    public function subject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Sets whom will receive the email
     *
     * @param $email
     * @param $name
     * @return $this
     */
    public function to($email, $name)
    {
        $this->to = [
            'email' => $email,
            'name'  => $name,
        ];

        return $this;
    }

    /**
     * Passes through data to be used in the email
     *
     * @param array $data
     * @return $this
     */
    public function with(array $data = [])
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Determines if the email will be queued or not
     *
     * @return $this;
     */
    public function queue()
    {
        $this->queue = true;

        return $this;
    }

    /**
     * Sends the email with the data which was defined
     */
    public function send()
    {
        $saveData = [
            'to' => $this->to['email'],
            'subject' => $this->subject,
            'content' => json_encode($this->data),
            'template' => $this->template,
        ];

        // Store the email for reference
        $email = Email::create($saveData);

        // Finishing touches on data
        $saveData['previewLink'] = action('Frontend\EmailController@show', ['id' => $email->id]);
        $saveData['content'] = json_decode($saveData['content'], true);

        $sendVerb = 'send';

        if ($this->queue) {
            $sendVerb = 'queue';
        }

        // Send the customer a confirmation email
        Mail::$sendVerb($this->template, $saveData, function ($m) use ($saveData) {
            $m->from(getenv('MAIL_NOREPLY'), getenv('MAIL_NOREPLY_NAME'));

            $m->to($this->to['email'], $this->to['name'])->subject($this->subject);
        });
    }
}