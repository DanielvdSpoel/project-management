<div class="mt-6 flex gap-x-3">
    <img
        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
        alt="" class="h-6 w-6 flex-none rounded-full bg-gray-50">
    <div class="w-full">
        <div class="relative rounded-lg flex-auto disabled:opacity-70 dark:bg-gray-700">
            <div
                class="overflow-hidden dark:ring-gray-600 rounded-lg pb-12 shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-primary-600">
                <label for="comment" class="sr-only">Add your comment</label>
                <textarea rows="2" name="comment" id="comment" wire:model="newComment"
                          class="block w-full resize-none border-0 bg-transparent  py-1.5 text-gray-900 dark:text-white placeholder:text-gray-400 dark:placeholder-gray-500 focus:ring-0 sm:text-sm sm:leading-6"
                          placeholder="Add your comment..."></textarea>
            </div>

            <div class="absolute inset-x-0 bottom-0 flex justify-between py-2 pl-3 pr-2">
                <div class="flex items-center space-x-5">
                    <div class="flex items-center">
                        <button type="button"
                                class="-m-2.5 flex h-10 w-10 items-center justify-center rounded-full text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                      clip-rule="evenodd"/>
                            </svg>
                            <span class="sr-only">Attach a file</span>
                        </button>
                    </div>
                </div>
                <button x-on:click="$wire.comment()" type="button"
                        class="rounded-md bg-white dark:bg-gray-700 px-2.5 py-1.5 text-sm font-semibold text-gray-900 dark:text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-500 hover:bg-gray-50 dark:hover:bg-gray-600">
                    Comment
                </button>
            </div>
        </div>
        @error('newComment') <span class="mt-2 text-sm text-red-600">{{ $message }}</span> @enderror

    </div>
</div>
