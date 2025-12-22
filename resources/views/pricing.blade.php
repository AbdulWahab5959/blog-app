<x-layouts.app 
    title="Pricing Plans | Premium Blog Platform"
    description="Choose the perfect plan for your blogging needs. Start free or upgrade to premium features."
>
    <!-- Pricing Hero -->
    <div class="pricing-hero-section">
        <div class="container-fluid">
            <div class="pricing-hero-content">
                <h1 class="pricing-hero-title">Simple, Transparent <span class="pricing-gradient-text">Pricing</span></h1>
                <p class="pricing-hero-subtitle">
                    Start free, upgrade when you need more features. No hidden fees, cancel anytime.
                </p>
                <div class="pricing-toggle-wrapper">
                    <span class="pricing-toggle-label">Monthly</span>
                    <label class="pricing-toggle-switch">
                        <input type="checkbox" id="pricing-toggle">
                        <span class="pricing-toggle-slider"></span>
                    </label>
                    <span class="pricing-toggle-label active">Yearly <span class="pricing-save-badge">Save 20%</span></span>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="row g-4 justify-content-center">
            <!-- Free Plan -->
            <div class="col-lg-4">
                <div class="pricing-plan-card pricing-plan-free">
                    <div class="pricing-plan-header">
                        <div class="pricing-plan-badge">Free Forever</div>
                        <h3 class="pricing-plan-title">Starter</h3>
                        <div class="pricing-plan-price">
                            <span class="pricing-plan-currency">$</span>
                            <span class="pricing-plan-amount">0</span>
                            <span class="pricing-plan-period">/month</span>
                        </div>
                        <p class="pricing-plan-description">Perfect for beginners and casual bloggers</p>
                    </div>
                    
                    <div class="pricing-plan-features">
                        <div class="pricing-feature-item">
                            <i class="fas fa-check pricing-feature-icon"></i>
                            <span>Up to 10 blog posts</span>
                        </div>
                        <div class="pricing-feature-item">
                            <i class="fas fa-check pricing-feature-icon"></i>
                            <span>Basic analytics</span>
                        </div>
                        <div class="pricing-feature-item">
                            <i class="fas fa-check pricing-feature-icon"></i>
                            <span>Standard templates</span>
                        </div>
                        <div class="pricing-feature-item">
                            <i class="fas fa-check pricing-feature-icon"></i>
                            <span>Community support</span>
                        </div>
                        <div class="pricing-feature-item">
                            <i class="fas fa-check pricing-feature-icon"></i>
                            <span>500MB storage</span>
                        </div>
                    </div>
                    
                    <a href="{{ route('register') }}" class="pricing-plan-button pricing-button-free">
                        <i class="fas fa-rocket me-2"></i> Get Started Free
                    </a>
                    
                    <div class="pricing-plan-note">No credit card required</div>
                </div>
            </div>

            <!-- Pro Plan (Recommended) -->
            <div class="col-lg-4">
                <div class="pricing-plan-card pricing-plan-pro featured">
                    <div class="pricing-plan-badge-recommended">Most Popular</div>
                    <div class="pricing-plan-header">
                        <h3 class="pricing-plan-title">Professional</h3>
                        <div class="pricing-plan-price">
                            <span class="pricing-plan-currency">$</span>
                            <span class="pricing-plan-amount">29</span>
                            <span class="pricing-plan-period">/month</span>
                        </div>
                        <p class="pricing-plan-description">For serious bloggers and content creators</p>
                    </div>
                    
                    <div class="pricing-plan-features">
                        <div class="pricing-feature-item">
                            <i class="fas fa-check pricing-feature-icon"></i>
                            <span>Unlimited blog posts</span>
                        </div>
                        <div class="pricing-feature-item">
                            <i class="fas fa-check pricing-feature-icon"></i>
                            <span>Advanced analytics</span>
                        </div>
                        <div class="pricing-feature-item">
                            <i class="fas fa-check pricing-feature-icon"></i>
                            <span>Premium templates</span>
                        </div>
                        <div class="pricing-feature-item">
                            <i class="fas fa-check pricing-feature-icon"></i>
                            <span>Priority support</span>
                        </div>
                        <div class="pricing-feature-item">
                            <i class="fas fa-check pricing-feature-icon"></i>
                            <span>10GB storage</span>
                        </div>
                        <div class="pricing-feature-item">
                            <i class="fas fa-check pricing-feature-icon"></i>
                            <span>Custom domain</span>
                        </div>
                        <div class="pricing-feature-item">
                            <i class="fas fa-check pricing-feature-icon"></i>
                            <span>Email newsletter</span>
                        </div>
                        <div class="pricing-feature-item">
                            <i class="fas fa-check pricing-feature-icon"></i>
                            <span>SEO tools</span>
                        </div>
                    </div>
                    
                    <a href="{{ route('register') }}" class="pricing-plan-button pricing-button-pro">
                        <i class="fas fa-crown me-2"></i> Upgrade to Pro
                    </a>
                    
                    <div class="pricing-plan-note">7-day free trial included</div>
                </div>
            </div>

            <!-- Business Plan -->
            <div class="col-lg-4">
                <div class="pricing-plan-card pricing-plan-business">
                    <div class="pricing-plan-header">
                        <h3 class="pricing-plan-title">Business</h3>
                        <div class="pricing-plan-price">
                            <span class="pricing-plan-currency">$</span>
                            <span class="pricing-plan-amount">99</span>
                            <span class="pricing-plan-period">/month</span>
                        </div>
                        <p class="pricing-plan-description">For teams and professional publications</p>
                    </div>
                    
                    <div class="pricing-plan-features">
                        <div class="pricing-feature-item">
                            <i class="fas fa-check pricing-feature-icon"></i>
                            <span>Everything in Pro</span>
                        </div>
                        <div class="pricing-feature-item">
                            <i class="fas fa-check pricing-feature-icon"></i>
                            <span>Team collaboration</span>
                        </div>
                        <div class="pricing-feature-item">
                            <i class="fas fa-check pricing-feature-icon"></i>
                            <span>Custom branding</span>
                        </div>
                        <div class="pricing-feature-item">
                            <i class="fas fa-check pricing-feature-icon"></i>
                            <span>Advanced SEO suite</span>
                        </div>
                        <div class="pricing-feature-item">
                            <i class="fas fa-check pricing-feature-icon"></i>
                            <span>Dedicated support</span>
                        </div>
                        <div class="pricing-feature-item">
                            <i class="fas fa-check pricing-feature-icon"></i>
                            <span>100GB storage</span>
                        </div>
                        <div class="pricing-feature-item">
                            <i class="fas fa-check pricing-feature-icon"></i>
                            <span>API access</span>
                        </div>
                        <div class="pricing-feature-item">
                            <i class="fas fa-check pricing-feature-icon"></i>
                            <span>White-label options</span>
                        </div>
                    </div>
                    
                    <a href="{{ route('register') }}" class="pricing-plan-button pricing-button-business">
                        <i class="fas fa-building me-2"></i> Contact Sales
                    </a>
                    
                    <div class="pricing-plan-note">Custom solutions available</div>
                </div>
            </div>
        </div>

        <!-- Feature Comparison -->
        <div class="row mt-6">
            <div class="col-12">
                <div class="pricing-features-comparison">
                    <div class="pricing-comparison-header text-center mb-5">
                        <h2 class="pricing-comparison-title">Compare All Features</h2>
                        <p class="pricing-comparison-subtitle">See how our plans stack up against each other</p>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="pricing-comparison-table">
                            <thead>
                                <tr>
                                    <th>Feature</th>
                                    <th>Starter</th>
                                    <th>Professional</th>
                                    <th>Business</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Blog Posts</td>
                                    <td>Up to 10</td>
                                    <td>Unlimited</td>
                                    <td>Unlimited</td>
                                </tr>
                                <tr>
                                    <td>Storage</td>
                                    <td>500MB</td>
                                    <td>10GB</td>
                                    <td>100GB</td>
                                </tr>
                                <tr>
                                    <td>Custom Domain</td>
                                    <td><i class="fas fa-times pricing-no"></i></td>
                                    <td><i class="fas fa-check pricing-yes"></i></td>
                                    <td><i class="fas fa-check pricing-yes"></i></td>
                                </tr>
                                <tr>
                                    <td>Premium Templates</td>
                                    <td><i class="fas fa-times pricing-no"></i></td>
                                    <td><i class="fas fa-check pricing-yes"></i></td>
                                    <td><i class="fas fa-check pricing-yes"></i></td>
                                </tr>
                                <tr>
                                    <td>Analytics</td>
                                    <td>Basic</td>
                                    <td>Advanced</td>
                                    <td>Enterprise</td>
                                </tr>
                                <tr>
                                    <td>Email Support</td>
                                    <td><i class="fas fa-check pricing-yes"></i></td>
                                    <td><i class="fas fa-check pricing-yes"></i></td>
                                    <td><i class="fas fa-check pricing-yes"></i></td>
                                </tr>
                                <tr>
                                    <td>Priority Support</td>
                                    <td><i class="fas fa-times pricing-no"></i></td>
                                    <td><i class="fas fa-check pricing-yes"></i></td>
                                    <td>24/7 Dedicated</td>
                                </tr>
                                <tr>
                                    <td>Team Members</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>Up to 10</td>
                                </tr>
                                <tr>
                                    <td>API Access</td>
                                    <td><i class="fas fa-times pricing-no"></i></td>
                                    <td><i class="fas fa-times pricing-no"></i></td>
                                    <td><i class="fas fa-check pricing-yes"></i></td>
                                </tr>
                                <tr>
                                    <td>Custom Branding</td>
                                    <td><i class="fas fa-times pricing-no"></i></td>
                                    <td><i class="fas fa-times pricing-no"></i></td>
                                    <td><i class="fas fa-check pricing-yes"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="row mt-6">
            <div class="col-lg-8 mx-auto">
                <div class="pricing-faq-section">
                    <div class="pricing-faq-header text-center mb-5">
                        <h2 class="pricing-faq-title">Frequently Asked Questions</h2>
                        <p class="pricing-faq-subtitle">Everything you need to know about our pricing</p>
                    </div>
                    
                    <div class="pricing-faq-list">
                        <div class="pricing-faq-item">
                            <div class="pricing-faq-question">
                                <h4>Can I switch plans anytime?</h4>
                                <i class="fas fa-chevron-down pricing-faq-icon"></i>
                            </div>
                            <div class="pricing-faq-answer">
                                <p>Yes, you can upgrade or downgrade your plan at any time. Changes take effect immediately, and we'll prorate any differences.</p>
                            </div>
                        </div>
                        
                        <div class="pricing-faq-item">
                            <div class="pricing-faq-question">
                                <h4>Do you offer refunds?</h4>
                                <i class="fas fa-chevron-down pricing-faq-icon"></i>
                            </div>
                            <div class="pricing-faq-answer">
                                <p>We offer a 30-day money-back guarantee on all paid plans. If you're not satisfied, contact our support team for a full refund.</p>
                            </div>
                        </div>
                        
                        <div class="pricing-faq-item">
                            <div class="pricing-faq-question">
                                <h4>What payment methods do you accept?</h4>
                                <i class="fas fa-chevron-down pricing-faq-icon"></i>
                            </div>
                            <div class="pricing-faq-answer">
                                <p>We accept all major credit cards (Visa, MasterCard, American Express), PayPal, and bank transfers for annual plans.</p>
                            </div>
                        </div>
                        
                        <div class="pricing-faq-item">
                            <div class="pricing-faq-question">
                                <h4>Is there a free trial for paid plans?</h4>
                                <i class="fas fa-chevron-down pricing-faq-icon"></i>
                            </div>
                            <div class="pricing-faq-answer">
                                <p>Yes! All paid plans come with a 7-day free trial. No credit card required to start the trial.</p>
                            </div>
                        </div>
                        
                        <div class="pricing-faq-item">
                            <div class="pricing-faq-question">
                                <h4>Can I cancel anytime?</h4>
                                <i class="fas fa-chevron-down pricing-faq-icon"></i>
                            </div>
                            <div class="pricing-faq-answer">
                                <p>Absolutely. You can cancel your subscription anytime from your account settings. No questions asked.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="row mt-6">
            <div class="col-12">
                <div class="pricing-cta-section">
                    <div class="pricing-cta-content text-center">
                        <h2 class="pricing-cta-title">Ready to Start Your Blogging Journey?</h2>
                        <p class="pricing-cta-subtitle">Join 50,000+ creators who trust our platform</p>
                        <div class="pricing-cta-buttons">
                            <a href="{{ route('register') }}" class="pricing-cta-button-primary">
                                <i class="fas fa-rocket me-2"></i> Start Free Trial
                            </a>
                            <a href="{{ route('about') }}" class="pricing-cta-button-secondary">
                                <i class="fas fa-question-circle me-2"></i> Learn More
                            </a>
                        </div>
                        <p class="pricing-cta-note">No credit card required • Cancel anytime</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>