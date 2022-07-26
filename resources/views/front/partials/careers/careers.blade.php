<!-- START BREADCRUMB -->
<nav aria-label="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('front.home')}}">{{__('main.home_title')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{__('main.careers')}}</li>
    </ol>
  </div>
</nav>
<!-- END BREADCRUMB -->


  <!-- START PAGE WRAPPER -->
  <main class="main-content">


    <!-- START careers-page  -->
    <section class="careers-page pb-5">
      <div class="container">
        <div class="section-title">
          <h2 class="title">
            <span class="txt">
              {{__('main.join_us_to_improve_the')}} <br> {{__('main.future_of_work')}}
            </span>
            <span class="line"></span>
          </h2>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="tabs-block" id="tabs-block">
              @foreach($careers as $career)
              <div class="block">
                <div class="block__header">
                  <h5 class="block__title">
                    <button class="btn-block text-left" type="button" data-toggle="collapse" data-target="#block-{{$career->id}}" aria-expanded="true">
                      {{$career->title}}
                    </button>
                  </h5>
                </div>
                <div id="block-{{$career->id}}" class="collapse panel-collapse  @if ($loop->index == 0) show @endif" data-parent="#tabs-block">
                  <div class="block__body p-3">
                    <h5 class="tab-title mb-4">{{__('main.qualifications')}} :</h5>
                    {!! $career->description !!}
                    <ul class="tab-list">
                      <li>{{__('careers::career.number')}} : {{$career->number}}</li>
                    </ul>
                    <div class="apply">
                      <button class="site-btn apply-button mt-3" career-title="{{$career->title}}" career-id="{{$career->id}}" data-toggle="modal" data-target="#apply-career-modal">
                        {{__('main.apply_now')}}
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="col-md-6 d-none d-md-block">
            <div class="careers-bg">
              <img src="{{URL::asset('front/images/careers-bg.webp')}}" alt="" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END careers-page  -->



<!-- END careers-page  -->
@push('scripts')
<script>
  $('.panel-collapse').on('shown.bs.collapse', function(e) {
    const $panel = $(this).attr("id");
    $('html, body').animate({
      scrollTop: $('#' + $panel).offset().top - 150
    }, 500);
  });
</script>
<script>
  $(document).on('click', '.apply-button', function() {
    let careerTitle = $(this).attr('career-title');
    let careerId = $(this).attr('career-id');
    $('.job-title').val(careerTitle);
    $('.job-title-header').html(careerTitle);
    $('.career-id-hidden').val(careerId);
  });
</script>

<script>
  $('.apply-from').on('click', function() {
    var form = $(this).closest('form');
    $.blockUI({
      overlayColor: "#000000",
      type: "loader",
      state: "success",
      message: "<img src='{{URL::asset('front/images/loader.gif')}}'/>"
    });
    /* Parsley validate front-end */
    if (!form.parsley().isValid()) {
      $.unblockUI();

      $.alert("{{__('main.oh_snap_change_a_few_thing_up_and_try_submitting_again')}}", {
        title: '',
        type: 'warning',
        position: ['top-right', [0, 20]],
      });

      form.find('[data-parsley-type]').each(function(i, v) {
        $(this).parsley().validate({
          focusInvalid: false,
          invalidHandler: function() {
            $(this).find(":input.error:first").focus();
          }
        });
        return;
      });
      form.find('[data-parsley-pattern]').each(function(i, v) {
        $(this).parsley().validate({
          focusInvalid: false,
          invalidHandler: function() {
            $(this).find(":input.error:first").focus();
          }
        });
        return;
      });
      form.parsley().validate({
        focusInvalid: false,
        invalidHandler: function() {
          $(this).find(":input.error:first").focus();
        }
      });

      return;
    }

    var form = document.getElementById('apply-form');

    // Send Request
    $.ajax({
      url: "{{route('careers.apply')}}",
      method: 'POST',
      data: new FormData(form),
      processData: false,
      contentType: false,
    }).done(function(response) {
      // Un Block UI
      $.unblockUI();

      if (response.status) {
        $.alert(response.message, {
          title: '',
          type: 'info',
          position: ['top-right', [0, 20]],
        });
      } else {
        $.alert(response.message, {
          title: '',
          type: 'warning',
          position: ['top-right', [0, 20]],
        });
      }

    }).fail(function(xhr, error_text, statusText) {
      // Un Block UI
      $.unblockUI();

      // Display notificaion
      if (xhr.responseJSON && xhr.responseJSON.errors) {
        $.each(xhr.responseJSON.errors, function(index, error) {
          $.alert(error.message, {
            title: '',
            type: 'warning',
            position: ['top-right', [0, 20]],
          });
        });
      } else {
        $.alert(statusText, {
          title: '',
          type: 'warning',
          position: ['top-right', [0, 20]],
        });
      }
    });
  });
</script>
@endpush