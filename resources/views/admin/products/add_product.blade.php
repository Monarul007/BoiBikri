@extends('layouts.admin.index')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/index">Home</a></li>
              <li class="breadcrumb-item active">Product Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
<section class="content pb-5">
    <form action="{{ url('/admin/create_category') }}" id="addCaategory" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Product Name</label>
                            <input type="text" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Product Description</label>
                            <textarea id="inputDescription" class="form-control" rows="8"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputSpecs">Product Specification</label>
                            <textarea id="inputSpecs" class="form-control" rows="8"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Regular Price</label>
                                    <input type="text" class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Discounted Price</label>
                                    <input type="text" class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Other Details</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputCategory">Select Category</label>
                            <select id="inputCategory" class="form-control custom-select">
                                <option selected disabled>Select One</option>
                                <option value="0">Category 1</option>
                                <option value="1">Category 2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputBrand">Select Brand</label>
                            <select id="inputBrand" class="form-control custom-select">
                                <option selected disabled>Select One</option>
                                <option value="0">Brand One</option>
                                <option value="1">Brand Two</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="inputColor">Product Color</label>
                                    <select id="inputColor" class="form-control custom-select">
                                        <option selected disabled>Select one</option>
                                        <option value="0">Color > Blue</option>
                                        <option value="1">Color > White</option>
                                        <option value="2">Color > Black</option>
                                        <option value="3">Color > Magenta</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="inputSize">Product Size</label>
                                    <select id="inputSize" class="form-control custom-select">
                                        <option selected disabled>Select one</option>
                                        <option value="0">Size > Small</option>
                                        <option value="1">Size > Medium</option>
                                        <option value="2">Size > Large</option>
                                        <option value="3">Size > XL</option>
                                        <option value="4">Size > XXL</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Product Code</label>
                            <input type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label for="inputImage">Product Image</label>
                            <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputImage">
                            <label class="custom-file-label" for="inputImage">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Product Type</label>
                            <select id="inputStatus" class="form-control custom-select">
                            <option selected disabled>Select one</option>
                            <option value="0">Regular Product</option>
                            <option value="1">Featured Product</option>
                            </select>
                        </div>
                        <br>
                        <br>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Create new Porject" class="btn btn-success float-right">
            </div>
        </div>
    </form>
</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <script>
    $(function () {
        $('#addCaategory').validate({
            rules: {
                cat_name: {
                required: true
                },
                cat_desc: {
                    required: true
                },
                cat_status: {
                    required: true
                },
            },
            messages: {
                cat_name: {
                    required: "Category Field Can't Be Empty!",
                },
                cat_desc: {
                    required: "Category Description Field Can't Be Empty!",
                },
                cat_status: {
                    required: "Please Select Category Status.",
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            }
        });
    });

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    });

    $(function () {
        // Summernote
        $('#inputDescription').summernote()
    });
    $(function () {
        // Summernote
        $('#inputSpecs').summernote()
    });
</script>

@endsection