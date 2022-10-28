<?php 
	$notification_owner = unserialize($notification_owner);
	$ticket = unserialize($ticket);
	$original_ticket = unserialize($original_ticket);
	$email_from = unserialize($email_from);
?>

@extends($email)

@section('content')
	@if($notification_type == 'status')
		<p>{!! trans('panichd::email/globals.updated_status', ['user' => $notification_owner->name]) !!}</p>
	@elseif ($notification_type == 'agent')
		<p>{!! trans('panichd::email/globals.updated_agent', ['user' => $notification_owner->name]) !!}</p>
	@endif
	
	@if ($recipient->levelInCategory($ticket->category->id) > 1)
		@include('panichd::emails.partial.common_fields')
		@include('panichd::emails.partial.both_html_fields')
	@else
		@include('panichd::emails.partial.user_fields')
	@endif
@stop