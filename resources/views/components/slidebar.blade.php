<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documents</title>
</head>
<style>
    .slidebar
    {
        width: 10vw;
    }
       
    aside {
        background-color:white; 
        color: #333; 
        padding: 20px;
    
    top: 0;
        height: 80vh;
        width: 10vw;
    
    }
    
    /* Dark mode styles */
    .dark aside {
        background-color: #2d2d2d; /* Dark gray background for dark mode */
        color: #ccc; /* Light text color for dark mode */
    }
    
    /* Sidebar links */
    aside a {
        display: block;
        padding: 10px;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.3s, color 0.3s;
    }
    
    /* Hover effects for links */
    aside a:hover {
        background-color: #e0e0e0; /* Light gray background on hover for light mode */
        color: #000; /* Dark text color on hover for light mode */
    }
    
    /* Dark mode hover effects */
    .dark aside a:hover {
        background-color: #444; /* Darker background on hover for dark mode */
        color: #fff; /* White text color on hover for dark mode */
    }
    
    /* Responsive design for smaller screens */
   
    
        </style>
<body>
    <div class="slidebar">
        <aside class="w-64 bg-gray-200 dark:bg-gray-700 p-4">
            <ul class="space-y-4">
                <li>
                    <a href="{{ route('dashboard') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{route('blog')}}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">
                        Blog
                    </a>
                </li>
            </ul>
        </aside>
    </div>
</body>
</html>