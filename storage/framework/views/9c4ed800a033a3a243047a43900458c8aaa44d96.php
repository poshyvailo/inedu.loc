<div class="panel panel-default">
	<div class="panel-heading no-bg panel-settings">
		<h3 class="panel-title">
			<?php echo e(trans('common.website_settings')); ?>

		</h3>
	</div>
	<div class="panel-body nopadding">
		<div class="socialite-form">

			<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<form method="POST" action="<?php echo e(url('admin/general-settings')); ?>" enctype="multipart/form-data" files="true">
				<?php echo e(csrf_field()); ?>

				<div class="row">
					<div class="col-md-6">
						<fieldset class="form-group">
							<?php echo e(Form::label('site_name', trans('admin.site_name'))); ?>

							<?php echo e(Form::text('site_name', Setting::get('site_name', 'Socialite'), array('class' => 'form-control', 'placeholder' => trans('admin.site_name') ))); ?>

						</fieldset>
					</div>
					<div class="col-md-6">
						<fieldset class="form-group">
							<?php echo e(Form::label('site_title', trans('admin.site_title'))); ?>

							<?php echo e(Form::text('site_title', Setting::get('site_title', 'Socialite'), array('class' => 'form-control', 'placeholder' => trans('admin.site_title')))); ?>

						</fieldset>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<fieldset class="form-group">
							<?php echo e(Form::label('logo', trans('admin.change_logo'))); ?>

							<?php echo e(Form::file('logo', array('id' => 'logo'))); ?>

						</fieldset>
					</div>
					<div class="col-md-3">
						<img id="logo" class="socialite-logo" src="<?php echo e(url('setting/'.Setting::get('logo'))); ?>" alt="Socialite logo" title="Socialite logo"/>
					</div>
					<div class="col-md-3">
						<fieldset class="form-group">
							<?php echo e(Form::label('favicon', trans('admin.change_favicon'))); ?>

							<?php echo e(Form::file('favicon', array('id' => 'favicon'))); ?>

						</fieldset>
					</div>
					<div class="col-md-3">
						<img id="favicon" class="socialite-favicon" src="<?php echo e(url('setting/'.Setting::get('favicon'))); ?>" alt="Socialite favicon" title="Socialite favicon" height="50" />
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<fieldset class="form-group">
							<?php echo e(Form::label('support_email', trans('admin.support_mail'))); ?>

							<?php echo e(Form::email('support_email', Setting::get('support_email', 'admin@socialite.com'), array('class' => 'form-control'
							,'placeholder' => 'admin@socialite.com'))); ?>

						</fieldset>
					</div>

					<div class="col-md-6">
						<fieldset class="form-group">
							<?php echo e(Form::label('noreply_email', trans('admin.no_reply_mail'))); ?>

							<?php echo e(Form::email('noreply_email', Setting::get('noreply_email', 'noreply@socialite.com'), array('class' => 'form-control'
							,'placeholder' => 'noreply@socialite.com'))); ?>

						</fieldset>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<fieldset class="form-group">
							<?php echo e(Form::label('language', trans('admin.default_language'))); ?>

							<?php echo e(Form::select('language',Config::get('app.locales'), Setting::get('language'), array('class' => 'form-control col-sm-6'))); ?>

						</fieldset>
					</div>

					<div class="col-md-6">
						<fieldset class="form-group">
							<?php echo e(Form::label('enable_browse', trans('admin.enable_browse'))); ?>

							<?php echo e(Form::select('enable_browse', array('on' => trans('admin.on'), 'off' => trans('admin.off')), Setting::get('enable_browse', 'on') , ['class' => 'form-control', 'placeholder' => trans('admin.please_select')])); ?>

						</fieldset>
					</div>					
				</div>

				<div class="row">
					<div class="col-md-6">
						<fieldset class="form-group">
							<?php echo e(Form::label('min_items_page', trans('admin.min_items_per_page'))); ?>

							<?php echo e(Form::number('min_items_page', Setting::get('min_items_page', '5') , array('class' => 'form-control', 'placeholder' => '10'))); ?>

							<div class="info"><?php echo e(trans('admin.min_items_per_page_text')); ?></div>
						</fieldset>
					</div>

					<div class="col-md-6">
						<fieldset class="form-group">
							<?php echo e(Form::label('items_page', trans('admin.items_per_page'))); ?>

							<?php echo e(Form::number('items_page', Setting::get('items_page', '10') , array('class' => 'form-control', 'placeholder' => '10'))); ?>

							<div class="info"><?php echo e(trans('admin.items_per_page_text')); ?></div>
						</fieldset>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<fieldset class="form-group">
							<?php echo e(Form::label('site_url', trans('admin.website_url'))); ?>

							<?php echo e(Form::text('site_url', Setting::get('site_url'), array('class' => 'form-control', 'placeholder' => trans('admin.website_url')))); ?>

						</fieldset>
					</div>

					<div class="col-md-6">
						<fieldset class="form-group">
							<?php echo e(Form::label('twitter_link', trans('admin.twitter_link'))); ?>

							<div class="input-group twitter-input-group">
								<div class="input-group-addon twitter-btn"><i class="fa fa-twitter"></i></div>
								<?php echo e(Form::text('twitter_link', Setting::get('twitter_link'), array('class' => 'form-control', 'placeholder' => trans('admin.twitter_link')))); ?>

							</div>

						</fieldset>
					</div>					
				</div>

				<div class="row">
					<div class="col-md-6">
						<fieldset class="form-group">
							<?php echo e(Form::label('facebook_link', trans('admin.facebook_link'))); ?>

							<div class="input-group facebook-input-group">
								<div class="input-group-addon fb-btn"><i class="fa fa-facebook"></i></div>
								<?php echo e(Form::text('facebook_link', Setting::get('facebook_link'), array('class' => 'form-control account-form', 'placeholder' => trans('admin.facebook_link')))); ?>

							</div>

						</fieldset>
					</div>
					<div class="col-md-6">
						<fieldset class="form-group">
							<?php echo e(Form::label('youtube_link', trans('admin.youtube_link'))); ?>

							<div class="input-group youtube-input-group">
								<div class="input-group-addon fb-btn"><i class="fa fa-youtube"></i></div>
								<?php echo e(Form::text('youtube_link', Setting::get('youtube_link'), array('class' => 'form-control', 'placeholder' => trans('admin.youtube_link')))); ?>

							</div>

						</fieldset>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<fieldset class="form-group">
							<?php echo e(Form::label('contact_text', trans('admin.contact_text'))); ?>

							<?php echo e(Form::textarea('contact_text', Setting::get('contact_text'), array('class' => 'form-control', 'placeholder' => trans('admin.contact_help_text'), 'rows' => '5'))); ?>

						</fieldset>
					</div>
					<div class="col-md-6">
						<fieldset class="form-group">
							<?php echo e(Form::label('address_on_mail', trans('admin.address_on_mail'))); ?>

							<?php echo e(Form::textarea('address_on_mail', Setting::get('address_on_mail'), array('class' => 'form-control', 'placeholder' => trans('admin.address_on_mail_text'), 'rows' => '5'))); ?>

						</fieldset>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<fieldset class="form-group">
							<?php echo e(Form::label('meta_description', trans('admin.meta_description'))); ?>

							<?php echo e(Form::textarea('meta_description', Setting::get('meta_description'), array('class' => 'form-control', 'placeholder' => trans('admin.meta_description_placeholder'), 'rows' => '5'))); ?>

						</fieldset>
					</div>
					<div class="col-md-6">
						<fieldset class="form-group">
							<?php echo e(Form::label('meta_keywords', trans('admin.meta_keywords'))); ?>

							<?php echo e(Form::textarea('meta_keywords', Setting::get('meta_keywords'), array('class' => 'form-control', 'placeholder' => trans('admin.meta_keywords_placeholder'), 'rows' => '5'))); ?>

						</fieldset>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<fieldset class="form-group">
							<?php echo e(Form::label('censored_words', trans('admin.censored_words'))); ?>

							<?php echo e(Form::text('censored_words', Setting::get('censored_words'), array('class' => 'form-control', 'placeholder' => 'racist, retard'))); ?>

							<div class="info"><?php echo e(trans('admin.censored_words_text')); ?></div>
						</fieldset>
					</div>
					<div class="col-md-6">
						<fieldset class="form-group">
							<?php echo e(Form::label('google_analytics', trans('admin.google_analytics'))); ?>

							<?php echo e(Form::textarea('google_analytics', Setting::get('google_analytics'), array('class' => 'form-control', 'rows' => '5'))); ?>

						</fieldset>
					</div>
				</div>
				<h3><?php echo e(trans('admin.fields_on_registration')); ?></h3><hr>
					<div class="row">
						<div class="col-md-6">
							<fieldset class="form-group">
								<?php echo e(Form::label('mail_verification', trans('admin.mail_verification'))); ?>

								<?php echo e(Form::select('mail_verification', array('on' => trans('admin.on'), 'off' => trans('admin.off')), Setting::get('mail_verification', 'on') , ['class' => 'form-control', 'placeholder' => trans('admin.please_select')])); ?>

							</fieldset>
						</div>
						<div class="col-md-6">
							<fieldset class="form-group">
								<?php echo e(Form::label('city', trans('admin.city_register'))); ?>

								<?php echo e(Form::select('city', array('on' => trans('admin.on'), 'off' => trans('admin.off')), Setting::get('city', 'on') , ['class' => 'form-control', 'placeholder' => trans('admin.please_select')])); ?>

							</fieldset>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<fieldset class="form-group">
								<?php echo e(Form::label('birthday', trans('common.birthday'))); ?>

								<?php echo e(Form::select('birthday', array('on' => trans('admin.on'), 'off' => trans('admin.off')), Setting::get('birthday', 'on') , ['class' => 'form-control', 'placeholder' => trans('admin.please_select')])); ?>

							</fieldset>
						</div>
						<div class="col-md-6">
							<fieldset class="form-group">
								<?php echo e(Form::label('captcha', trans('admin.captcha_register'))); ?>

								<?php echo e(Form::select('captcha', array('on' => trans('admin.on'), 'off' => trans('admin.off')), Setting::get('captcha', 'on') , ['class' => 'form-control', 'placeholder' => trans('admin.please_select')])); ?>

							</fieldset>
						</div>
					</div>
					
				
				<div class="pull-right">
					<?php echo e(Form::submit('Save Changes', ['class' => 'btn btn-success'])); ?>

				</div>
				<div class="clearfix"></div>
			</form>
		</div><!-- /Socialite-form -->
	</div>
</div><!-- /panel -->



