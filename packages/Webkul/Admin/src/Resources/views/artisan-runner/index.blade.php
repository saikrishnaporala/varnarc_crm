<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.artisan-runner.index.title')
    </x-slot>

    <div class="flex flex-col gap-4">
        <!-- Header + Breadcrumbs -->
        <div class="flex items-center justify-between rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
            <div class="flex flex-col gap-2">
                <!-- Breadcrumbs -->
                <x-admin::breadcrumbs name="artisan-runner" />

                <div class="text-xl font-bold dark:text-white">
                    @lang('admin::app.artisan-runner.index.title')
                </div>
            </div>
        </div>

        <!-- Artisan Command Runner Form -->
        <div class="rounded-lg border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 p-3">
            <form method="POST" action="{{ route('admin.artisan-runner.run') }}">
                @csrf

                <div class="flex flex-col gap-4">
                    <div>
                        <label class="mb-4 block text-sm font-medium text-gray-700 dark:text-gray-300">
                            @lang('admin::app.artisan-runner.index.command')
                        </label>
                        {!! view_render_event('admin.leads.create.details.attributes.before') !!}
                        <x-admin::form.control-group.control
                            type="text"
                            name="command"
                            rules="required"
                            value=""
                            :label="trans('admin::app.settings.artisan-runner.command')"
                            placeholder="Example: migrate, config:cache, queue:work"
                        />

                        <x-admin::form.control-group.error control-name="command" />
                    </div>

                    <div>
                        <button type="submit" class="primary-button">
                            @lang('admin::app.artisan-runner.index.run-btn')
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Results -->
        @if(session('output'))
            <div class="mt-4 rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-800 dark:bg-gray-800 dark:text-gray-100">
                <h3 class="mb-2 font-bold">@lang('admin::app.artisan-runner.index.output')</h3>
                <pre class="whitespace-pre-wrap text-sm">{{ session('output') }}</pre>
            </div>
        @endif
    </div>
</x-admin::layouts>
