<template>
<div class="container">
<div class="row">
  <!-- BEGIN SEARCH RESULT -->
  <div class="col-md-12">
    <div class="grid search">
      <div class="grid-body">
        <div class="row">
          <!-- BEGIN FILTERS -->
          <div class="col-md-3">
            <h2 class="grid-title"><i class="fa fa-filter"></i> Filters</h2>
            <hr>
            
            <!-- BEGIN FILTER BY CATEGORY -->
            <h4>By field:</h4>
            <div class="checkbox">
              <label><input type="checkbox" name="filter_value" value="title" class="icheck"> Title</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" name="filter_value" value="author"  class="icheck"> Author</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox"  name="filter_value" value="genre"  class="icheck"> Genre</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox"  name="filter_value" value="isbn"  class="icheck">ISBN</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox"  name="filter_value" value="publisher"  class="icheck"> Publisher</label>
            </div>
            <!-- END FILTER BY CATEGORY -->
            
            <div class="padding"></div>
            
            <!-- BEGIN FILTER BY DATE -->
            <h4>By published:</h4>
            <div class="input-group date form_date" data-date="2014-06-14T05:25:07Z" data-date-format="dd-mm-yyyy" data-link-field="dtp_input1">
              <input type="text" class="form-control">
              <span class="input-group-addon bg-blue"><i class="fa fa-th"></i></span>
            </div>
            <input type="hidden" id="dtp_input1" value="">
            
        
          </div>
          <!-- END FILTERS -->
          <!-- BEGIN RESULT -->
          <div class="col-md-9">
            <h2><i class="fa fa-file-o"></i> Result</h2>
            <hr>
            <!-- BEGIN SEARCH INPUT -->
            <div class="input-group">
              <input type="text" class="form-control" value="web development">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
              </span>
            </div>
            <!-- END SEARCH INPUT -->
            <p>Showing all results matching "web development"</p>
            
            <div class="padding"></div>
            
            <div class="row">
              <!-- BEGIN ORDER RESULT -->
              <div class="col-sm-6">
                <div class="btn-group">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    Order by <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Name</a></li>
                    <li><a href="#">Date</a></li>
                    <li><a href="#">View</a></li>
                  </ul>
                </div>
              </div>
              <!-- END ORDER RESULT -->
              
            </div>
            
            <!-- BEGIN TABLE RESULT -->
            <div class="table-responsive">
              <table class="table table-hover">
                <tbody
                v-for="q in res"
                    :key="q.id"
                    id="store-list"
                >
                <tr>
                  <td class="image"><v-lazy-image
                                                :src="q.image"
                                                class="img-responsive"
                                        /></td>
                  <td class="product"><strong>
                    <router-link
                                            :to="'/book/' + q.id"
                                            class="text-decoration-none"
                                        >
                                        <strong>{{ q.title }}</strong>
                                        </router-link>

                  </strong><br>
                  <p>
                                            Author : {{ q.author }}<br />Genre:
                                            {{ q.genre }}<br />ISBN: {{ q.isbn
                                            }}<br />
                                            Publish Date: {{ q.published }}
                                        </p>
                
                </td>
                
                </tr>
             
               
              </tbody></table>
            </div>
            <!-- END TABLE RESULT -->
            
            <!-- BEGIN PAGINATION -->
            <!-- <ul class="pagination">
              <li class="disabled"><a href="#">«</a></li>
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">»</a></li>
            </ul> -->
            <!-- END PAGINATION -->
          </div>
          <!-- END RESULT -->
        </div>
      </div>
    </div>
  </div>
  <!-- END SEARCH RESULT -->
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
                .get("api/books/search/" + this.query)
                .then((response) => (this.res = response.data.books));
        },
    },
};
</script>
