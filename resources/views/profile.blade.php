<x-app-layout>

    <div class="py-12">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">

        <div class="grid grid-cols-2 gap-2">    
            
            <div class="sm:rou nded-lg bg-white p-4 shadow sm:p-8 dark:bg-gray-800">
                <div class="max-w-xl">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <div class="bg-white p-4 shadow sm:p-8 dark:bg-gray-800">
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </div>
            
        </div>    
            <div class="bg-white p-4 shadow sm:p-8 dark:bg-gray-800">
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
