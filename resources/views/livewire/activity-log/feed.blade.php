<div
    class="filament-forms-card-component p-6 bg-white rounded-xl border border-gray-300 dark:border-gray-600 dark:bg-gray-800">
    <ul role="list" class="space-y-4 max-h-[60vh] overflow-y-scroll">

        @foreach($activity as $item)
            @include('livewire.activity-log.feed-item', ['item' => $item, 'last' => $loop->last, 'first' => $loop->first ])
        @endforeach
    </ul>

    <!-- New comment form -->
    @include('livewire.activity-log.new-comment')
</div>
