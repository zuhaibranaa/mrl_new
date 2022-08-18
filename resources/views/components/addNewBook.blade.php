<!-- Button trigger modal -->
<button type="button" class="btn mt-2 btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fa fa-plus-circle"></i> Add New Book
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Book</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="newBook" enctype="multipart/form-data" action="{{ route('book.store') }}">
                    @csrf
                    <label for="title">Title : </label>
                    <input required class="form-control" type="text" id="title" name="title">
                    <label for="image">Image : </label>
                    <input required class="form-control" type="file" id="image" accept="image/png, image/jpeg" name="image">
                    <label for="description">Description : </label>
                    <textarea required class="form-control" id="description" name="description"></textarea>
                    <label for="date">Release Date : </label>
                    <input required class="form-control" type="date" id="date" name="date">
                    <label for="author">Author : </label>
                    <input required class="form-control" type="text" id="author" name="author">
                    <label for="genre">Genre : </label>
                    <select required class="form-control" id="genre" name="genre">
                        @foreach(\App\Models\Category::all() as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="{
                    document.querySelector('#newBook').submit();
                }" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
