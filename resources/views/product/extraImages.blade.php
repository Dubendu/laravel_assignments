@extends('admin.master')
@section('extraimages')
<div class="content-wrapper">
    <div class="container">
    <h3 style="text-align:center"><i class="fa fa-upload"></i>Multiple Images Upload</h3><br><br>
    <button class="btn btn-success" onclick="window.location='{{ url()->previous() }}'">Go Back</button><br>
        <form method="post" action="{{route('product.extraImagesStore')}}" enctype="multipart/form-data">
        @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="input-group control-group increment" >
            <input type="file" name="images[]" class="form-control">
            <div class="input-group-btn"> 
                <button class="btn btn-primary" type="button"><i class="fa fa-plus"></i>Add</button>
            </div>
            </div>
            <div class="clone hide">
            <div class="control-group input-group" style="margin-top:10px">
                <input type="file" name="images[]" class="form-control">
                <div class="input-group-btn"> 
                <button class="btn btn-danger" type="button"><i class="fa fa-times"></i> Remove</button>
                </div>
            </div>
            </div>
            <button type="submit" class="btn btn-success" style="margin-top:12px">Submit</button>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                $(".btn-primary").click(function(){ 
                    var html = $(".clone").html();
                    $(".increment").after(html);
                });
                $("body").on("click",".btn-danger",function(){ 
                    $(this).parents(".control-group").remove();
                });
                });
            </script>
    </div>
</div>
@endsection