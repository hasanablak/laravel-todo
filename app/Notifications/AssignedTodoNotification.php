<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AssignedTodoNotification extends Notification implements ShouldQueue
{
	use Queueable;

	public $authId;

	public $assignedUserId;
	/**
	 * Create a new notification instance.
	 *
	 * @return void
	 */
	public function __construct($assignedUserId, $authId)
	{
		//auth()->user()->is_admin && $usersQid != auth()->id();

		/**
		 * AUTH USER ADMIN ISE VE USERSID EŞİT DEĞİL İSE AUTH ID'YE
		 */
		$this->assignedUserId = $assignedUserId;
		$this->authId = $authId;
	}

	/**
	 * Get the notification's delivery channels.
	 *
	 * @param  mixed  $notifiable
	 * @return array
	 */
	public function via($notifiable)
	{

		return ['mail'];
	}

	/**
	 * Get the mail representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return \Illuminate\Notifications\Messages\MailMessage
	 */
	public function toMail($notifiable)
	{
		return (new MailMessage)
			->line('The introduction to the notification.')
			->action('Notification Action', url('/'))
			->line('Thank you for using our application!');
	}

	/**
	 * Get the array representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return array
	 */
	public function toArray($notifiable)
	{
		return [
			//
		];
	}
}
