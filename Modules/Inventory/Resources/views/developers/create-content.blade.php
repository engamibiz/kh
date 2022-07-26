<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title" data-8xloadtitle>{{__('inventory::inventory.'.'create_developer')}}</h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="{{route('home')}}" class="kt-subheader__breadcrumbs-home"><i class="fa fa-home"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>

                <a href="{{route('inventory.developers.index')}}" data-8xload class="kt-subheader__breadcrumbs-link">{{trans('inventory::inventory.developers')}}</a>
                <span class="kt-subheader__breadcrumbs-separator"></span>

                <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">{{__('inventory::inventory.create_developer')}}</span>
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
                            <h3 class="kt-portlet__head-title">{{__('inventory::inventory.create_developer')}}</h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <a href="{{url()->previous()}}" data-8xload class="btn btn-clean kt-margin-r-10">
                                <i class="la la-arrow-left"></i>
                                <span class="kt-hidden-mobile">{{__('main.back')}}</span>
                            </a>
                        </div>
                    </div>


                    <div class="kt-portlet__body">
                        <!-- Create LCC Form -->
                        <form action="{{route('inventory.developers.store')}}" method="POST" id="create_i_developer_form" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" data-async data-callback="createIDeveloperCallback" data-parsley-validate>
                            @csrf
                            <input type="hidden" name="creation_type" id="creation_type">
                            <div class="m-portlet__body">
                                <div class="form-group row">
                                    <div class="fancy-checkbox">
                                        <input name="in_discover_by" id="in_discover_by" type="checkbox">
                                        <label for="in_discover_by">{{__('main.who_do_we_work_with')}}</label>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-6">
                                        <label for="developer_name">{{__('inventory::inventory.developer_name')}}</label>
                                        <input name="developer_name" id="developer_name" type="text" class="form-control" placeholder="{{__('inventory::inventory.developer_name')}}" data-parsley-trigger="change focusout">
                                    </div>
                                    <div class="col-6">
                                        <label for="developer_email">{{__('inventory::inventory.developer_email')}}</label>
                                        <input name="developer_email" id="developer_email" type="text" class="form-control" placeholder="{{__('inventory::inventory.developer_email')}}" data-parsley-trigger="change focusout">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 repeater">
                                        <div data-repeater-list="translations">
                                            <div data-repeater-item class="row">
                                                <div class="col-6">
                                                    {{-- <label for="language_id">{{__('inventory::inventory.language')}}</label> --}}
                                                    <select class="form-control" id="language_id" name="language_id" required data-parsley-required data-parsley-required-message="{{__('inventory::inventory.please_select_the_language')}}" data-parsley-trigger="change focusout">
                                                        <option value="" selected disabled>{{__('inventory::inventory.language')}}</option>
                                                        @foreach ($languages as $language)
                                                        <option value="{{$language->id}}" @if($language->id == 1) selected @endif>{{$language->code}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-6">
                                                    {{-- <label for="developer">{{__('inventory::inventory.title')}}</label> --}}
                                                    <input name="developer" id="developer" type="text" class="form-control" placeholder="{{__('inventory::inventory.please_enter_the_developer')}}" required data-parsley-required data-parsley-required-message="{{__('inventory::inventory.please_enter_the_developer')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="150" data-parsley-maxlength-message="{{__('inventory::inventory.title_max_is_150_characters_long')}}">
                                                </div>
                                                <div class="col-12">
                                                    <label for="description">{{__('inventory::inventory.description')}} </label>
                                                    <textarea rows="6" name="description" id="description-0" class="form-control description" placeholder="{{__('inventory::inventory.enter_description')}}" required data-parsley-required data-parsley-required-message="{{__('inventory::inventory.enter_description')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="4294967295" data-parsley-maxlength-message="{{__('inventory::inventory.description_max_is_4294967295_characters_long')}}"></textarea>
                                                </div>
                                                <div class="col-6 mt-2">
                                                    <label for="meta_title">{{__('inventory::inventory.meta_title')}} <small class="text-muted"> - {{__('inventory::inventory.optional')}}</small></label>
                                                    <input name="meta_title" data-parsley-maxlength="60" id="meta_title" type="text" class="form-control" placeholder="{{__('inventory::inventory.meta_title')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="150" data-parsley-maxlength-message="{{__('inventory::inventory.title_max_is_150_characters_long')}}">
                                                </div>
                                                <div class="col-lg-6 mt-2">
                                                    <label for="meta_description">{{__('inventory::inventory.description')}} <small class="text-muted"> - {{__('inventory::inventory.optional')}}</small></label>
                                                    <textarea rows="6" name="meta_description" id="meta_description" class="form-control" placeholder="{{__('inventory::inventory.meta_description')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="4294967295" data-parsley-maxlength-message="{{__('inventory::inventory.description_max_is_4294967295_characters_long')}}"></textarea>
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
                                            <i class="fa fa-plus"></i> {{trans('inventory::inventory.add_developer_translation')}}
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group row">

                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <div class="row">
                                            <div class="box">
                                                <label for="attachments">{{__('inventory::inventory.attachments')}} <small class="text-muted"> - {{__('inventory::inventory.optional')}} {{trans('inventory::inventory.only_one_image')}}</small></label>
                                                <input type="file" name="attachments" class="inputfile inputfile-5" id="file-6" />
                                                <label for="file-6">
                                                    <figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                                            <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                        </svg></figure> <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                <div class="m-form__actions m-form__actions--solid">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <button type="button" class="btn btn-brand mx-3 save-continue">
                                                <i class="la la-check"></i>
                                                <span class="kt-hidden-mobile">Save</span>
                                            </button>
                                            <button type="button" class="btn btn-success save-only">
                                                <i class="la la-check"></i>
                                                <span class="kt-hidden-mobile">Save & Close</span>
                                            </button>
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