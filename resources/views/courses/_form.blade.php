<div class="space-y-6">
    <!-- Title Field -->
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Course Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $course->title ?? '') }}" class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror" required placeholder="Enter course title">
        @error('title')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Description Field -->
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
        <textarea id="description" name="description" rows="6" class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror" required placeholder="Enter course description">{{ old('description', $course->description ?? '') }}</textarea>
        @error('description')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Max Students Field -->
    <div>
        <label for="max_students" class="block text-sm font-medium text-gray-700 mb-2">Maximum Students</label>
        <input type="number" id="max_students" name="max_students" value="{{ old('max_students', $course->max_students ?? '') }}" class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('max_students') border-red-500 @enderror" required min="1" placeholder="e.g., 30">
        @error('max_students')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
