<?php

class HIECOR_NewsletterSignUp extends ET_Builder_Module {

	public $slug       = 'hiecor_newsletter_sign_up';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://www.hiecor.com/',
		'author'     => 'HieCOR',
		'author_uri' => 'https://www.hiecor.com/',
	);

	public function init() {
		$this->name = esc_html__( 'Newsletter SignUp', 'hiecor-hiecor-divi-modules' );
                $this->main_css_element = '%%order_class%%';
                $this->advanced_fields = array(
		
			'button'         => array(
				'button' => array(
					'label'      => esc_html__( 'Button', 'hiecor-hiecor-divi-modules' ),
					'css'        => array(
						'main' => "{$this->main_css_element} .hiecor-newsletter-btn",
						'limited_main' => "{$this->main_css_element} .hiecor-newsletter-btn",
					),
					'box_shadow' => array(
						'css' => array(
							'main' => '%%order_class%% .hiecor-newsletter-btn',
						),
					),
					'margin_padding' => array(
						'css' => array(
							'important' => 'all',
						),
					),
				),
			),
			'background'     => array(
				'has_background_color_toggle' => true,
				'options'                     => array(
					'use_background_color' => array(
						'default' => 'on',
					),
					'background_color'     => array(
						'depends_show_if' => 'on',
						'default'         => et_builder_accent_color(),
					),
				),
			)
			
		);
	}

	public function get_fields() {
		return array(
			'title' => array(
				'label'           => esc_html__( 'Title', 'hiecor-hiecor-divi-modules' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Choose a title of your signup box.', 'hiecor-hiecor-divi-modules' ),
				'toggle_slug'     => 'main_content',
                                //'default'         => ''
                        ),
			'content' => array(
				'label'           => esc_html__( 'Body', 'hiecor-hiecor-divi-modules' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'This content will appear below the title.', 'hiecor-hiecor-divi-modules' ),
				'toggle_slug'     => 'main_content',
                                //'default'         => 'Your content goes here. Edit or remove this text inline or in the module Content settings.'
                        ),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
            $title =  $this->props['title'];
            
            $content = $this->props['content'];
            //print_r($this->props);
            if($this->props['use_background_color']==='off'){
                $this->add_classname( 'et_pb_no_bg' );
            }else{
                ET_Builder_Element::set_style( $render_slug, array(
                    'selector'    => '%%order_class%%',
                    'declaration' => sprintf(
                            'background-color: %1$s;',
                            $this->props['background_color']
                            ),
                 ) ); 
            }
            
            
            $html = '<div class="hiecor-newsletter">
                <div class="newsletter-l">
               
                %1$s
                
                
                %4$s
               </div>
               <div class="newsletter-r">
                <form method="post" action="%3$s/emailer_form/?form=%2$s" id="frmSS1" onsubmit="return CheckForm1(this);">
                <input class="newsletter-email" type="text" name="email" placeholder="Email Address" value="" />
                <div class="captcha-ctrl">
                <input class="newsletter-captcha" type="text" name="captcha" placeholder="Enter Captcha" value=""/>
                <div class="newsletter-captcha-img">
                <script>
                    if (!Application) var Application = {};
                    if (!Application.Page) Application.Page = {};
                    if (!Application.Page.ClientCAPTCHA) {
                            Application.Page.ClientCAPTCHA = {
                                    sessionIDString: "",
                                    captchaURL: [],
                                    getRandomLetter: function () { return String.fromCharCode(Application.Page.ClientCAPTCHA.getRandom(65,90)); },
                                    getRandom: function(lowerBound, upperBound) { return Math.floor((upperBound - lowerBound + 1) * Math.random() + lowerBound); },
                                    getSID: function() {
                                            if (Application.Page.ClientCAPTCHA.sessionIDString.length <= 0) {
                                                    var tempSessionIDString = "";
                                                    for (var i = 0; i < 32; ++i) tempSessionIDString += Application.Page.ClientCAPTCHA.getRandomLetter();
                                                    Application.Page.ClientCAPTCHA.sessionIDString.length = tempSessionIDString;
                                            }
                                            return Application.Page.ClientCAPTCHA.sessionIDString;
                                    },
                                    getURL: function() {
                                            if (Application.Page.ClientCAPTCHA.captchaURL.length <= 0) {
                                                    var tempURL = "%3$s"+"/email_captcha?c=";
                                                    tempURL += Application.Page.ClientCAPTCHA.getRandom(1,1000);
                                                    tempURL += "&ss=" + Application.Page.ClientCAPTCHA.getSID();
                                                    Application.Page.ClientCAPTCHA.captchaURL.push(tempURL);
                                            }
                                            return Application.Page.ClientCAPTCHA.captchaURL;
                                    }
                            }
                    }
                    var temp = Application.Page.ClientCAPTCHA.getURL();
                    for (var i = 0, j = temp.length; i < j; i++) {
                    var daString = "<img src=\'" + temp[i] +"\' alt=\'"+ i +"\'>";
                       document.write(daString);
                    }
                </script>
                </div>
                </div>
                <input class="hiecor-newsletter-btn" type="submit" value="Subscribe" />
                </form>
                </div>
                </div>
                ';
            
            $formID=1;
            $optiondata = get_option('woocommerce_corcrm_payment_settings');
            $url = rtrim($optiondata['hiecor_url'], '/');
            
            return sprintf( $html,
                    $title,
                    $formID,
                    $url,
                    $content
                    );
	}
}

new HIECOR_NewsletterSignUp;
