<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"><i class="icon icon-goals-1"></i>{{__('Editar Category')}}</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form id="categoryEditForm" name="categoryForm" class="form-horizontal">
			<div class="modal-body">
				
					<div class="form-row">
						<div class="col-md-12 col-xs-12">
							<div class="form-row">
								<div class="form-group col-6 col-xs-12 m-0" id="title_group">
									{!! Form::label('Title', __('Title *'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
									{!! Form::text('title', null, ['class'=>'form-control r-0 light s-12', 'id'=>'edit_title']) !!}
									<span class="title_span text-danger" style="font-size: 12px"></span>
								</div>
								<div class="form-group col-6 col-xs-12 m-0" id="description_group">
									{!! Form::label('Description', __('Description'), ['class'=>'col-form-label s-12']) !!}
									{!! Form::text('description', null, ['class'=>'form-control r-0 light s-12', 'id'=>'edit_description']) !!}
									<span class="description_span"></span>
								</div>
								<div class="form-group col-12 col-xs-12 m-0" id="description_group">
									
									{!! Form::hidden('id', null, ['class'=>'form-control r-0 light s-12', 'id'=>'category_id']) !!}
									
								</div>
							</div>
						
						</div>
						
							
					</div>
					
				
			</div>
			</form>
		
			<br>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">{{__('Close') }}</button>
				<button type="submit" class="btn btn-primary" id="ajaxEditSubmit"><i class="icon-save mr-2"></i>{{__('Save data')}}</button>
				

			</div>
		</div>
	</div>
</div>



