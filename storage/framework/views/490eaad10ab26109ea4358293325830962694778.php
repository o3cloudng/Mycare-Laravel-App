<?php $__env->startSection('title'); ?>
    Home ::
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>


  <section>
    <div class="container" data-aos="fade-up">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2" data-aos="fade-left">
          <div class="p-5">
            <img class="img-fluid rounded-circle" src="https://blackrockdigital.github.io/startbootstrap-one-page-wonder/img/01.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1" data-aos="fade-right">
          <div class="p-5">
            <h2 class="display-4">For those about to rock...</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container" data-aos="fade-up">
      <div class="row align-items-center">
        <div class="col-lg-6" data-aos="fade-right">
          <div class="p-5">
            <img class="img-fluid rounded-circle" src="https://blackrockdigital.github.io/startbootstrap-one-page-wonder/img/02.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left">
          <div class="p-5">
            <h2 class="display-4">We salute you!</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container" data-aos="fade-up">
      <div class="row align-items-center" data-aos="fade-down-left">
        <div class="col-lg-6 order-lg-2">
          <div class="p-5">
            <img class="img-fluid rounded-circle" src="https://blackrockdigital.github.io/startbootstrap-one-page-wonder/img/03.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1" data-aos="fade-down-right">
          <div class="p-5">
            <h2 class="display-4">Let there be rock!</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>
  <!-- Footer -->
 

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>