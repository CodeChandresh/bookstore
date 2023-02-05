<template>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                <div class="col-md-10"><h6 class="m-0 font-weight-bold  text-primary" style="vertical-align: middle;display: inline;">
                    <strong v-if="book.id == undefined" >Add New Book</strong>
                        <strong v-if="book.id !== undefined" >Edit Book</strong>
                </h6></div>
                <div class="col-md-2 float-right">
                    <a href="/admin/dashboard">
                        <button class="btn btn-primary">Back</button>
                    </a>
                </div>
                </div>
                       
                    </div>
                    <div class="card-body">
                        <form action="/admin/store" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" :value="token">
                            <input v-if="book.id !== undefined" type="hidden" name="id" :value="book.id">
                            <div class="form-group">
                                <label for="title"> Book Title </label>
                                <input type="text" class="form-control" :value="book.title" id="title" name="title"
                                    placeholder="Book Title.." required>
                            </div>
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" class="form-control" :value="book.author" name="author" id="author" placeholder="Author" required>
                            </div>
                            <div class="form-group">
                                <label for="genre">Genre</label>
                                <input type="text" class="form-control" :value="book.genre" name="genre" id="genre" placeholder="Genre" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" :value="book.description" rows="3"  required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="number" class="form-control" :value="book.isbn" name="isbn" id="isbn" placeholder="ISBN" required>
                            </div>
                            <div class="form-group">
                                <label for="published">Publish Date</label>
                                <input type="date" class="form-control" :value="book.published" name="published" id="published"
                                    placeholder="Publish Date" required>
                            </div>
                            <div class="form-group">
                                <label for="publisher">Publisher</label>
                                <input type="text" class="form-control" :value="book.publisher" name="publisher" id="publisher" placeholder="Publisher" required>
                            </div>
                            <img :src="book.image" class="img-fluid d-block rounded col-md-2" style="margin-bottom:10px">
                            <div class="custom-file">
                                <input type="hidden" :value="book.image" name="old_image">
                                <input type="file" class="custom-file-input"  name="image" >
                                <label class="custom-file-label" for="image">Choose Photo (Optional)</label>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary">Submit</button> &nbsp;
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props: ['book','token'], 
    mounted() {
    }, 
    
}


</script>
