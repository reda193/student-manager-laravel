<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tailwind CSS Showcase</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom animations */
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body class="bg-gray-100 p-10 space-y-8">
    <div class="container mx-auto">
        <!-- Heading with Transitions and Hover Effects -->
        <h1 class="text-4xl font-bold text-pink-600 
            transition duration-500 ease-in-out 
            hover:text-pink-800 
            hover:scale-105 
            hover:drop-shadow-lg 
            cursor-pointer 
            text-center 
            mb-8 
            animate-pulse">
            Interactive Tailwind Showcase
        </h1>

        <!-- Card with Multiple Effects -->
        <div class="bg-white 
            rounded-xl 
            shadow-lg 
            p-6 
            transform 
            transition 
            duration-300 
            hover:scale-105 
            hover:shadow-2xl 
            border-4 
            border-transparent 
            hover:border-pink-300 
            mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">
                Hover & Interaction Demo
            </h2>
            <p class="text-gray-600 mb-4">
                Explore various Tailwind CSS effects and transitions!
            </p>
            <button class="
                bg-pink-500 
                text-white 
                px-6 
                py-2 
                rounded-full 
                hover:bg-pink-600 
                transition 
                duration-300 
                transform 
                hover:-translate-y-1 
                hover:scale-110 
                active:bg-pink-700 
                focus:outline-none 
                focus:ring-2 
                focus:ring-pink-400 
                focus:ring-opacity-50">
                Interact Me!
            </button>
        </div>

        <!-- Grid of Hover Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="
                bg-white 
                p-6 
                rounded-lg 
                shadow-md 
                transition 
                duration-500 
                hover:bg-pink-50 
                hover:shadow-xl 
                border 
                border-gray-200 
                hover:border-pink-300
                group">
                <h3 class="
                    text-xl 
                    font-bold 
                    mb-4 
                    text-gray-800 
                    group-hover:text-pink-600 
                    transition 
                    duration-300">
                    Hover Effect 1
                </h3>
                <p class="text-gray-600 group-hover:text-gray-800 transition duration-300">
                    Explore smooth color and shadow transitions.
                </p>
            </div>

            <div class="
                bg-white 
                p-6 
                rounded-lg 
                shadow-md 
                transition 
                duration-500 
                hover:bg-blue-50 
                hover:shadow-xl 
                border 
                border-gray-200 
                hover:border-blue-300
                group">
                <h3 class="
                    text-xl 
                    font-bold 
                    mb-4 
                    text-gray-800 
                    group-hover:text-blue-600 
                    transition 
                    duration-300">
                    Hover Effect 2
                </h3>
                <p class="text-gray-600 group-hover:text-gray-800 transition duration-300">
                    Discover interactive design elements.
                </p>
            </div>

            <div class="
                bg-white 
                p-6 
                rounded-lg 
                shadow-md 
                transition 
                duration-500 
                hover:bg-green-50 
                hover:shadow-xl 
                border 
                border-gray-200 
                hover:border-green-300
                group">
                <h3 class="
                    text-xl 
                    font-bold 
                    mb-4 
                    text-gray-800 
                    group-hover:text-green-600 
                    transition 
                    duration-300">
                    Hover Effect 3
                </h3>
                <p class="text-gray-600 group-hover:text-gray-800 transition duration-300">
                    Experience dynamic interface design.
                </p>
            </div>
        </div>

        <!-- Animated Input Field -->
        <div class="mt-8">
            <input type="text" placeholder="Enter your text" class="
                w-full 
                p-3 
                rounded-lg 
                border 
                border-gray-300 
                focus:border-pink-500 
                focus:ring 
                focus:ring-pink-200 
                focus:ring-opacity-50 
                transition 
                duration-300 
                text-gray-700 
                placeholder-gray-400
                hover:shadow-md">
        </div>
    </div>
</body>
</html>