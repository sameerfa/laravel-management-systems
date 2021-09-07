@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="flex flex-wrap">
        <div class="w-full pt-6 lg:w-64 lg:pt-0">
            @include('admin.message.nav-messages')
        </div>

        <div class="w-1 flex-grow lg:pl-4">
            <div class="card bg-white">
                <div class="card-header border-b border-blueGray-200">
                    <div class="card-header-container">
                        <h6 class="card-title">
                            {{ $title }}
                        </h6>
                    </div>
                </div>

                <div class="overdlow-hidden">
                    <div class="overdlow-x-auto">
                        <table class="table table-messages w-full">
                            <thead>
                                <tr>
                                    <th>{{ __('global.subject') }}</th>
                                    <th>{{ __('global.recipients') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($conversations as $conversation)
                                    <tr class="cursor-pointer" x-data="{ 'isUnread': @json($conversation->is_unread) }">
                                        <td class="p-0">
                                            <a href="{{ route('admin.messages.show', $conversation) }}" class="block px-4 py-2" :class="{ 'font-bold': isUnread }">
                                                {{ $conversation->subject }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.messages.show', $conversation) }}" class="block px-4 py-2 text-xs" :class="{ 'font-bold': isUnread }">
                                                @foreach($conversation->recipients->reject(function($user) {
                                                    return $user->id === auth()->id();
                                                    }) as $user)
                                                    {{ $user->name }}
                                                    &lt;{{ $user->email }}&gt;{{ !$loop->last ? ', ' : '' }}
                                                @endforeach
                                            </a>
                                        </td>
                                        <td class="px-4 py-2">
                                            <div class="flex justify-end">
                                                <form action="{{ route('admin.messages.destroy', $conversation) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-sm btn-rose mr-2" type="submit">
                                                        {{ __('global.delete') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="px-4 py-2">{{ __('global.you_have_no_messages') }}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-body"></div>
            </div>
        </div>
    </div>
</div>
@endsection