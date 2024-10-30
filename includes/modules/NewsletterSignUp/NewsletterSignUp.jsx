// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class NewsletterSignUp extends Component {

  static slug = 'hiecor_newsletter_sign_up';
  
  render() {
    const Content = this.props.content;
	const title = (this.props.title) ? this.props.title : 'Your title goes here';
	
	return (
			<fragment>
			  <div className="hiecor-newsletter">
               <div className="newsletter-l">
						
						{title}
						
						<p>
						<Content/>
						</p>
                        </div>
                        <div className="newsletter-r">
						<form method="post" action="" id="frmSS1" onsubmit="">
						<input className="newsletter-email" type="text" name="email" placeholder="Email Address" value="" />
                        <div className="captcha-ctrl">
						<input className="newsletter-captcha" type="text" name="captcha" placeholder="Enter Captcha" value=""/>
						<div className="newsletter-captcha-img">
					   
						</div>
                        </div>
						<input className="hiecor-newsletter-btn" type="submit" value="Subscribe" />
						</form>
                        </div>
			</div>
			</fragment>
                
    );
  }
}

export default NewsletterSignUp;
