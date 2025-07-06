<section id="memo">
    <div class="row no-gutters">
        <div class="col-lg-12">
            <div class="content">
                <h1>SELF REFERRAL FORM</h1>
            </div>
        </div>
        <!-- <div class="col-lg-6">
      <img src="assets/images/hero-media.jpg" class="img-responsive" height="300" />
    </div> -->
    </div><br>
    <div class="container">
        <h6>Complete the information below and you will be linked to the Alaska Sleep Clinic Self Referral Form<h6>
                <br><br>
                <div class="container">
                    <form id="form-contact" action="users/save_referral" method="post">
                        <div class="row mb-3">
                            <div class="form-group col-lg-6">
                                <label for="exampleInputEmail1">Name*</label>
                                <input type="text" class="form-control input-text" name="first_name" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Surname*</label>
                                <input type="text" class="form-control input-text" name="last_name" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Email*</label>
                                <input type="email" class="form-control input-text" name="email" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Mobile Number*</label>
                                <input type="text" class="form-control input-text" name="mobile" required>
                            </div>
                            <div class="form-group col-lg-12">
                                <b>Best Time to Call ?</b>
                            </div>
                            <div class="form-group col-lg-12">
                                <!-- Group of default radios - option 1 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample1"
                                        name="timetocall" value="8:00 a.m. - 10:00 a.m. (TH)" required>
                                    <label class="custom-control-label" for="defaultGroupExample1">8:00 a.m. - 10:00 a.m. (TH)</label>
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <!-- Group of default radios - option 2 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample2"
                                        name="timetocall" value="10:00 a.m. - Noon (TH)">
                                    <label class="custom-control-label" for="defaultGroupExample2">10:00 a.m. - Noon (TH)</label>
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <!-- Group of default radios - option 3 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample3"
                                        name="timetocall" value="Noon - 2:00 p.m. (TH)">
                                    <label class="custom-control-label" for="defaultGroupExample3">Noon - 2:00 p.m. (TH)</label>
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <!-- Group of default radios - option 4 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="defaultGroupExample4"
                                        name="timetocall" value="2:00 p.m. - 5:00 p.m. (TH)">
                                    <label class="custom-control-label" for="defaultGroupExample4">2:00 p.m. - 5:00 p.m. (TH)</label>
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <b>Do You Live in Thailand*</b>
                            </div>
                            <div class="form-group col-lg-12">
                                <!-- Default inline 1-->
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="defaultInline1" name="livein" value="yes">
                                    <label class="custom-control-label" for="defaultInline1">Yes</label>
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <!-- Default inline 2-->
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="defaultInline2" name="livein" value="no">
                                    <label class="custom-control-label" for="defaultInline2">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="button">Submit</button>
                        </div>
                    </form>
                </div>
    </div>
</section>
<script>
  $(function() {
    <?php if ($this->session->flashdata('referral')): ?>
    swal({
      title: "Thank you",
      text: "We will contact you soon.",
      type: "success",
      confirmButtonColor: "#60C9E3",
      confirmButtonText: "Close"
    });
    <?php endif; ?>
  });
</script>