<!-- Create post modal -->
<div class="customModal" id="postModal">
        
    <form 
        action="" 
        method="POST" 
        enctype="multipart/form-data">

        @csrf

        <!-- Modal header -->
        <div class="modalHeader">
            <h4 class="text-gray-800">Create Post</h4>
            <button onclick="closePostModal()">
                <i class="bi bi-x-circle text-lg text-gray-400 hover:text-gray-900"></i>
            </button>
        </div>
        
        <!-- Modal body -->
        <div class="modalBody px-4 my-2">
            
            <label class="inputLabel">
                Title <b class="text-red-500">*</b>
                @error('title')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </label> 

            <!-- Blog title -->
            <div class="inputGroup">
                <span class="inputIcon">
                    <i class="bi bi-align-start"></i>
                </span>
                <input 
                    type="text" 
                    class="inputField" 
                    name="title" 
                    value="{{ old('title') }}" 
                    placeholder="Blog title"
                >
            </div>
            
            <!-- Blog category wrapper -->
            <div class="flex justify-between items-baseline py-1">
                <label class="inputLabel">
                    Category <b class="text-red-500">*</b>
                    @error('category')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </label> 
                
                <!-- Add category button -->
                <a href="{{ url('/admin/category') }}" target="_blank" class="addCateBtn">
                    Add category 
                    <i class="bi bi-box-arrow-up-right text-xs"></i>
                </a>
            </div>

            <!-- Category select list -->
            <div class="inputGroup">
                <span class="inputIcon">
                    <i class="bi bi-bookshelf"></i>
                </span>

                <select class="inputField" name="category">
                    <option>Select a category</option>
                    {{-- @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if(old('category') == $category->id) selected @endif>{{ $category->name }}</option>
                    @endforeach --}}
                </select>
            </div>
            
            <label class="inputLabel">
                Description <b class="text-red-500">*</b>
                @error('description')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </label> 

            <!-- Blog description -->
            <div class="inputGroup">
                <span class="inputIcon">
                    <i class="bi bi-pencil-square"></i>
                </span>
                <textarea 
                    class="inputField px-4 h-20 overflow-y-auto" 
                    name="description" 
                    placeholder="Blog description"
                >
                    {{ old('description') }}
                </textarea>
            </div>
            
            <!-- Blog photo -->
            <label class="inputLabel">
                Blog photo<b class="text-red-500"> * </b>
                @error('image')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </label> 

            <!-- Blog photo upload -->
            <div class="inputGroup">
                <input type="file" class="photoInput" name="image" value="{{ old('image') }}">
            </div>

        </div>

        <!-- Modal footer -->
        <div class="mb-12">
            <button class="float-right text-sm py-2.5 px-5 rounded-sm mt-2 mb-6 mr-4 text-white bg-rose-600 hover:bg-rose-700">
               Publish Post <i class="bi bi-send"></i>
            </button>
        </div>

    </form>

</div>

<!-- Keeps Create Post Modal open when there is error after form submission -->
@if ($errors->any())
    <script defer>
        $(document).ready(function(){
            openPostModal();
        });
    </script>
@endif