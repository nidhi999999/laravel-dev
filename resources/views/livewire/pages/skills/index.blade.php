<div class="container mx-auto py-4">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">Skills</h1>
    </div>
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif
    @if (session()->has('alert'))
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            {{ session('alert') }}
        </div>
    @endif
    <div class="grid md:grid-cols-2 gap-6 mt-6">
        <div>
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skills as $skill)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row" class="flex justify-between items-center px-4 py-3 font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                      <span>{{ $skill->name }}</span>
                                        <div class="space-x-4">
                                            <button wire:click="editSkill({{ $skill->id }})" class="text-blue-500 hover:text-blue-600">
                                                Edit
                                            </button>
                                            <button wire:click="deleteSkill({{ $skill->id }})" class="text-red-500 hover:text-red-600">
                                                Delete
                                            </button>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
            <h1 class="p-4 font-semibold text-gray-700">{{ $isEdit ? 'Update' : 'Add new' }} skill</h1>
            <form wire:submit.prevent="{{ $isEdit ? 'updateSkill' : 'addSkill' }}" class="p-4">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" wire:model="name" class="mt-1 p-2 w-full border border-gray-300 rounded-lg" placeholder="Enter skill" required>
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex items-center space-x-4">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                        {{ $isEdit ? 'Update Skill' : 'Add Skill' }}
                    </button>
                    @if ($isEdit)
                        <button type="button" wire:click="resetFields" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600">
                            Cancel
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
