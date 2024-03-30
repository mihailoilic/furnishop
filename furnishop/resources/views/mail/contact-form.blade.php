

<img src="{{ $message->embed(public_path()."/img/logo.png") }}" alt="furnishop">

<h2>New message from contact form</h2>

<h4>Name: {{ $name }}</h4>
<h4>E-mail: {{ $email }}</h4>
<h4>Subject: {{ $subject }}</h4>
<br>
<h4>Message:</h4>
<p>{{ $messageContent }}</p>

