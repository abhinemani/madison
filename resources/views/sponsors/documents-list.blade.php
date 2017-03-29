@extends('layouts.app')

@section('pageTitle', trans('messages.sponsor.page_title_documents', ['sponsorName' => $sponsor->display_name]))

@section('content')
    <div class="page-header">
        <h1>{{ $sponsor->display_name }}</h1>
        @include('components.breadcrumbs.sponsor', ['sponsor' => $sponsor])
    </div>

    @include('components.errors')

    <div class="row">
        @include('sponsors.partials.sponsor-sidebar', ['sponsor' => $sponsor])
        <div class="col-md-9">
            <table class="table">
                <thead>
                    <tr>
                        <th>@lang('messages.document.title')</th>
                        <th>@lang('messages.created')</th>
                        <th>@lang('messages.document.publish_state_short')</th>
                        <th>@lang('messages.document.discussion_state_short')</th>
                        <th>@lang('messages.document.comments')</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $document)
                        <tr>
                            <td>
                                @if ($document->canUserView(Auth::user()))
                                    <a href="{{ route('documents.show', $document) }}">{{ $document->title }}</a>
                                @else
                                    {{ $document->title }}
                                @endif
                            </td>
                            <td>
                                @include('components/date', [
                                    'datetime' => $document->created_at,
                                ])
                            </td>
                            <td>{{ trans('messages.document.publish_states.'.$document->publish_state) }}</td>
                            <td>{{ trans('messages.document.discussion_states.'.$document->discussion_state) }}</td>
                            <td>
                                {{ $document->all_comments_count }}
                                <a href="{{ route('documents.comments.index', [$document, 'download' => 'csv', 'all' => true]) }}" title="{{ trans('messages.document.download_comments_csv') }}">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                @can('viewManage', $document)
                                    <a href="{{ route('documents.manage.settings', $document) }}"
                                        title="@lang('messages.document.manage')">

                                        <i class="fa fa-pencil"></i>
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('delete', $document)
                                    <div class="btn-group" role="group">
                                        {{ Form::open(['route' => ['documents.destroy', $document], 'method' => 'delete']) }}
                                            <button type="submit" class="btn btn-xs btn-link">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        {{ Form::close() }}
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if ($document->trashed() && Auth::user()->can('restore', $document))
                                    <div class="btn-group" role="group">
                                        {{ Form::open(['route' => ['documents.restore', $document], 'method' => 'delete']) }}
                                            <button type="submit" class="btn btn-xs btn-link">
                                                <i class="fa fa-undo"></i>
                                            </button>
                                        {{ Form::close() }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center">
                @include('components.pagination', ['collection' => $documents])
            </div>

            <hr>

            @if (Auth::user())
                {{ Html::linkRoute('documents.create', trans('messages.document.new'), [], ['class' => 'btn btn-primary'])}}
            @endif
        </div>
    </div>

@endsection
