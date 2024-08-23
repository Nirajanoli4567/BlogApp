<x-bootstrap/>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
      <style>
        /* Sidebar styling */
        .sidebar {
            width: 200px; /* Adjust width as needed */
            height: 80vh; /* Fixed height */
            background-color: #f8f9fa; /* Light background color */
            border-right: 1px solid #dee2e6; /* Border on the right side */
            padding: 1rem;
            overflow-y: auto; /* Scroll if needed */
        }

        /* Dark mode styles */
        .dark .sidebar {
            background-color: #2d2d2d; /* Dark gray background for dark mode */
            color: #ccc; /* Light text color for dark mode */
        }

        /* Sidebar links */
        .sidebar a {
            display: block;
            padding: 10px;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Hover effects for links */
        .sidebar a:hover {
            background-color: #e0e0e0; /* Light gray background on hover for light mode */
            color: #000; /* Dark text color on hover for light mode */
        }

        /* Dark mode hover effects */
        .dark .sidebar a:hover {
            background-color: #444; /* Darker background on hover for dark mode */
            color: #fff; /* White text color on hover for dark mode */
        }

        /* Main content styling */
        .main-content {
            flex: 1; /* Allows main content to take up remaining space */
            padding: 1rem;
        }

        /* Horizontal layout */
        .horizontal-layout {
            display: flex;
            height: 80vh; /* Ensure container has the correct height */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                border-right: none;
                border-bottom: 1px solid #dee2e6;
            }

            .horizontal-layout {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('User Dashboard') }}
            </h2>
        </x-slot>

        <div class="horizontal-layout">
            <!-- Sidebar -->
            <aside class="sidebar">
                <ul class="list-unstyled">
                    <li>
                        <a href="{{ route('dashboard') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blog') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">
                            Blog
                        </a>
                    </li>
                </ul>
            </aside>
   
            <!-- Main Content -->
 <div class="form mt-4 ms-4 p-4 w-100 ">

    <form action="{{ route('blog.creates') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select id="category" class="form-select @error('category') is-invalid @enderror" name="category" required>
                <option value="" disabled selected>Select category</option>
                <option value="art" {{ old('category') == 'art' ? 'selected' : '' }}>Art</option>
                <option value="education" {{ old('category') == 'education' ? 'selected' : '' }}>Education</option>
                <option value="it" {{ old('category') == 'it' ? 'selected' : '' }}>IT</option>
            </select>
            @error('category')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" accept="image/*">
            @error('photo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
 </div>
        </div>
    </x-app-layout>

</body>
</html>
