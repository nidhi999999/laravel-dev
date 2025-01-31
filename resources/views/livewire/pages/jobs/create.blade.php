<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Create new job posting</h1>
        </div>
        {{-- TODO: Add form here --}}
         <!-- Success Message -->
        @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 px-4 round py-2ed mb-2 px-4 py-2">
            {{ session('message') }}
        </div>
        @endif

        <!-- Job Post Form -->
        <form wire:submit.prevent="createJobPost">
            <div class="grid md:grid-cols-12 gap-x-4 mt-6">
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg md:col-span-8">
                <h1 class="p-4 font-semibold text-gray-700">Job Details</h1>

                <div class="mb-2 px-4 py-2">
                    <label for="title" class="block text-sm font-medium text-gray-700">Job Title</label>
                    <input type="text" placeholder="Job posting title" id="title" wire:model="title" class="mt-1 p-2 w-full border border-gray-300 rounded-lg @error('title') border-red-500 @enderror">
                    @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-2 px-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Job Description</label>
                    <textarea id="description" placeholder="Job posting description.." wire:model="description" class="mt-1 p-2 w-full border border-gray-300 rounded-lg @error('description') border-red-500 @enderror"></textarea>
                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-2 px-4 py-2 grid md:grid-cols-12 gap-4">
                    <div class="md:col-span-6">
                        <label for="experience" class="block text-sm font-medium text-gray-700">Experience</label>
                        <input type="text" placeholder="Eg. 1 -3 Yrs" id="experience" wire:model="experience" class="mt-1 p-2 w-full border border-gray-300 rounded-lg @error('experience') border-red-500 @enderror">
                        @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="md:col-span-6">
                        <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
                        <input type="text" placeholder="Eg. 2.75-5 Lacs PA" id="salary" wire:model="salary" class="mt-1 p-2 w-full border border-gray-300 rounded-lg @error('salary') border-red-500 @enderror">
                        @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mb-2 px-4 py-2 grid md:grid-cols-12 gap-4">
                    <div class="md:col-span-6">
                        <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                        <input type="text" placeholder="Eg. Remote / Pune" id="location" wire:model="location" class="mt-1 p-2 w-full border border-gray-300 rounded-lg @error('location') border-red-500 @enderror">
                        @error('location') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="md:col-span-6">
                        <label for="extra" class="block text-sm font-medium text-gray-700">Extra Info</label>
                        <input type="text" placeholder="Eg. Full Time, Urgent / Part Time, Flexiable" id="extra" wire:model="extra" class="mt-1 p-2 w-full border border-gray-300 rounded-lg @error('extra') border-red-500 @enderror">
                        <h6 class="block text-sm font-100 text-gray-700">Please use comma seperated values</h6>
                        @error('extra') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg md:col-span-4">
                <h1 class="p-4 font-semibold text-gray-700">Company Details</h1>
                <div class="mb-2 px-4 py-2">
                    <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
                    <input type="text" placeholder="tex" id="company_name" wire:model="company_name" class="mt-1 p-2 w-full border border-gray-300 rounded-lg @error('company_name') border-red-500 @enderror">
                    @error('company_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Company Logo -->
                <div class="mb-2 px-4 py-2">
                    <label for="company_logo" class="block text-sm font-medium text-gray-700">Upload Company Logo</label>
                    <input type="file" id="company_logo" wire:model="company_logo" class="mt-1 p-2 w-full border border-gray-300 rounded-lg @error('company_logo') border-red-500 @enderror">
                    @error('company_logo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                    <!-- Show the preview of the uploaded logo -->
                    @if ($company_logo)
                        <div class="mt-4">
                            <p>Logo Preview:</p>
                            <img src="{{ $company_logo->temporaryUrl() }}" class="w-32 h-32 object-cover mt-2">
                        </div>
                    @endif
                </div>


                <div class="mb-2 px-4 py-2">
                    <label for="skills" class="block text-sm font-medium text-gray-700">Select Skills</label>
                    <select id="skills" wire:model="skills" multiple class="mt-1 p-2 w-full border border-gray-300 rounded-lg @error('skills') border-red-500 @enderror">
                        <option value="">Select skills</option>
                        @if($availableSkills)
                        @foreach ($availableSkills as $skill)
                            <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                        @endforeach
                        @endif
                    </select>
                    @error('skills') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                </div>
            </div>
            <div class="mb-2 px-4 py-2">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Create Job Post</button>
            </div>
        </form>
    </div>
</div>
