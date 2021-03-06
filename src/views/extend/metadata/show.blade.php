@extends('core::layouts.master')

@section('content')
    <hgroup class="wrap">
        <h1>Site Metadata</h1>
    </hgroup>
    <section class="wrap">
    {{ Form::open(array('route' => 'admin.extend.metadata.save'))}}
        <fieldset class="split">
            <p>
                {{ Form::label('sitename', 'Site Name') }}
                {{ Form::text('sitename', $meta['sitename']) }}
            </p>
            <p>
                {{ Form::label('description', 'Site Description') }}
                {{ Form::textarea('description', $meta['description']) }}
            </p>
            <p>
                {{ Form::label('home_page') }}
                {{ Form::select('home_page', $pages, $meta['home_page']) }}
            </p>
            <p>
                {{ Form::label('posts_page') }}
                {{ Form::select('posts_page', $pages, $meta['posts_page']) }}
            </p>
            <p>
                {{ Form::label('posts_per_page') }}
                {{ Form::input('range', 'posts_per_page', $meta['posts_per_page'], array('min' => 1, 'max' => 15)) }}
            </p>
        </fieldset>
        <fieldset class="split">
            <legend>Appearance</legend>
            <p>
                {{ Form::label('theme', 'Current theme:') }}
                {{ Form::select('theme', $themes, $meta['theme']) }}
            </p>
        </fieldset>
        <fieldset class="split">
            <legend>Comments</legend>
            <p>
                {{ Form::label('auto_published_comments', 'Auto-allow comments:') }}
                {{ Form::checkbox('auto_published_comments', 1, $meta['auto_published_comments']) }}
            </p>
            <p>
                {{ Form::label('comment_notifications', 'Email notification for new comments:') }}
                {{ Form::checkbox('comment_notifications', 1, $meta['comment_notifications']) }}
            </p>
            <p>
                {{ Form::label('comment_moderation_keys', 'Spam keywords:') }}
                {{ Form::textarea('comment_moderation_keys', $meta['comment_moderation_keys']) }}
            </p>
        </fieldset>
        <aside class="buttons">
            {{ Form::button('Save', array('class' => 'btn', 'type' => 'submit')) }}
        </aside>
    {{ Form::close(); }}
    </section>
@stop
