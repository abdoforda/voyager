@extends('app')
@section('title')اتصل بنا@endsection
@section('content')
<!--START login  SECTION-->
<section class="contact section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-section">
            <h3> اتصل بنا </h3>
          </div>
          <!-- Section: Contact v.1 -->
          <section class="my-5">

            <!-- Grid row -->
            <div class="row">

              <!-- Grid column -->
              <div class="col-lg-5 mb-lg-0 mb-4">

                <!-- Form with header -->
                <div class="card">
                  <form action="/email" method="POST" class="ajax" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <!-- Header -->
                      <div class="form-header blue accent-1">
                        <h3 class="mt-2"><i class="fas fa-envelope"></i> اكتب لنا:</h3>
                      </div>
                      <!-- Body -->
                      <div class="form-group">
                        <label for="form-name">الاسم</label>
                        <input name="name" type="text" class="form-control" placeholder="الاسم">
                      </div>
                      <div class="form-group">
                        <label for="form-name">البريد الالكترونى</label>
                        <input name="email" type="text" class="form-control" placeholder="البريد الالكترونى">
                      </div>
                      <div class="form-group">
                        <label for="form-name">الموضوع</label>
                        <input name="subject" type="text" class="form-control" placeholder="الموضوع">
                      </div>
  
                      <div class="form-group">
                        <label for="form-text">الرسالة</label>
                        <textarea  name="message" id="form-text" class="form-control md-textarea " rows="3"
                          placeholder="الرسالة"></textarea>
                      </div>
                      <div class="text-center">
                        <button class="btn btn-light-blue btn-main">ارسال</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- Form with header -->

              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-lg-7">

                <!--Google map-->
                <div id="map-container-section" class="z-depth-1-half map-container-section mb-4"
                  style="height: 400px">
                  <iframe src="{{ setting('site.google_maps') }}"
                    frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <!-- Buttons-->
                <div class="row text-center">
                  <div class="col-md-4">
                    <a class="btn-floating blue accent-1">
                      <i class="fas fa-3x fa-map-marker-alt"></i>
                      <br>
                    </a>
                    <br>
                    <p>{{ setting('site.address') }}</p>
                  </div>
                  <div class="col-md-4">
                    <a class="btn-floating blue accent-1">
                      <i class="fas fa-3x fa-phone"></i>
                      <br>
                    </a>
                    <br>
                    <pre>{{ setting('site.phones') }}</pre>
                  </div>
                  <div class="col-md-4">
                    <a class="btn-floating blue accent-1">
                      <i class="fas fa-3x fa-envelope"></i>
                      <br>
                    </a>
                    <br>
                    <pre>{{ setting('site.emails') }}</pre>
                  </div>
                </div>

              </div>
              <!-- Grid column -->

            </div>
            <!-- Grid row -->

          </section>
          <!-- Section: Contact-->
        </div>
      </div>
    </div>
  </section>

@endsection