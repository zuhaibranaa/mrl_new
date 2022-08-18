<!-- Button trigger modal -->
<button type="button" class="btn mt-2 btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fa fa-plus-circle"></i> Add New Story
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Publish Your Story</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addstory" enctype="multipart/form-data" method="POST" action="{{ route('story.store') }}">
                    @csrf
                    <label class="form-label" for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control mt-2">
                    <label class="form-label" for="description">Description</label>
                    <textarea name="description" id="description" class="form-control mt-2"></textarea>
                    <label class="form-label" for="contents">Content</label>
                    <textarea name="contents" id="contents" class="form-control mt-2"></textarea>
                    <label class="form-label" for="image">Image</label>
                    <input type="file" accept="image/png,image/jpg" name="image" id="image" class="form-control mt-2">
                    <label class="form-label" for="genre">Genre</label>
                    <select name="genre" id="genre" class="form-select mt-2">
                        @foreach(\App\Models\Category::all() as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="{
                    document.querySelector('#addstory').submit();
                }" class="btn btn-primary">Publish</button>
            </div>
        </div>
    </div>
</div>
