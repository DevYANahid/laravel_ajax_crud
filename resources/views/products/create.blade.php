@extends('layouts.app')
@section('content')
<main class="container">
   
    <section>
        <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="titlebar">
                <h1>Add Product</h1>
                <button>Save</button>
            </div>
            <div class="card">
            <div>
                    <label>Name</label>
                    <input type="text" name="name" >
                    <label>Description (optional)</label>
                    <textarea cols="10" rows="5" name="description"></textarea>
                    <label>Add Image</label>
                    <img src="" alt="" class="img-product" id="file-preview"/>
                    <input type="file" name="image" accept="image/*" onchange="showFile(event)">
                </div>
            <div>
                    <label>Category</label>
                    <select  name="category">
                        @foreach (json_decode('{"Smartphone":"Smartphone","Smart TV":"Smart TV","Computer":"Computer"}',true) as $optionKey => $optionValue)       
                      <option value="{{$optionKey}}" >{{$optionValue}}</option>
                        @endforeach
                    </select>
                    <hr>
                    <label>Inventory</label>
                    <input type="text" name="quantity" >
                    <hr>
                    <label>Price</label>
                    <input type="text" name="price" >
            </div>
            </div>
            <div class="titlebar">
                <h1></h1>
                <button>Save</button>
            </div>
        </form>
    </section>
    {{-- <section>
        <div class="titlebar">
            <h1>Edit Product</h1>
            <button>Save</button>
        </div>
        <div class="card">
           <div>
                <label>Name</label>
                <input type="text" >
                <label>Description (optional)</label>
                <textarea cols="10" rows="5" ></textarea>
                <label>Add Image</label>
                <img src="1.jpg" alt="" class="img-product" />
                <input type="file" >
            </div>
           <div>
                <label>Category</label>
                <select  name="" id="" >
                    <option value="" >Email Subscription</option>
                </select>
                <hr>
                <label>Inventory</label>
                <input type="text" class="input" >
                <hr>
                <label>Price</label>
                <input type="text" class="input" >
           </div>
        </div>
        <div class="titlebar">
            <h1></h1>
            <button>Save</button>
        </div>
    </section> --}}
</main>  

<script>
    function showFile(event){
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var dataURL = reader.result;
            var output = document.getElementById('file-preview');
            output.src = dataURL;
        };
        if (input.files && input.files[0]) { // Added file existence check
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection