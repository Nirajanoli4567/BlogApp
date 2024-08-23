<x-bootstrap/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css"> --}}
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
            <div class="main-content">
                <x-message/>
                <div class="mb-4 d-flex justify-content-end p-5">
                    <a href="{{ route('blog.create') }}" class="btn btn-primary">
                        Add Blog
                    </a>
                </div>

                <!-- Data Table -->
                <div class="data p-5">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Status</th>
                                <th scope="col">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $index => $blog)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->description }}</td>
                                    <td>{{ ucfirst($blog->category) }}</td>
                                    <td>
                                        @if ($blog->photo)
                                            <img src="{{ asset('storage/' . $blog->photo) }}" alt="Blog Photo" style="max-height: 100px;">
                                        @else
                                            No Photo
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge {{ $blog->status === 'approved' ? 'bg-success' : 'bg-danger' }}">
                                            {{ ucfirst($blog->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('blog.delete', $blog->id) }}" class="btn btn-danger btn-delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                      <!-- Confirmation Modal -->
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this blog? This action cannot be undone.
                    </div>
                    <div class="modal-footer">
                        <form id="deleteForm" method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <!-- Bootstrap JS and dependencies -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script> --}}
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script> --}}
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const url = this.getAttribute('href');
                document.getElementById('deleteForm').action = url;
                new bootstrap.Modal(document.getElementById('confirmDeleteModal')).show();
            });
        });
    });
    </script>
</html>
