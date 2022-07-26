@extends('dashboard.layouts.basic')

@section('content')
    <!--begin::Form-->
    <form action="{{route('inventory.payment_methods.update')}}" method="POST" id="update_payment_method_form" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" data-async data-callback="updatePaymentMethodCallback" data-parsley-validate>
        @csrf
        <input type="hidden" name="id" id="id" value="{{$i_payment_method->id}}" />
        <div class="m-portlet__body">
            <div class="form-group row">
                <div class="col-6">
                    {{-- <label for="order">{{__('inventory::inventory.order')}}</label> --}}
                    <input name="order" id="order" type="text" class="form-control" placeholder="{{__('inventory::inventory.order')}}"  data-parsley-trigger="change focusout" data-parsley-type="integer" data-parsley-min="0" value="{{$i_payment_method->order}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 repeater">
                    <div data-repeater-list="translations">
                        @foreach ($i_payment_method->translations as $translation)
                            <div data-repeater-item class="row">
                                <div class="col-6">
                                    {{-- <label for="language_id">{{__('inventory::inventory.language')}}</label> --}}
                                    <select class="form-control" id="language_id" name="language_id" required data-parsley-required data-parsley-required-message="{{__('inventory::inventory.please_select_the_language')}}" data-parsley-trigger="change focusout">
                                        <option value="" disabled>{{__('inventory::inventory.language')}}</option>
                                        @foreach ($languages as $language)
                                            <option value="{{$language->id}}" @if ($translation->language_id == $language->id) selected @endif>{{$language->code}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-6">
                                    {{-- <label for="payment_method">{{__('inventory::inventory.payment_method')}}</label> --}}
                                    <input name="payment_method" id="payment_method" type="text" class="form-control" placeholder="{{__('inventory::inventory.please_enter_the_payment_method')}}" required data-parsley-required data-parsley-required-message="{{__('inventory::inventory.please_enter_the_payment_method')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="150" data-parsley-maxlength-message="{{__('inventory::inventory.payment_method_max_is_150_characters_long')}}" value="{{$translation->payment_method}}">
                                </div>

                                <div class="col-md-2 col-sm-2">
                                    {{-- <label class="control-label">&nbsp;</label> --}}
                                    <a href="javascript:;" data-repeater-delete class="btn btn-brand data-repeater-delete">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        @if (!$i_payment_method->translations->count())
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
                                    {{-- <label for="payment_method">{{__('inventory::inventory.payment_method')}}</label> --}}
                                    <input name="payment_method" id="payment_method" type="text" class="form-control" placeholder="{{__('inventory::inventory.please_enter_the_payment_method')}}" required data-parsley-required data-parsley-required-message="{{__('inventory::inventory.please_enter_the_payment_method')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="150" data-parsley-maxlength-message="{{__('inventory::inventory.payment_method_max_is_150_characters_long')}}">
                                </div>

                                <div class="col-md-2 col-sm-2">
                                    {{-- <label class="control-label">&nbsp;</label> --}}
                                    <a href="javascript:;" data-repeater-delete class="btn btn-brand data-repeater-delete">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <a href="javascript:;" data-repeater-create id="repeater_btn" class="btn">
                        <i class="fa fa-plus"></i> {{trans('inventory::inventory.add_payment_method_translation')}}
                    </a>
                </div>
            </div>
        </div>
        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions--solid">
                <div class="row">
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-success btn-brand">{{trans('inventory::inventory.update_payment_method')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

<!--end::Form-->

<!-- Callback function -->
<script>
    function updatePaymentMethodCallback() {
        // Close modal
        $('#fast_modal').modal('toggle');
        // Reload datatable
        payment_methods_table.ajax.reload(null, false);
    }
</script>

@push('scripts')
    <script src="{{asset('8x/assets/js/repeater.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('.repeater').repeater({
                // (Required if there is a nested repeater)
                // Specify the configuration of the nested repeaters.
                // Nested configuration follows the same format as the base configuration,
                // supporting options "defaultValues", "show", "hide", etc.
                // Nested repeaters additionally require a "selector" field.
                repeaters: [{
                    // (Required)
                    // Specify the jQuery selector for this nested repeater
                    selector: '.inner-repeater'
                }]
            });
        });
    </script>
    <script>
        // Initialize select picker for repeated items
        $("#repeater_btn").click(function(){
            setTimeout(function(){
                // $(".selectpicker").selectpicker('refresh');
            }, 100);
        });
    </script>
@endpush