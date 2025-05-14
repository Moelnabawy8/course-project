@extends('backend.layouts.parent')

@section('title', 'Create Product')

@section('content')
<div class="col-12">
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-row">
            <div class="col-6">
                <label for="name_en">Name En</label>
                <input type="text" name="name_en" id="name_en" class="form-control" value="{{ old('name_en') }}">
                @error('name_en')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <label for="name_ar">Name Ar</label>
                <input type="text" name="name_ar" id="name_ar" class="form-control" value="{{ old('name_ar') }}">
                @error('name_ar')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-4">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}">
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label for="code">Code</label>
                <input type="number" name="code" id="code" class="form-control" value="{{ old('code') }}">
                @error('code')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}">
                @error('quantity')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-4">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Not Active</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label for="brand_id">Brands</label>
                <select name="brand_id" id="brand_id" class="form-control">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name_en }}
                        </option>
                    @endforeach
                </select>
                @error('brand_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label for="subcategory_id">Subcategories</label>
                <select name="subcategory_id" id="subcategory_id" class="form-control">
                    @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}" {{ old('subcategory_id') == $subcategory->id ? 'selected' : '' }}>
                            {{ $subcategory->name_en }}
                        </option>
                    @endforeach
                </select>
                @error('subcategory_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-6">
                <label for="desc_en">Desc En</label>
                <textarea name="desc_en" id="desc_en" cols="30" rows="10" class="form-control">{{ old('desc_en') }}</textarea>
                @error('desc_en')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <label for="desc_ar">Desc Ar</label>
                <textarea name="desc_ar" id="desc_ar" cols="30" rows="10" class="form-control">{{ old('desc_ar') }}</textarea>
                @error('desc_ar')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-12">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row my-3">
            <div class="col-2">
                <button class="btn btn-primary" name="page" value="index">Create</button>
            </div>
            <div class="col-2">
                <button class="btn btn-dark" name="page" value="back">Create & Return</button>
            </div>
        </div>
    </form>
</div>
@endsection
