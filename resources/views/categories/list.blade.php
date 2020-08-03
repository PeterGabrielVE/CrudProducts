@extends('layouts.index')

@section('content')

@include('categories.create')
@include('categories.edit')
@include('categories.view')
@include('products.create')
@include('products.view')



<div class="p-4">
    <div class="page-header m-4">
        <div class="group-row">
            <div class="row">
            <h1>Categorías</h1>
            <a class="btn btn-success boton-add" title="Add" id="add_category">
                    <i class="mdi mdi-plus"></i></a>
            </div>

        </div>
    </div>

    @if (count($categorias) > 0)
        <table class="table table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITULO</th>
                    <th>DESCRIPCION</th>
                    
                    <th>OPCIONES</th>
                </tr>
            </thead>

            <tbody>
                @foreach($categorias as $key => $value)
                <tr>
                    <td>{{ $value->id  }}</td>
                    <td>{{ $value->title  }}</td>
                    <td>{{ $value->description  }}</td>

                    <td>
                        <a class="btn btn-info" title="View" onclick="showView({{ $value->id  }})">
                            <i class="mdi mdi-eye"></i>
                        </a>
                        <a class="btn btn-warning" title="Edit" onclick="showEdit({{ $value->id  }})">
                            <i class="mdi mdi-pencil"></i>
                        </a>
                        <a class="btn btn-danger" title="Delete" onclick="deleteCategory({{ $value->id  }})">
                            <i class="mdi mdi-delete"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">
            <b>Atención</b>
            <p>
                No Hay Categorías. <a href="/categories/add">Crear una nueva Categoría</a>.
            </p>
        </div>
    @endif
    <hr>
    <div class="page-header m-4">
         <div class="group-row">
            <div class="row">
            <h1>Productos</h1>
            <a class="btn btn-success boton-add" title="Add" id="add_product">
                    <i class="mdi mdi-plus"></i></a>
            </div>

        </div>
    </div>

    @if (count($productos) > 0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITULO</th>
                    <th>DESCRIPCION</th>
                    <th>CATEGORIA</th>
                    <th>OPCIONES</th>
                </tr>
            </thead>

            <tbody>
                @foreach($product as $key => $value)
                <tr>
                    <td>{{ $value->id  }}</td>
                    <td>{{ $value->title  }}</td>
                    <td>{{ $value->description  }}</td>
                     <td>
                        @foreach ($value->categories as $element)
                              <span class="badge badge-primary r-5">{{ $element->title }}</span>
                              @endforeach

                     </td>
                    <td>
                      <a class="btn btn-info" title="View" onclick="showViewProduct({{ $value->id  }})">
                            <i class="mdi mdi-eye"></i>
                        </a>
                        <a class="btn btn-warning" title="Edit" href="{{ route('product.show',$value->id) }}"">
                            <i class="mdi mdi-pencil"></i>
                        </a>
                        <a class="btn btn-danger" title="Delete" onclick="deleteProduct({{ $value->id  }})">
                            <i class="mdi mdi-delete"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">
            <b>Atención</b>
            <p>
                No Hay Productos. <a href="/categories/add">Crear un nuevo Producto</a>.
            </p>
        </div>
    @endif
</div>


<script>

    function showView(id){
            console.log(id);
          $("#view_Category").modal("show");
           $.ajaxSetup({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            $.ajax({
                type: "GET",
                url:"{{ url('/categories/view') }}/"+id,
                dataType:'json',
                success: function(data){
                    console.log(data);
                    $("#view_title").val(data['title']);
                    $("#view_description").val(data['description']);
                    
                }
            });

    };// function show vista


    function showEdit(id){
            console.log(id);
          $('#category_id').val(id);
          $("#editCategory").modal("show");
           $.ajaxSetup({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            $.ajax({
                type: "GET",
                url:"{{ url('/categories/view') }}/"+id,
                dataType:'json',
                success: function(data){
                    console.log(data);
                    $("#edit_title").val(data['title']);
                    $("#edit_description").val(data['description']);
                    
                }
            });

    };// function show edit


    function deleteCategory(id){
            console.log(id);
         
           $.ajaxSetup({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            $.ajax({
                type: "GET",
                url:"{{ url('/categories/remove') }}/"+id,
                dataType:'json',
                success: function(data){
                    console.log(data);
                     window.location.href = "{{URL::to('categories.list')}}"
                    
                }
            });

    };// function delete

    function showViewProduct(id){
            console.log(id);
          $("#viewProduct").modal("show");
          
           $.ajaxSetup({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            $.ajax({
                type: "GET",
                url:"{{ url('/product/view') }}/"+id,
                dataType:'json',
                success: function(data){
                    console.log(data);
                    $("#view_ptitle").val(data['title']);
                    $("#view_pdescription").val(data['description']);
                    $("#view_pcategories").val(data['category_id']);
                   
                }
            });

    };// function show vista

    function showEditProduct(id){
            console.log(id);
          $('#product_id').val(id);
          $("#editProduct").modal("show");
           $.ajaxSetup({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            $.ajax({
                type: "GET",
                url:"{{ url('/products/view') }}/"+id,
                dataType:'json',
                success: function(data){
                    console.log(data);
                    $("#editar_title").val(data.title);
                    $("#editar_description").val(data['description']);
                    $("#edit_pcategories").val(data['category_id']);
                    $("#product_id").val(data['id']);
                    
                }
            });

    };// function show edit


     function deleteProduct(id){
            console.log(id);
         
           $.ajaxSetup({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            $.ajax({
                type: "GET",
                url:"{{ url('/products/remove') }}/"+id,
                dataType:'json',
                success: function(data){
                    console.log(data);
                     window.location.href = "{{URL::to('categories.list')}}"
                    
                }
            });

    };// function delete
    
    jQuery(document).ready(function(){

    jQuery('#ajaxEditSubmit').click(function(e){

                var id =  $('#category_id').val();
               e.preventDefault();
               $(this).html('Sending..');

               $.ajaxSetup({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  data: $('#categoryEditForm').serialize(),
                  url:"{{ url('/categories/edit') }}/"+id,
                  method: 'post',
                  dataType: 'json',
                  success: function(r){

                     $('#categoryEditForm').trigger("reset");
                     $('#ajaxEditSubmit').html('Save Data');

                     $('#editCategory').modal('hide');
                    
                      window.location.href = "{{URL::to('categories.list')}}"
                      

                    

                  },
                 error :function( data ) {
                    console.log('Error:', data);
                    if( data.status === 422 ) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                        
                      
                        $('#ajaxEditSubmit').html('Save Data');
                            if($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    console.log(key+ " " +value);
                                    
                                    
                                });
                            }
                        });
                      }}
                });
            }); //edit


        jQuery('#ajaxSubmit').click(function(e){
               e.preventDefault();
               $(this).html('Sending..');

               $.ajaxSetup({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  data: $('#categoryForm').serialize(),
                  url:"{{ url('/categories/add') }}",
                  method: 'post',
                  dataType: 'json',
                  success: function(r){

                     $('#categoryForm').trigger("reset");
                     $('#ajaxSubmit').html('Save Data');

                     $('#create').modal('hide');
                    
                      window.location.href = "{{URL::to('categories.list')}}"
                      

                    

                  },
                 error :function( data ) {
                    console.log('Error:', data);
                    if( data.status === 422 ) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                        
                      
                        $('#ajaxSubmit').html('Save Data');
                            if($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    console.log(key+ " " +value);
                                    
                                    
                                });
                            }
                        });
                      }}
                });
            });// aggregar category

        jQuery('#ajaxProductSubmit').click(function(e){
               e.preventDefault();
               $(this).html('Sending..');

               $.ajaxSetup({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  data: $('#productForm').serialize(),
                  url:"{{ url('/products/add') }}",
                  method: 'post',
                  dataType: 'json',
                  success: function(r){

                     $('#productForm').trigger("reset");
                     $('#ajaxProductSubmit').html('Save Data');

                     $('#createProduct').modal('hide');
                    
                      window.location.href = "{{URL::to('categories.list')}}"
                      

                    

                  },
                 error :function( data ) {
                    console.log('Error:', data);
                    if( data.status === 422 ) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                        
                      
                        $('#ajaxProductSubmit').html('Save Data');
                            if($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    console.log(key+ " " +value);
                                    
                                    
                                });
                            }
                        });
                      }}
                });
            });// aggregar category

        jQuery('#ajaxEditProductSubmit').click(function(e){

                var id =  $('#product_id').val();
               e.preventDefault();
               $(this).html('Sending..');

               $.ajaxSetup({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  data: $('#productEditForm').serialize(),
                  url:"{{ url('/products/edit') }}/"+id,
                  method: 'post',
                  dataType: 'json',
                  success: function(r){

                     $('#productEditForm').trigger("reset");
                     $('#ajaxEditProductSubmit').html('Save Data');

                     $('#editProduct').modal('hide');
                    
                      window.location.href = "{{URL::to('categories.list')}}"
                      

                    

                  },
                 error :function( data ) {
                    console.log('Error:', data);
                    if( data.status === 422 ) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                        
                      
                        $('#ajaxEditSubmit').html('Save Data');
                            if($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    console.log(key+ " " +value);
                                    
                                    
                                });
                            }
                        });
                      }}
                });
            }); //edit


})





</script>


@endsection


