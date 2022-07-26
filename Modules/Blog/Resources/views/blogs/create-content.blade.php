<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title" data-8xloadtitle>{{__('blog::blog.create_blog')}}</h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="fa fa-home"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>

                @if (auth()->user()->hasPermission('index-blog-blogs'))
                <a href="{{route('blogs.index')}}" data-8xload class="kt-subheader__breadcrumbs-link">{{__('blog::blog.blogs')}}</a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                @else
                <a href="#" class="kt-subheader__breadcrumbs-link">{{__('blog::blog.blogs')}}</a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                @endif

                <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">{{__('blog::blog.create_blog')}}</span>
            </div>
        </div>
    </div>
    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">{{__('blog::blog.create_blog')}}</h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <a href="{{url()->previous()}}" class="btn btn-clean kt-margin-r-10">
                                <i class="la la-arrow-left"></i>
                                <span class="kt-hidden-mobile">{{__('main.back')}}</span>
                            </a>
                        </div>
                    </div>


                    <div class="kt-portlet__body">
                        <!-- Create LCC Form -->
                        <!--begin::Form-->
                        <form action="{{route('blogs.store')}}" method="POST" id="create_blog_form" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" data-async data-callback="createFacilityCallback" data-parsley-validate>
                            @csrf
                            <div class="m-portlet__body">
                                <div class="row mx-0 my-5">
                                    <div class="fancy-checkbox col-3">
                                        <input name="is_featured" id="is_featured" type="checkbox">
                                        <label for="is_featured">{{__('blog::blog.is_featured')}}</label>
                                    </div>
                                    <div class="fancy-checkbox col-3">
                                        <input name="is_published" id="is_published" type="checkbox">
                                        <label for="is_published">{{__('blog::blog.is_published')}}</label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-4 pr-0">
                                         <label for="category_ids">{{__('blog::blog.blog_category')}}</label>
                                        <select class="form-control selectpicker" id="category_ids" name="category_ids[]" multiple required data-parsley-required data-parsley-required-message="{{__('blog::blog.please_select_the_blog_category')}}" data-parsley-trigger="change focusout">
                                            <option value="" selected disabled>{{__('blog::blog.blog_category')}}</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->value ? $category->value : $category->default_value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="blog_creator">{{__('blog::blog.blog_creator')}}</label>
                                        <input name="blog_creator" id="blog_creator" type="text" class="form-control" placeholder="{{__('blog::blog.blog_creator')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="150">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="blog_date">{{__('blog::blog.blog_date')}}</label>
                                        <input name="blog_date" id="blog_date" type="text" class="form-control datepicker-init" placeholder="{{__('blog::blog.blog_date')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="150">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 repeater">
                                        <div data-repeater-list="translations">
                                            <div data-repeater-item class="row">
                                                <div class="col-6">
                                                    {{-- <label for="language_id">{{__('blog::blog.language')}}</label> --}}
                                                    <select class="form-control" id="language_id" name="language_id" required data-parsley-required data-parsley-required-message="{{__('blog::blog.please_select_the_language')}}" data-parsley-trigger="change focusout">
                                                        <option value="" selected disabled>{{__('blog::blog.language')}}</option>
                                                        @foreach ($languages as $language)
                                                        <option value="{{$language->id}}" @if($language->id == 1) selected @endif>{{$language->code}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-6">
                                                    {{-- <label for="title">{{__('blog::blog.title')}}</label> --}}
                                                    <input name="title" id="title" type="text" class="form-control" placeholder="{{__('blog::blog.please_enter_the_blog')}}" required data-parsley-required data-parsley-required-message="{{__('blog::blog.please_enter_the_blog')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="150" data-parsley-maxlength-message="{{__('blog::blog.title_max_is_150_characters_long')}}">
                                                </div>
                                                <div class="col-lg-12">
                                                    <label for="description">{{__('blog::blog.description')}} </label>
                                                    <textarea rows="6" name="description" id="description-0"  class="form-control description" placeholder="{{__('blog::blog.enter_description')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="4294967295" data-parsley-maxlength-message="{{__('blog::blog.description_max_is_4294967295_characters_long')}}" data-parsley-required></textarea>
                                                </div>
                                                <div class="col-6 mt-2">
                                                    <label for="meta_title">{{__('blog::blog.meta_title')}}</label>
                                                    <input name="meta_title" data-parsley-maxlength="60" id="meta_title" type="text" class="form-control" placeholder="{{__('blog::blog.meta_title')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="150" data-parsley-maxlength-message="{{__('blog::blog.title_max_is_150_characters_long')}}">
                                                </div>
                                                <div class="col-lg-6 mt-2">
                                                    <label for="meta_description">{{__('blog::blog.meta_description')}} <small class="text-muted"> - {{__('blog::blog.optional')}}</small></label>
                                                    <textarea rows="6" name="meta_description" id="meta_description" class="form-control" placeholder="{{__('blog::blog.meta_description')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="4294967295" data-parsley-maxlength-message="{{__('blog::blog.description_max_is_4294967295_characters_long')}}">
                                                    </textarea>
                                                </div>
                                                <div class="col-lg-6 mt-2">
                                                    <label for="excerpt">{{__('blog::blog.excerpt')}} <small class="text-muted"> - {{__('blog::blog.optional')}}</small></label>
                                                    <textarea rows="6" name="excerpt" id="excerpt" class="form-control" placeholder="{{__('blog::blog.excerpt')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="4294967295" data-parsley-maxlength-message="{{__('blog::blog.description_max_is_4294967295_characters_long')}}">
                                                    </textarea>
                                                </div>
                                                <div class="col-md-2 col-sm-2">
                                                    {{-- <label class="control-label">&nbsp;</label> --}}
                                                    <a href="javascript:;" data-repeater-delete class="btn btn-brand data-repeater-delete">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="javascript:;" data-repeater-create id="repeater_btn" class="btn">
                                            <i class="fa fa-plus"></i> {{trans('blog::blog.add_blog_translation')}}
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2">
                                    
                                    <div class="row">
                                        <div class="box">
                                            <input type="file" name="attachments[]" multiple class="inputfile inputfile-5" id="file-6" data-multiple-caption="{count} {{trans('blog::blog.files_selected')}}" />
                                            <label for="file-6">
                                                <figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                                        <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" /></svg></figure> <span></span>
                                            </label>
                                            <label for="description">{{__('blog::blog.attachments')}} <small class="text-muted"> - {{trans('blog::blog.only_one_image')}}</small></label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-success">{{__('main.submit')}}</button>
                                    <button type="reset" class="btn btn-secondary">{{__('main.reset')}}</button>
                                    {{--
                        <a href="{{route('blogs.create')}}" data-8xload class="btn btn-brand btn-icon-sm">
                                    <i class="flaticon2-plus"></i> {{trans('blog::blog.create_new')}}
                                    </a>
                                    --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: Content -->

</div>