

  div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <div class="col-12">
                 <div class="card">
              <div class="card-header">
                <button type="button" class="btn btn-default" id="add" data-toggle="modal" data-target="#modal-default">
                  Add new Company
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl.</th>
                    <th>Company Name</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>Hotline</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  </tbody>
                  <tfoot>
                  <tr>
                        <th>Sl.</th>
                        <th>Company Name</th>
                        <th>Type</th>
                        <th>Location</th>
                        <th>Hotline</th>
                        <th>Email</th>
                        <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
             
            
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Company</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" id="insert_form">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Company Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Group name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Type</label>
                        <input type="text" name="type" class="form-control" id="type" placeholder="Must include http://">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Location</label>
                        <input type="text" name="location" class="form-control" id="location" placeholder="Ex: Food">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hotline</label>
                        <input type="text" name="hotline" class="form-control" id="hotline" placeholder="Ex: 12k+">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <textarea class="form-control" name="email" id="email" rows="3" placeholder="Enter notes"></textarea>
                    </div>
                    <input type="hidden" name="grp_id" id="grp_id" />
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success swalDefaultSuccess"/>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

