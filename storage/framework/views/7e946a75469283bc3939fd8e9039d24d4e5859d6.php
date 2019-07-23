<?php $__env->startSection('title'); ?>
    Profile
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    My Profile
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section>
    <div class="container">
        <?php if($errors->all()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="row justify-content-around">
            <div class="col-sm-12 col-xs-12 col-md-5">
                <div class="row">
                  <div class="col-sm-12 col-xs-12 mx-auto col-md-12 mybox shadow py-4">
                      <div class="row">
                            <div class="col-4">
                            <form method="POST" action="<?php echo e(url('/profile/avatar')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php if(isset($subscriber->avatar)): ?>
                                <img src="/storage/<?php echo e($subscriber->avatar); ?>" class="m-1 w-100 h-100 mt-4 mx-auto profile1" />
                                <!-- <img class="img-thumbnail" src="<?php echo e(asset('/storage/'.$subscriber->avatar)); ?>" /> -->
                                <?php else: ?>
                                <img class="m-1 w-100 h-100 profile1" src="<?php echo e(asset('img/avatar.png')); ?>" />
                                <?php endif; ?>
                                <!-- <label>Upload Profile Picture</label> -->
                                    <input type="file" class="form-control foo <?php echo e($errors->has('avatar') ? ' is-invalid' : ''); ?>" name="avatar">
                                    <?php if($errors->has('avatar')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('avatar')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                    <button type="submit" class="btn_1 btn btn2 shadow activeBPLink small">Upload</button>
                                </form>
                            </div>
                            <div class="col-8 p-4">
                                <h5>Personal Information</h5>
                                <br/>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="name" value="<?php echo e($subscriber->name); ?>" type="text" class="form-control shadow" placeholder="Your name">
                                </div>
                            </div>
                      </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" value="<?php echo e($subscriber->email); ?>" type="email" class="form-control shadow" placeholder="Email" readonly>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Telephone</label>
                                <input name="phone" value="<?php echo e($subscriber->phone); ?>" type="text" class="form-control shadow" placeholder="Your telephone number" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row ml-3">
                        <button type="submit" class="btn btn2 button shadow mx-auto activeBPLink">Update</button>
                    </div>
                  </div>

              <div class="col-sm-12 col-xs-12 col-md-12 mybox shadow py-4 my-4">
                  <div class="row">
                    <div class="col-12 px-4">
                        <div class="header_box version_2">
                            <h5> <span><img style="width: 50px; height: 50px;" src="<?php echo e(asset('img/password.png')); ?>"></span> Change password</h5>
                                </div>
                                <?php if($errors->change_password->all()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->change_password->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                                <?php endif; ?>
                                <?php if(session('change-password')): ?>
                                <script type="text/javascript">
                                toastr.success("<?php echo e(session('change-password')); ?>");
                                </script>
                                <?php endif; ?>
                                <form action="changePassword" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Old Password</label>
                                                <input class="form-control shadow" name="password" type="password">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input class="form-control shadow" name="new_password" type="password">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Confirm New Password</label>
                                                <input class="form-control shadow" name="confirm_password" type="password">
                                            </div>
                                        </div>
                                        <div class="form-group justify-content-center ml-3">
                                            <button type="submit" class="btn btn2 button shadow mx-auto activeBPLink">Change Password</button>
                                        </div>
                                    </div>
                                </form>
                    </div>
                      
                  </div>
              </div>
              <div class="col-sm-12 col-xs-12 col-md-12 mybox shadow py-4 mb-5 mx-auto">
                  <div class="box_general padding_bottom table-responsive" id="checkDiagnosis">
                    <div class="header_box version_2">
                        <h5><span><img style="width: 50px; height: 50px;" src="<?php echo e(asset('img/diagnosis.png')); ?>"></span> Diagnosis</h5>
                    </div>
                    <table class="table table-bordered" id="diagnosisTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Medication(s)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Medication(s)</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php if(count($diagnosis) > 0): ?>
                                <?php $__currentLoopData = $diagnosis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($d->id); ?></td>
                                    <td><?php echo e($d->name); ?></td>
                                    <td>None</td>
                                    <td><button data-id="<?php echo e($d->id); ?>" class="btn btn-sm btn-primary fa fa-pencil d-flex" id="edit-diagnosis"></button>
                                        <button data-id="<?php echo e($d->id); ?>" class="btn btn-sm btn-danger fa fa-trash del-diagnosis d-flex"></button>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
              </div>






                </div>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-7">
                <div class="col-md-12 py-4 mybox shadow">
                        <h5> <i class="fa fa-user"></i>Update Profile</h5>
                        <form action="<?php echo e(url('updateProfile')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <!-- /row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date Of Birth </label>
                                        <input value="<?php echo e($subscriber->date_of_birth); ?>" name="date_of_birth" type="date" class="form-control shadow" placeholder="Date of Birth">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control dropdown shadow" name="gender">
                                            <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                            <option value="male" <?php echo e($subscriber->gender == "male" ?  "selected='selected'" : ''); ?>>Male</option>
                                            <option value="female" <?php echo e($subscriber->gender == "female" ?  "selected='selected'" : ''); ?>>Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Occupation</label>
                                        <input name="occupation" value="<?php echo e($subscriber->occupation); ?>" type="text" class="form-control shadow" placeholder="Occupation">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Place of work</label>
                                        <input name="place_of_work" value="<?php echo e($subscriber->place_of_work); ?>" type="text" class="form-control shadow" placeholder="Place of work">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" type="text" class="form-control shadow" placeholder="Address"><?php echo e($subscriber->address); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Religion </label>
                                        <select class="form-control dropdown shadow" id="religion" name="religion">
                                            <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                            <option value="African Traditional &amp; Diasporic">African Traditional &amp; Diasporic</option>
                                            <option value="Atheist" <?php echo e($subscriber->religion == "Atheist" ?  "selected='selected'" : ''); ?>>Atheist</option>
                                            <option value="Baha'i" <?php echo e($subscriber->religion == "Baha'i" ?  "selected='selected'" : ''); ?>>Baha'i</option>
                                            <option value="Buddhism" <?php echo e($subscriber->religion == "Buddhism" ?  "selected='selected'" : ''); ?>>Buddhism</option>
                                            <option value="Christianity" <?php echo e($subscriber->religion == "Christianity" ?  "selected='selected'" : ''); ?>>Christianity</option>
                                            <option value="Hinduism" <?php echo e($subscriber->religion == "Hinduism" ?  "selected='selected'" : ''); ?>>Hinduism</option>
                                            <option value="Islam" <?php echo e($subscriber->religion == "Islam" ?  "selected='selected'" : ''); ?>>Islam</option>
                                            <option value="Judaism" <?php echo e($subscriber->religion == "Judaism" ?  "selected='selected'" : ''); ?>>Judaism</option>
                                            <option value="Neo-Paganism" <?php echo e($subscriber->religion == "Neo-Paganism" ?  "selected='selected'" : ''); ?>>Neo-Paganism</option>
                                            <option value="Nonreligious" <?php echo e($subscriber->religion == "Nonreligious" ?  "selected='selected'" : ''); ?>>Nonreligious</option>
                                            <option value="Other" <?php echo e($subscriber->religion == "Other" ?  "selected='selected'" : ''); ?>>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Education Level</label>
                                        <select class="form-control dropdown shadow" id="education" name="education">
                                            <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                            <option value="No formal education" <?php echo e($subscriber->education == "No formal education" ?  "selected='selected'" : ''); ?>>No formal education</option>
                                            <option value="Primary education" <?php echo e($subscriber->education == "Primary education" ?  "selected='selected'" : ''); ?>>Primary education</option>
                                            <option value="Secondary education" <?php echo e($subscriber->education == "Secondary education" ?  "selected='selected'" : ''); ?>>Secondary education or high school</option>
                                            <option value="GED" <?php echo e($subscriber->education == "GED" ?  "selected='selected'" : ''); ?>>GED</option>
                                            <option value="Vocational qualification" <?php echo e($subscriber->education == "Vocational qualification" ?  "selected='selected'" : ''); ?>>Vocational qualification</option>
                                            <option value="Bachelor's degree" <?php echo e($subscriber->education == "Bachelor's degree" ?  "selected='selected'" : ''); ?>>Bachelor's degree</option>
                                            <option value="Master's degree" <?php echo e($subscriber->education == "Master's degree" ?  "selected='selected'" : ''); ?>>Master's degree</option>
                                            <?php
                                            $val ="Doctorate or higher";
                                            ?>
                                            <option value="Doctorate or higher" <?php echo e($subscriber->education == $val ?  "selected='selected'" : ''); ?>>Doctorate or higher</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ethnic Group</label>
                                        <select class="form-control dropdown shadow" name="ethnic_group">
                                            <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                            <option value="yoruba" <?php echo e($subscriber->ethnic_group == "yoruba" ?  "selected='selected'" : ''); ?>>Yoruba</option>
                                            <option value="igbo" <?php echo e($subscriber->ethnic_group == "igbo" ?  "selected='selected'" : ''); ?>>Igbo</option>
                                            <option value="hausa" <?php echo e($subscriber->ethnic_group == "hausa" ?  "selected='selected'" : ''); ?>>Hausa</option>
                                            <option value="others" <?php echo e($subscriber->ethnic_group == "others" ?  "selected='selected'" : ''); ?>>Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Marital Status</label>
                                        <select class="form-control dropdown shadow" name="marital_status">
                                            <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                            <option value="married" <?php echo e($subscriber->marital_status == "married" ?  "selected='selected'" : ''); ?>>Married</option>
                                            <option value="single" <?php echo e($subscriber->marital_status == "single" ?  "selected='selected'" : ''); ?>>Single</option>
                                            <option value="divorced" <?php echo e($subscriber->marital_status == "divorced" ?  "selected='selected'" : ''); ?>>Divorced</option>
                                            <option value="widowed" <?php echo e($subscriber->marital_status == "widowed" ?  "selected='selected'" : ''); ?>>Widowed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row ml-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn2 button shadow mx-auto activeBPLink">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>


                    <!-- Add -->
                    <div class="col-md-12 mybox shadow my-4 py-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row px-4">
                                    <div class="box_general padding_bottom" id="checkDiagnosis">
                                    <div class="header_box version_2">
                                        <h5><span><img style="width: 50px; height: 50px;" src="<?php echo e(asset('img/diagnosis.png')); ?>"></span> Add Diagnosis</h5>
                                    </div>
                                    <form action="<?php echo e(url('/diagnosis/new')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="diagnosis">Name of Diagnosis</label>
                                            <input type="text" name="name" id="name" class="form-control shadow" placeholder="Malaria, Typhioa...">
                                        </div>
                                        
                                        <hr>
                                        <button type="submit" class="btn btn2 button shadow mx-auto blue approve">Add Diagnosis</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                   
</section>

<!--

    <div class="container">
        <div class="box_general padding_bottom">
            <a href="#updateProfile" class="btn_1 gray"><i class="fa fa-user"></i> Update Profile</a>
            <a href="#checkDiagnosis" class="btn_1 gray"><i class="fa fa-deviantart"></i> Check Diagnosis</a>
        </div>
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <?php if($errors->all()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-3">
                        <?php if(isset($subscriber->avatar)): ?>
                        <img class="img-thumbnail" src="<?php echo e(asset('/storage/'.$subscriber->avatar)); ?>" />
                        <?php else: ?>
                        <img class="img-thumbnail" src="<?php echo e(asset('img/avatar.png')); ?>" />
                        <?php endif; ?>
                        <form method="POST" action="<?php echo e(url('/profile/avatar')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label>Upload Profile Picture</label>
                                <input type="file" class="form-control shadow <?php echo e($errors->has('avatar') ? ' is-invalid' : ''); ?>" name="avatar">
                                <?php if($errors->has('avatar')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('avatar')); ?></strong>
                                </span>
                                <?php endif; ?>
                                <br>
                                <button type="submit" class="btn_1 small">Upload Image</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-success" style="width:<?php echo e($value); ?>%" aria-valuenow="<?php echo e($value); ?>" aria-valuemin="<?php echo e($min); ?>" aria-valuemax="<?php echo e($max); ?>"><?php echo e($value); ?>%</div>
                                </div><small>Profile Completed</small>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <?php if($errors->profile->all()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->profile->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                                <?php endif; ?>
                                <?php if(session('status')): ?>
                                <div class="alert alert-success"><?php echo e(session('status')); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <form action="<?php echo e(url('updateProfile')); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="header_box version_2">
                                        <h2><i class="fa fa-user"></i>Update Username</h2>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input name="email" value="<?php echo e($subscriber->email); ?>" type="email" class="form-control shadow" placeholder="Email" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Telephone</label>
                                                <input name="phone" value="<?php echo e($subscriber->phone); ?>" type="text" class="form-control" placeholder="Your telephone number" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="form-group">
                                            <button type="submit" class="btn_1 medium">Update Username</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box_general padding_bottom" id="updateProfile">
            <div class="header_box version_2">
                <div class="row">
                    
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                
            </div>
            <div class="col-md-6">
                
            </div>
        </div>
    </div> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>