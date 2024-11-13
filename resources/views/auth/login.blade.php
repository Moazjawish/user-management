<x-layout>
    @section('title', 'Login page')
    <form method="post" action="/login/store" >
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Login</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed privately.</p>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                <x-form-field>
                    <x-form-label for="email">Email</x-form-label>
                    <div class="mt-2">
                        <x-form-input name="email" id="email" />
                    </div>
                    <x-form-error name="email"/>
                </x-form-field>

                <x-form-field>
                    <x-form-label for="password">Password</x-form-label>
                    <div class="mt-2">
                        <x-form-input name="password" id="password" />
                    </div>
                    <x-form-error name="password"/>
                </x-form-field>
            </div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/projects" class="text-sm font-semibold leading-6 text-gray-900">CANCEL</a>
            <x-submit-button href="/login/store">LOGIN</x-submit-button>
        </div>
    </form>

</x-layout>
