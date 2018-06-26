@component('mail::message')
# Ciao {{ $recipient->name }}

The post **{{ $post->title }}** was modified by {{ $modifier->name }}.

@component('mail::button', ['url' => route('posts.show', $post)])
View Article
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
