@extends('layouts.index')

@section('content')



<div class="modal-content mt-4 p-4">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><i class="icon icon-goals-1"></i>{{__('Editar Producto')}}</h4>
        
      </div>
      <form id="productEditForm" name="productEditForm" class="form-horizontal">
      <div class="modal-body">
        
          <div class="form-row">
            <div class="col-md-12 col-xs-12">
              <div class="form-row">
                <div class="form-group col-6 col-xs-12 m-0" id="vtitle_group">
                  {!! Form::label('Title', __('Titulo *'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                  {!! Form::text('title', $product->title, ['class'=>'form-control r-0 light s-12', 'id'=>'editar_title']) !!}
                  <span class="vtitle_span text-danger" style="font-size: 12px"></span>
                </div>
                <div class="form-group col-6 col-xs-12 m-0" id="vdescription_group">
                  {!! Form::label('Description', __('Description'), ['class'=>'col-form-label s-12']) !!}
                  {!! Form::text('description', $product->description, ['class'=>'form-control r-0 light s-12', 'id'=>'editar_description']) !!}
                  <span class="vdescription_span"></span>
                </div>
                <div class="form-group col-12 col-xs-12 m-0" id="vcategories_group">
                  {!! Form::label('Categories', __('Categoría'), ['class'=>'col-form-label s-12']) !!}
                  {!! Form::select('category_id[]', $categories, $product->categories, ['class'=>'form-control r-0 light s-12 select2', 'id'=>'select_category_id', 'multiple'=>'multiple']) !!} 
                  
                  <span class="vcategories_span"></span>
                </div>

                  <div class="form-group col-12 col-xs-12 m-0" id="description_group">
                  
                  {!! Form::hidden('id', null, ['class'=>'form-control r-0 light s-12', 'id'=>'product_id']) !!}
                  
                </div>
              </div>
            
            </div>
            
              
          </div>
          
        
      </div>
      </form>
    
      <br>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="ajaxEditProductSubmit"><i class="icon-save mr-2"></i>{{__('Guardar Datos')}}</button>
        

      </div>
    </div>

    <script>
      
       jQuery(document).ready(function(){

        jQuery('#ajaxEditProductSubmit').click(function(e){

                var id =  $('#product_id').val();
                console.log(id);
               e.preventDefault();
               $(this).html('Sending..');

               $.ajaxSetup({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  data: $('#productEditForm').serialize(),
                  url:"{{ url('products/edit') }}/"+id,
                  method: 'post',
                  dataType: 'json',
                  success: function(r){

                     $('#productEditForm').trigger("reset");
                     $('#ajaxEditProductSubmit').html('Save Data');

                     
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


