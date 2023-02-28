<x-app-layout>
    <!-- Style/title for index page -->
    @section('styles')
        <title>{{ 'Blogger | Home' }}</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/styles/css/myBootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/styles/css/index.css') }}">

    @endsection
    
    <div class="pt-8 pb-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-0">
            <div class="bg-white flex flex-col sm:flex-row justify-between overflow-hidden">
                <div class="text-gray-900 sm:w-1/2 px-4 sm:pr-6 sm:border-r w-full">

                    <!-- Post card -->
                    <div class="postCard z-0 border rounded-md"> 
                
                        <!-- post header -->
                        <div class="w-full p-2 flex justify-between align-middle my-auto border-b">

                            <!-- Left div -->
                            <div class="flex my-auto items-center">
                                <i class="bi bi-person-circle text-3xl text-black"></i>
                                <p class="text-sm font-medium ml-4">Username</p>
                            </div>
                                
                            <!-- Right div -->
                            <div class="flex items-center">
                
                                {{-- <!-- <p>{{ $post->created_at->diffForHumans() }}</p> --> --}}
                                <p class="text-xs text-gray-500 font-normal mr-3">date</p>
                
                                <!-- Link opens post dropdown -->
                                <i class="bi bi-three-dots-vertical text-sm p-2 py-1 text-gray-600 hover:bg-gray-100 hover:text-black rounded-full"></i>
                                
                                <!-- Three vertical dots on post modal -->
                                {{-- <!-- @include('posts.infoModal') --> --}}
                
                            </div>
                
                        </div>
                
                        <div>
                
                            <!-- URL to post details/show page -->
                            {{-- <!-- <a href="/posts/{{ $post->slug }}"> --> --}}

                                <!-- Post photo  -->
                                {{-- <img src="/uploads/{{ $post->image_path }}"> --}}
                                <div class="overflow-hidden">
                                    <img class="postPhoto" src="{{ url('frontend_assets/images/greenLeafPlant.jpg') }}">
                                </div>
                                
                            <!-- </a> -->

                            <!-- Post: like, comment, share icons container/wrapper -->
                            <div class="relative -top-56 float-right mr-5 z-0">
                                
                                <!-- Like icon -->
                                <div class="group postIconDiv">
                                    <div class="postIcon">
                                        <i id="heart-icon" class="bi bi-heart" onclick="replaceLikeIcon(this)"></i>
                                    </div>
                                    <div class="iconCount">0</div>
                                </div>
            
                                <!-- Comment icon -->
                                <div class="group postIconDiv">
                                    <div class="postIcon">
                                        <i id="heart-icon" class="bi bi-chat-square"></i>
                                    </div>
                                    <div class="iconCount">0</div>
                                </div>
            
                                <!-- Share icon -->
                                <div class="group postIconDiv">
                                    <div class="postIcon">
                                        <i id="heart-icon" class="bi bi-reply"></i>
                                    </div>
                                    <div class="iconCount">0</div>
                                </div>
            
                            </div>
                
                        </div>
                
                         <!-- Post category & description container/wrapper -->
                        <div class="p-4">
                            <p class="text-xs text-gray-800 tracking-widest font-normal uppercase">post category</p>
                            <p class="text-sm py-3 text-black tracking-widest font-semibold capitalize"> post title </p>
                            <p class="text-xs font-semibold text-gray-500"> post description </p>
                        </div>
                
                         <!-- Post comment container/wrapper -->
                        <div class="border-t pt-1 h-12 w-full">
                            <div class="flex items-center justify-between mt-0">
                                <span class="px-3">
                                    <!-- Post smiley -->
                                    <i class="bi bi-emoji-smile text-xl text-black"></i>
                                </span>
                                <textarea onclick="autoResizeTextarea()" id="expandable-textarea" class="textarea border-none focus:ring-0 outline-none focus:border-none focus:outline-none resize-none placeholder:text-sm placeholder:text-slate-400 block bg-white w-full sm:text-sm" placeholder="Add a comment..."></textarea>
                                <button class="postBtnWrapper -mr-16 py-1 px-3 rounded-md text-sm font-medium text-teal-400" id="postBtnWrapper" type="submit">Post</button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="w-1/2 sm:hidden">

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
