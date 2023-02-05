<template>
    <div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image" :src="book.image" width="250" /> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"><router-link to="/"><span class="ml-1">Back</span> </router-link> </div>
                            </div>
                            <div class="mt-4 mb-1"> <span class="text-uppercase text-muted brand">{{book.publisher}}</span>
                                <h5 class="text-uppercase">{{book.title}}</h5>
                                <div class="price d-flex flex-row align-items-center">
                                    <p>Genre: {{book.genre}}<br> ISBN: {{book.isbn}}<br>  Publish Date: {{book.published}}</p>
                                </div>
                            </div>
                            <p class="about">{{book.description}}</p>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</template>
<style>
.card{border:none}.product{background-color: #eee ; height: 100%;}.brand{font-size: 13px}
.about{font-size: 14px}.color{margin-bottom:10px}
</style>
<script>

    export default {
        data() {
        return {
            book: {},
        };
    },
    mounted() {
        axios
            .get("/api/book/"+this.$route.params.id)
            .then((response) => (this.book = response.data));
    },
    }    
</script>