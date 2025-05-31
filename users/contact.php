<?php include '../users/header.php'; ?>
<main class="contact" role="main">

    <div class="container" aria-labelledby="contact-heading">
        
        <section class="content" role="region" aria-label="Contact Introduction">
            <h2 id="contact-heading">Contact Us</h2>
            <p>
                We'd love to hear from you! Whether you're interested in adopting, volunteering, or just want to
                learn more about our organization, please don't hesitate to contact us.
            </p>
            <img src="../img/catdog3c.png" alt="Illustration of a cat and dog" width="300">
        </section>

        <section class="contact-form" role="form" aria-labelledby="form-heading">
            <form id="contact-form" method="post" action="../save_message.php">
                <h1 id="form-heading">Send Message</h1>

                <label for="name">Name <span aria-hidden="true">*</span></label>
                <input type="text" id="name" name="name" required aria-required="true">

                <label for="email">Email <span aria-hidden="true">*</span></label>
                <input type="email" id="email" name="email" required aria-required="true">

                <label for="message">Message <span aria-hidden="true">*</span></label>
                <textarea id="message" name="message" rows="5" required aria-required="true"></textarea>

                <input type="submit" name="save" value="Send Message" aria-label="Send your message">
            </form>
        </section>
        
    </div>

</main>
<link rel="stylesheet" href="../css/contact.css">
<?php include 'footer.php'; ?>
