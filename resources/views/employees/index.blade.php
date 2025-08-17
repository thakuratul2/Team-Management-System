@include('dashboard.layouts.header')
<div class="layout-wrapper layout-content-navbar  ">
    <div class="layout-container">
        <!-- Menu -->
        @include('dashboard.layouts.sidebar')
        <!-- / Menu -->


        <!-- Layout container -->
        <div class="layout-page">

            @include('dashboard.layouts.navbar')



            <!-- Content wrapper -->
           <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
          
  <!-- DataTable with Buttons -->
  <div class="card">
    <div class="card-datatable text-nowrap">
      <table class="datatables-basic table table-bordered table-responsive">
        <thead>
          <tr>
            <th></th>
            <th></th>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Salary</th>
            <th>Status</th>
            <th class="d-flex align-items-center">Action</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
  <!-- Modal to add new record -->
  <div class="offcanvas offcanvas-end" id="add-new-record">
    <div class="offcanvas-header border-bottom">
      <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body flex-grow-1">
      <form class="add-new-record pt-0 row g-2" id="form-add-new-record" onsubmit="return false">
        <div class="col-sm-12 form-control-validation">
          <label class="form-label" for="basicFullname">Full Name</label>
          <div class="input-group input-group-merge">
            <span id="basicFullname2" class="input-group-text"><i class="icon-base bx bx-user"></i></span>
            <input type="text" id="basicFullname" class="form-control dt-full-name" name="basicFullname" placeholder="John Doe" aria-label="John Doe" aria-describedby="basicFullname2" />
          </div>
        </div>
        <div class="col-sm-12 form-control-validation">
          <label class="form-label" for="basicPost">Post</label>
          <div class="input-group input-group-merge">
            <span id="basicPost2" class="input-group-text"><i class="icon-base bx bxs-briefcase"></i></span>
            <input type="text" id="basicPost" name="basicPost" class="form-control dt-post" placeholder="Web Developer" aria-label="Web Developer" aria-describedby="basicPost2" />
          </div>
        </div>
        <div class="col-sm-12 form-control-validation">
          <label class="form-label" for="basicEmail">Email</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="icon-base bx bx-envelope"></i></span>
            <input type="text" id="basicEmail" name="basicEmail" class="form-control dt-email" placeholder="john.doe@example.com" aria-label="john.doe@example.com" />
          </div>
          <div class="form-text">You can use letters, numbers & periods</div>
        </div>
        <div class="col-sm-12 form-control-validation">
          <label class="form-label" for="basicDate">Joining Date</label>
          <div class="input-group input-group-merge">
            <span id="basicDate2" class="input-group-text"><i class="icon-base bx bx-calendar"></i></span>
            <input type="text" class="form-control dt-date" id="basicDate" name="basicDate" aria-describedby="basicDate2" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" />
          </div>
        </div>
        <div class="col-sm-12 form-control-validation">
          <label class="form-label" for="basicSalary">Salary</label>
          <div class="input-group input-group-merge">
            <span id="basicSalary2" class="input-group-text"><i class="icon-base bx bx-dollar"></i></span>
            <input type="number" id="basicSalary" name="basicSalary" class="form-control dt-salary" placeholder="12000" aria-label="12000" aria-describedby="basicSalary2" />
          </div>
        </div>
        <div class="col-sm-12">
          <button type="submit" class="btn btn-primary data-submit me-sm-4 me-1">Submit</button>
          <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        </div>
      </form>
    </div>
  </div>
  <!--/ DataTable with Buttons -->

  
@include('dashboard.layouts.footer')
