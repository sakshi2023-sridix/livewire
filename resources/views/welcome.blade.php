


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire Crud</title>    
    <link data-minify="1" href="https://www.bacancytechnology.com/blog/wp-content/cache/min/1/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css?ver=1743666076" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @livewireStyles
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Livewire BY Sakshi</a>
        </div>
    </nav>    
    <div  class="container">
        <div class="row justify-content-center mt-3">
            <div class="py-6">
                
                    <nav class="bg-white shadow-md rounded-lg p-1 mb-6 flex justify-between">
                        <a href="{{ route('home') }}" class="text-gray-700 font-semibold px-4">Home</a>
                        <a href="{{ route('posts.create') }}" class="text-gray-700 font-semibold px-4">Create Post</a>
                        <a href="{{ route('user.posts') }}" class="text-gray-700 font-semibold px-4">My Posts</a>
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>