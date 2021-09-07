<div class="card bg-white">
    <div class="p-4">
        <div class="flex justify-end">
            <a href="{{ route('admin.messages.create') }}" class="flex items-center justify-center bg-indigo-500 text-white rounded-full w-10 h-10 hover:shadow-md outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 ease-linear transition-all duration-150 cursor-pointer active:bg-indigo-600 focus:ring-indigo-500">
                <i class="fas fa-fw fa-pen-alt"></i>
            </a>
        </div>

        <ul class="list-inside mt-3">
            <li>
                <a href="{{ route('admin.messages.index') }}" class="{{ request()->is("admin/messages") ? "sidebar-nav-active" : "sidebar-nav" }}">
                    <i class="far fa-fw fa-envelope"></i>
                    {{ __('global.all_messages') }}
                    @if($unreadConversations['all'])
                        <span class="text-xs bg-rose-500 text-white px-2 py-1 rounded-xl font-bold float-right">
                            {{ $unreadConversations['all'] }}
                        </span>
                    @endif
                </a>
            </li>
            <li>
                <a href="{{ route('admin.messages.inbox') }}" class="{{ request()->is("admin/messages/inbox") ? "sidebar-nav-active" : "sidebar-nav" }}">
                    <i class="fas fa-fw fa-inbox"></i>
                    {{ __('global.inbox') }}
                    @if($unreadConversations['inbox'])
                        <span class="text-xs bg-rose-500 text-white px-2 py-1 rounded-xl font-bold float-right">
                            {{ $unreadConversations['inbox'] }}
                        </span>
                    @endif
                </a>
            </li>
            <li>
                <a href="{{ route('admin.messages.outbox') }}" class="{{ request()->is("admin/messages/outbox") ? "sidebar-nav-active" : "sidebar-nav" }}">
                    <i class="far fa-fw fa-paper-plane"></i>
                    {{ __('global.outbox') }}
                    @if($unreadConversations['outbox'])
                        <span class="text-xs bg-rose-500 text-white px-2 py-1 rounded-xl font-bold float-right">
                            {{ $unreadConversations['outbox'] }}
                        </span>
                    @endif
                </a>
            </li>
        </ul>
    </div>
</div>