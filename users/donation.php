<?php include '../users/header.php'; ?>

<main class="hero-section" role="main" aria-labelledby="support-heading">
  <div class="hero-content">
    <h1 id="support-heading">Support Springfield Pet Rescue</h1>
    <p>Help us continue our mission to rescue and rehome animals in need</p>
  </div>
</main>

<div class="support-container">

  <!-- About Section -->
  <section class="about-section" aria-labelledby="about-heading">
    <div class="about-content">
      <h2 id="about-heading">Our Story</h2>
      <p>Founded in 2020 by a group of passionate animal lovers, Springfield Pet Rescue began as a small neighborhood initiative...</p>
      <p>Today, we operate a network of foster homes, run adoption programs, and provide medical care to hundreds of animals each year...</p>
    </div>
    <div class="about-image">
      <img src="../img/rescue-team.jpg" alt="Springfield Pet Rescue team smiling with rescued animals" class="rounded-image">
    </div>
  </section>

  <!-- Mission Section -->
  <section class="mission-section" aria-labelledby="mission-heading">
    <div class="mission-card">
      <div class="mission-icon" aria-hidden="true">🐾</div>
      <h2 id="mission-heading">Our Mission</h2>
      <p>To rescue, rehabilitate, and rehome animals in need while promoting compassionate treatment...</p>
    </div>
  </section>

  <!-- Support Options -->
  <section class="support-options" aria-labelledby="how-help-heading">
    <h2 id="how-help-heading" class="section-title">How You Can Help</h2>

    <!-- Donation Card -->
    <article class="support-card donation-card" aria-labelledby="donate-heading">
      <div class="support-icon" aria-hidden="true">💖</div>
      <h3 id="donate-heading">Make a Donation</h3>
      <p>Your financial support helps us provide food, medical care, and shelter for animals in need.</p>

      <div class="donation-amounts" role="group" aria-label="Quick donation amounts">
        <button class="amount-option">$25</button>
        <button class="amount-option">$50</button>
        <button class="amount-option">$100</button>
        <button class="amount-option">Custom</button>
      </div>

      <form class="donation-form" aria-label="Donation form">
        <div class="form-group">
          <label for="donation-amount">Amount ($)</label>
          <input type="number" id="donation-amount" min="5" step="5" required aria-required="true">
        </div>
        <div class="form-group">
          <label for="donor-name">Your Name</label>
          <input type="text" id="donor-name" required aria-required="true">
        </div>
        <button type="submit" class="donate-btn" aria-label="Donate now">Donate Now</button>
      </form>
    </article>

    <!-- Event Card -->
    <article class="support-card event-card" aria-labelledby="event-heading">
      <div class="support-icon" aria-hidden="true">🎉</div>
      <h3 id="event-heading">Host a Fundraiser</h3>
      <p>Organize an event to benefit Springfield Pet Rescue...</p>

      <div class="event-ideas">
        <h4>Event Ideas:</h4>
        <ul>
          <li>Birthday fundraisers</li>
          <li>Bake sales</li>
          <li>Pet wash events</li>
          <li>Charity runs/walks</li>
          <li>Online auctions</li>
        </ul>
      </div>

      <button class="event-btn">Plan Your Event</button>
    </article>

    <!-- Sponsorship Card -->
    <article class="support-card volunteer-card" aria-labelledby="sponsor-heading">
      <div class="support-icon" aria-hidden="true">🙌</div>
      <h3 id="sponsor-heading">Become a Sponsor</h3>
      <p>Businesses can support our work through corporate sponsorships...</p>

      <div class="sponsor-levels">
        <div class="level">
          <h4>Paw Partner ($500+)</h4>
          <p>Logo on our website</p>
        </div>
        <div class="level">
          <h4>Rescue Champion ($1,000+)</h4>
          <p>Website + event recognition</p>
        </div>
        <div class="level">
          <h4>Lifesaver ($5,000+)</h4>
          <p>Premier visibility at all events</p>
        </div>
      </div>

      <button class="sponsor-btn">Learn About Sponsorship</button>
    </article>
  </section>

  <!-- Impact Stats -->
  <section class="impact-section" aria-labelledby="impact-heading">
    <h2 id="impact-heading" class="section-title">Your Impact</h2>
    <div class="impact-stats">
      <div class="stat">
        <div class="stat-number">500+</div>
        <div class="stat-label">Animals Rescued</div>
      </div>
      <div class="stat">
        <div class="stat-number">300+</div>
        <div class="stat-label">Successful Adoptions</div>
      </div>
      <div class="stat">
        <div class="stat-number">50+</div>
        <div class="stat-label">Active Volunteers</div>
      </div>
    </div>
  </section>
</div>

<link rel="stylesheet" href="../css/support.css">
<?php include 'footer.php'; ?>
