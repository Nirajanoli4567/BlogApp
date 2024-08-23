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
                {{ __('Admin Dashboard') }}
            </h2>
        </x-slot>

        <div class="horizontal-layout">
            <!-- Sidebar -->
            <aside class="sidebar">
                <ul class="list-unstyled">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('adminblog') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">
                            Blog
                        </a>
                    </li>
                </ul>
            </aside>
   
            <section class="blogshere container mt-5">
                <div class="row mb-4">
                    <!-- Total Blogs Card -->
                    <div class="col-md-4">
                        <div class="card card-small bg-info text-white">
                            <div class="card-body">
                                <h5 class="card-title">Total Blogs</h5>
                                <p class="card-text">{{ $totalBlogs }}</p>
                            </div>
                        </div>
                    </div>
        
                    <!-- Approved Blogs Card -->
                    <div class="col-md-4">
                        <div class="card card-small bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title">Approved Blogs</h5>
                                <p class="card-text">{{ $approvedBlogs }}</p>
                            </div>
                        </div>
                    </div>
        
                    <!-- Pending Blogs Card -->
                    <div class="col-md-4">
                        <div class="card card-small bg-warning text-dark">
                            <div class="card-body">
                                <h5 class="card-title">Pending Blogs</h5>
                                <p class="card-text">{{ $pendingBlogs }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            </div>
        </div>
    </x-app-layout>

</body>
</html>
