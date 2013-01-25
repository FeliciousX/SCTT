<div class="container">
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
                  <form class="formarea" id="enquiry_form" action="enquiry.php">
                     <fieldset>
                        <legend><h2>Enquiry Form<button type="clear" class="btn btn-inverse rightalign margintop">Clear</button></h2></legend>
                        <div class="control-group">
                           <label class="control-label" for="f_name">Name</label>
                           <div class="controls">
                              <input type="text" placeholder="First Name" id="f_name" /> &nbsp;
                              <input type="text" placeholder="Last Name" id="l_name" />
                           </div>
                        </div>
                        <div class="control-group">
                           <label class="control-label" for="address">Address</label>
                           <div class="controls">
                              <textarea rows="3" placeholder="Address" id="address"></textarea>
                           </div>
                        </div>
                        <div class="control-group">
                           <label class="control-label" for="phone_num">Contact Number</label>
                           <div class="controls">
                              <input type="tel" class="input-large" placeholder="Contact Number" id="phone_num" />
                           </div>
                        </div>
                        <div class="control-group">
                           <label class="control-label" for="email">Email</label>
                           <div class="controls">
                              <input type="text" placeholder="Email" id="email" />
                           </div>
                        </div>
                        <div class="control-group">
                           <label class="control-label" for="subject">Subject</label>
                           <div class="controls">
                              <input type="text" placeholder="Subject of Enquiry" id="subject" />
                           </div>
                        </div>
                        <div class="control-group">
                           <label class="control-label" for="message">Message</label>
                           <div class="controls">
                              <textarea rows="4" placeholder="What would you like to know from us?" id="message"></textarea>
                           </div>
                        </div>
                        <div class="control-group">
                           <label class="control-label" for="captcha">Human Verification</label>
                           <div class="controls"></div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-large">Submit Enquiry</button>
                     </fieldset>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>



    