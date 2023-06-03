@if($item->event !== 'commented')
    <li class="relative flex gap-x-4">
        <div class="absolute left-0 top-0 flex w-6 justify-center @if($last) h-6 @else -bottom-6 @endif">
            <div class="w-px bg-gray-200 dark:bg-gray-600"></div>
        </div>
        <img
            src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
            alt="" class="relative h-6 w-6 flex-none rounded-full bg-gray-50">
        <p class="flex-auto py-0.5 text-xs leading-5 text-gray-500">
        <span class="font-medium text-gray-900 dark:text-gray-400">
            {{ $item->causer->name }}
        </span>
            @lang('feed.actions.' . $item->event, ['type' => __(strtolower(basename(str_replace('\\', '/', $item->subject_type))))])
        </p>
        <time datetime="{{ $item->created_at }}" class="flex-none py-0.5 text-xs leading-5 text-gray-500">
            {{ $item->created_at->diffForHumans() }}
        </time>
    </li>
@else
    <li class="relative flex gap-x-4">
        <div class="absolute left-0 top-0 flex w-6 justify-center @if($last) h-6 @elseif($first) mt-3 -bottom-6 @else -bottom-6 @endif">
            <div class="w-px bg-gray-200 dark:bg-gray-600"></div>
        </div>
        <img
            src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
            alt="" class="relative mt-3 h-6 w-6 flex-none rounded-full bg-gray-50">
        <div class="flex-auto rounded-md p-3 ring-1 ring-inset ring-gray-200 dark:ring-gray-600">
            <div class="flex justify-between gap-x-4">
                <div class="py-0.5 text-xs leading-5 text-gray-500">
                     <span class="font-medium text-gray-900 dark:text-gray-400">
                        {{ $item->causer->name }}
                    </span>
                    @lang('feed.actions.' . $item->event, ['type' => __(strtolower(basename(str_replace('\\', '/', $item->subject_type))))])
                </div>
                <time datetime="{{ $item->created_at }}" class="flex-none py-0.5 text-xs leading-5 text-gray-500">
                    {{ $item->created_at->diffForHumans() }}
                </time>
            </div>
            <div class="flex gap-2 justify-between">
                <div class="prose-sm text-sm leading-6 text-gray-500 dark:text-gray-400">
                    {!! Str::of($item->getExtraProperty('comment'))->markdown(['html_input' => 'strip',]); !!}
                </div>
                <div x-on:click="$wire.reply({{ $item->id }})"
                    class="rounded-md w-8 h-8 bg-white dark:bg-gray-700 px-2.5 py-1.5 text-sm font-semibold text-gray-900 dark:text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 hover:bg-gray-100 dark:hover:bg-gray-800">
                    <x-heroicon-o-reply class="w-3 h-3 text-gray-500 mt-1" />
                </div>
            </div>
        </div>
    </li>

@endif
