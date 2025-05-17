@extends('backend.layouts.parent')

@section('title', 'Edit Product')

@section('content')
<div class="col-12">
    <form action="{{route("products.update", $product->id )}}"
          method="post"
          enctype="multipart/form-data">
        @csrf
        @method("put")
       

        {{-- ــــ الأسماء --}}
        <div class="form-row">
            @if (session()->has("success"))
            <div class="alert alert-success">{{session()->get("success")}}</div>
            @elseif (session()->has("error"))
            <div class="alert alert-danger">{{session()->get("error")}}</div>

        @endif
            <div class="col-6">
                <label for="name_en">Name En</label>
                <input  type="text" name="name_en" id="name_en"
                        value="{{ old('name_en', $product->name_en) }}"
                        class="form-control">
                @error('name_en') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-6">
                <label for="name_ar">Name Ar</label>
                <input  type="text" name="name_ar" id="name_ar"
                        value="{{ old('name_ar', $product->name_ar) }}"
                        class="form-control">
                @error('name_ar') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        {{-- ــــ السعر / الكود / الكمية --}}
        <div class="form-row">
            <div class="col-4">
                <label for="price">Price</label>
                <input  type="number" step="0.01" name="price" id="price"
                        value="{{ old('price', $product->price) }}"
                        class="form-control">
                @error('price') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-4">
                <label for="code">Code</label>
                <input  type="number" name="code" id="code"
                        value="{{ old('code', $product->code) }}"
                        class="form-control">
                @error('code') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-4">
                <label for="quantity">Quantity</label>
                <input  type="number" name="quantity" id="quantity"
                        value="{{ old('quantity', $product->quantity) }}"
                        class="form-control">
                @error('quantity') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        {{-- ــــ الحالة / البراند / التصنيف الفرعي --}}
        <div class="form-row">
            <div class="col-4">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="1" {{ old('status', $product->status)==1 ? 'selected' : '' }}>
                        Active
                    </option>
                    <option value="0" {{ old('status', $product->status)==0 ? 'selected' : '' }}>
                        Not Active
                    </option>
                </select>
            </div>

            <div class="col-4">
                <label for="brand_id">Brand</label>
                <select name="brand_id" id="brand_id" class="form-control">
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}"
                                {{ old('brand_id', $product->brand_id)==$brand->id ? 'selected' : '' }}>
                            {{ $brand->name_en }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-4">
                <label for="subcategory_id">Subcategory</label>
                <select name="subcategory_id" id="subcategory_id" class="form-control">
                    @foreach($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}"
                                {{ old('subcategory_id', $product->subcategory_id)==$subcategory->id ? 'selected' : '' }}>
                            {{ $subcategory->name_en }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- ــــ الوصف --}}
        <div class="form-row">
            <div class="col-6">
                <label for="desc_en">Desc En</label>
                <textarea name="desc_en" id="desc_en" rows="6" class="form-control">{{ old('desc_en', $product->desc_en) }}</textarea>
                @error('desc_en') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-6">
                <label for="desc_ar">Desc Ar</label>
                <textarea name="desc_ar" id="desc_ar" rows="6" class="form-control">{{ old('desc_ar', $product->desc_ar) }}</textarea>
                @error('desc_ar') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        {{-- ــــ الصورة --}}
        <div class="form-row align-items-center">
    <div class="col-md-8">
        <label for="image">Image (optional)</label>
        <input type="file" name="image" id="image" class="form-control">
        @error('image') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-4 text-center">
        <label>Current Image</label><br>
        <img src="{{ url('/dist/img/products/'.$product->image) }}"
             alt="{{ $product->name_en }}"
             class="img-thumbnail"
             style="max-width: 100%; max-height: 200px;">
    </div>
</div>

        {{-- ــــ زر الحفظ --}}
        <div class="form-row my-3">
            <div class="col-2">
                <button class="btn btn-warning">Update</button>
            </div>
            <div class="col">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </form>
</div>
@endsection
