<template>
    <div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                <div class="col-md-7"><h6 class="m-0 font-weight-bold  text-primary" style="vertical-align: middle;display: inline;">All Books</h6></div>
                <div class="col-md-5 float-right text-right" style="text-align: right;">
                    <a href="/admin/create">
                        <button class="btn btn-primary">Add New Book</button>
                    </a>&nbsp;
                    <a href="/admin/fetch-books">
                        <button class="btn btn-primary">Fetch Books</button>
                    </a>
                </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table
                        class="table table-bordered"
                        id="dataTable"
                        width="100%"
                        cellspacing="0"
                    >
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Book Title</th>
                                <th scope="col">Book Description</th>
                                <th scope="col">ISBN</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                     
                        <tbody>
                            <tr v-if="books.data.length==0"><td colspan="5" class="text-center">No Result Found</td></tr>
                            <tr
                                v-for="(book, index) in books.data"
                                :key="book.id"
                                height="80px"
                            >
                                <th scope="row">{{ index + 1 }}</th>
                               
                                <td :title="book.title">
                                    {{ book.title.substring(0, 15) + ".." }}
                                </td>
                                <td>
                                    {{
                                        book.description.substring(0, 40) + ".."
                                    }}
                                </td>
                                <td>{{ book.isbn }}</td>
                                <td>
                                    <a :href="'/admin/edit/' + book.id"
                                        ><button
                                            class="btn btn-warning"
                                            style="margin-right: 10px"
                                        >
                                            Edit
                                        </button></a
                                    >
                                    <a onclick="return confirm('Are you sure you want to delete this book?');" :href="'/admin/delete/' + book.id"
                                        ><button class="btn btn-danger">
                                            Delete
                                        </button></a
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
       

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-6">
                        <Bootstrap5Pagination  :data="books"     :pageRange="4" @pagination-change-page="getResults" ></Bootstrap5Pagination>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
export default {
    components:{
        Bootstrap5Pagination
    },
    data() {
        return {
            books: {},
        };
    },
    mounted() {
        axios
            .get("/api/books")
            .then((response) => (this.books = response.data));
    },
    methods:{
        getResults(page = 1) {
              
              axios.get('/api/books?page=' + page).then((response) => (this.books = response.data));
          }
    }
   
};
</script>
