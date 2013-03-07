<div class="container spacetop">
    <div class="row">
        <div class="span12 startOpacity">
            <ul class="breadcrumb">
              <li><a href="<?php echo base_url('home'); ?>">Home</a> <span class="divider">/</span></li>
              <li class="active">Contact Us</li>
            </ul>
            <div class="row">
                <div class="span5">
                  <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.my/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=&amp;sll=1.553308,110.348911&amp;sspn=0.003041,0.005284&amp;ie=UTF8&amp;ll=1.552868,110.348847&amp;spn=0.003041,0.005284&amp;t=m&amp;z=18&amp;output=embed"></iframe><br />
                </div>
                <div class="span7">
                  <?php echo form_open('contact_us', $form['head']); ?>
                     <?php echo form_fieldset(); ?>
                        <?php if ($this->session->flashdata('error')): ?>
                        <div class="row">
                          <div class="alert alert-error span5">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?php echo $this->session->flashdata('error'); ?>
                          </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('success')): ?>
                        <div class="row">
                          <div class="alert alert-success span5">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?php echo $this->session->flashdata('success'); ?>
                          </div>
                        </div>
                        <?php endif; ?>
                        <legend><h2>Enquiry Form<?php echo form_reset($form['clear']); ?></h2></legend>
                        <div class="control-group">
                           <?php echo form_label('Name', 'f_name', array('class' => 'control-label')); ?>
                           <div class="controls">
                              <?php
                              echo form_input($form['f_name'], set_value('f_name'));
                              echo nbs(1);
                              echo form_input($form['l_name'], set_value('f_name'));
                              ?>                               
                           </div>
                        </div>
                        <div class="control-group">
                           <?php echo form_label('Address', 'address', array('class' => 'control-label')); ?>
                           <div class="controls">
                              <?php echo form_textarea($form['address'], set_value('address')); ?>
                           </div>
                        </div>
                        <div class="control-group">
                          <?php echo form_label('Contact Number', 'phone_num', array('class' => 'control-label')); ?>
                           <div class="controls">
                              <?php echo form_input($form['phone_num'], set_value('phone_num')); ?>
                           </div>
                        </div>
                        <div class="control-group">
                           <?php echo form_label('Email', 'email', array('class' => 'control-label')); ?>
                           <div class="controls">
                              <?php echo form_input($form['email'], set_value('email')); ?>
                           </div>
                        </div>
                        <div class="control-group">
                          <?php echo form_label('Subjects', 'subject', array('class' => 'control-label')); ?>
                           <div class="controls">
                              <?php echo form_input($form['subject'], set_value('subject')); ?>
                           </div>
                        </div>
                        <div class="control-group">
                           <?php echo form_label('Message', 'message', array('class' => 'control-label')); ?>
                           <div class="controls">
                              <?php echo form_textarea($form['message'], set_value('message')); ?>
                           </div>
                        </div>
                        <div class="control-group">
                           <?php echo form_label('Human Verification', 'captcha', array('class' => 'control-label')); ?>
                           <div class="controls">
                             <?php echo $image; ?>
                           </br>
                              <input class="input-xlarge" type="text" placeholder="Insert what you see in the image above" name="captcha" value="" />
                           </div>
                        </div>
                        <?php echo form_submit($form['submit']); ?>
                    <?php echo form_fieldset_close(); ?>
                  <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>



    