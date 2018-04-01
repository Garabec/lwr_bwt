@extends('admin')

@section('content')

<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Product#{{$product->id}}</h3>
            </div>
            <!-- /.box-header -->
           
            <!-- form start -->
            <form class="form-horizontal" action="{{route('admin.products.edit',$product->id)}}" method="POST">
              <div class="box-body">
             {!! csrf_field() !!} 
             
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" value="{{$product->name}}" placeholder="Enter ...">
                  @if ($errors->has('name'))
                     <div style="color:red">{{ $errors->first('name') }}</div>
                  @endif
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="price" class="col-sm-2 control-label">Price</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" name="price" value="{{$product->price}}" placeholder="Enter ...">
                  @if ($errors->has('price'))
                     <div style="color:red">{{ $errors->first('price') }}</div>
                  @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                  <textarea class="form-control" rows="3" name="description"  placeholder="Enter ..." >{{$product->description}}</textarea>
                  @if ($errors->has('description'))
                     <div style="color:red">{{ $errors->first('description') }}</div>
                  @endif
                  </div>
                </div>
                <div class="form-group" >
                 <label for="tag" class="col-sm-2 control-label" >Tag</label>    
                  <div class="  col-sm-4 " ></div>
                </div>
                <div class="form-group" id="tag" style="display:none">
                  <label for="tag" class="col-sm-2 control-label" ></label>
                  <div class="col-sm-4">
                  <input type="text" class="form-control" name="tag[]" placeholder="Enter ..." disabled >
                  </div>
            
                  
                  <div class="col-sm-1">
                      <button type="button" id="add"  class="btn btn-success pull-rigth">Add</button>
                  </div>
                  <div class="col-sm-1">
                      <button type="button" id="del"  class="btn btn-danger pull-left">Del</button>
                  </div>
                </div>
                
             @foreach($product->tags as $key=>$tag)
             <div class="form-group" id="tag-{{$key}}">
                  <label for="tag" class="col-sm-2 control-label" ></label>
                  <div class="col-sm-4">
                  <input type="text" class="form-control"  name="tag[]" value="{{$tag->name}}" placeholder="Enter ...">
                  @if ($errors->has('tag.'.($key)))
                     <div style="color:red">{{ $errors->first('tag.'.($key)) }}</div>
                  @endif
                  </div>
                  <div class="col-sm-2">
                      <button type="button" id="del" data-id="{{$key}}" class="btn btn-danger pull-left">Delete</button>
                  </div>
             </div>
             
             
             @endforeach
             
            <!--  <div class="form-group" id="button_tag">-->
            <!--     <label for="tag" class="col-sm-2 control-label" ></label>    -->
            <!--      <div class=" offset-sm-2 col-sm-4 " >-->
            <!--          <button type="button" id="new_tag" data-num="<?=isset($key)?$key:0?>" class="btn btn-info pull-left">New tag</button>-->
            <!--      </div>-->
            <!--</div>-->
            
            <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">New Tag</label>
                  <div class="col-sm-10">
                   <select  id="select" name="tag[]" multiple="multiple" style="width:307px">
                 @foreach($product->getAllTags() as $tag)     
                    <option value="{{$tag->name}}" >{{$tag->name}}</option>
                 @endforeach   
                  </select>
                  </div>
                </div>
            
                <div class="form-group">
                  <label for="user" class="col-sm-2 control-label">User</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" name="user" value="{{$product->user->name}}" placeholder="Enter ..." disabled>
                  <input  name="user_id" type="hidden" value="{{$product->user->id}}"> 
                  </div>
                </div>
                
                
               
                
                 
                
              <!-- /.box-body -->
              <div class="box-footer">
                
                <button type="submit" class="btn btn-info pull-left">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>


@stop

