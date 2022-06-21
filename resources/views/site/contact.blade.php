<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" style="text-align: right !important">

        <div class="section-title">
            <h2>تواصل معنا</h2>
<!--            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
       -->
        </div>

        <div class="row" data-aos="fade-in">

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                <form action="{{route('sendMailCotactUs')}}" method="post" class="php-email-form">
                    @csrf
                    <div class="form-group">
                        <label for="name">الموضوع</label>
                        <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required />
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <label for="name">الرسالة</label>
                        <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Please write something for us" required></textarea>
                        <div class="validate"></div>
                    </div>
                    <div class="text-center"><button type="submit">ارسال</button></div>
                </form>
            </div>

            <div class="col-lg-5 d-flex align-items-stretch">
                <div class="info">
                    <div class="address" style="text-align: right !important">
                        <i class="icofont-google-map"></i>
                        <h4>العنوان:</h4>
                        <p>A108 Adam Street, New York, NY 535022</p>
                    </div>

                    <div class="email" style="text-align: right !important">
                        <i class="icofont-envelope"></i>
                        <h4>البريد الالكتروني:</h4>
                        <p>info@example.com</p>
                    </div>

                    <div class="phone" style="text-align: right !important">
                        <i class="icofont-phone"></i>
                        <h4>رقم الهاتف:</h4>
                        <p>+1 5589 55488 55s</p>
                    </div>

                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                </div>

            </div>

            

        </div>

    </div>
</section><!-- End Contact Section -->
