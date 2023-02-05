<template>
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <form action="/goto" @submit.prevent="searchBook">
                    <div class="input-group">
                        <input
                            type="search"
                            v-model="query"
                            v-on:input="searchBook"
                            id="search"
                            class="form-control"
                            placeholder="Search for Book Title, Author, Gnre, ISBN Or Published (YYYY-MM-DD)"
                        />
                        <button
                            type="submit"
                            style="margin-left: 10px"
                            class="btn btn-primary"
                        >
                            Search
                        </button>
                    </div>
                    <div></div>
                </form>
            </div>
            <div v-if="query" class="card-body">
                <div
                    class="row bootstrap snippets bootdeys"
                    v-for="q in res"
                    :key="q.id"
                    id="store-list"
                >
                    <div class="col-md-12 col-xs-12">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-5 text-center">
                                        <a href="#"
                                            ><v-lazy-image
                                                :src="q.image"
                                                class="img-responsive"
                                        /></a>
                                    </div>
                                    <div class="col-sm-7">
                                        <router-link
                                            :to="'/book/' + q.id"
                                            class="text-decoration-none"
                                        >
                                            <h4 class="title-store">
                                                <strong>{{ q.title }}</strong>
                                            </h4>
                                        </router-link>
                                        <hr />
                                        <p>
                                            Author : {{ q.author }}<br />Genre:
                                            {{ q.genre }}<br />ISBN: {{ q.isbn
                                            }}<br />
                                            Publish Date: {{ q.published }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
body {
    background-color: #f2f2f2;
}

#store-list .img-responsive {
    height: 170px;
    border: 5px solid #ecf0f1;
    margin-bottom: 7px;
}
.card-body {
    background-color: #f2f2f2;
}
#store-list .panel {
    margin-bottom: 20px;
    background-color: #fff;
    padding: 20px 0px;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
}
</style>
<script>
import axios from "axios";
import VLazyImage from "v-lazy-image";
export default {
    components: {
        VLazyImage,
    },
    name: "search",
    data() {
        return {
            query: "",
            res: "",
        };
    },
    methods: {
        searchBook() {
            axios
                .post("api/books/search/", {
                    keyword: this.query,
                })
                .then((response) => (this.res = response.data.books));
        },
    },
};
</script>
