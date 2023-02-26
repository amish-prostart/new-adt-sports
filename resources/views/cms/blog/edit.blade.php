@extends('layouts.app')
@section('title')
    {{ __('Edit Blog') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-5">
            <h1 class="mb-0">@yield('title')</h1>
            <div class="text-end mt-4 mt-md-0">
                <a href="{{ route('blog.index') }}" class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('flash::message')
                    @include('layouts.errors')
                </div>
                {{ Form::model($blog, ['route' => ['blog.update', $blog->id], 'method' => 'put', 'id' => 'editBlogForm', 'files' => 'true']) }}
                <div class="section-body">
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="col-sm-12 mb-5">
                                        {{ Form::label('title',__('Title').(':'), ['class' => 'form-label']) }}
                                        <span class="required"></span>
                                        {{ Form::text('title', $blog['title'] ?? null, ['id'=>'blogTitle','class' => 'form-control']) }}
                                    </div>
                                    <div class="col-sm-12 mb-5">
                                        {{ Form::label('slug',__('messages.blog.slug').' :', ['class' => 'form-label required']) }}
                                        {{ Form::text('slug', isset($blog) ? $blog->slug : null, ['class' => 'form-control','required', 'id'=>'blogSlug']) }}
                                        <input type="hidden" name="slug" id="slugHidden"  value="{{  isset($blog) ? $blog->slug : null }}">
                                    </div>
                                    <div class="col-sm-12 mb-5">
                                        {{ Form::label('tag',__('Tag').(':'), ['class' => 'form-label']) }}
                                        <span class="required"></span>
                                        {{ Form::text('tag', $blog['tag'] ?? null, ['id'=>'editBlogTag','class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3" io-image-input="true">
                                        <label for="exampleInputImage" class="form-label">{{__('Image')}}
                                            :</label>
                                        <div class="d-block">
                                            <div class="image-picker">
                                                <div class="image previewImage" id="exampleInputImage"
                                                     style="width: 320px; height: 235px; background-image: url({{ !empty($blog->blog_image) ? $blog->blog_image : asset('web/media/avatars/male.png') }})">
                                                </div>
                                                <span class="picker-edit rounded-circle text-gray-500 fs-small"
                                                      data-bs-toggle="tooltip"
                                                      data-placement="top"
                                                      data-bs-original-title="{{ __('Blog Image') }}">
                                                <label>
                                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                                    <input type="file" name="image" id="blogImage"
                                                           class="image-upload d-none"
                                                           accept="image/*"/>
                                                </label>
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-20">
                                    {{ Form::label('description', __('Description').(':'),['class' => 'form-label']) }}
                                    <span class="required"></span>
                                    {{ Form::hidden('description', null, ['id' => 'editBlogDescription']) }}
                                    <div id="editBlogQuillData">{!! $blog['description'] ?? null !!}</div>
                                </div>
                            </div>
                            <div class="mt-10">
                                {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3']) }}
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
        {{Form::hidden('editBlogBody',json_encode($emailTemplateGlobal['email_body'] ?? null),['id'=>'editBlogBody'])}}
    </div>
@endsection
