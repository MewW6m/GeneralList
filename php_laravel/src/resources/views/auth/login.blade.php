@include('components.links')

<form method="post" action="{{route('login')}}" class="form">
	@csrf

	<div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
		<div class="uk-width-1-1">
			<div class="uk-container">
				<div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
					<div class="uk-width-1-1@m">
						<div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body
			uk-box-shadow-large">
							<div class="uk-text-center">
								<img src="/images/logo.png" class="uk-width-4-5" />
							</div>
								@if ($errors->any())
									<div class="uk-alert-danger" uk-alert>
										<a class="uk-alert-close" uk-close></a>
										<p>
											@foreach ($errors->all() as $error)
											{{ $error }}<br>
											@endforeach
										</p>
									</div>
								@endif

								<div class="uk-margin">
									<div class="uk-inline uk-width-1-1 field">
										<span class="uk-form-icon" uk-icon="icon: mail"></span>
										<input type="text" name="email" class="uk-input uk-form-large"
											placeholder="sample@co.jp" value="default1@sample.com"><br>
									</div>
								</div>
								<div class="uk-margin">
									<div class="uk-inline uk-width-1-1 field">
										<span class="uk-form-icon" uk-icon="icon: lock"></span>
										<input type="password" name="password" class="uk-input uk-form-large"
											placeholder="**********" value="niodah89g2"><br>
									</div>
								</div>
								<div class="uk-margin actions">
									<button type="submit"
										class="uk-button uk-button-primary uk-button-large uk-width-1-1">ログイン</button>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>