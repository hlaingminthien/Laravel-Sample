 <div class="container">      
  <div class="row space-100 justify-content-center">
    <div class="col-lg-10 col-md-12 col-xs-12">
      <div class="contents">
        <h2 class="head-title">@lang('search.Find_the_job_that_fits_your_life')</h2>
        <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus, <br> id tincidunt nisi porta sit amet. Suspendisse et sapien varius, pellentesque dui non.</p>
        <div class="job-search-form">
          <form>
            @csrf
            <div class="row">
              <div class="col-lg-5 col-md-6 col-xs-12">
                <div class="form-group">
                  <input class="form-control" type="text" placeholder="@lang('search.job_title_or_company_name')" name="position_name" ng-model="position_name">
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group">
                  <div class="search-category-container">
                    <label class="styled-select">
                      <select ng-model="selectedState" name="state_id" value="selectedState" ng-options="state.id as state.name for state in states" class="form-control" >
                      </select>
                    </label>
                  </div>
                  <i class="lni-map-marker"></i>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="form-group">
                  <div class="search-category-container">
                    <label class="styled-select">
                    <select ng-model="selectedCategory" name="jobcategory_id" value="selectedCategory" ng-options="job_cate.id as job_cate.name for job_cate in job_cates" class="form-control">
                    </select>
                    </label>
                  </div>
                  <i class="lni-layers"></i>
                </div>
              </div>
              <div class="col-lg-1 col-md-6 col-xs-12">
                <button type="submit" class="button" ng-click="search()"><i class="lni-search"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> 
</div>      

